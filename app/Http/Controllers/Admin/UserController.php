<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\Services\RoleService;

class UserController extends Controller
{

    public $userService;
    public $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUserPaginator();
        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleService->getAllRoles();
        return view('admin.users.create')->with(compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUser = $request->except('_token');
        $result = $this->userService->createUser($dataUser);
        if ($result) {
            return redirect()->route('admin.user.index')->with('message', 'Tạo người dùng thành công');
        } else {
            return redirect()->route('admin.user.index')->with('message', 'Tạo người dùng thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        $roles = $this->roleService->getAllRoles();
        return view('admin.users.edit')->with(compact('user', 'roles'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ($request->except('_token', '_method'));
        $result = $this->userService->udpateUser($data, $id);
        if ($result) {
            return redirect()->route('admin.user.index')->with('message', 'Sửa người dùng thành công');
        } else {
            return redirect()->route('admin.user.index')->with('message', 'Sửa người dùng thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->userService->deleteUserById($id);
       return redirect()->back()->with('message', 'Xóa người dùng thành công');
    }
}
