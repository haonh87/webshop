@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.message')
        <div class="cmsmasters_row_outer_parent">
            <div class="cmsmasters_row_outer">
                <div class="cmsmasters_row_inner">
                    <div class="cmsmasters_row_margin cmsmasters_11">
                        <div id="cmsmasters_column_0a1a0d6f3a" class="cmsmasters_column one_first">
                            <div class="cmsmasters_column_inner"><div class="cmsmasters_text">
                                    <div class="woocommerce">
                                        <form class="woocommerce-cart-form" action="http://sports-store.cmsmasters.net/cart/" method="post">

                                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th class="product-remove">&nbsp;</th>
                                                    <th class="product-thumbnail">&nbsp;</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($carts as $key => $cart)
                                                <tr class="woocommerce-cart-form__cart-item cart_item">

                                                    <td class="product-remove">
                                                        <a href="{{ route('cart.destroy', ['cart' => $cart->rowId]) }}" class="remove" aria-label="Remove this item" data-product_id="13718" data-product_sku="221-1">×</a></td>

                                                    <td class="product-thumbnail">
                                                        <a href="{{ route('product.show', ['product' => $cart->id]) }}">
                                                            <img width="540" height="540" src="{{ asset('images/'.$cart->product_image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="">
                                                        </a>
                                                    </td>

                                                    <td class="product-name" data-title="Product">
                                                        <a href="{{ route('product.show', ['product' => $cart->id]) }}">Modern Sporty Fashion Sneaker</a><dl class="variation">
                                                            <dt class="variation-Colors">Color:</dt>
                                                            <dd class="variation-Colors">
                                                                <p>{{ $colors[$cart->CartItemOptions->color] }}</p>
                                                            </dd>
                                                            <dt class="variation-MenShoesSize">Size:</dt>
                                                            <dd class="variation-MenShoesSize">
                                                                <p>{{ $colors[$cart->CartItemOptions->size_option] }}</p>
                                                            </dd>
                                                        </dl>
                                                    </td>

                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($cart->price, 2)  }}</span>
                                                    </td>

                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <label class="screen-reader-text" for="quantity">Quantity</label>
                                                            <input type="number" id="quantity" class="input-text qty text" step="1" min="0" max="" name="cart[{{ $cart->rowId }}][qty]" value="{{ $cart->qty }}" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                                        </div>
                                                    </td>

                                                    <td class="product-subtotal" data-title="Total">
                                                        <span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>125.00</span>						</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6" class="actions">

                                                        <button type="submit" class="button" name="update_cart" value="Update cart" disabled="">Update cart</button>


                                                        <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="{{ $cart->rowId }}"><input type="hidden" name="_wp_http_referer" value="/cart/">				</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </form>

                                        <div class="cart-collaterals">
                                            <div class="cart_totals ">


                                                <h2>Cart totals</h2>

                                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                                    <tbody><tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>125.00</span></td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>125.00</span></strong> </td>
                                                    </tr>
                                                    </tbody></table>

                                                <div class="wc-proceed-to-checkout">

                                                    <a href="http://sports-store.cmsmasters.net/checkout/" class="checkout-button button alt wc-forward">
                                                        Proceed to checkout</a>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
