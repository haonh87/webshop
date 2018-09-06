<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\UserService;
use Auth;

/**
 * Class CustomerLoginController
 * @package App\Http\Controllers\Frontend
 */
class CustomerLoginController extends Controller
{

    protected $userService;
    /**
     * CustomerLoginController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['username'] = $user->name;
            $create['fullname'] = $user->name;
            $create['email'] = $user->email;
            $create['facebook_id'] = $user->id;
            $userId = $this->userService->createUserFacebook($create);
            Auth::loginUsingId($userId);
            return redirect()->route('index');
        } catch (Exception $e) {
            return redirect('/');
        }
    }

}
