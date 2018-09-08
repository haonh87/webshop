@extends('layouts.master')
@section('script')
@stop
@section('content')

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
            {!!$sub_navi !!}
        </ul>
        <div class="row">
            @include('frontend.sidebar')
            <div class='col-md-9'>
                <br><br>
                <!-- resources/views/auth/password.blade.php -->
                <form method="POST" class="form-horizontal" action="{{route('myaccount.password.email')}}">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email"  name="email" value="{{ old('email') }}">
                                <span class="has-error">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn-success">
                                Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="clearfix"></div>
@stop