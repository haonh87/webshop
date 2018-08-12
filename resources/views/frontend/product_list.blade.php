@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.slider')
        <div class="middle_inner">
            <div class="content_wrap l_sidebar">

                <!--  Start Content  -->
                <div class="content entry fr" role="main">
                    <div class="cmsmasters_woo_wrap_result"><p class="woocommerce-result-count">
                            Showing 1–16 of 35 results</p>
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby">
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating" selected="selected">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="paged" value="1">
                        </form>
                    </div>
                    <div class="cmsmasters_products_wrap">
                        <ul class="products columns-4 cmsmasters_products">
                            @foreach($products as $product)
                                <li class="post-13483 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts first instock shipping-taxable purchasable product-type-variable">
                                    <article class="cmsmasters_product">
                                        <figure class="cmsmasters_product_img">
                                            <a href="http://sports-store.cmsmasters.net/product/mens-sport-quick-dry-t-shirt-grey/">
                                                @foreach($product->productImages as $key => $productImage)
                                                    <img width="540" height="540" src="{{ asset('images/' .$productImage->img_path) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image">
                                                @endforeach
                                            </a>
                                            <div class="button_to_cart_wrap"><a rel="nofollow" href="http://sports-store.cmsmasters.net/product/mens-sport-quick-dry-t-shirt-grey/" data-quantity="1" data-product_id="13483" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Add to cart</a></div>
                                        </figure>
                                        <div class="cmsmasters_product_inner">
                                        </div>
                                        <header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="http://sports-store.cmsmasters.net/product/mens-sport-quick-dry-t-shirt-grey/">
                                                    {{ $product->name }}
                                                </a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta">
                                            <a href="http://sports-store.cmsmasters.net/product-category/for-men/" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">{{
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
                    <aside id="yith_woocommerce_ajax_search-2"
                           class="widget woocommerce widget_product_search yith_woocommerce_ajax_search">
                        <div class="yith-ajaxsearchform-container cmsmasters_ajax_search_premium">
                            <form method="get" id="yith-ajaxsearchform" action="http://sports-store.cmsmasters.net/">
                                <div class="yith-ajaxsearchform-container">
                                    <div class="yith-ajaxsearchform-select">
                                        <input type="hidden" name="post_type" class="yit_wcas_post_type"
                                               id="yit_wcas_post_type" value="product">

                                    </div>
                                    <div class="search-navigation_wrap">
                                        <div class="search-navigation">
                                            <label class="screen-reader-text" for="yith-s">Search for:</label>
                                            <input type="search" value="" name="s" id="yith-s" class="yith-s empty"
                                                   placeholder="Search for products" data-append-to=".search-navigation"
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
                    <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><h3
                                class="widgettitle">Filter by price</h3>
                        <form method="get" action="http://sports-store.cmsmasters.net/shop/">
                            <div class="price_slider_wrapper">
                                <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                     style="">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"
                                         style="left: 0%; width: 100%;"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                          style="left: 0%;"></span><span
                                            class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"
                                            style="left: 100%;"></span></div>
                                <div class="price_slider_amount">
                                    <input type="text" id="min_price" name="min_price" value="{{ $maxMinPrice->min_price }}" data-min="{{ $maxMinPrice->min_price }}"
                                           placeholder="Min price" style="display: none;">
                                    <input type="text" id="max_price" name="max_price" value="{{ $maxMinPrice->max_price }}" data-max="{{ $maxMinPrice->max_price }}"
                                           placeholder="Max price" style="display: none;">
                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label" style="">
                                        Price: <span class="from"><span>D</span>{{ $maxMinPrice->min_price }}</span> — <span
                                                class="to"><span>D</span>{{ $maxMinPrice->max_price }}</span>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                    <aside id="woocommerce_product_categories-2" class="widget woocommerce widget_product_categories">
                        <h3 class="widgettitle">Product categories</h3>
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
                                class="widgettitle">Select color</h3>
                        <form method="get" action="http://sports-store.cmsmasters.net/shop/"
                              class="woocommerce-widget-layered-nav-dropdown">
                            <select
                                    class="woocommerce-widget-layered-nav-dropdown dropdown_layered_nav_colors select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">
                                <option value="">Any Colors</option>
                                @foreach($colors as $key => $color)
                                    <option value="{{ $key }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </form>
                    </aside>
                    <aside id="woocommerce_layered_nav-4"
                           class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav"><h3
                                class="widgettitle">Select size</h3>
                        <form method="get" action="http://sports-store.cmsmasters.net/shop/"
                              class="woocommerce-widget-layered-nav-dropdown">
                            <select
                                    class="woocommerce-widget-layered-nav-dropdown dropdown_layered_nav_size select2-hidden-accessible"
                                    tabindex="-1" aria-hidden="true">
                                <option value="">Any Size</option>
                                @foreach($sizes as $key => $size)
                                    <option value="{{ $key }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </form>
                    </aside>
                    <aside id="woocommerce_recently_viewed_products-2"
                           class="widget woocommerce widget_recently_viewed_products"><h3 class="widgettitle">Recently
                            viewed products</h3>
                        <ul class="product_list_widget">
                            <li>

                                <a href="http://sports-store.cmsmasters.net/product/different-tools-for-fitness/">
                                    <img width="540" height="540"
                                         src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4.jpg"
                                         class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                         alt=""
                                         srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2015/05/1-4-180x180.jpg 180w"
                                         sizes="(max-width: 540px) 100vw, 540px"> <span class="product-title">Different Tools for Fitness</span>
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
                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                        </div>
                                    </div>
                                    <span class="rating dn"><strong itemprop="ratingValue">4.00</strong> out of 5</span>
                                </div>

                                <span class="woocommerce-Price-amount amount"><span><span
                                                class="woocommerce-Price-currencySymbol">£</span></span>18.00</span>
                            </li>
                        </ul>
                    </aside>
                    <aside id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart"><h3
                                class="widgettitle">Your Cart</h3>
                        <div class="widget_shopping_cart_content">

                            <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>


                        </div>
                    </aside>
                </div>
                <!--  Finish Sidebar  -->


            </div>
        </div>
    </div>
@stop
