<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\WishProduct;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    /**
     * Constructor function.
     * Set global fro category all page
     **/
    public function __construct()
    {
        
    }
}
