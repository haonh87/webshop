<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CustomerLoginController
 * @package App\Http\Controllers\Frontend
 */
class CustomerLoginController extends Controller
{
    /**
     * CustomerLoginController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        \Auth::logout();
        return redirect()->route('index');
    }

}
