<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class AboutUsController extends Controller
{
    protected $post_categories_id = 1;

    public function index(){
        $info = Post::getInfo($this->post_categories_id);
        return view('frontend.about_us')->with('info', $info);
    }
}
