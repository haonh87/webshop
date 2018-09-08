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
                <form action="
                {{route('myaccount.edit.password',['myaccount' => Auth::user()->id])}}
                {{-- action('Frontend\MyAccountController@update', $user->id) --}}
                " method="POST">{{--dump($errors)--}}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-6 col-md-offset-3">
                        @if(Auth::user()->role_id != 4)
                        <div class="form-group">
                            <label for="txtpassword">{{ trans('lang.old_password') }}</label>
                            <input required="" type="password" class="form-control" id="txtpassword" name="txtoldpassword"  placeholder="{{ trans('lang.old_password') }}">
                            <span class="has-error">{{$errors->first('txtoldpassword')}}</span>
                        </div>
                        @endif
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
                        <button type="submit" class="btn btn-success">{{ trans('lang.submit') }}</button>
                        <a class="btn btn-primary" href="{{ route('index') }}">{{ trans('lang.close') }}</a>
                    </div>
                </form>
                <div class="col-md-12">&nbsp;</div>
                <div class="clearfix"></div>

            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="clearfix"></div>
@stop