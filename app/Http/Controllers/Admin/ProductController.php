<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\ProductColorService;
use App\Services\ProductSizeService;
use App\Services\ProductImageService;
use DB;

class ProductController extends Controller
{

    protected $categoryService;
    protected $productService;
    protected $productColorService;
    protected $productSizeService;
    protected $productImageService;

    public function __construct(CategoryService $categoryService, ProductService $productService,
        ProductColorService $productColorService, ProductSizeService $productSizeService,
        ProductImageService $productImageService
    )
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->productSizeService = $productSizeService;
        $this->productColorService = $productColorService;
        $this->productImageService = $productImageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productService->getAllProduct()->paginate(PAGINATE);
        $categories = $this->categoryService->getAllCategories();
        $name ='';
        return view("admin.products.index")->with(compact('products','categories','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        $productColors = $this->productColorService->getAllColor();
        $productSizes = $this->productSizeService->getAllProductSize();
        return view('admin.products.create')->with(compact('categories', 'productColors', 'productSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataColor = $request->input('color');
            $dataImage = $request->file('image');
            $allColor = $this->productColorService->getAllColor();
            $dataProduct = $request->except('_token', 'color', 'image');
            $productId = $this->productService->saveProduct($dataProduct, $dataColor);
            if (!empty($dataImage)) {
                $this->productImageService->upLoadImage($dataImage, $productId, $dataColor, $dataProduct['name'], $allColor);
            }
            DB::commit();
            return redirect()->route('products.show', ['poduct_id'=>$productId])->withMassage('update success!');
        } catch (\Exception $e) {
            DB::rollback();
            abort('404');
        }
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
        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoryService->getAllCategories();
        $productColors = $this->productColorService->getAllColor();
        $productSizes = $this->productSizeService->getAllProductSize();
        $productData = $this->productService->findProductById($id);
        return view('admin.products.edit')->with(compact('productData','categories', 'productColors', 'productSizes'));
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
        try {
            DB::beginTransaction();
            $dataColor = $request->input('color');
            $dataImage = $request->file('image');
            $dataImageRemove = $request->input('remove_image');
            $allColor = $this->productColorService->getAllColor();
            $dataProduct = $request->except('_token', 'color', 'image', 'remove_image', '_method');
            $this->productService->updateProduct($dataProduct, $dataColor, $id);
            if (!empty($dataImageRemove)) {
                $this->productImageService->removeImage($dataImageRemove, $id);
            }
            if (!empty($dataImage)) {
                $this->productImageService->upLoadImage($dataImage, $id, $dataColor, $dataProduct['name'], $allColor);
            }
            DB::commit();
            return redirect()->route('products.show', ['poduct_id'=>$id])->withMassage('update success!');
        } catch (\Exception $e) {
            DB::rollback();
            abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('products.index');
    }

    public function importProductFromExcelFile(Request $request){
        $file = $request->file('excel')->getRealPath();
        $from_row = $request->input('start_row');
        $to_row = $request->input('end_row');
        $path = public_path().'/Nhapmahangmoi.xls';

        $objPHPExcel = \PHPExcel_IOFactory::load($file);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestCol = $objWorksheet->getHighestColumn();

        if(empty($from_row)){
            $from_row = $highestRow;
        }
        if(empty($to_row)){
            $from_row = $highestRow;
        }
        $data = $objWorksheet->toArray(null, true, true, true);
        $arrProduct = array();
        for($row = $from_row; $row<$to_row; $row++){
            $product = array();
            if(!empty($data[$row])){
                $product['cat_name'] = $data[$row][CAT_NAME_COL];
                $product['model'] = $data[$row][MODEL_COL];
                $product['silk_code'] = $data[$row][SILK_COL];
                $product['color'] = $data[$row][COLOR_COL];
                $product['size'] = $data[$row][SIZE_COL];
                $product['product_code'] = $data[$row][PRO_CODE_COL];
                $product['name'] = $data[$row][PRO_SHORT_NAME_COL];
                $product['price'] = $data[$row][PRO_PRICE_COL];
                $product['country'] = $data[$row][PRO_COUNTRY_COL];
                $arrProduct[] = $product;
            }

        }
        if(empty($arrProduct)){
            return redirect()->back()->with('error', 'Import Fail!');
        }
        Product::importProduct($arrProduct);
        return redirect()->back()->with('message', 'Import Success!');
    }

    public function searchProduct(Request $request){
        $pro_name = $request->input('pro_name');
        $pro_name =  preg_replace('/([^\pL\.\ ]+)/u', '', ($pro_name));
        $cate_id = $request->input('cate_id');
//        dd($cate_id);
        if($cate_id==""){
            $cate_id= null;
        }
        $products = Product::search($pro_name, $cate_id);
        $categories = Category::all();
        $name ='';
        return view("admin.products.index")->with(compact('products','categories','name','pro_name', 'cate_id'));
    }
}
