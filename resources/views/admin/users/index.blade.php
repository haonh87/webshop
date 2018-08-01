@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>Quản lý người dùng
            <a class="btn btn-primary btn-large pull-right" href="{{ route('admin.user.create') }}">Tạo mới</a>
        </h1>
    </div>
    <div class="module-body">
        @if(Session::has('message'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
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