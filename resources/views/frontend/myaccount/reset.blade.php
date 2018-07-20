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
                <form method="POST" action="{{route('myaccount.password.reset')}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="txtemail">{{ trans('lang.email') }}</label>
                        <input required="" type="email"  class="form-control" id="txtemail" name="txtemail"
                               placeholder="{{ trans('lang.email') }}" value="{{ old('email') }}">
                        <span class="has-error">{{$errors->first('txtpassword')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="txtpassword">{{ trans('lang.new_password') }}</label>
                        <input required="" type="password"  class="form-control" id="txtpassword" name="txtpassword"
                               placeholder="{{ trans('lang.new_password') }}">
                        <span class="has-error">{{$errors->first('txtpassword')}}</span>
                    </div>
                    <div class="form-group">
                        <label for="txtpassword_confirmation">{{ trans('lang.confirm_password') }}</label>
                        <input required="" type="password"  class="form-control" id="txtpassword_confirmation" name="txtpassword_confirmation"
                               placeholder="{{ trans('lang.confirm_password') }}">
                        <span class="has-error">{{$errors->first('txtpassword_confirmation')}}</span>
                    </div>

                    <div>
                        <button type="submit" class="btn">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="clearfix"></div>
@stop