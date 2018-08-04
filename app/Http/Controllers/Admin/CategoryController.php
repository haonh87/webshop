<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{


    /**
     * @var CategoryService
     */
    protected $categoryService;
    protected $image_url = '/images/categories';

    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categoryService->getCategoryList(PAGINATE);
        $categoriesAll = $this->categoryService->getCategoryList();
        return view('admin.categories.index', compact('categories'))
            ->with('cateAll', $categoriesAll);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
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
        $createNewCategory = $this->categoryService->createNewCategory($data);
        if ($createNewCategory) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\CategoryController@index')->with('message', $message);
        }
        return redirect()->action('Admin\CategoryController@index')->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . $this->image_url;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $data['image_url'] = $this->image_url . '/' . $filename;
        }
        $data['modified_user_id'] = \Auth::user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $updateCategory = $this->categoryService->updateCategory($id, $data);
        if ($updateCategory) {
            $message = 'Item updated successfully.';
            return redirect()->action('Admin\CategoryController@index')->with('message', $message);
        }
        return redirect()->action('Admin\CategoryController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->categoryService->deleteCategory($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\CategoryController@index')->with('message', $message);
    }

}
