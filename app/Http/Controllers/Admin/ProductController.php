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

class ProductController extends Controller
{

    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
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
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $product = new Product;
//        dd($request);
//        dd($data);
        $product->artice_id = $data['code'];
        $product->name_en = $data['name_en'];
        $product->name_ru = $data['name_ru'];
        $product->model = $data['model'];
        $product->category_id = $data['category'];
        $product->silk_id = $data['silk'];
        $product->price = $data['price'];
        $product->country_en = $data['country_en'];
        $product->country_ru = $data['country_ru'];
        $product->description_en = $data['description_en'];
        $product->description_ru = $data['description_ru'];
        $product->save();
        $sizes= explode(",",$data['size']);
//        dd($sizes);
        if(!empty($data['size'])){
            foreach ($sizes as $size) {
            $product_size = new ProductSize;
            $product_size->size = $size;
            $product_size->product_id = $product->id;
            $product_size->save();
            }
        }

        $destinationPath = public_path().'/images/products/product'.$product->id;
//        dd($data['image']);
        if(!empty($data['image'])){
            foreach ($data['image'] as $key => $img) {
//                dump($img);
                $product_color = new ProductColor;
                $product_color->product_id = $product->id;
//                $product_color->color_id = $data['color'];
                $product_color->color_en = $data['color'][$key]['color_name_en'];
                $product_color->color_ru = $data['color'][$key]['color_name_ru'];
                $product_color_img = $img->getClientOriginalName();
                $complete =  $img->move($destinationPath, $product_color_img);
                $product_color->picture =  $product_color_img;

                $product_color->save();
            }
        }
        return redirect()->route('admin.products.show', ['poduct_id'=>$product->id])->withMassage('update success!');
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
        $product = Product::findOrFail($id);
        return view('admin.products.edit')->with('product', $product);
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
        $data = $request->all();

        $product = Product::findOrFail($id);
        $product->category_id   = $data['category'];
        $product->name_en          = $data['name_en'];
        $product->name_ru          = $data['name_ru'];
        $product->description_en   = $data['description_en'];
        $product->description_ru   = $data['description_ru'];
        $product->save();

        $old_index_image = $product->productColor()->where('show_index', 1)->first();
        if(isset($old_index_image)){
            $old_index_image->show_index = false;
            $old_index_image->save();
        }

        $new_index_image = $product->productColor()->findOrFail($data['index_show']);
        $new_index_image->show_index = true;
        $new_index_image->save();
        $imgData = array_filter($data['image']);

        if(!empty($imgData)){
            $destinationPath = public_path().'/images/products/product'.$product->id;
            foreach($imgData as $color_key=>$img){
                $product_color_img = $img->getClientOriginalName();
                $complete =  $img->move($destinationPath, $product_color_img);
                $old_product_image = $product->productColor()->findOrFail($color_key);
                $old_product_image->picture =  $product_color_img;
                $old_product_image->save();
            }
        }

        return redirect()->route('admin.products.show', ['poduct_id'=>$id])->withMassage('update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index');
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
