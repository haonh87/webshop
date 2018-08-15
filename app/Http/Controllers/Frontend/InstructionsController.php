<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\PostService;

/**
 * Class InstructionsController
 * @package App\Http\Controllers\Frontend
 */
class InstructionsController extends Controller
{
    /**
     * post_categories_id = static_post
     *
     * @var int
     */
    protected $post_categories_id = 1;

    /**
     * @var PostService
     */
    protected $postService;

    /**
     * InstructionsController constructor.
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
        $info = $this->postService->getPostList(0, 'post_categories_id', $this->post_categories_id, '=')
            ->where('id', 2)
            ->first();
        return view('frontend.instructions')->with('info', $info);
    }
}
