<?php

namespace App\Http\Controllers\Frontend;

use Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Cart;
use Auth;
use DB;
use App\Services\ProductColorService;
use App\Services\ProductSizeService;
use App\Services\CustomerService;
use App\Services\OrderService;
use App\Services\OrderItemService;
use App\Services\UserService;
use App\Services\ProductService;

class CartController extends BaseController
{

    protected $productSizeService;
    protected $productColorService;
    protected $customerService;
    protected $orderService;
    protected $orderItemService;
    protected $userService;
    protected $productService;

    /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct(ProductSizeService $productSizeService, ProductColorService $productColorService,
        CustomerService $customerService, OrderService $orderService, OrderItemService $orderItemService,
        UserService $userService, ProductService $productService
    )
    {
        parent::__construct();
        $this->productSizeService = $productSizeService;
        $this->productColorService = $productColorService;
        $this->customerService = $customerService;
        $this->orderService = $orderService;
        $this->orderItemService = $orderItemService;
        $this->userService = $userService;
        $this->productService = $productService;
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
        $customer = '';
        if(Cart::total() == 0){
            return redirect()->back();
        }
        $carts = Cart::content();
        if(Auth::check()) {
            $customer = $this->customerService->findCustomerByUser(Auth::user()->id);
        }
        return view('frontend.content.checkout', [
            'carts' => $carts,
            'customer' => $customer
        ]);
    }

    public function postCheckout()
    {
        try {
            DB::beginTransaction();
            //save data to order
            $dataOrder = [];

            if(!Auth::check()) {
                //save customer
                $dataUser = array();
                $dataCustomer = array();
                if (!is_null( Request::get('username'))) {
                    $dataUser = [
                        'username' => Request::get('username'),
                        'fullname' => Request::get('fullname'),
                        'email' => Request::get('email'),
                        'password' => Request::get('password'),
                        'role_id' => 3,
                        'is_active' => 1
                    ];
                }
                $dataCustomer = [
                    'name' =>is_null(Request::get('username')) ? Request::get('fullname') : Request::get('username'),
                    'address' => Request::get('address'),
                    'gender' => 1,
                    'phone' => Request::get('mobile'),
                    'mobile' => Request::get('mobile'),
                ];
                if (!empty($dataUser)) {
                    $userId = $this->userService->createUser($dataUser);
                }
                if (isset($userId)) {
                    $dataCustomer['user_id'] = $userId;
                }
                $customerId = $this->customerService->createCustomer($dataCustomer);
            } else {
                $customer = $this->customerService->findCustomerByUser(Auth::user()->id);
                $customerId = $customer->id;
            }

            $dataOrder['customers_id'] = $customerId;
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
                $dataOrderItem['product_color_id'] = isset($cart->options->color) ? $cart->options->color : 0;
                $dataOrderItem['product_size_id'] = $cart->options->size;
                $dataOrderItem['quantity'] = $cart->qty;
                $dataOrderItem['created_at'] = date('Y-m-d H:i:s');
                $dataOrderItem['updated_at'] = date('Y-m-d H:i:s');
                array_push($dataOrderItems,$dataOrderItem);
                $this->productService->updateSellCount($cart->id, $cart->qty);
            }
            $this->orderItemService->createOrderItem($dataOrderItems);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message_cart', $e->getMessage());
        }
        Cart::destroy();
        return \Redirect()->route('index')->with('message_cart', 'Mua sản phẩm thành công!');
    }
}
