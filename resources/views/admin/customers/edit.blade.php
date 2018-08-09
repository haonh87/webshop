@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Customer / Edit </h1>
    </div>
    <div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
        <div class="col-md-12">
            <form action="{{ action('Admin\CustomerController@update', $customer->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                    <tbody>
                      <tr class="success">
                        <td>ID</td>
                        <td>{{$customer->id}}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name = "name" value="{{ $customer->name }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name = "address" value="{{ $customer->address }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name = "email" value="{{ $customer->email }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name = "phone" value="{{ $customer->phone }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name = "mobile" value="{{ $customer->mobile }}" required>
                        </td>
                    </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('Admin\CustomerController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection