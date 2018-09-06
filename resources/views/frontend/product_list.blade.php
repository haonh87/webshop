@extends('layouts.master')
@section('script')
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type='text/javascript' src='http://sports-store.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/frontend/price-slider.min.js'></script>
    <script type='text/javascript' src='http://sports-store.cmsmasters.net/wp-content/plugins/woocommerce/assets/js/accounting/accounting.min.js'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var woocommerce_price_slider_params = {"currency_format_num_decimals":"0","currency_format_symbol":"\u00a3","currency_format_decimal_sep":".","currency_format_thousand_sep":",","currency_format":"<span>%s<\/span>%v"};
        /* ]]> */
    </script>
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Danh sách sản phẩm'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap l_sidebar product_list_wrap">
                <!--  Start Content  -->
                <div class="content entry fr" role="main">
                    <aside id="yith_woocommerce_ajax_search-2"
                           class="widget woocommerce widget_product_search yith_woocommerce_ajax_search">
                        <div class="yith-ajaxsearchform-container cmsmasters_ajax_search_premium">
                            <form method="get" id="yith-ajaxsearchform" action="{{ route('product.list') }}">
                                <div class="yith-ajaxsearchform-container">
                                    <div class="yith-ajaxsearchform-select">
                                        <input type="hidden" name="post_type" class="yit_wcas_post_type"
                                               id="yit_wcas_post_type" value="product">

                                    </div>
                                    <div class="search-navigation_wrap">
                                        <div class="search-navigation">
                                            <label class="screen-reader-text" for="yith-s">Search for:</label>
                                            <input type="search" value="{{ isset($condition['search']) ? $condition['search'] : '' }}" name="search" id="yith-s" class="yith-s empty"
                                                   placeholder="Tìm Kiếm Sản Phẩm" data-append-to=".search-navigation"
                                                   data-loader-icon="http://sports-store.cmsmasters.net/wp-content/plugins/yith-woocommerce-ajax-search-premium/assets/images/preloader.gif"
                                                   data-min-chars="3" autocomplete="off">

                                            <div class="autocomplete-suggestions"
                                                 style="position: absolute; display: none; z-index: 9999;"></div>
                                        </div>
                                        <button type="submit" id="yith-searchsubmit"></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </aside>
                    <div class="cmsmasters_woo_wrap_result"><p class="woocommerce-result-count">
                            Hiển thị {{ $products->firstItem() }}–{{ $products->lastItem() }} của {{ $products->total() }} sản phẩm</p>
                        <form class="woocommerce-ordering"  method="get" action="{{ route('product.list') }}">
                            <select name="orderby" class="orderby" onchange="this.form.submit()">
                                <option value="default">Chọn kiểu sắp xếp</option>
                                <option value="total_star-desc" {{ (isset($condition['orderby']) && $condition['orderby'] == 'total_star-desc') ? 'selected' : '' }}>Đánh giá cao nhất</option>
                                <option value="products.created_at-desc" {{ (isset($condition['orderby']) && $condition['orderby'] == 'products.created_at-desc') ? 'selected' : '' }}>Sản phẩm mới</option>
                                <option value="products.price-asc" {{ (isset($condition['orderby']) && $condition['orderby'] == 'products.price-asc') ? 'selected' : '' }}>Giá tăng dần</option>
                                <option value="products.price-desc" {{ (isset($condition['orderby']) && $condition['orderby'] == 'products.price-desc') ? 'selected' : '' }}>Giá giảm dần</option>
                            </select>
                            <input type="hidden" name="paged" value="{{ $products->currentPage() }}">
                        </form>
                    </div>
                    <div class="cmsmasters_products_wrap">
                        <ul class="products columns-4 cmsmasters_products">
                            @foreach($products as $product)
                                <li class="post-13483 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts first instock shipping-taxable purchasable product-type-variable">
                                    <article class="cmsmasters_product">
                                        <figure class="cmsmasters_product_img">
                                            <a href="{{ route('product.show', ['product' => $product->id]) }}">
                                                @foreach($product->productImages as $key => $productImage)
                                                    @if ($key < 2)
                                                    <img width="540" height="540" src="{{ asset('images/' .$productImage->img_path) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image">
                                                    @endif
                                                @endforeach
                                            </a>
                                            <div class="button_to_cart_wrap"><a rel="nofollow" href="{{ route('product.show', ['product' => $product->id]) }}" data-quantity="1" data-product_id="13483" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Select option</a></div>
                                        </figure>
                                        <div class="cmsmasters_product_inner">
                                        </div>
                                        <header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="{{ route('product.show', ['product' => $product->id]) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta">
                                            <a href="{{ route('product.list', ['category' => $product->category->name]) }}" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">{{
                                                                    $product->category->name }}</a></div>
                                        <div class="cmsmasters_product_info">

                                            <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND </span>{{ \App\Helpers\listItemHelper::convertNumber($product->price, 2)  }}</span> </span></span>

                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated {{ \App\Helpers\listItemHelper::convertNumber($product->total_star, 2) }} out of 5">
                                                <div class="cmsmasters_star_trans_wrap">
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                </div>
                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                    <div class="cmsmasters_star_color_inner">
                                                        @for($i = 0; $i< (int)$product->total_star; $i++)
                                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <span class="rating dn"><strong itemprop="ratingValue">{{ $product->total_star }}</strong> out of 5</span>
                                            </div>
                                        </div>
                                    </article>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @include('frontend.elements.paginator', ['paginator' => $products])
                </div>
                <!--  Finish Content  -->


                <!--  Start Sidebar  -->
                <div class="sidebar fl" role="complementary">
                    <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><h3
                                class="widgettitle">Lọc theo giá</h3>
                        <form method="get" action="{{ route('product.list') }}">
                            <div class="price_slider_wrapper">
                                <div class="price_slider" style="display:none;"></div>
                                <div class="price_slider_amount">
                                    <input type="text" id="min_price" name="min_price" value="{{ isset($condition['min_price']) ? $condition['min_price'] : $maxMinPrice->min_price }}" data-min="{{ (int)$maxMinPrice->min_price }}" placeholder="Min price">
                                    <input type="text" id="max_price" name="max_price" value="{{ isset($condition['max_price']) ? $condition['max_price'] : $maxMinPrice->max_price }}" data-max="{{ (int)$maxMinPrice->max_price }}" placeholder="Max price">
                                    <button type="submit" class="button">Lọc</button>
                                    <div class="price_label" style="display:none;">
                                        Giá: <span class="from"></span> — <span class="to"></span>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                    <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                        <h3 class="widgettitle">Danh mục sản phẩm</h3>
                        <ul class="product-categories">
                            @foreach( $categories as $category )
                            <li class="cat-item cat-item-{{ $category->id }}">
                                <a href="{{ route('product.list', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside id="woocommerce_layered_nav-2"
                           class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav"><h3
                                class="widgettitle">Chọn màu sắc</h3>
                        <form method="get" action="{{ route('product.list') }}"
                              class="woocommerce-widget-layered-nav-dropdown">
                            <select name="color" onchange="this.form.submit()"
                                    class="woocommerce-widget-layered-nav-dropdown dropdown_layered_nav_colors select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">
                                <option value="default">Tất cả màu</option>
                                @foreach($colors as $key => $color)
                                    <option value="{{ $key }}" {{ (isset($condition['color']) && $condition['color'] == $key) ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                        </form>
                    </aside>
                    <aside id="woocommerce_layered_nav-4"
                           class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav"><h3
                                class="widgettitle">Chọn kích cỡ</h3>
                        <form method="get" action="{{ route('product.list') }}"
                              class="woocommerce-widget-layered-nav-dropdown">
                            <select name="size" onchange="this.form.submit()"
                                    class="woocommerce-widget-layered-nav-dropdown dropdown_layered_nav_size select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">
                                <option value="default">Tất cả kích cỡ</option>
                                @foreach($sizes as $key => $size)
                                    <option value="{{ $key }}" {{ (isset($condition['size']) && $condition['size'] == $key) ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                            </select>
                        </form>
                    </aside>
                    <aside id="woocommerce_recently_viewed_products-2"
                           class="widget woocommerce widget_recently_viewed_products"><h3 class="widgettitle">Sản phẩm đã xem</h3>
                        @if(empty($recentlyProduct))
                            <p>Không có sản phẩm đã xem</p>
                        @else
                            <ul class="product_list_widget">
                                @foreach($recentlyProduct as $product)
                                <li>
                                    <a href="{{ route('product.show', ['product' => $product->id]) }}">
                                        <img width="540" height="540"
                                             src="{{ asset('images/' .$product->productImages[0]->img_path) }}"
                                             class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" sizes="(max-width: 540px) 100vw, 540px">
                                        <span class="product-title">{{ $product->name }}</span>
                                    </a>
                                    <div class="cmsmasters_star_rating" itemscope=""
                                         itemtype="http://schema.org/AggregateRating" title="Rated 4.00 out of 5">
                                        <div class="cmsmasters_star_trans_wrap">
                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                        </div>
                                        <div class="cmsmasters_star_color_wrap" style="width:80%">
                                            <div class="cmsmasters_star_color_inner">
                                                @for($i = 0; $i< (int)$product->total_star; $i++)
                                                    <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="rating dn"><strong itemprop="ratingValue">{{ $product->total_star }}</strong> out of 5</span>
                                    </div>

                                    <span class="woocommerce-Price-amount amount"><span><span
                                                    class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($product->price, 2)  }}</span>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </aside>
                    <aside id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart"><h3
                                class="widgettitle">Giỏ hàng</h3>
                        <div class="widget_shopping_cart_content">
                            @if(count($cartShare) == 0)
                                <p class="woocommerce-mini-cart__empty-message">Không có sản phẩm nào trong giỏ hàng</p>
                            @else
                                <ul class="woocommerce-mini-cart cart_list product_list_widget">
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
                    </aside>
                </div>
                <!--  Finish Sidebar  -->


            </div>
        </div>
    </div>
@stop
