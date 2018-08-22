@extends('layouts.admin.app')

@section('content')

    <div class="module-head">
        <h1>
            <span>Tạo người dùng</span>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.user.store') }}" class='form' method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" require>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="username">Tên</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="email">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="fullname">Tên đầy đủ</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter fullname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="role_id">Roles</label>
                                {{ Form::select('role_id', $roles, null, ['id' => 'role_id']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_active">Trạng Thái</label>
                                <select class="" name="is_active" id="is_active">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ngừng hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-default" href="{{ route('admin.user.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit" >Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

@endsection