@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Customers</h1>
    </div>


    <div class="row">
     @if(Session::has('message'))
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>MOBILE</th>
                        <th>GENDER</th>
                        <th>STATUS</th>
                        <th>BIRTHDAY</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->mobile}}</td>
                    <td>
                        @if($customer->gender == 1)
                            {{ 'male' }}
                        @else
                            {{ 'female' }}
                        @endif
                    </td>
                    <td>{{$customer->status}}</td>
                    <td>{{$customer->DOB}}</td>

                    <td class="text-right">
                        <a class="btn btn-warning " href="{{ action('Admin\CustomerController@edit', $customer->id) }}">Edit</a>
                        <form action="{{ action('Admin\CustomerController@destroy', $customer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            <a class="btn btn-success" href="{{ action('Admin\CustomerController@create') }}">Create</a>
        </div>
        {!! '<center>'.$customers->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection