<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
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

    public function index() {

        $postList = $this->postService->getPostList(6);
        return view('frontend.post.post_list')->with('postList',$postList);

    }

    public function show($id){
        $postDetail = Post::find($id);
        $postWithCategory = $this->postService->getNewestPostList($this->numberNew);
        return view('frontend.post.post_detail', ['newestPost' => $postWithCategory, 'postDetail' => $postDetail]);
    }
}
