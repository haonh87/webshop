<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductColorRequest;
use App\Models\Language;
use App\Services\ProductColorService;

class ProductColorController extends Controller
{

    protected $productColorService;

    /**
     * ProductColorController constructor.
     * @param ProductColorService $productColorService
     */
    public function __construct(ProductColorService $productColorService)
    {
        $this->productColorService = $productColorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productColor = $this->productColorService->getProductColorList(PAGINATE);
        $productColorAll = $this->productColorService->getProductColorList();
        $lang = Language::get();
        return view('admin.productColor.index', compact('productColor'))
            ->with('productColors', $productColorAll)
            ->with('lang', $lang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductColorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductColorRequest $request)
    {
        $data = $request->all();

        $data['create_user_id'] = \Auth::user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $createNewProductColor = $this->productColorService->createNewProductColor($data);
        if ($createNewProductColor) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\ProductColorController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ProductColorController@index')->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductColorRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductColorRequest $request, $id)
    {
        $data = $request->all();
        $data['modified_user_id'] = \Auth::user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $updateProductColor = $this->productColorService->updateProductColor($id, $data);
        if ($updateProductColor) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\ProductColorController@index')->with('message', $message);
        }
        return redirect()->action('Admin\ProductColorController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->productColorService->deleteProductColor($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\ProductColorController@index')->with('message', $message);
    }

}
