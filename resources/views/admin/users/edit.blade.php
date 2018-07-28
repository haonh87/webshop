@extends('layouts.admin.app')

@section('content')

    <div class="module-head">
        <h1>
            <span>Sửa thông tin người dùng</span>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ action('Admin\UserController@update', $user->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" name="email" id="email" placeholder="Enter email" require>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="username">Tên</label>
                                <input type="text" value="{{ $user->username }}" class="form-control" name="username" id="username" placeholder="Enter username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="fullname">Tên đầy đủ</label>
                                <input type="text" value="{{ $user->fullname }}" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname" required>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="role_id">Roles</label>
                                {{ Form::select('role_id', $roles, $user->roles->id, ['id' => 'role_id']) }}
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-default" href="{{ route('admin.user.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit" >Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection