@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Tạo tài khoản'])
        @include('frontend.message')
        <div class="cmsmasters_row_outer_parent create_user" style="padding-top: 60px; padding-bottom: 60px">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <form action="{{ route('myaccount.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-md-9 col-md-offset-3">
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtlastname">{{ trans('name') }}</label>
                                <input type="text"  required="" class="form-control" id="txtname" name="txtname" placeholder="{{ trans('name') }}"
                                       value="{{  Session::getOldInput('txtlastname') }}"/>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtemail">{{ trans('lang.email') }}</label>
                                <input type="email" required="" class="form-control" id="txtemail" name="txtemail" placeholder="{{ trans('lang.email') }}"
                                       value="{{  Session::getOldInput('txtemail') }}"/>
                                <span class="has-error">{{$errors->first('txtemail')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtpassword">{{ trans('lang.password') }}</label>
                                <input type="password" required="" class="form-control" id="txtpassword" name="txtpassword"
                                       placeholder="{{ trans('lang.password') }}">
                                <span class="has-error">{{$errors->first('txtpassword')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtpassword_confirmation">{{ trans('lang.confirm_password') }}</label>
                                <input type="password" required="" class="form-control" id="txtpassword_confirmation" name="txtpassword_confirmation"
                                       placeholder="{{ trans('lang.confirm_password') }}">
                                <span class="has-error">{{$errors->first('txtpassword_confirmation')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtbirthday">{{ trans('lang.birth_day') }}</label>
                                <input required="" type="date" class="form-control" id="txtbirthday" name="txtbirthday"
                                       placeholder="{{ trans('lang.birth_day') }}">
                                <span class="has-error">{{$errors->first('txtbirthday')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label class="radio-inline">
                                    <input type="radio" name="txtgender" id="inlineRadio1" value="0"> {{ trans('lang.male') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="txtgender" id="inlineRadio2" checked value="1">{{ trans('lang.female') }}
                                </label>
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