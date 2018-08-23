<!--  Start Header  -->
<header id="header" class="header_fullwidth">
    <div class="header_mid" data-height="90">
        <div class="header_mid_outer">
            <div class="header_mid_inner">
                <div class="logo_wrap">
                    <a href="{{ route('index') }}" title="Sports Store" class="logo">
                        <img src="{{ asset("frontend/images/logo-1.png") }}" alt="Gymbeo Sports"/>
                    </a>
                </div>
                <div class="resp_mid_nav_wrap">
                    <div class="resp_mid_nav_outer"><a class="responsive_nav resp_mid_nav"
                                                       href="javascript:void(0)"><span></span></a></div>
                </div>
                <div class="cmsmasters_account">
                    @if (!\Auth::check())
                        <a href="javascript:void(0)" class="cmsmasters_account_button"> Tài khoản</a>
                        <span class="cmsmasters_account_button_hide"></span>
                        <div class="widget_account_content">
                            <ul class="woocommerce-mini-account account_list product_list_widget ">
                                <li id="menu-myaccount-index">
                                    <a href="{{ route('myaccount.index') }}">
                                    <span class="nav_item_wrap">
                                        <span class="nav_title">Đăng nhập</span>
                                    </span>
                                    </a>
                                </li>
                                <li id="menu-myaccount-create">
                                    <a href="{{ route('myaccount.create') }}">
                                    <span class="nav_item_wrap">
                                        <span class="nav_title">Đăng ký</span>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="javascript:void(0)" class="cmsmasters_account_button"> Xin
                            chào {{ Auth::user()->username }}</a>
                        <span class="cmsmasters_account_button_hide"></span>
                        <div class="widget_account_content">
                            <ul class="woocommerce-mini-account account_list product_list_widget ">
                                <li id="menu-myaccount-logout">
                                    <a href="{{ route('customer.logout') }}">
                                    <span class="nav_item_wrap">
                                        <span class="nav_title">Đăng xuất</span>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="mid_search_but_wrap">
                    <a href="javascript:void(0)"
                                                    class="mid_search_but cmsmasters_header_search_but">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="cmsmasters_dynamic_cart">
                    <a href="http://sports-store.cmsmasters.net/cart/" class="cmsmasters_dynamic_cart_button">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ count($cartShare) }}
                    </a>
                    <span class="cmsmasters_dynamic_cart_button_hide"></span>
                    <div class="widget_shopping_cart_content">
                        @if(count($cartShare) == 0)
                            <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                        @else
                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($cartShare as $key => $cart)
                                    @php
                                        $total = $total + $cart->subtotal;
                                    @endphp
                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                        <a href="{{ route('cart.destroy', ['cart' => $cart->rowId]) }}"
                                           class="remove remove_from_cart_button" aria-label="Remove this item">×</a>
                                        <a href="{{ route('product.show', ['product' => $cart->id]) }}">
                                            <img width="540" height="540"
                                                 src="{{ asset('images/'.$cart->options->image) }}"
                                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                 alt="" sizes="(max-width: 540px) 100vw, 540px">
                                            {{ $cart->name }}&nbsp;
                                        </a>
                                        <span class="quantity">{{ $cart->qty }} × <span
                                                    class="woocommerce-Price-amount amount"><span><span
                                                            class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($cart->price, 2)  }}</span></span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="woocommerce-mini-cart__total total">
                                <strong>Tổng:</strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span>
                                        <span class="woocommerce-Price-currencySymbol">VND</span>
                                    </span>{{ \App\Helpers\listItemHelper::convertNumber($total, 2)  }}
                                </span>
                            </p>
                            <p class="woocommerce-mini-cart__buttons buttons">
                                <a href="{{ route('cart.index') }}" class="button wc-forward">Giỏ Hàng</a>
                                <a href="{{ route('cart.checkout') }}" class="button checkout wc-forward">Thanh Toán</a>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="cmsmasters_wishlist_wrap"><a href="http://sports-store.cmsmasters.net/wishlist/"
                                                         class="cmsmasters_theme_icon_like cmsmasters_wishlist_button"
                                                         rel="nofollow"></a></div><!--  Start Navigation  -->
                <div class="mid_nav_wrap">
                    <nav>
                        <div class="menu-main-menu-container">
                            <ul id="navigation" class="mid_nav navigation">
                                <li>
                                    <a href="{{ route('index') }}">
                                        <span class="nav_item_wrap"><span class="nav_title">Trang Chủ</span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('product.list') }}">
                                        <span class="nav_item_wrap"><span class="nav_title">Sản Phẩm</span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('post.index')}}">
                                        <span class="nav_item_wrap"><span class="nav_title">Bài Viết</span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('aboutUs')}}">
                                        <span class="nav_item_wrap"><span class="nav_title">Giới Thiệu</span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('instructions')}}">
                                        <span class="nav_item_wrap"><span class="nav_title">Hướng Dẫn</span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div><!--  Finish Navigation  --></div>
        </div>
    </div>
</header>
<!--  Finish Header  -->