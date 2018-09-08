<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\UserService;
use Auth;
use App\Models\User;

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
        $user = User::where('email', $request->get('email'))->first();
        if ($user && $user['confirmation_code'] == null) {
            $credentials = $request->only('email', 'password');
            if (!\Auth::attempt($credentials)) {
                $errorMsg['password'] = 'Tài khoản đăng nhập chưa đúng!';
            } else {
                return redirect()->route('index');
            }
        } else {
            $errorMsg['password'] = 'Bạn chưa đăng kí tài khoản.';
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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $create['username'] = $user->name;
            $create['fullname'] = $user->name;
            $create['email'] = $user->email;
            $create['google_id'] = $user->id;
            $userId = $this->userService->createUserGoogle($create);
            Auth::loginUsingId($userId);
            return redirect()->route('index');
        } catch (Exception $e) {
            return redirect('/');
        }
    }

}
