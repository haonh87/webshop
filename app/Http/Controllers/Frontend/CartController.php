<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use Auth;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $blade_include = 'frontend.content.cart_detail';
        $sub_navi = '<li>
                        <a href="'.route("cart.index").'" style="display: none;"></a>
                        <span>'.trans('lang.shopping_cart').'</span>
                    </li>';
        return view('frontend.main_content')->with('parameters',null)
                                            ->with('parameters2', null)
                                            ->with('sub_navi', $sub_navi)
                                            ->with('blade_include', $blade_include);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $hasError = false;
        if(empty($data['size_option']))
        {
            $hasError = true;
            $err_msg['size'] = trans('lang.size_require');
        }
        if(!isset($data['color']))
        {
            $hasError = true;
            $err_msg['color'] = trans('lang.color_requred');
        }
        if($hasError){
            return response()->json(["error"=>$err_msg]);
        }
        $product = Product::findOrFail($data['product_id']);
        $product_name = $product->localeName();
        $cartExists = Cart::search(['id' =>$product->id,'color'=>$data['color'],'size'=>$data['size_option']]);
        if($cartExists)
        {
            $cart = Cart::get($cartExists[0]);
            Cart::update($cartExists[0], $cart->qty+$data['quantity']);
        }
        else
        {
            Cart::associate('Product', 'App')->add(array('id'=>$product->id,
                            'name' => $product->localeName(),
                            'qty' => $data['quantity'],
                            'price' => $product->price,
                            'options' => array('size_option' => $data['size_option'], 'color'=>$data['color'])));
        }
        $prduct_link = '<a href="'.route('product.show',['product_id'=>$product->id]).'">'.$product->localeName().'</a>';
        $link_to_cart = '<a href="'.route('cart.index').'">shopping cart!</a>';
        $success = trans('lang.your_secces_added').$prduct_link.trans('lang.to_your'). $link_to_cart;
        $message=['success'=>$success];

        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $rowId)
    {
        $quantity = $request->get('quantity');
        if(is_null(Cart::get($rowId))){
            return response()->json(['error'=>trans('lang.error')]);
        }
        Cart::update($rowId, $quantity);
        return response()->json(['success'=>trans('lang.success')]);
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
        $success = trans('lang.remove').$product_name;
        $message = Cart::count().'item(s) - '.Cart::total()*1.2; 
        return response()->json(['total'=>$message, 'success'=>$success]);
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
