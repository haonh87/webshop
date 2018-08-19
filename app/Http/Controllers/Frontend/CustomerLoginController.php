<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return view('login');
    }

    public function postCustomerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (!\Auth::attempt($credentials)) {
            $errorMsg['password'] = 'Email or password invalid!';
        } else {
            return redirect()->route('index');
        }
        return redirect()->back()->withErrors($errorMsg)->withInput($request->old('email'));
    }

}
