<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSizeRequest;
use App\Services\ProductSizeService;

class ProductSizeController extends Controller
{


    /**
     * @var ProductSizeService
     */
    protected $productSizeService;

    /**
     * ProductSizeController constructor.
     * @param ProductSizeService $productSizeService
     */
    public function __construct(ProductSizeService $productSizeService)
    {
        $this->productSizeService = $productSizeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productSize = $this->productSizeService->getProductSizeList(PAGINATE);
        $productSizeAll = $this->productSizeService->getProductSizeList();
        return view('admin.productSize.index', compact('productSize'))
            ->with('productSizes', $productSizeAll);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductSizeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductSizeRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . $this->image_url;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $data['image_url'] = $this->image_url . '/' . $filename;
        }

        $data['create_user_id'] = \Auth::user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $createNewProductSize = $this->productSizeService->createNewProductSize($data);
        if ($createNewProductSize) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\ProductSizeController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ProductSizeController@index')->withInput();
    }


    /**
     * Update old product size
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function update(ProductSizeRequest $request, $id)
    {
        $data = $request->all();
        $data['modified_user_id'] = \Auth::user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $updateProductSize= $this->productSizeService->updateProductSize($id, $data);
        if ($updateProductSize) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\ProductSizeController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ProductSizeController@index')->withInput();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->productSizeService->deleteProductSize($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\ProductSizeController@index')->with('message', $message);
    }


}
