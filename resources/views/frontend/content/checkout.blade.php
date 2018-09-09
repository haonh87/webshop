@extends('layouts.master')
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Đặt hàng'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap fullwidth">
                <div class="middle_content entry">
                    <div class="woocommerce">
                        <form name="checkout" id="checkout-pro" method="post" class="checkout woocommerce-checkout"
                              action="{{ route('cart.checkout') }}" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="woocommerce-additional-fields">

                                <div style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px; width: 100%" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="fullname">Tên đầy đủ</label>
                                    <input value="{{ isset(Auth::user()->fullname) ? Auth::user()->fullname : '' }}" required type="text" class="form-control" id="fullname" name="fullname" placeholder="Tên đầy đủ">
                                    <span class="has-error"></span>
                                </div>

                                <div style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px; width: 100%" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="fullname">Địa chỉ</label>
                                    <input value="{{ isset($customer->address) ? $customer->address : '' }}" required type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ">
                                    <span class="has-error"></span>
                                </div>

                                <div style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px; width: 100%" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="fullname">Số điện thoại</label>
                                    <input value="{{ isset($customer->mobile) ? $customer->mobile : '' }}" required type="tel" pattern="^0(1\d{9}|9\d{8})$" class="form-control mobile" title="Số điện thoại không đúng." id="mobile" name="mobile" placeholder="Số điện thoại">
                                    <span class="has-error"></span>
                                </div>

                                <div style="margin-bottom: 20px; margin-left: 0px; margin-right: 0px; width: 100%" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="txtemail">Email</label>
                                    <input value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" type="email" required class="form-control" id="email" name="email" placeholder="Email" value="">
                                    <span class="has-error"></span>
                                </div>
                                @if (!Auth::check())
                                <div class="woocommerce-account-fields">

                                    <p style="width: 100%; margin-left: 0px; margin-right: 0px; padding-bottom: 5px;" class="form-row form-row-wide create-account woocommerce-validated">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" type="checkbox" name="createaccount" value="1"> <span>Bạn muốn tạo tài khoản?</span>
                                        </label>
                                    </p>

                                    <div class="create-account" id="create-account-wrap" style="display: none">
                                        <p class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field" id="account_username_field" data-priority="">
                                            <label for="username" class="">Nhập Tên Tài Khoản<abbr class="required" title="required">*</abbr></label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text " name="username" id="username" placeholder="Tên tài khoản" value="">
                                            </span>
                                        </p>
                                        <p class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field" id="account_password_field" data-priority="">
                                            <label for="password" class="">Nhập mật khẩu<abbr class="required" title="required">*</abbr></label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="password" class="input-text " name="password" id="password" placeholder="Mật khẩu" value="">
                                            </span>
                                        </p>
                                        <div class="clear">
                                        </div>
                                    </div>


                                </div>
                                @endif
                                <h3>Thêm thông tin đơn hàng</h3>
                                <div class="woocommerce-additional-fields__field-wrapper">
                                    <p class="form-row notes" style="width: 100%; margin: 0px;" id="order_comments_field" data-priority=""><label
                                                for="order_comments" class="">Ghi chú<span
                                                    class="optional">(Không bắt buộc)</span></label><span
                                                class="woocommerce-input-wrapper"><textarea
                                                    name="order_comments" class="input-text "
                                                    id="order_comments"
                                                    placeholder="Lưu ý về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng."
                                                    rows="2" cols="5"></textarea></span></p></div>

                            </div>
                            <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tổng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach($carts as $key => $cart)
                                        @php
                                            $total = $total + $cart->subtotal;
                                        @endphp
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $cart->name }}&nbsp; <strong
                                                    class="product-quantity">× {{ $cart->qty }}</strong></td>
                                        <td class="product-total">
                                            <span class="woocommerce-Price-amount amount"><span><span
                                                            class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($cart->subtotal, 2)  }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tổng phụ</th>
                                        <td><span class="woocommerce-Price-amount amount"><span><span
                                                            class="woocommerce-Price-currencySymbol">VND</span>{{ \App\Helpers\listItemHelper::convertNumber($total, 2)  }}</span></span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td><strong><span class="woocommerce-Price-amount amount"><span><span
                                                                class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($total, 2)  }}</span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <button type="submit" class="button alt" name="woocommerce_checkout_place_order"
                                            id="place_order" value="Place order" data-value="Place order">Đăt Hàng
                                    </button>
                                    <button type="button" onclick="location.href = '{{route('product.list')}}';" class="button checkout wc-forward">Tiếp tục mua sắm</button>
                                </div>
                                <input type="hidden" name="total_cart" value="{{ $total }}">
                            </div>
                        </form>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
        </div>
    </div>
@stop