<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;
use App\Models\Category;
use LaravelLocalization;

class IndexController extends BaseController
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
//        dump(session('message'));
        $products = Product::paginate(PAGINATE);
        return view('frontend.top')->with('products', $products);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $view_count = $product->view_count;
        $view_count=$view_count+1;
//        dump($view_count);
        $product->view_count=$view_count;
        $product->save();
        $product_colors = $product->productColor;
        $product_sizes = $product->productSize;
        $product_relates = $product->category->product()->where('products.id','!=',$id)->get();
        return view('frontend.product_detail')
                ->with('product',$product)
                ->with('product_relates', $product_relates)
                ->with('product_colors', $product_colors)
                ->with('product_sizes', $product_sizes);
    }

    public function postVote(Request $request)
    {

        if(!Auth::check()) {
            return response()->json(['error'=>trans('lang.log_in_vote')]);
        }
        else
        {
            $product_id = $request->get('product_id');
            $comment = trim($request->get('comment'));
            $star = $request->get('star');
            if(strlen($comment) < 5)
            {
                return response()->json(['error'=>trans('lang.short_comment')]);
            }
            if($star < 1)
            {
                return response()->json(['error'=>trans('lang.star_null')]);
            }
            $product = Product::findOrFail($product_id);

            $vote = new Vote();
            $vote->product_id = $product_id;
            $vote->user_id = Auth::user()->id;
            $vote->star = $star;
            $vote->comment = $comment;
            $vote->save();
            if($vote->id){
                return response()->json(['success'=>trans('lang.vote_success')]);
            }
            else{
               return response()->json(['error'=>trans('lang.error')]); 
            }

        }
    }
    
    public function showProductByCategory(Request $request,$category_id)
    {
        $take = !empty($request->get('take')) ? $request->get('take') : 6;
        $field = !empty($request->get('field')) ? $request->get('field') : 'sell_count';
        $option = !empty($request->get('option')) ? $request->get('option') : 'DESC';

        $category = Category::findOrFail($category_id);
        $arrCate = [];
        $sub_cates = $category->getCategorieAndSubCategories($arrCate);
        if($take < count($sub_cates)){
            $take = 1;
        }else{
            $take = ceil($take/count($sub_cates));
        }
        $arrayParram = ['take' => $take, 'field'=>$field, 'option'=>$option];
        $products = Category::getPostsFromCategories($sub_cates, $arrayParram);
        $product_top= $products->sortByDesc('sell_count')->first();
        //dump($product_top);
        $blade_include ="frontend.content.category_detail";
        $sub_navi = '<li><a href="#" style="display: none;">'.$category->localeName().'</a></li>';
        return view('frontend.main_content')->with('parameters', $products)
                                            ->with('parameters2', $category)
                                            ->with('product_top', $product_top)
                                            ->with('sub_navi', $sub_navi)
                                            ->with('blade_include', $blade_include);
        
    }

    public function getContact(){
        dump('into function get contact');
    }

    public function postContact(){
        dump('into function post contact');
    }

    public function search()
    {
        $key = \Input::get('search');
//        $key= htmlspecialchars($key);
        $key=  preg_replace('/([^\pL\.\ ]+)/u', '', ($key));
//        dump($key);
        $products = Product::search($key, null);
//        dump($products);
        return view('frontend.top')->with('products', $products);
    }
}
