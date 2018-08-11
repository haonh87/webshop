<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
    }

    public function postCustomerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min"6'
        ]);
        $credentials = $request->only('email', 'password');
        if (!\Auth::attempt($credentials)) {
            $errorMsg['password'] = '';
        } else {
            return redirect()->route('dashboard');
        }
    }

}
