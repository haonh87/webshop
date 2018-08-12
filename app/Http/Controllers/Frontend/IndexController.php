<?php

namespace App\Http\Controllers\Frontend;

use App\Services\CategoryService;
use App\Services\ProductColorService;
use App\Services\ProductService;
use App\Services\ProductSizeService;
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

    protected $categoryService;
    protected $productService;
    protected $productSizeService;
    protected $productColorService;
    protected $numberFeature = 12;
    protected $numberNew = 8;
    protected $numberProductList = 20;
     /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct(CategoryService $categoryService, ProductService $productService,
                                ProductSizeService $productSizeService, ProductColorService $productColorService
    )
    {
         parent::__construct();
         $this->categoryService = $categoryService;
         $this->productService = $productService;
         $this->productSizeService = $productSizeService;
         $this->productColorService = $productColorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wmCategory = $this->categoryService->getWMCategory();
        $products = Product::paginate(PAGINATE);
        $featureProducts = $this->productService->getFeatureProducts($this->numberFeature);
        $newProducts = $this->productService->getNewProduct($this->numberNew);
        return view('frontend.top',[
            'wmCategory' => $wmCategory,
            'products' => $products,
            'featureProducts' => $featureProducts,
            'newProducts' => $newProducts
        ]);
    }


    public function getProductList($categoryName = null)
    {
        $category = $this->categoryService->findIdByName($categoryName);
        $products = $this->productService->getAllProductForView($category->id)->paginate($this->numberProductList);
        $maxMinPrice = $this->productService->getMaxMinPrice();
        $categories = $this->categoryService->getAllCategories();
        $sizes = $this->productSizeService->getAllProductSize();
        $colors = $this->productColorService->getAllColor();
        return view('frontend.product_list', [
            'products' => $products,
            'maxMinPrice' => $maxMinPrice,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productService->findProductById($id);
        $sizes = $this->productSizeService->getAllProductSize();
        $colors = $this->productColorService->getAllColor();
        return view('frontend.product_detail', [
            'product' => $product,
            'sizes' => $sizes,
            'colors' => $colors
        ]);
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
