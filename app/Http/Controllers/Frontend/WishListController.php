<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Models\WishProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class WishListController extends  BaseController
{
    /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct()
    {
         parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back()->withErrors(['wishlish'=>trans('lang.wishlist')]);
        }
        else
        {
          $wish_lists = Auth::user()->wishList;
          $list_products = array();
           foreach ($wish_lists as $wish_list) {
                $list_products[] = $wish_list->product;
           }

           $blade_include = 'frontend.content.wish_list';
           $sub_navi = '<li><a href="#">'.trans('lang.account').'</a></li>
                        <li>
                            <a href="'.route("wishlist.index").'" style="display: none;">'.trans('lang.my_wishlist').'</a>
                        </li>';
           return view('frontend.main_content')->with('parameters', $list_products)
                                                ->with('parameters2', null)
                                                ->with('sub_navi', $sub_navi)
                                                ->with('blade_include', $blade_include);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $count_wishlist = 0;
        if(!Auth::check())
        {
            $message = ['info'=>trans('lang.add_wishlist'), "total"=>$count_wishlist];
            return response()->json($message);
        }
        else{
            $count_wishlist = Auth::user()->wishList()->count();
            $product_id = $request->get('product_id');
            $product = Product::findOrFail($product_id);
            $added = WishProduct::where('product_id', $product_id)
                                    ->where('user_id', Auth::user()->id)->first();
            if($added == null)
            {
                $wish = new WishProduct();
                $wish->user_id = Auth::user()->id;
                $wish->product_id = $product_id;
                $wish->save();
                if($wish->id)
                {
                    $ms = trans('lang.wishlist_added').$product->name.trans('lang.wishlist_at'). Date('Y-m-d H:i:s');
                    $message = ['success'=>$ms, "total"=>$count_wishlist+1];
                    return response()->json($message);
                    
                }
                else{
                    $message = ['error'=>trans('lang.error'), "total"=>$count_wishlist];
                    return response()->json($message);
                }
            }
            else{
                $ms = ["success"=>$product->name.trans('lang.wishlist_already'),"total"=>$count_wishlist];
                return response()->json($ms);
            }
        }
        $message = ['error'=>trans('lang.error'),"total"=>$count_wishlist];
        return response()->json($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($product_id)
    {   
        $user_id = Auth::user()->id;
        $product = Product::findOrFail($product_id);
        WishProduct::wishListGetId($product_id, $user_id);
        $count_wishlist = Auth::user()->wishList()->count();
        $success ="<u>".$product['name']."</u>".trans('lang.wishlist_remove');
        $message = ["success"=>$success, "total"=>$count_wishlist];
        return response()->json($message);
    }
}
