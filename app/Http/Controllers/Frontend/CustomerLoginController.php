<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
    }

    public function validator(array $data){
        return $this->validator::make($data,[
            'email' => 'required|email|max:255|unique:users',
            'password'
        ])

    }
}
