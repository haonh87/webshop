@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>UserEdit </h1>
    </div>
    <div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
        <div class="col-md-12">
            <form action="{{ action('Admin\UserController@update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                    <tbody>
                      <tr class="success">
                        <td>ID</td>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name = "name" value="{{ $user->name }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name = "email" value="{{ $user->email }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>
                            <select class="form-control" name="role" style="width: 24% !important">
                                @foreach($roles as $role)
                                    <option value ="{{ $role->id }}" <?php if($role->id == $user->role_id) {echo "selected";} ?>>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('Admin\UserController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection