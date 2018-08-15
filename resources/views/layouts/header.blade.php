<!--  Start Header  -->
<header id="header" class="header_fullwidth">
    <div class="header_mid" data-height="90">
        <div class="header_mid_outer">
            <div class="header_mid_inner">
                <div class="logo_wrap"><a href="index.html" title="Sports Store" class="logo">
                        <img src="{{ asset("frontend/images/logo.png") }}" alt="Gymbeo Sports"/>
                        <img class="logo_retina" src="images/logo_retina.png" alt="Sports Store" width="177"
                             height="28"/>
                    </a>
                </div>
                <div class="resp_mid_nav_wrap">
                    <div class="resp_mid_nav_outer"><a class="responsive_nav resp_mid_nav"
                                                       href="javascript:void(0)"><span></span></a></div>
                </div>
                <div class="mid_search_but_wrap"><a href="javascript:void(0)"
                                                    class="mid_search_but cmsmasters_header_search_but cmsmasters_theme_icon_search"></a>
                </div>
                <div class="cmsmasters_dynamic_cart"><a href="http://sports-store.cmsmasters.net/cart/"
                                                        class="cmsmasters_dynamic_cart_button"><span
                                class="cmsmasters_theme_icon_basket">{{ count($cartShare) }}</span></a><span
                            class="cmsmasters_dynamic_cart_button_hide"></span>
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
                                        <a href="{{ route('cart.destroy', ['cart' => $cart->rowId]) }}" class="remove remove_from_cart_button" aria-label="Remove this item">×</a>
                                        <a href="{{ route('product.show', ['product' => $cart->id]) }}">
                                            <img width="540" height="540" src="{{ asset('images/'.$cart->options->image) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" sizes="(max-width: 540px) 100vw, 540px">
                                            {{ $cart->name }}&nbsp;
                                        </a>
                                        <span class="quantity">{{ $cart->qty }} × <span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($cart->price, 2)  }}</span></span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="woocommerce-mini-cart__total total">
                                <strong>Subtotal:</strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span>
                                        <span class="woocommerce-Price-currencySymbol">VND</span>
                                    </span>{{ \App\Helpers\listItemHelper::convertNumber($total, 2)  }}
                                </span>
                            </p>
                            <p class="woocommerce-mini-cart__buttons buttons">
                                <a href="{{ route('cart.index') }}" class="button wc-forward">View cart</a>
                                <a href="{{ route('cart.checkout') }}" class="button checkout wc-forward">Checkout</a>
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
                                <li id="menu-item-13035"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7366 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-13035 menu-item-depth-0">
                                    <a href="http://sports-store.cmsmasters.net/"><span
                                                class="nav_item_wrap"><span class="nav_title">Home</span></span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-14037"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7366 current_page_item menu-item-14037 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Home</span></span></a></li>
                                        <li id="menu-item-14085"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14085 menu-item-depth-1">
                                            <a href="{{ route('product.list') }}"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Home Shop</span></span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-12979"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12979 menu-item-depth-0">
                                    <a><span class="nav_item_wrap"><span
                                                    class="nav_title">Features</span></span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-13040"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13040 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/new-collection/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">New Collection</span></span></a></li>
                                        <li id="menu-item-14039"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14039 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/product/different-tools-for-fitness/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Product Simple</span></span></a></li>
                                        <li id="menu-item-14040"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14040 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/product/classic-sports-bra/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Product Extended</span></span></a>
                                        </li>
                                        <li id="menu-item-14046"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14046 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/cart/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Cart</span></span></a></li>
                                        <li id="menu-item-14045"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14045 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/wishlist/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Wishlist</span></span></a></li>
                                        <li id="menu-item-13037"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13037 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/blog/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Blog</span></span></a></li>
                                        <li id="menu-item-13038"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13038 menu-item-depth-1">
                                            <a href="http://sports-store.cmsmasters.net/contacts/"><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Contacts</span></span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-13036"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13036 menu-item-depth-0">
                                    <a href="{{ route('product.list', ['category' => 'Women']) }}"><span
                                                class="nav_item_wrap"><span
                                                    class="nav_title">Women</span></span></a></li>
                                <li id="menu-item-13028"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13028 menu-item-depth-0">
                                    <a href="{{ route('product.list', ['category' => 'Men']) }}"><span
                                                class="nav_item_wrap"><span class="nav_title">Men</span></span></a>
                                </li>


                                <li id="menu-item-13028"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13028 menu-item-depth-0">
                                    <a href="http://sports-store.cmsmasters.net/men/"><span
                                                class="nav_item_wrap"><span class="nav_title">Checkout</span></span></a>
                                </li>

                                <li id="menu-item-13029"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13029 menu-item-depth-0">
                                    <a href="{{route('aboutUs')}}"><span class="nav_item_wrap"><span class="nav_title">About us</span></span></a>
                                </li>

                                <li id="menu-item-12979"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-12979 menu-item-depth-0">
                                    <a><span class="nav_item_wrap"><span
                                                    class="nav_title">Account</span></span></a>
                                    <ul class="sub-menu">
                                        <li id="menu-item-13040"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13040 menu-item-depth-1">
                                            <a href=""><span
                                                        class="nav_item_wrap"><span
                                                            class="nav_title">Register</span></span></a></li>
                                        <li id="menu-item-14039"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14039 menu-item-depth-1">
                                            {{--<a href="javascript:void(0)" class="mid_search_but cmsmasters_header_search_but">Login</a>--}}
                                            <a href="{{route('customer.login')}}"><span class="nav_item_wrap"><span class="nav_title">Login</span></span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div><!--  Finish Navigation  --></div>
        </div>
    </div>
</header>
<!--  Finish Header  -->