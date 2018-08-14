<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class MyAccountController extends BaseController
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(!Auth::check())
            return view('frontend.myaccount.login')->with('message', 'Hãy đăng nhập!');
        else {
            return view('frontend.myaccount.edit')->with('sub_navi', '');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('frontend.myaccount.edit')->with('message', 'Đã đăng nhập!');
        }
        return view('frontend.myaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $dataUser = $request->except('_token');
        $dataUser['role_id'] = 3;
        $dataUser['is_active'] = 1;
        $user = $this->userService->createUser($dataUser);
        if ($user) {
            return view('frontend.myaccount.login')->with('message', 'Hãy đăng nhập!');
        } else {
            return redirect()->back()->with('message_error', 'Tạo tài khoản không thành công');
        }
    }

    public function edit($id = null)
    {
        if(!Auth::check())
            return view('frontend.myaccount.login')->with('message', 'Hãy đăng nhập!');
        else {
            return view('frontend.myaccount.edit')->with('message', 'Sửa thông tin người dùng.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        if(!Auth::check())
            return view('frontend.myaccount.login')->with('message', 'Hãy đăng nhập!');
        else {
            $dataUser = $request->except('_token');
            $this->userService->udpateUser($dataUser, Auth::user()->id);
            return view('frontend.myaccount.login')->with('message', 'Hãy đăng nhập!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function old_orders()
    {
        if (!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            if(is_null(Auth::user()->customer)){
                $orders= null;
            }else {
                $orders = Order::where('customers_id',Auth::user()->customer->id)
                    ->orderBy('status')
                    ->orderBy('id', 'desc')
                    ->get();
            }
//            dd($orders);
            return view('frontend.myaccount.old_orders')->with('orders',$orders)
                ->with('sub_navi', $sub_navi)
                ->with('i', 1);
        }
    }
    public function show_order($id)
    {
        if (!Auth::check())
            return view('admin.login');
        else {
            $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
            $orderItem = OrderItem::where('order_id',$id)->get();
//            dd($orderItem);
            return view('frontend.myaccount.show_order')->with('orderItem',$orderItem)->with('sub_navi', $sub_navi);
        }
    }
    //reset password
    public function getEmail()
    {
        $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
        return view('frontend.myaccount.email_reset')->with('sub_navi', $sub_navi);
    }
    public function postEmail(Request $request)
    {
        $messages = [
            'email.required' => 'The email field is required.',
        ];
        $rules = [
            'email' => 'required|max:255',
        ];
        $this->validate($request, $rules, $messages);
//        dd(route('myaccount.password.reset')."/".$request->_token);
        if($user= User::where('email', $request->input("email"))->first()){
            $data = array(
                'link' => url(route('myaccount.password.reset'))."/".$request->_token,
                'server' => 'mpmoda',
            );
            if($user){
                \Mail::send('emails.email_reset_password',$data, function($message) use ($user){
                    $message->from($user->email, 'Admin');
                    $message->to($user->email, $user->name)
                        ->subject('Reset password');
                });
            }
            return redirect()->route('index');
        }else{
            return redirect()->route('myaccount.password.email')->with('message_error', trans('lang.error'));
        }
    }
    public function getReset($id)
    {
        $sub_navi = '<li>
                        <a href="' . route("myaccount.index") . '" style="display: none;">'.trans('lang.my_account').'</a>
                    </li>';
        return view('frontend.myaccount.reset')->with('sub_navi', $sub_navi)->with('token', $id);
    }
    public function postReset(Request $request)
    {
        $messages = [
            'txtemail.required' => 'The email field is required.',
            'txtpassword.required' => 'The password field is required.',
            'txtpassword_confirmation.required' => 'The password confirm and password must match.',
        ];
        $rules = [
            'txtemail' => 'required|min:6',
            'txtpassword' => 'required|confirmed|min:6',
            'txtpassword_confirmation' => 'same:txtpassword',
        ];
        $this->validate($request, $rules, $messages);
        if($request->token == $request->_token){
            User::where('email', $request->input('txtemail'))
                ->update([
                    'password' =>  \Hash::make($request->input("txtpassword"))
                ]);
            return redirect()->route('index')->with('message', trans('lang.success'));
        }else{
            return redirect()->route('index')->with('message_error', trans('lang.error'));
        }
    }
}
