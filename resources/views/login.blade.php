@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Login'])
        @include('frontend.message')
        <div class="content_wrap fullwidth">
            <div class="middle_content entry">
                <div class="woocommerce">
                    <form class="woocommerce-form woocommerce-form-login login" method="post" style="display: block;"
                          action="{{route('customer.postLogin')}}">
                        {{csrf_field()}}
                        <p>If you have shopped with us before, please enter your details below. If you are a new
                            customer, please proceed to the Billing &amp; Shipping section.</p>
                        <p class="form-row form-row-first">
                            <label for="email">Username or email&nbsp;<span class="required">*</span></label>
                            <input type="text" class="input-text" name="email" id="email" autocomplete="email">
                        </p>
                        <p class="form-row form-row-last">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="input-text" type="password" name="password" id="password"
                                   autocomplete="current-password">
                        </p>
                        <div class="clear"></div>
                        <p class="form-row">
                            <button type="submit" class="button">Login</button>
                            {{--<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">--}}
                                {{--<input class="woocommerce-form__input woocommerce-form__input-checkbox"--}}
                                       {{--name="remember" type="checkbox" id="remember" value="forever"> <span>Remember me</span>--}}
                            {{--</label>--}}
                        </p>
                        {{--<p class="lost_password">--}}
                            {{--<a href="#">Lost your password?</a>--}}
                        {{--</p>--}}

                        @if(isset($errors) && count($errors) > 0)
                            <p class="error_msg" style="color: red">
                                {{ $errors->first() }}
                            </p>
                        @endif
                        <div class="clear"></div>
                    </form>
                </div>
                <div class="cl"></div>
            </div>
        </div>
    </div>
@stop
