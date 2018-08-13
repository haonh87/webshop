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
        $prduct_link = Request::get('product_name').' has been added to your cart';
        $link_to_cart = '<a class="button wc-forward" href="'.route('cart.index').'">shopping cart!</a>';
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
                return redirect()->back()->with('message_cart', 'Update cart error');
            }
            Cart::update($key, $quantity);
        }
        return redirect()->back()->with('message_cart', 'Update cart success');
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
        if(Cart::total() == 0){
            return redirect()->back();
        }
        $products = null;
        $category = null;
        $sub_navi ='
        <li><a href="'.route('cart.index').'">'.trans('lang.shopping_cart').'</a></li>
        <li><a href="'.route('cart.checkout').'" style="display: none;">'.trans('lang.checkout').'</a><span>'.trans('lang.checkout').'</span></li>
        ';
        if(Auth::check()){
            if ($cus = Customer::where('email', Auth::user()->email)->first()) {
                $cus->name = Auth::user()->name;
                $cus->email = Auth::user()->email;
                $cus->save();
            }else{
                $cus = new Customer;
                $cus->name = Auth::user()->name;
                $cus->email = Auth::user()->email;
                $cus->save();
            }
            Auth::user()->customer_id = $cus->id;
            Auth::user()->save();
        }
        $blade_include = 'frontend.content.checkout';
        return view('frontend.main_content')->with('parameters', $products)
                                            ->with('parameters2', $category)
                                            ->with('sub_navi', $sub_navi)
                                            ->with('blade_include', $blade_include);
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
