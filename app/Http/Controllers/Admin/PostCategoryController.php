<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\Services\PostCategoryService;

class PostCategoryController extends Controller
{


    /**
     * @var PostCategoryService
     */
    protected $postCategoryService;
    protected $image_url = '/images/post-categories';

    /**
     * CategoryController constructor.
     * @param PostCategoryService $postCategoryService
     */
    public function __construct(PostCategoryService $postCategoryService)
    {
        $this->postCategoryService = $postCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->postCategoryService->getCategoryList(PAGINATE);
        $categoriesAll = $this->postCategoryService->getCategoryList();
        return view('admin.postCategories.index', compact('categories'))
            ->with('cateAll', $categoriesAll);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCategoryRequest $request)
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
        $createNewCategory = $this->postCategoryService->createNewCategory($data);
        if ($createNewCategory) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\PostCategoryController@index')->with('message', $message);
        }
        return redirect()->action('Admin\PostCategoryController@index')->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostCategoryRequest $request, $id)
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
        $updateCategory = $this->postCategoryService->updateCategory($id, $data);
        if ($updateCategory) {
            $message = 'Item updated successfully.';
            return redirect()->action('Admin\PostCategoryController@index')->with('message', $message);
        }
        return redirect()->action('Admin\PostCategoryController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->postCategoryService->deleteCategory($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\PostCategoryController@index')->with('message', $message);
    }

}
