@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Users</h1>
    </div>


    <div class="row">
     @if(Session::has('message'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-condensed margin-bottom-10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->address}}</td>
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

            <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Create</a>
        </div>
        {!! '<center>'.$users->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection