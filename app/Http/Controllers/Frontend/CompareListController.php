<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use Session;
use Illuminate\Http\Response;

class CompareListController extends BaseController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Session::get('product_list',0);
        $width_td = 88/count($products);
//        dd($width_td);
        return view('frontend.compare')->with('products', $products)->with('width_td', $width_td);
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
       $product = Product::findOrFail($id);
       $product_list = Session::get('product_list');
       if(empty($product_list))
       {
            $product_list[$product->id] = $product;
       }
       else
        {
            if(count($product_list)<4)
            {
                $product_list[$product->id]=$product;
            }
        }
        Session::put('product_list', $product_list);
        $success = trans('lang.to_compare_list').' <a href = "'.route('productCompare.index').'">'.trans('lang.compare_list').'</a> '.trans('lang.to_view');
        return response()->json(['success'=>$success]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product_list = Session::get('product_list');
        $product = null;
        foreach($product_list  as $key=>$value){
            if($value->id == $id){
                $product = $value;
                unset($product_list[$key]);

            }
        }
        Session::put('product_list', $product_list);
        $success = trans('lang.remove');
        if(!is_null($product)){
            $success.='<a href="'.route('product.show',['product_id'=>$product->id]).'">'.$product->name.'</a> from your compare list!';
            return response()->json(['success'=>$success]);
        }
        return response()->json(['error'=>trans('lang.error')]);
    }
}
