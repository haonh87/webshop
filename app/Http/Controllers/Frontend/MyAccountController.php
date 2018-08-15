<?php

namespace App\Http\Controllers\Frontend;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

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
            return view('frontend.myaccount.login')->with('message_account', 'Hãy đăng nhập!');
        else {
            return view('frontend.myaccount.edit')->with('message_account', 'Bạn đã đăng nhập!');
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
            return view('frontend.myaccount.edit')->with('message_account', 'Đã đăng nhập!');
        }
        return view('frontend.myaccount.create')->with('message_account', 'Hãy điền đầy đủ thông tin!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $dataUser = $request->except('_token', 'address', 'mobile', 'gender', 'cf_password');
            $dataCustomer = $request->except('_token','fullname', 'email', 'password', 'cf_password');
            $dataUser['role_id'] = 3;
            $dataUser['is_active'] = 1;
            $user = $this->userService->createUser($dataUser);
            if ($user) {
                DB::commit();
                return view('frontend.myaccount.login')->with('message_account', 'Hãy đăng nhập!');
            } else {
                DB::rollback();
                return redirect()->back()->with('message_account', 'Tạo tài khoản không thành công');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message_account', 'Tạo tài khoản không thành công');
        }
    }

    public function edit($id = null)
    {
        if(!Auth::check())
            return view('frontend.myaccount.login')->with('message_account', 'Hãy đăng nhập!');
        else {
            return view('frontend.myaccount.edit')->with('message_account', 'Sửa thông tin người dùng.');
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
            return view('frontend.myaccount.login')->with('message_account', 'Hãy đăng nhập!');
        else {
            $dataUser = $request->except('_token');
            $this->userService->udpateUser($dataUser, Auth::user()->id);
            return view('frontend.myaccount.login')->with('message_account', 'Hãy đăng nhập!');
        }
    }
}
