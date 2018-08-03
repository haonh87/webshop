<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    protected $postService;
    protected $image_url = '/images/posts';

    /**
     * PostController constructor.
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postService->getPostList(PAGINATE);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @param PostRequest $request
     */
    public function store(PostRequest $request)
    {

    }

    /**
     * @param PostRequest $request
     * @param $id
     */
    public function update(PostRequest $request, $id)
    {

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }
}
