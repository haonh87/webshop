<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;

/**
 * Class AboutUsController
 * @package App\Http\Controllers\Frontend
 */
class AboutUsController extends Controller
{
    /**
     * @var PostService
     */
    protected $postService;

    /**
     * AboutUsController constructor.
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
        $info = $this->postService->getPostList(0, 'post_categories_id', Post::STATIC_POST_CATEGORY_ID, '=')
            ->where('id', Post::ABOUT_US_POST_ID)
            ->first();
        return view('frontend.about_us')->with('info', $info);
    }
}
