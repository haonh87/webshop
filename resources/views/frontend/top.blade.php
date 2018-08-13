@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.slider')

        @include('frontend.message')

        <div class="widget widget-style-1">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin cmsmasters_row_columns_behavior">
                            @foreach($wmCategory as $category)
                                <div class="cmsmasters_column one_half">
                                    <div class="cmsmasters_column_inner">
                                        <div class="cmsmasters_featured_block cmsmasters_featured_block_hover article-style-1">
                                            <a class="cmsmasters_featured_block_link"
                                               href="{{ route('product.list', ['category' => $category->name]) }}">
                                                <img src="{{ asset($category->image_url) }}" alt="">
                                            @php
                                                $categoryDescription = explode('-', $category->description);
                                            @endphp
                                            <div class="featured_block_inner">
                                                <div class="featured_block_text">
                                                    <div id="cmsmasters_heading_eebc4bcac2"
                                                         class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                        <h2 class="cmsmasters_heading">{{ $categoryDescription[0] }}</h2>
                                                    </div>
                                                    <div class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                        <h3 class="cmsmasters_heading">{{ $categoryDescription[1] }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-2">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin cmsmasters_row_columns_behavior cmsmasters_131313">
                            <div class="cmsmasters_column one_third">
                                <div class="cmsmasters_column_inner">
                                    <div id="cmsmasters_fb_016z4vrb3b"
                                         class="cmsmasters_featured_block cmsmasters_featured_block_hover">
                                        <a class="cmsmasters_featured_block_link"
                                           href="http://sports-store.cmsmasters.net/shop"></a>
                                        <div class="featured_block_inner">
                                            <div class="featured_block_text">
                                                <div id="cmsmasters_heading_89db67754d42"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h3 class="cmsmasters_heading">2017</h3>
                                                </div>
                                                <div id="cmsmasters_heading_ef927527455cb"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h2 class="cmsmasters_heading">BEST SELLING</h2>
                                                </div>
                                                <div id="cmsmasters_heading_be46b6r4d74e"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h5 class="cmsmasters_heading"><a
                                                                href="http://sports-store.cmsmasters.net/new-collection/">Get
                                                            the discount OF 20%</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cmsmasters_column one_third">
                                <div class="cmsmasters_column_inner">
                                    <div id="cmsmasters_fb_o5eqkmubb8"
                                         class="cmsmasters_featured_block cmsmasters_featured_block_hover">
                                        <a class="cmsmasters_featured_block_link"
                                           href="http://sports-store.cmsmasters.net/new-collection/"></a>
                                        <div class="featured_block_inner">
                                            <div class="featured_block_text">
                                                <div id="cmsmasters_heading_89db67754d41"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h3 class="cmsmasters_heading">Summer trends</h3>
                                                </div>
                                                <div id="cmsmasters_heading_ef927527454cb"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h2 class="cmsmasters_heading">NEW ARRIVALS</h2>
                                                </div>
                                                <div id="cmsmasters_heading_be46b6r4d73e"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h5 class="cmsmasters_heading"><a
                                                                href="http://sports-store.cmsmasters.net/new-collection/">Shop
                                                            Now</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cmsmasters_column one_third">
                                <div class="cmsmasters_column_inner">
                                    <div id="cmsmasters_fb_q0vgmjpmb"
                                         class="cmsmasters_featured_block cmsmasters_featured_block_hover">
                                        <a class="cmsmasters_featured_block_link"
                                           href="http://sports-store.cmsmasters.net/shop"></a>
                                        <div class="featured_block_inner">
                                            <div class="featured_block_text">
                                                <div id="cmsmasters_heading_892db754d41"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h3 class="cmsmasters_heading">BIG SALE</h3>
                                                </div>
                                                <div id="cmsmasters_heading_ef92347527cb"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h2 class="cmsmasters_heading">SUMMER TRENDS</h2>
                                                </div>
                                                <div id="cmsmasters_heading_be4678b6d73e"
                                                     class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                                    <h5 class="cmsmasters_heading"><a
                                                                href="http://sports-store.cmsmasters.net/new-collection/">top
                                                            brands up to 80% off</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-1">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin">
                            <div class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                        <h3 class="cmsmasters_heading">Featured Products</h3>
                                    </div>
                                    <div class="aligncenter">
                                        <div class="cmsmasters_img  cmsmasters_image_c"><img src="{{ asset('images/line.jpg') }}"
                                                                                             alt="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cmsmasters_row_margin">
                            <div class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div class="cmsmasters_posts_slider cmsmasters_posts_slider_product">
                                        <div id="cmsmasters_slider_3f171e76ab" class="cmsmasters_owl_slider owl-carousel" data-items="4" data-pagination="true" data-navigation="false" data-single-item="false" data-auto-play="10000">
                                            @foreach($featureProducts as $featureProduct)
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Product Article  -->
                                                <article class="post-13743 product type-product status-publish has-post-thumbnail product_cat-shoes product_cat-sneakers product_cat-unisex product_tag-shoes product_tag-sneakers product_tag-unisex first instock shipping-taxable purchasable product-type-variable">
                                                    <div class="cmsmasters_product">
                                                        <figure class="cmsmasters_product_img">
                                                            <a href="{{ route('product.show', ['product' => $featureProduct->id]) }}">
                                                                @foreach($featureProduct->productImages as $key => $productImage)
                                                                @if ($key < 2)
                                                                    <img width="540" height="540" src="{{ asset('images/' .$productImage->img_path) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image">
                                                                @endif
                                                                @endforeach
                                                            </a>
                                                            <div class="button_to_cart_wrap"><a rel="nofollow" href="{{ route('product.show', ['product' => $featureProduct->id]) }}" data-quantity="1" data-product_id="13743" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Select
                                                                    options</a></div>
                                                        </figure>
                                                        <div class="cmsmasters_product_inner">
                                                            <header class="cmsmasters_product_header entry-header">
                                                                <h5 class="cmsmasters_product_title entry-title">
                                                                    <a href="{{ route('product.show', ['product' => $featureProduct->id]) }}">{{ $featureProduct->name }}</a>
                                                                </h5>
                                                            </header>
                                                            <div class="cmsmasters_product_cat entry-meta">
                                                                <a href="{{ route('product.list', ['category' => $featureProduct->category->name]) }}" class="cmsmasters_cat_color cmsmasters_cat_73" rel="category tag">{{ $featureProduct->category->name }}</a>
                                                            </div>
                                                            <div class="cmsmasters_product_info">

                                                                <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND </span></span>{{ \App\Helpers\listItemHelper::convertNumber($featureProduct->price, 2)  }}</span></span>

                                                                <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated {{ \App\Helpers\listItemHelper::convertNumber($featureProduct->total_star, 2) }} out of 5">
                                                                    <div class="cmsmasters_star_trans_wrap">
                                                                        <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                    </div>
                                                                    <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                                        <div class="cmsmasters_star_color_inner">
                                                                            @for($i = 0; $i< (int)$featureProduct->total_star; $i++)
                                                                            <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                    <span class="rating dn"><strong itemprop="ratingValue">{{ $featureProduct->total_star }}</strong> out of 5</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Product Article  -->

                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-1 custom_widget_hasbg">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin cmsmasters_11">
                            <div id="cmsmasters_column_e33c9de989" class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div id="cmsmasters_heading_64e7aa0d48" class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                        <h2 class="cmsmasters_heading colorFFF">Crossfit trending wear 2017</h2>
                                    </div>
                                    <div id="cmsmasters_heading_yfuldl1f1s" class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                        <h6 class="cmsmasters_heading colorFFF"> Most viewed video</h6>
                                    </div>
                                    <div id="cmsmasters_divider_c6e561e1fd" class="cl"></div>
                                    <div class="aligncenter">
                                        <div class="cmsmasters_img  cmsmasters_image_c"><a href="https://vimeo.com/95380310" rel="ilightbox[img_5b613257e8f53]"><img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/play.png" alt="play"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-1">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin cmsmasters_11">
                            <div class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                        <h3 class="cmsmasters_heading">New Products</h3>
                                    </div>
                                    <div class="aligncenter">
                                        <div class="cmsmasters_img  cmsmasters_image_c"><img
                                                    src="{{ asset('images/line.jpg') }}"
                                                    alt="line"></div>
                                    </div>
                                    <div class="cl"></div>
                                    <div class="cmsmasters_selected_products_shortcode">
                                        <div class="woocommerce columns-4 ">
                                            <div class="cmsmasters_products_wrap">
                                                <ul class="products columns-4 cmsmasters_products">
                                                @foreach($newProducts as $newProduct)
                                                    <li class="post-13483 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts first instock shipping-taxable purchasable product-type-variable">
                                                        <article class="cmsmasters_product">
                                                            <figure class="cmsmasters_product_img">
                                                                <a href="{{ route('product.show', ['product' => $newProduct->id]) }}">
                                                                    @foreach($newProduct->productImages as $key => $productImage)
                                                                        @if ($key < 2)
                                                                        <img width="540" height="540" src="{{ asset('images/' .$productImage->img_path) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image">
                                                                        @endif
                                                                    @endforeach
                                                                </a>
                                                                <div class="button_to_cart_wrap"><a rel="nofollow" href="{{ route('product.show', ['product' => $newProduct->id]) }}" data-quantity="1" data-product_id="13483" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Select option</a></div>
                                                            </figure>
                                                            <div class="cmsmasters_product_inner">
                                                            </div>
                                                                <header class="cmsmasters_product_header entry-header">
                                                                    <h5 class="cmsmasters_product_title entry-title">
                                                                        <a href="{{ route('product.show', ['product' => $newProduct->id]) }}">
                                                                            {{ $newProduct->name }}
                                                                        </a>
                                                                    </h5>
                                                                </header>
                                                                <div class="cmsmasters_product_cat entry-meta">
                                                                    <a href="{{ route('product.list', ['category' => $newProduct->category->name]) }}" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">{{
                                                                    $newProduct->category->name }}</a></div>
                                                                <div class="cmsmasters_product_info">

                                                                    <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND </span>{{ \App\Helpers\listItemHelper::convertNumber($newProduct->price, 2)  }}</span> </span></span>

                                                                    <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated {{ \App\Helpers\listItemHelper::convertNumber($newProduct->total_star, 2) }} out of 5">
                                                                        <div class="cmsmasters_star_trans_wrap">
                                                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                            <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                        </div>
                                                                        <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                                            <div class="cmsmasters_star_color_inner">
                                                                                @for($i = 0; $i< (int)$newProduct->total_star; $i++)
                                                                                    <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                                @endfor
                                                                            </div>
                                                                        </div>
                                                                        <span class="rating dn"><strong itemprop="ratingValue">{{ $featureProduct->total_star }}</strong> out of 5</span>
                                                                    </div>
                                                                </div>
                                                        </article>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-1">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin">
                            <div id="cmsmasters_column_dbdeac3041" class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                                        <h3 class="cmsmasters_heading">Latest News</h3>
                                    </div>
                                    <div class="aligncenter">
                                        <div class="cmsmasters_img  cmsmasters_image_c"><img
                                                    src="{{ asset('images/line.jpg') }}"
                                                    alt="line"></div>
                                    </div>
                                    <div class="cmsmasters_posts_slider cmsmasters_posts_slider_post">
                                        <div id="cmsmasters_owl_slider_4" class="cmsmasters_owl_slider" data-items="3" data-pagination="true"
                                             data-navigation="false" data-single-item="false" data-auto-play="5000">
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-10736"
                                                         class="cmsmasters_slider_post post-10736 post type-post status-publish format-image has-post-thumbnail hentry category-perfect-body post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/1-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="6 Ways to Get the Perfect Beach Body"
                                                                 title="6 Ways to Get the Perfect Beach Body"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/06/6-ways-to-get-the-perfect-beach-body/"
                                                                    title="6 Ways to Get the Perfect Beach Body"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 6, 2017">May 6, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/06/6-ways-to-get-the-perfect-beach-body/">6
                                                                    Ways to Get the Perfect Beach Body</a></h5>
                                                        </header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-2938"
                                                         class="cmsmasters_slider_post post-2938 post type-post status-publish format-image has-post-thumbnail hentry category-advice post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/2-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="How to Buy the Right Running Shoes?"
                                                                 title="How to Buy the Right Running Shoes?"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/09/how-to-buy-the-right-running-shoes/"
                                                                    title="How to Buy the Right Running Shoes?"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 9, 2017">May 9, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/09/how-to-buy-the-right-running-shoes/">How
                                                                    to Buy the Right Running Shoes?</a></h5>
                                                        </header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-103"
                                                         class="cmsmasters_slider_post post-103 post type-post status-publish format-image has-post-thumbnail hentry category-advice category-fitness-fashion post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/3-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="Friday Favorites: Fitness fashion, food + more"
                                                                 title="Friday Favorites: Fitness fashion, food + more"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/11/friday-favorites-fitness-fashion-food-more/"
                                                                    title="Friday Favorites: Fitness fashion, food + more"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 11, 2017">May 11, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/11/friday-favorites-fitness-fashion-food-more/">Friday
                                                                    Favorites: Fitness fashion, food + more</a>
                                                            </h5></header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-285"
                                                         class="cmsmasters_slider_post post-285 post type-post status-publish format-image has-post-thumbnail hentry category-sports-together post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/4-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="How does Sport Bring Communities Together?"
                                                                 title="How does Sport Bring Communities Together?"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/15/how-does-sport-bring-communities-together/"
                                                                    title="How does Sport Bring Communities Together?"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 15, 2017">May 15, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/15/how-does-sport-bring-communities-together/">How
                                                                    does Sport Bring Communities Together?</a>
                                                            </h5></header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-87"
                                                         class="cmsmasters_slider_post post-87 post type-post status-publish format-image has-post-thumbnail hentry category-advice category-training post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/5-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="How Long To Rest Between Sets &amp; Exercises"
                                                                 title="How Long To Rest Between Sets &amp; Exercises"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/18/how-long-to-rest-between-sets-exercises/"
                                                                    title="How Long To Rest Between Sets &amp; Exercises"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 18, 2017">May 18, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/18/how-long-to-rest-between-sets-exercises/">How
                                                                    Long To Rest Between Sets &amp;
                                                                    Exercises</a></h5></header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                            <div class="cmsmasters_owl_slider_item">
                                                <!--  Start Posts Slider Post Article  -->
                                                <article id="post-85"
                                                         class="cmsmasters_slider_post post-85 post type-post status-publish format-image has-post-thumbnail hentry category-advice category-training post_format-post-format-image">
                                                    <div class="cmsmasters_slider_post_outer">
                                                        <figure class="cmsmasters_img_rollover_wrap preloader">
                                                            <img width="580" height="420"
                                                                 src="http://sports-store.cmsmasters.net/wp-content/uploads/2016/06/6-580x420.jpg"
                                                                 class="full-width wp-post-image"
                                                                 alt="6 Full-Body Stretching Exercises"
                                                                 title="6 Full-Body Stretching Exercises"><a
                                                                    href="http://sports-store.cmsmasters.net/2017/05/21/6-full-body-stretching-exercises/"
                                                                    title="6 Full-Body Stretching Exercises"
                                                                    class="cmsmasters_open_link"></a></figure>
                                                        <div class="cmsmasters_slider_post_info entry-meta">
                                                            <span class="cmsmasters_slider_post_date"><abbr
                                                                        class="published" title="May 21, 2017">May 21, 2017</abbr><abbr
                                                                        class="dn date updated" title="July 25, 2017">July 25, 2017</abbr></span>
                                                        </div>
                                                        <header class="cmsmasters_slider_post_header entry-header">
                                                            <h5 class="cmsmasters_slider_post_title entry-title">
                                                                <a href="http://sports-store.cmsmasters.net/2017/05/21/6-full-body-stretching-exercises/">6
                                                                    Full-Body Stretching Exercises</a></h5>
                                                        </header>
                                                    </div>
                                                </article>
                                                <!--  Finish Posts Slider Post Article  -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget widget-style-1 widget_has_bg">
            <div class="cmsmasters_row_outer_parent first">
            <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner">
            <div class="cmsmasters_row_margin cmsmasters_11">
            <div id="cmsmasters_column_05f09afbff" class="cmsmasters_column one_first">
            <div class="cmsmasters_column_inner"><div id="cmsmasters_heading_62feb823c3" class="cmsmasters_heading_wrap cmsmasters_heading_align_center">
                <h3 class="cmsmasters_heading">sign up for news &amp; get 15% off</h3>
            </div><div class="cmsmasters_text">
            <div style="text-align: center;"><span style="color: #606060;">Make sure you don’t miss interesting happenings by joining our newsletter program</span></div>
            </div>
            <div id="cmsmasters_divider_554599f41f" class="cl"></div>
            </div></div>
            </div>
            </div>
            </div>
            </div>
            <div class="cmsmasters_row_outer_parent">
            <div class="cmsmasters_row_outer">
            <div class="cmsmasters_row_inner cmsmasters_row_fullwidth">
            <div class="cmsmasters_row_margin cmsmasters_131313">
            <div id="cmsmasters_column_05fe8184b7" class="cmsmasters_column one_third">
            <div class="cmsmasters_column_inner"><div class="cmsmasters_mailpoet"><div class="cmsmasters_mailpoet_form"><div class="widget_wysija_cont shortcode_wysija"><div id="msg-form-wysija-shortcode5b6e498d1e34e-1" class="wysija-msg ajax"></div><form id="form-wysija-shortcode5b6e498d1e34e-1" method="post" action="#wysija" class="widget_wysija shortcode_wysija">
            <p class="wysija-paragraph">
                
                
                    <input type="text" name="wysija[user][email]" class="wysija-input validate[required,custom[email]]" title="Your Email" placeholder="Your Email" value="">
                
                
                
                <span class="abs-req">
                    <input type="text" name="wysija[user][abs][email]" class="wysija-input validated[abs][email]" value="">
                </span>
                
            </p>

            <input class="wysija-submit wysija-submit-field" type="submit" value="Subscribe!">

                <input type="hidden" name="form_id" value="1">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="controller" value="subscribers">
                <input type="hidden" value="1" name="wysija-page">

                
                    <input type="hidden" name="wysija[user_list][list_ids]" value="1">
                
             </form></div></div></div>
            </div></div>
            </div>
            </div>
            </div>
            </div>
        </div>

        <div class="widget widget-style-3">
            <div class="cmsmasters_row_outer_parent">
                <div class="cmsmasters_row_outer">
                    <div class="cmsmasters_row_inner">
                        <div class="cmsmasters_row_margin cmsmasters_11">
                            <div id="cmsmasters_column_f81fe74d87" class="cmsmasters_column one_first">
                                <div class="cmsmasters_column_inner">
                                    <div class="cmsmasters_clients_slider_wrap">
                                        <div id="cmsmasters_clients_28872e2dd6" class="cmsmasters_owl_slider owl-carousel cmsmasters_clients_slider owl-theme" data-items="4" data-single-item="false" data-auto-play="5000" data-slide-speed="1000" data-pagination-speed="1000" data-pagination="false" data-navigation="false" style="opacity: 1; display: block;">
                                            <div class="owl-item active" style="width: 220px;">
                                                <div class="cmsmasters_clients_item item cmsmasters_owl_slider_item">
                                                    <img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/44.png" alt="kontakt" title="kontakt">
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 220px;">
                                                <div class="cmsmasters_clients_item item cmsmasters_owl_slider_item">
                                                    <img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/5-1.png" alt="viking" title="viking">
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 220px;">
                                                <div class="cmsmasters_clients_item item cmsmasters_owl_slider_item">
                                                    <img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/2.png" alt="Iron Heart" title="Iron Heart">
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 220px;">
                                                <div class="cmsmasters_clients_item item cmsmasters_owl_slider_item">
                                                    <img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/3-1.png" alt="Sportmaster" title="Sportmaster">
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 220px;">
                                                <div class="cmsmasters_clients_item item cmsmasters_owl_slider_item">
                                                    <img src="http://sports-store.cmsmasters.net/wp-content/uploads/2015/11/1.png" alt="brown" title="brown">
                                                </div>
                                            </div>
                                        </div>
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
