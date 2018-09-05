<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;
    protected $numberNew = 4;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Post List
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $postList = $this->postService->getPostList(6, '', '', '', true);
        return view('frontend.post.post_list')->with('postList', $postList);

    }

    /**
     * Show post details
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $postDetail = Post::find($id);
        $postWithCategory = $this->postService->getNewestPostList($this->numberNew);
        return view('frontend.post.post_detail', ['newestPost' => $postWithCategory, 'postDetail' => $postDetail]);
    }
}
