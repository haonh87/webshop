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
use DB;
use App\Services\ProductColorService;
use App\Services\ProductSizeService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\OrderItemService;

class CartController extends BaseController
{

    protected $productSizeService;
    protected $productColorService;
    protected $customerService;
    protected $orderService;
    protected $orderItemService

    /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct(ProductSizeService $productSizeService, ProductColorService $productColorService,
        CustomerService $customerService, OrderService $orderService, OrderItemService $orderItemService
    )
    {
        parent::__construct();
        $this->productSizeService = $productSizeService;
        $this->productColorService = $productColorService;
        $this->customerService = $customerService;
        $this->orderService = $orderService;
        $this->orderItemService = $orderItemService;
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

    public function postCheckout()
    {
        if(!Auth::check()) {
            return view('frontend.myaccount.login')->with('message_account', 'Bạn phải đăng nhập trước khi thanh toán hóa đơn!');
        } else {
            try {
                //save data to order
                $dataOrder = [];
                $customer = $this->customerService->findCustomerByUser(Auth::user()->id);
                $dataOrder['customers_id'] = $customer->id;
                $dataOrder['payment_type'] = 'off line';
                $dataOrder['status'] = 1;
                $dataOrder['deliver_date'] = date('Y-m-d H:i:s');
                $dataOrder['created_at'] = date('Y-m-d H:i:s');
                $dataOrder['updated_at'] = date('Y-m-d H:i:s');
                $dataOrder['note'] = Request::get('order_comments');
                $dataOrder['total'] = Request::get('total_cart');
                $orderId = $this->orderService->createOrder($dataOrder);
                //save data to order item
                $cartContent = Cart::content();
                $dataOrderItems = [];
                foreach ($cartContent as $cart) {
                    $dataOrderItem = [];
                    $dataOrderItem['order_id'] = $orderId;
                    $dataOrderItem['product_id'] = $cart->id;
                    $dataOrderItem['product_color_id'] = $cart->options->color;
                    $dataOrderItem['product_size_id'] = $cart->options->size;
                    $dataOrderItem['quantity'] = $cart->qty;
                    $dataOrderItem['created_at'] = date('Y-m-d H:i:s');
                    $dataOrderItem['updated_at'] = date('Y-m-d H:i:s');
                    array_push($dataOrderItems,$dataOrderItem);
                }
                $this->orderItemService->createOrderItem($dataOrderItems);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                abort('404');
            }
            //save data to order item
        }
        Cart::destroy();
        return \Redirect()->route('index')->with('message', 'Mua sản phẩm thành công!');
    }
}
