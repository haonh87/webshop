<?php

namespace App\Http\Controllers\Frontend;

use Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use Auth;
use App\Services\ProductColorService;
use App\Services\ProductSizeService;

class CartController extends BaseController
{

    protected $productSizeService;
    protected $productColorService;

    /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct(ProductSizeService $productSizeService, ProductColorService $productColorService
    )
    {
        parent::__construct();
        $this->productSizeService = $productSizeService;
        $this->productColorService = $productColorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carts = Cart::content();
        $sizes = $this->productSizeService->getAllProductSize();
        $colors = $this->productColorService->getAllColor();
        return view('frontend.cart', [
            'carts' => $carts,
            'sizes' => $sizes->toArray(),
            'colors' => $colors->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $cartExists = Cart::search(function($key, $value) {
            return $key->id == Request::get('product_id');
        });
        if($cartExists->count())
        {
            foreach ($cartExists as $cart) {
                Cart::update($cart->rowId, $cart->qty + Request::get('quantity'));
            }
        } else {
            Cart::add(array(
                'id'=>Request::get('product_id'),
                'name' => Request::get('product_name'),
                'qty' => Request::get('quantity'),
                'price' => Request::get('product_price'),
                'options' => [
                    'size' => Request::get('attribute_pa_size'),
                    'color' => Request::get('attribute_pa_color'),
                    'image' => Request::get('product_image'),
                ]
            ));
        }
        $prduct_link = Request::get('product_name').' đã thêm vào giỏ hàng';
        $link_to_cart = '<a class="button wc-forward" href="'.route('cart.index').'">Giỏ Hàng</a>';
        $success = $link_to_cart.$prduct_link;
        $message=['success'=>$success];

        return redirect()->back()->with('message_cart', $success);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update()
    {
        $carts = Request::get('cart');
        foreach ($carts as $key => $cart) {
            $quantity = $cart['qty'];
            if(is_null(Cart::get($key))){
                return redirect()->back()->with('message_cart', 'Cập nhật giỏ hàng thất bại.');
            }
            Cart::update($key, $quantity);
        }
        return redirect()->back()->with('message_cart', 'Cập nhật giỏ hàng thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product_name = Cart::get($id)->name;
        Cart::remove($id);
        return redirect()->back()->with('message_cart', 'Xóa thành công '. $product_name);
    }

    public function getCheckout()
    {
        if(!Auth::check()) {
            return view('frontend.myaccount.login')->with('message_account', 'Bạn phải đăng nhập trước khi thanh toán hóa đơn!');
        }
        if(Cart::total() == 0){
            return redirect()->back();
        }
        $carts = Cart::content();
        return view('frontend.content.checkout', [
            'carts' => $carts,
        ]);
    }

    public function postCheckout(Request $request)
    {
        $order_info = $request->except('_token');
//        dd($order_info);
        $order = new Order();
        if(!Auth::check() || Auth::user()->customer == null ){
            //if this email had n the system
            if($customer= Customer::where('email', '=',$order_info['email'])->firstOrFail()){
                Customer ::where('email', '=',$order_info['email'])->update(
                [
                    'name' => $order_info['lastname'],
                    'phone' => $order_info['telephone'],
                    'mobile' => $order_info['mobile'],
                    'address' => $order_info['address_1'],
                ]
            );
            }else{
                $customer = new Customer();
                $customer->name = $order_info['lastname'];
                $customer->email = $order_info['email'];
                $customer->phone = $order_info['telephone'];
                $customer->mobile = $order_info['mobile'];
                $customer->address = $order_info['address_1'];
                $customer->save();
            }
            $order->customers_id = $customer->id;
        }

        else{
            $order->customers_id = Auth::user()->customer_id;
            $customer = Customer::find($order->customers_id);
            $customer->name = $order_info['lastname'];
            $customer->email = $order_info['email'];
            $customer->phone = $order_info['telephone'];
            $customer->mobile = $order_info['mobile'];
            $customer->address = $order_info['address_1'];
            $customer->save();
        }
        $order->status = '0';
        $order->total = Cart::total()*1.2;
        //send mail
        $data = array(
            'customer' => $customer,
            'link' => route('index'),
        );
        if($customer){
            \Mail::send('emails.email_check_out',$data, function($message) use ($customer){
                $message->from('thienth3@gmail.com', 'Admin');
                $message->to('thienth3@gmail.com', $customer->name)
                    ->subject('Notification');
            });
        }
        //end send mail
        $order->save();
        foreach (Cart::content() as $item) {
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item->id;
            $order_item->product_color_id = $item->options->color;
            $order_item->product_size_id = $item->options->size_option;
            $order_item->quantity = $item->qty;
            $order_item->save();
        }
//        dd(Cart::content());
        Cart::destroy();
        return \Redirect()->route('index')->with('message', trans('lang.complete_order'));
    }
}
