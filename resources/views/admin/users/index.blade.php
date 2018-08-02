@extends('layouts.admin.app')

@section('content')
    <div class="row">
     @if(Session::has('message'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <div class="module-head">
        <h1>
            <span>Danh sách người dùng</span>
            <a href="{{ route('admin.user.create') }}" class="btn btn-success btn-large pull-right">Tạo mới</a>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-condensed margin-bottom-10">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên</th>
                            <th>Tên Đầu Đủ</th>
                            <th>EMAIL</th>
                            <th>Quyền</th>
                            <th class="text-right">Lựa chọn</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->roles->name}}</td>

                        <td class="text-right">
                            <a class="btn btn-warning " href="{{ action('Admin\UserController@edit', $user->id) }}">Edit</a>
                            <form action="{{ action('Admin\UserController@destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            {!! '<center>'.$users->appends(Request::except('page'))->render().'</center>' !!}
        </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tài khoản</th>
                        <th>Tên hiển thị</th>
                        <th>Email</th>
                        <th>ROLE</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->fullname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->name}}</td>

                    <td class="text-right">
                        <a class="btn btn-warning " href="{{ action('Admin\UserController@edit', $user->id) }}">Edit</a>
                        <form action="{{ action('Admin\UserController@destroy', $user->id) }}" method="POST"
                              style="display: inline;"
                              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token"
                                                                                      value="{{ csrf_token() }}">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        {!! '<center>'.$users->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection