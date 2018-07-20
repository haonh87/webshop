<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'getLogin']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \hash::make($data['password']),
        ]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember')))
        {
            if($request->ajax()){
                $message = ["success"=>"success", "massage"=>"login success"];
                return response()->json($message);
            }
            else
            {
                if(Auth::user()->isAdmin()){
                    return redirect()->route('admin.categories.index');
                }else{
                    return redirect()->route('product.index');
                }
            }
        }
        else{
            if($request->ajax()){
                $message = ["error"=>"error", "massage"=>"Email or password invalid!"];
                return response()->json($message);
            }
            else
            {
                return redirect()->back()->withErrors(['login_error'=>'Email or password invalid!'])->withInput($request->old('email'));
            }
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function getLogin(){
        if(!Auth::check())
            return view('admin.login');
        else{
            if(Auth::user()->isAdmin()){
                return redirect()->route('adminIndex');
            }
            else{
                return redirect()->route('product.index');
            }
        }
    }
    //login facebook
    public function redirectToProvider($social)
    {
        return \Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback(request $request, $social)
    {
        if($request->has('code')) {
            try {
                $user = \Socialite::driver($social)->user();
            } catch (Exception $e) {
                return redirect()->route('index');
            }
            $authUser = $this->findOrCreateUser($user);
            Auth::login($authUser, true);
            return redirect()->route('index');
    }
        // $user->token;
    }
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('email', $githubUser->email)->first()) {
            return $authUser;
        }
        return User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'role_id' => '4',
            'password' => $githubUser->id,
        ]);
    }
}
