@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Tạo tài khoản'])
        @include('frontend.message')
        <div class="cmsmasters_row_outer_parent create_user" style="padding-top: 70px; padding-bottom: 60px">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <form action="{{ route('myaccount.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-md-9 col-md-offset-3">
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="fullname">Fullname</label>
                                <input required="" type="text" value="{{ Auth::user()->fullname }}" class="form-control" id="fullname" name="fullname"
                                       placeholder="Fullname">
                                <span class="has-error">{{$errors->first('fullname')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtlastname">{{ trans('username') }}</label>
                                <input type="text"  required="" class="form-control" id="username" name="username" placeholder="{{ trans('username') }}"
                                       value="{{ Auth::user()->username }}"/>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtemail">{{ trans('lang.email') }}</label>
                                <input type="email" required="" class="form-control" id="email" name="email" placeholder="{{ trans('lang.email') }}"
                                       value="{{ Auth::user()->email }}"/>
                                <span class="has-error">{{$errors->first('email')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtpassword">{{ trans('lang.password') }}</label>
                                <input type="password" required="" value="{{ Auth::user()->password }}" class="form-control" id="password" name="password"
                                       placeholder="{{ trans('lang.password') }}">
                                <span class="has-error">{{$errors->first('password')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtpassword_confirmation">{{ trans('lang.confirm_password') }}</label>
                                <input type="password" required="" value="{{ Auth::user()->password }}" class="form-control" id="cf_password" name="cf_password"
                                       placeholder="{{ trans('lang.confirm_password') }}">
                                <span class="has-error">{{$errors->first('cf_password')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <button type="submit" class="btn btn-success">{{ trans('lang.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop