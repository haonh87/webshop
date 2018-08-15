@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Sửa tài khoản'])
        @include('frontend.message')
        <div class="cmsmasters_row_outer_parent create_user" style="padding-top: 70px; padding-bottom: 60px">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <form action="{{ route('myaccount.update') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="col-md-9 col-md-offset-3">
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="fullname">Tên đầy đủ</label>
                                <input required="" type="text" value="{{ Auth::user()->fullname }}" class="form-control" id="fullname" name="fullname"
                                       placeholder="Tên đầy đủ">
                                <span class="has-error">{{$errors->first('fullname')}}</span>
                            </div>
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtlastname">Tên tài khoản</label>
                                <input type="text"  required="" class="form-control" id="username" name="username" placeholder="Tên tài khoản"
                                       value="{{ Auth::user()->username }}"/>
                            </div>
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="txtemail">Email</label>
                                <input type="email" required="" class="form-control" id="email" name="email" placeholder="Email"
                                       value="{{ Auth::user()->email }}"/>
                                <span class="has-error">{{$errors->first('email')}}</span>
                            </div>
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="fullname">Địa chỉ</label>
                                <input required="" value="{{ $customer->address }}" type="text" class="form-control" id="address" name="address"
                                       placeholder="Địa chỉ">
                                <span class="has-error">{{$errors->first('address')}}</span>
                            </div>
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="fullname">Số điện thoại</label>
                                <input required="" value="{{ $customer->mobile }}" type="text" class="form-control" id="mobile" name="mobile"
                                       placeholder="Số điện thoại">
                                <span class="has-error">{{$errors->first('mobile')}}</span>
                            </div>
                            <div style="margin-bottom: 20px;" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="fullname">Giới Tính</label>
                                <select name="gender" id="gender">
                                    <option value="0" {{ ($customer->gender == 0) ? 'selected' : '' }}>Nữ</option>
                                    <option value="1" {{ ($customer->gender == 1) ? 'selected' : '' }}>Nam</option>
                                </select>
                                <span class="has-error">{{$errors->first('gender')}}</span>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <button type="submit" class="btn btn-success">Sửa Thông Tin Tài Khoản</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop