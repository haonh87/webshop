@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Đăng nhập'])
        @include('frontend.message')
        <div class="cmsmasters_row_outer_parent" style="padding-bottom: 40px; padding-top: 40px">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <div class="cmsmasters_row_margin cmsmasters_11">
                        <div id="cmsmasters_column_1ba0178fc3" class="cmsmasters_column one_first">
                            <div class="cmsmasters_column_inner">
                                <div class="cmsmasters_text">
                                    <div class="woocommerce">
                                        <h2>Đăng Nhập</h2>
                                        <form action="{{ route('login') }}" class="woocommerce-form woocommerce-form-login login" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="username">Nhập email<span
                                                            class="required">*</span></label>
                                                <input type="text"
                                                       class="woocommerce-Input woocommerce-Input--text input-text"
                                                       name="email" id="email" autocomplete="email" value="">
                                            </p>
                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password">Mật khẩu&nbsp;<span
                                                            class="required">*</span></label>
                                                <input class="woocommerce-Input woocommerce-Input--text input-text"
                                                       type="password" name="password" id="password"
                                                       autocomplete="current-password" style="width: 260px">
                                            </p>
                                            <p class="form-row">
                                                <button type="submit" class="woocommerce-Button button" name="login"
                                                        value="Log in">Đăng Nhập
                                                </button>
                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                           name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"> <span>Nhớ đăng nhập</span>
                                                </label>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop