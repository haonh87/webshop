@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Đặt hàng'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap fullwidth">
                <div class="middle_content entry">
                    <div class="woocommerce">
                        <form name="checkout" method="post" class="checkout woocommerce-checkout"
                              action="{{ route('cart.checkout') }}" enctype="multipart/form-data"
                              novalidate="novalidate">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="woocommerce-additional-fields">
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
