<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Configuration;
use App\Services\CategoryService;
use App\Services\ProductColorService;
use App\Services\PostService;
use App\Services\PostCategoryService;
use App\Services\ProductService;
use App\Services\ProductSizeService;
use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use LaravelLocalization;
use Session;
use App\Services\VoteService;

class IndexController extends BaseController
{

    protected $categoryService;
    protected $postCategoryService;
    protected $productService;
    protected $postService;
    protected $productSizeService;
    protected $productColorService;
    protected $numberFeature = 12;
    protected $numberNew = 8;
    protected $numberPost = 6;
    protected $numberProductList = 20;
    protected $voteService;
     /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct(CategoryService $categoryService, ProductService $productService,
                                ProductSizeService $productSizeService, ProductColorService $productColorService,
                                PostCategoryService $postCategoryService, PostService $postService,
                                VoteService $voteService
    )
    {
         parent::__construct();
         $this->categoryService = $categoryService;
         $this->productService = $productService;
         $this->productSizeService = $productSizeService;
         $this->productColorService = $productColorService;
         $this->postCategoryService = $postCategoryService;
         $this->postService = $postService;
         $this->voteService = $voteService;
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
        $postWithCategory = $this->postService->getNewestPostList($this->numberNew);
        $sliderList = Configuration::whereIn('id', [6,7,8])->get();

        return view('frontend.top',[
            'wmCategory' => $wmCategory,
            'products' => $products,
            'featureProducts' => $featureProducts,
            'newProducts' => $newProducts,
            'newPost' => $postWithCategory,
            'sliderList' => $sliderList
        ]);
    }


    public function getProductList(Request $request, $categoryName = null)
    {
        $dataRequest = $request->all();
        $category = $this->categoryService->findIdByName($categoryName);
        $categoryId = isset($category) ? $category->id : '';
        if (isset($dataRequest['category'])) {
            $categoryId = $dataRequest['category'];
        }
        $price = isset($dataRequest['price']) ? $dataRequest['price'] : '';
        $products = $this->productService->getAllProductForView($categoryId, $dataRequest)->paginate($this->numberProductList);
        $categories = $this->categoryService->getAllCategories();
        $sizes = $this->productSizeService->getAllProductSize();
        $colors = $this->productColorService->getAllColor();
        $sessionIds = Session::get('productIds');
        $recentlyProduct = '';
        if (!empty($sessionIds)) {
            $recentlyProduct = $this->productService->getRecentlyProduct($sessionIds)->get();
        }
        return view('frontend.product_list', [
            'products' => $products,
            'price' => $price,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
            'recentlyProduct' => $recentlyProduct,
            'condition' => $dataRequest
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
        $product = $this->productService->findProductBySlugView($id);
        $sizes = $this->productSizeService->getAllProductSize();
        $colors = $this->productColorService->getAllColor();
        $relateProducts = $this->productService->getRelateProduct($product);
        $productVotes = $this->voteService->getVote($product->id);
        //push id to session
        $sessionIds = Session::get('productIds');
        if (empty($sessionIds)) {
            Session::push('productIds', (int)$id);
        } else {
            if (!in_array($id, $sessionIds)) {
                Session::push('productIds', array_push($sessionIds,$id));
            }
        }
        return view('frontend.product_detail', [
            'product' => $product,
            'sizes' => $sizes,
            'colors' => $colors,
            'relateProducts' => $relateProducts,
            'productVotes' => $productVotes
        ]);
    }

    public function postVote(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->back()->with('message_cart', 'Hãy đăng nhập để đánh giá!');
        } else {
            $dataRequest = $request->all();
            $dataVote = [
                'user_id' => Auth::user()->id,
                'product_id' => $dataRequest['product_id'],
                'star' => $dataRequest['star'],
                'comment' => $dataRequest['comment'],
                'actived' => 1,
            ];
            if ($this->voteService->updateVote($dataVote)) {
                return redirect()->back()->with('message_cart', 'Đánh giá sản phẩm thành công.');
            } else {
                return redirect()->back()->with('message_cart', 'Đánh giá không thành công! Hãy đánh giá lại sản phẩm');
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
