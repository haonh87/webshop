@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>User / Create </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('Admin\CustomerController@store') }}" class='form-validate' method="POST">

                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="Name">Gender</label>
                            <input type="text" class="form-control" name="gender" id="gender" placeholder="Enter gender">
                        </div>
                    </div>
                </div>

                <a class="btn btn-default" href="{{ route('admin.user.index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Create</button>
            </form>
        </div>
    </div>


@endsection