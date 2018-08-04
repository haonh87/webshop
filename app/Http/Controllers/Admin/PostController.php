<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use App\Services\PostCategoryService;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    protected $postService;
    protected $postCatService;
    protected $image_url = '/images/posts';

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService, PostCategoryService $postCatService)
    {
        $this->postService = $postService;
        $this->postCatService = $postCatService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postService->getPostList(PAGINATE);
        $cateAll = $this->postCatService->getCategoryList();
        return view('admin.posts.index', compact('posts'))->with('cateAll', $cateAll);
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
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
        $createNewPost = $this->postService->createNewPost($data);
        if ($createNewPost) {
            $message = 'Item created successfully.';
            return redirect()->action('Admin\PostController@index')->with('message', $message);
        }
        return redirect()->action('Admin\PostController@index')->withInput();
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
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
        $updatePost= $this->postService->updatePost($id, $data);
        if ($updatePost) {
            $message = 'Item updated successfully.';
            return redirect()->action('Admin\PostController@index')->with('message', $message);
        }
        return redirect()->action('Admin\PostController@index')->withInput();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = $this->postService->deletePost($id);
        ($deleteItem) ? $message = 'Item deleted successfully.' : $message = 'Item deleted fail.';
        return redirect()->action('Admin\PostController@index')->with('message', $message);
    }
}
