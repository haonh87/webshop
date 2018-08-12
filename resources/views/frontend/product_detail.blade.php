@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div id="content">
        @include('frontend.slider')
        <div class="content_wrap fullwidth">
            <div class="middle_content entry">
            <div id="product-13483" class="post-13483 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts first instock shipping-taxable purchasable product-type-variable">
                <div class="cmsmasters_single_product">
                    <div class="cmsmasters_product_left_column">
                        <div class="images">

                            <div class="yith_magnifier_zoom_wrap"><div class="yith_magnifier_zoom_wrap"><div class="yith_magnifier_zoom_wrap"><div class="yith_magnifier_zoom_wrap">
                                            <a href="{{ asset('images/'. $product->productImages[0]->img_path) }}" itemprop="image" class="yith_magnifier_zoom woocommerce-main-image" title="Men’s Sport Quick Dry T-Shirt Grey-1">
                                                <img width="600" height="600" src="{{ asset('images/'. $product->productImages[0]->img_path) }}" class="attachment-shop_single size-shop_single wp-post-image" alt="" srcset="{{ asset('images/'. $product->productImages[0]->img_path) }}" sizes="(max-width: 600px) 100vw, 600px" src-orig="{{ asset('images/'. $product->productImages[0]->img_path) }}">
                                            </a>
                                            <div class="yith_magnifier_mousetrap" style="width: 100%; height: 100%; top: 0px; left: 0px; cursor: pointer;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="thumbnails slider">
                                <div class="caroufredsel_wrapper" style="display: block; text-align: left; float: none; position: relative; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: auto; width: 495px; height: 110px; margin: 0px; overflow: hidden;">
                                    <ul class="yith_magnifier_gallery" style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 1485px; height: 110px;">
                                        @if (count($product->productImages) > 1)
                                            @foreach($product->productImages as $key => $productImage)
                                                @if ($key > 0)
                                                    <li class="yith_magnifier_thumbnail first" style="width: 155px;">
                                                        <a href="{{ asset('images/'. $product->productImages[$key]->img_path) }}" class="yith_magnifier_thumbnail first" title="Men’s Sport Quick Dry T-Shirt Grey-1" data-small="{{ asset('images/'. $product->productImages[$key]->img_path) }}">
                                                            <img width="100" height="100" src="{{ asset('images/'. $product->productImages[$key]->img_path) }}" alt="" sizes="(max-width: 100px) 100vw, 100px">
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div id="slider-prev" class="hidden" style="display: none;"></div>
                                <div id="slider-next" class="hidden" style="display: none;"></div>
                            </div>

                        </div>


                        <script type="text/javascript" charset="utf-8">
                            var yith_magnifier_options = {

                                enableSlider: true,

                                sliderOptions: {
                                    responsive: true,
                                    circular: true,
                                    infinite: true,
                                    direction: 'left',
                                    debug: false,
                                    auto: false,
                                    align: 'left',
                                    prev: {
                                        button: "#slider-prev",
                                        key: "left"
                                    },
                                    next: {
                                        button: "#slider-next",
                                        key: "right"
                                    },
                                    //width   : 618,
                                    scroll: {
                                        items: 1,
                                        pauseOnHover: true
                                    },
                                    items: {
                                        //width: 104,
                                        visible: 3			}
                                },


                                showTitle: false,
                                zoomWidth: 'auto',
                                zoomHeight: 'auto',
                                position: 'right',
                                //tint: ,
                                //tintOpacity: ,
                                lensOpacity: 0.5,
                                softFocus: false,
                                //smoothMove: ,
                                adjustY: 0,
                                disableRightClick: false,
                                phoneBehavior: 'inside',
                                loadingLabel: 'Loading...',
                                zoom_wrap_additional_css: ''
                            };
                        </script>		</div>
                    <div class="summary entry-summary cmsmasters_product_right_column">
                        <div class="cmsmasters_product_title_info_wrap">
                            <h1 class="product_title entry-title">{{ $product->name }}</h1>
                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated 5.00 out of 5">
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
                            <p class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">VND</span></span>{{ \App\Helpers\listItemHelper::convertNumber($product->price, 2)  }}</span></p>
                        </div>
                        <div class="cmsmasters_product_content">
                            <div class="woocommerce-product-details__short-description">
                                {!! $product->content !!}
                            </div>
                        </div>

                        <form class="variations_form cart initialized" action="http://sports-store.cmsmasters.net/product/mens-sport-quick-dry-t-shirt-grey/" method="post" enctype="multipart/form-data" style="display: block;" current-image="13487">

                            <table class="variations" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td class="label"><label for="pa_colors">Colors</label></td>
                                    <td class="value">
                                        <select id="pa_colors" style="width: 200px;" class="yith_wccl_custom" name="attribute_pa_colors" data-attribute_name="attribute_pa_colors" data-show_option_none="yes" data-default_value="grey">
                                            <option value="">Any Colors</option>
                                            @foreach($colors as $key => $color)
                                                <option value="{{ $key }}">{{ $color }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="pa_size">Size</label></td>
                                    <td class="value">
                                        <select id="pa_size" style="width: 200px;" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes" data-default_value="m">
                                            <option value="">Any Size</option>
                                            @foreach($sizes as $key => $size)
                                                <option value="{{ $key }}">{{ $size }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="single_variation_wrap">
                                <div class="woocommerce-variation single_variation" style="display: none;">
                                    <div class="woocommerce-variation-description"></div>
                                    <div class="woocommerce-variation-price"></div>
                                    <div class="woocommerce-variation-availability"></div>
                                </div><div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">

                                    <div class="quantity">
                                        <label class="screen-reader-text" for="quantity_5b6f9b0e5a68e">Quantity</label>
                                        <input type="number" id="quantity_5b6f9b0e5a68e" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="">
                                    </div>

                                    <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>


                                    <input type="hidden" name="add-to-cart" value="13483">
                                    <input type="hidden" name="product_id" value="13483">
                                    <input type="hidden" name="variation_id" class="variation_id" value="13495">
                                </div>
                            </div>

                        </form>

                        <div class="product_meta">



                            <span class="sku_wrapper"><span class="product_meta_title">SKU: </span><span class="sku" data-o_content="N/A">{{ $product->model_ids }}</span></span>


                            <span class="posted_in"><span class="product_meta_title">Categories:</span>
                                <span class="product_meta_info">
                                    <a href="{{ route('product.list', ['category' => $product->category->name]) }}" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">{{
                                    $product->category->name
                                    }}</a>
                                </span>
                            </span>

                        </div>
                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-13483">
                            <div class="yith-wcwl-add-button show" style="display:block">


                                <a href="/product/mens-sport-quick-dry-t-shirt-grey/?add_to_wishlist=13483" rel="nofollow" data-product-id="13483" data-product-type="variable" class="add_to_wishlist">
                                    Add to Wishlist</a>
                                <img src="http://sports-store.cmsmasters.net/wp-content/plugins/yith-woocommerce-wishlist-premium/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="http://sports-store.cmsmasters.net/wishlist/" rel="nofollow">
                                    Browse Wishlist	        </a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="http://sports-store.cmsmasters.net/wishlist/" rel="nofollow">
                                    Browse Wishlist	        </a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>

                        </div>

                        <div class="clear"></div><aside class="share_posts">

                            <div class="share_posts_inner">
                                <a href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u=http%3A%2F%2Fsports-store.cmsmasters.net%2Fproduct%2Fmens-sport-quick-dry-t-shirt-grey%2F">Facebook</a>
                                <a href="https://plus.google.com/share?url=http%3A%2F%2Fsports-store.cmsmasters.net%2Fproduct%2Fmens-sport-quick-dry-t-shirt-grey%2F">Google+</a>
                                <a href="https://twitter.com/intent/tweet?text=Check+out+%27Men%E2%80%99s+Sport+Quick+Dry+T-Shirt+Grey%27+on+Sports+Store+website&amp;url=http%3A%2F%2Fsports-store.cmsmasters.net%2Fproduct%2Fmens-sport-quick-dry-t-shirt-grey%2F">Twitter</a>
                                <a href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2Fsports-store.cmsmasters.net%2Fproduct%2Fmens-sport-quick-dry-t-shirt-grey%2F&amp;media=http%3A%2F%2Fsports-store.cmsmasters.net%2Fwp-content%2Fuploads%2F2017%2F05%2F1-6.jpg&amp;description=Men’s Sport Quick Dry T-Shirt Grey">Pinterest</a>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="cmsmasters_tabs tabs_mode_tab cmsmasters_woo_tabs">
                    <ul class="cmsmasters_tabs_list">
                        <li class="description_tab cmsmasters_tabs_list_item current_tab">
                            <a href="#tab-description">
                                <span>Description</span>
                            </a>
                        </li>
                        <li class="additional_information_tab cmsmasters_tabs_list_item">
                            <a href="#tab-additional_information">
                                <span>Additional information</span>
                            </a>
                        </li>
                        <li class="reviews_tab cmsmasters_tabs_list_item">
                            <a href="#tab-reviews">
                                <span>Reviews (1)</span>
                            </a>
                        </li>
                    </ul>
                    <div class="cmsmasters_tabs_wrap">
                        <div class="entry-content cmsmasters_tab active_tab" id="tab-description">
                            <div class="cmsmasters_tab_inner">

                                <h2>Description</h2>

                                <p>US S(165-170cm 60kg-65kg) (5’5″–5’7″ 133–144lbs)<br>
                                    US M(170-175cm 65kg-70kg) (5’7″-5’9″ 144-155lbs)<br>
                                    US L(175-180cm70kg-75kg) (5’9″-5’11″155-166lbs)<br>
                                    US XL(180-185cm 75kg-80kg) (5’11”-6’1″ 166-177lbs)</p>
                            </div>
                        </div>
                        <div class="entry-content cmsmasters_tab" id="tab-additional_information">
                            <div class="cmsmasters_tab_inner">

                                <h2>Additional information</h2>

                                <table class="shop_attributes">


                                    <tbody><tr>
                                        <th>Colors</th>
                                        <td><p>Grey, Orange</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td><p>M, L, XL, XXL</p>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="entry-content cmsmasters_tab" id="tab-reviews">
                            <div class="cmsmasters_tab_inner">
                                <div id="reviews">
                                    <div id="comments" class="post_comments cmsmasters_woo_comments">
                                        <h2 class="post_comments_title">1 review for <span>Men’s Sport Quick Dry T-Shirt Grey</span></h2>


                                        <ol class="commentlist">
                                            <li itemprop="review" itemscope="" itemtype="http://schema.org/Review" class="comment byuser comment-author-cmsmasters bypostauthor even thread-even depth-1" id="li-comment-25">
                                                <div id="comment-25" class="comment_container cmsmasters_comment_item">
                                                    <figure class="cmsmasters_comment_item_avatar">
                                                        <img alt="" src="http://0.gravatar.com/avatar/cec22fb290043e2c1b9972d9bc2f0cfb?s=70&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/cec22fb290043e2c1b9972d9bc2f0cfb?s=140&amp;d=mm&amp;r=g 2x" class="avatar avatar-70 photo" height="70" width="70">		</figure>
                                                    <div class="comment-text cmsmasters_comment_item_cont">
                                                        <div class="cmsmasters_comment_item_cont_info">
                                                            <h5 class="cmsmasters_comment_item_title" itemprop="author">cmsmasters</h5>

                                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/Rating" title="Rated 5 out of 5">
                                                                <div class="cmsmasters_star_trans_wrap">
                                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                                </div>
                                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                                    <div class="cmsmasters_star_color_inner">
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                    </div>
                                                                </div>
                                                                <span class="rating dn"><strong itemprop="ratingValue">5</strong> out of 5</span>
                                                            </div>
                                                            <time class="cmsmasters_comment_item_date" itemprop="datePublished" datetime="May 27, 2017">May 27, 2017</time>
                                                        </div>
                                                        <div itemprop="description" class="description cmsmasters_comment_item_content">
                                                            <p>Excellent Quality for a Good price.</p>
                                                            <div class="star-rating"><span style="width:100%">Rated <strong class="rating">5</strong> out of 5</span></div>			</div>
                                                    </div>
                                                </div>
                                            </li><!-- #comment-## -->
                                        </ol>


                                    </div>


                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <h3 id="reply-title" class="comment-reply-title">Add a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="/product/mens-sport-quick-dry-t-shirt-grey/#respond" style="display:none;">Cancel reply</a></small></h3>			<form action="http://sports-store.cmsmasters.net/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-form-rating"><label for="rating">Your Rating</label><p class="stars"><span><a class="star-1" href="#">1</a><a class="star-2" href="#">2</a><a class="star-3" href="#">3</a><a class="star-4" href="#">4</a><a class="star-5" href="#">5</a></span></p><select name="rating" id="rating" style="display: none;">
                                                        <option value="">Rate…</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very Poor</option>
                                                    </select></p><p class="comment-form-comment"><textarea name="comment" id="comment" cols="67" rows="2" placeholder="Your Review"></textarea></p><p class="comment-form-author">
                                                        <input type="text" id="author" name="author" value="" size="35" aria-required="true" placeholder="Name *">
                                                    </p>

                                                    <p class="comment-form-email">
                                                        <input type="text" id="email" name="email" value="" size="35" aria-required="true" placeholder="Email *">
                                                    </p>

                                                    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Submit"> <input type="hidden" name="comment_post_ID" value="13483" id="comment_post_ID">
                                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                                    </p><p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="1a8fbcb0c6"></p><p style="display: none;"></p>			<input type="hidden" id="ak_js" name="ak_js" value="1534040845788"></form>
                                            </div><!-- #respond -->
                                        </div>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <section class="related products">

                    <h2>Related products</h2>

                    <div class="cmsmasters_products_wrap">
                        <ul class="products columns-4 cmsmasters_products">

                            <li class="post-13604 product type-product status-publish has-post-thumbnail product_cat-tools-for-fitness product_tag-fitness product_tag-sports product_tag-tools first instock shipping-taxable purchasable product-type-simple">
                                <article class="cmsmasters_product">
                                    <figure class="cmsmasters_product_img">
                                        <a href="http://sports-store.cmsmasters.net/product/ankle-wrist-weight-set/">
                                            <img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-14-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px"><img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-580x580.jpg" class="attachment-shop_catalog size-shop_catalog" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-14-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px">			</a>
                                        <div class="button_to_cart_wrap"><a rel="nofollow" href="/product/mens-sport-quick-dry-t-shirt-grey/?add-to-cart=13604" data-quantity="1" data-product_id="13604" data-product_sku="" class="button product_type_simple add_to_cart_button cmsmasters_add_to_cart_button ajax_add_to_cart">Add to cart</a></div>		</figure>
                                    <div class="cmsmasters_product_inner">
                                        <div class="cmsmasters_product_features"><a href="#" class="cmsmasters_quick_view_button yith-wcqv-button empty cmsmasters_theme_icon_quick_view button" data-product_id="13604" title="Quick View"></a><a href="/product/mens-sport-quick-dry-t-shirt-grey/?action=asd&amp;id=13604" class="compare button cmsmasters_compare_btn" data-product_id="13604" rel="nofollow" title="Compare">Compare</a><div class="cmsmasters_add_wishlist_button add-to-wishlist-13604"><div class="yith-wcwl-add-button show" style="display:block"><a href="/product/mens-sport-quick-dry-t-shirt-grey/?add_to_wishlist=13604" rel="nofollow" data-product-id="13604" data-product-type="simple" class="button cmsmasters_theme_icon_wishlist add_to_wishlist" title="Wishlist"></a><img src="http://sports-store.cmsmasters.net/wp-content/themes/sports-store/woocommerce/cmsmasters-framework/theme-style/yith-woocommerce-wishlist/img/loader.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"></div><div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div><div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div></div></div>			<header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="http://sports-store.cmsmasters.net/product/ankle-wrist-weight-set/">Ankle / Wrist Weight Set</a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta"><a href="http://sports-store.cmsmasters.net/product-category/tools-for-fitness/" class="cmsmasters_cat_color cmsmasters_cat_88" rel="category tag">Tools for Fitness</a></div>			<div class="cmsmasters_product_info">

                                            <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>15.00</span></span>

                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated 5.00 out of 5">
                                                <div class="cmsmasters_star_trans_wrap">
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                </div>
                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                    <div class="cmsmasters_star_color_inner">
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                    </div>
                                                </div>
                                                <span class="rating dn"><strong itemprop="ratingValue">5.00</strong> out of 5</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>

                            <li class="post-13600 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-for-women product_cat-unisex product_tag-bag product_tag-fitness product_tag-sports product_tag-unisex instock shipping-taxable purchasable product-type-simple">
                                <article class="cmsmasters_product">
                                    <figure class="cmsmasters_product_img">
                                        <a href="http://sports-store.cmsmasters.net/product/team-issue-duffel-bag/">
                                            <img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-13-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px"><img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-580x580.jpg" class="attachment-shop_catalog size-shop_catalog" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-12-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px">			</a>
                                        <div class="button_to_cart_wrap"><a rel="nofollow" href="/product/mens-sport-quick-dry-t-shirt-grey/?add-to-cart=13600" data-quantity="1" data-product_id="13600" data-product_sku="" class="button product_type_simple add_to_cart_button cmsmasters_add_to_cart_button ajax_add_to_cart">Add to cart</a></div>		</figure>
                                    <div class="cmsmasters_product_inner">
                                        <div class="cmsmasters_product_features"><a href="#" class="cmsmasters_quick_view_button yith-wcqv-button empty cmsmasters_theme_icon_quick_view button" data-product_id="13600" title="Quick View"></a><a href="/product/mens-sport-quick-dry-t-shirt-grey/?action=asd&amp;id=13600" class="compare button cmsmasters_compare_btn" data-product_id="13600" rel="nofollow" title="Compare">Compare</a><div class="cmsmasters_add_wishlist_button add-to-wishlist-13600"><div class="yith-wcwl-add-button show" style="display:block"><a href="/product/mens-sport-quick-dry-t-shirt-grey/?add_to_wishlist=13600" rel="nofollow" data-product-id="13600" data-product-type="simple" class="button cmsmasters_theme_icon_wishlist add_to_wishlist" title="Wishlist"></a><img src="http://sports-store.cmsmasters.net/wp-content/themes/sports-store/woocommerce/cmsmasters-framework/theme-style/yith-woocommerce-wishlist/img/loader.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"></div><div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div><div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div></div></div>			<header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="http://sports-store.cmsmasters.net/product/team-issue-duffel-bag/">Team Issue Duffel Bag</a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta"><a href="http://sports-store.cmsmasters.net/product-category/for-men/" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">For Men</a>, <a href="http://sports-store.cmsmasters.net/product-category/for-women/" class="cmsmasters_cat_color cmsmasters_cat_82" rel="category tag">For Women</a>, <a href="http://sports-store.cmsmasters.net/product-category/unisex/" class="cmsmasters_cat_color cmsmasters_cat_75" rel="category tag">Unisex</a></div>			<div class="cmsmasters_product_info">

                                            <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>36.00</span></span>

                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated 5.00 out of 5">
                                                <div class="cmsmasters_star_trans_wrap">
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                </div>
                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                    <div class="cmsmasters_star_color_inner">
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                    </div>
                                                </div>
                                                <span class="rating dn"><strong itemprop="ratingValue">5.00</strong> out of 5</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>

                            <li class="post-13410 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts instock shipping-taxable purchasable product-type-variable">
                                <article class="cmsmasters_product">
                                    <figure class="cmsmasters_product_img">
                                        <a href="http://sports-store.cmsmasters.net/product/cotton-short-sleeve-t-shirt/">
                                            <img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px" data-lazy-src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1.jpg" data-lazy-srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/2-1-180x180.jpg 180w"><img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-580x580.jpg" class="attachment-shop_catalog size-shop_catalog" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-1-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px">			</a>
                                        <div class="button_to_cart_wrap"><a rel="nofollow" href="http://sports-store.cmsmasters.net/product/cotton-short-sleeve-t-shirt/" data-quantity="1" data-product_id="13410" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Add to cart</a></div>		</figure>
                                    <div class="cmsmasters_product_inner">
                                        <div class="cmsmasters_product_features">
                                            <div class="variations_form cart in_loop initialized" data-product_id="13410" data-product_variations="[{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;turquoise&quot;,&quot;attribute_pa_size&quot;:&quot;xl&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:35,&quot;display_regular_price&quot;:35,&quot;image&quot;:{&quot;title&quot;:&quot;Cotton Short-Sleeve T-Shirt-2&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13418&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;100&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13420,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;turquoise&quot;,&quot;attribute_pa_size&quot;:&quot;m&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:35,&quot;display_regular_price&quot;:35,&quot;image&quot;:{&quot;title&quot;:&quot;Cotton Short-Sleeve T-Shirt-2&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13418&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;101&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13421,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;turquoise&quot;,&quot;attribute_pa_size&quot;:&quot;l&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:35,&quot;display_regular_price&quot;:35,&quot;image&quot;:{&quot;title&quot;:&quot;Cotton Short-Sleeve T-Shirt-2&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/2-1.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13418&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;102&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13422,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;}]" style="display: block;" current-image="13418">
                                                <div class="variations pa_colors">
                                                    <select id="pa_colors" name="attribute_pa_colors" data-attribute_name="attribute_pa_colors" data-type="colorpicker" data-default_value="turquoise" class="yith_wccl_custom" style="display: none;">
                                                        <option value="">Choose an option…</option>
                                                        <option value="turquoise" data-value="#98e7fa" data-tooltip="" class="attached enabled">Turquoise</option>						</select><div class="select_box_colorpicker select_box attribute_pa_colors"><div class="select_option_colorpicker select_option selected" data-value="turquoise"><span class="yith_wccl_value" style="background: rgb(152, 231, 250);"></span></div></div>
                                                </div>
                                            </div>

                                            <a href="#" class="cmsmasters_quick_view_button yith-wcqv-button empty cmsmasters_theme_icon_quick_view button" data-product_id="13410" title="Quick View"></a><a href="/product/mens-sport-quick-dry-t-shirt-grey/?action=asd&amp;id=13410" class="compare button cmsmasters_compare_btn" data-product_id="13410" rel="nofollow" title="Compare">Compare</a><div class="cmsmasters_add_wishlist_button add-to-wishlist-13410"><div class="yith-wcwl-add-button show" style="display:block"><a href="/product/mens-sport-quick-dry-t-shirt-grey/?add_to_wishlist=13410" rel="nofollow" data-product-id="13410" data-product-type="variable" class="button cmsmasters_theme_icon_wishlist add_to_wishlist" title="Wishlist"></a><img src="http://sports-store.cmsmasters.net/wp-content/themes/sports-store/woocommerce/cmsmasters-framework/theme-style/yith-woocommerce-wishlist/img/loader.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"></div><div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div><div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div></div></div>			<header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="http://sports-store.cmsmasters.net/product/cotton-short-sleeve-t-shirt/">Cotton Short-Sleeve T-Shirt</a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta"><a href="http://sports-store.cmsmasters.net/product-category/for-men/" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">For Men</a>, <a href="http://sports-store.cmsmasters.net/product-category/t-shirts/" class="cmsmasters_cat_color cmsmasters_cat_91" rel="category tag">T-shirts</a></div>			<div class="cmsmasters_product_info">

                                            <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>35.00</span></span>

                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated 5.00 out of 5">
                                                <div class="cmsmasters_star_trans_wrap">
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                </div>
                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                    <div class="cmsmasters_star_color_inner">
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                    </div>
                                                </div>
                                                <span class="rating dn"><strong itemprop="ratingValue">5.00</strong> out of 5</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>

                            <li class="post-13641 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts last instock shipping-taxable purchasable product-type-variable">
                                <article class="cmsmasters_product">
                                    <figure class="cmsmasters_product_img">
                                        <a href="http://sports-store.cmsmasters.net/product/mens-long-sleeve-t-shirt/">
                                            <img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px" data-lazy-src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17.jpg" data-lazy-srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/3-17-180x180.jpg 180w"><img width="540" height="540" src="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-580x580.jpg" class="attachment-shop_catalog size-shop_catalog" alt="" srcset="http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-580x580.jpg 580w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-150x150.jpg 150w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-300x300.jpg 300w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18.jpg 600w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-70x70.jpg 70w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-360x360.jpg 360w, http://sports-store.cmsmasters.net/wp-content/uploads/2017/05/1-18-180x180.jpg 180w" sizes="(max-width: 540px) 100vw, 540px">			</a>
                                        <div class="button_to_cart_wrap"><a rel="nofollow" href="http://sports-store.cmsmasters.net/product/mens-long-sleeve-t-shirt/" data-quantity="1" data-product_id="13641" data-product_sku="" class="button product_type_variable add_to_cart_button cmsmasters_add_to_cart_button">Add to cart</a></div>		</figure>
                                    <div class="cmsmasters_product_inner">
                                        <div class="cmsmasters_product_features">
                                            <div class="variations_form cart in_loop initialized" data-product_id="13641" data-product_variations="[{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;grey&quot;,&quot;attribute_pa_size&quot;:&quot;xxl&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:25,&quot;display_regular_price&quot;:25,&quot;image&quot;:{&quot;title&quot;:&quot;Men\u2019s Long Sleeve T-Shirt-3&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13647&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;180&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13649,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;grey&quot;,&quot;attribute_pa_size&quot;:&quot;xl&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:25,&quot;display_regular_price&quot;:25,&quot;image&quot;:{&quot;title&quot;:&quot;Men\u2019s Long Sleeve T-Shirt-3&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13647&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;181&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13650,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;grey&quot;,&quot;attribute_pa_size&quot;:&quot;m&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:25,&quot;display_regular_price&quot;:25,&quot;image&quot;:{&quot;title&quot;:&quot;Men\u2019s Long Sleeve T-Shirt-3&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13647&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;182&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13651,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_colors&quot;:&quot;grey&quot;,&quot;attribute_pa_size&quot;:&quot;l&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:25,&quot;display_regular_price&quot;:25,&quot;image&quot;:{&quot;title&quot;:&quot;Men\u2019s Long Sleeve T-Shirt-3&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;alt&quot;:&quot;&quot;,&quot;src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;srcset&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg 600w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg 150w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-300x300.jpg 300w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-70x70.jpg 70w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-360x360.jpg 360w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-580x580.jpg 580w, http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-180x180.jpg 180w&quot;,&quot;sizes&quot;:&quot;(max-width: 600px) 100vw, 600px&quot;,&quot;full_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;full_src_w&quot;:600,&quot;full_src_h&quot;:600,&quot;gallery_thumbnail_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17-150x150.jpg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;http:\/\/sports-store.cmsmasters.net\/wp-content\/uploads\/2017\/05\/3-17.jpg&quot;,&quot;thumb_src_w&quot;:540,&quot;thumb_src_h&quot;:540,&quot;src_w&quot;:600,&quot;src_h&quot;:600},&quot;image_id&quot;:&quot;13647&quot;,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;183&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:13652,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;,&quot;image_magnifier&quot;:&quot;&quot;}]" current-image="13647" style="display: block;">
                                                <div class="variations pa_colors">
                                                    <select id="pa_colors" name="attribute_pa_colors" data-attribute_name="attribute_pa_colors" data-type="colorpicker" data-default_value="grey" class="yith_wccl_custom" style="display: none;">
                                                        <option value="">Choose an option…</option>
                                                        <option value="grey" data-value="#786e6e" data-tooltip="" class="attached enabled">Grey</option>						</select><div class="select_box_colorpicker select_box attribute_pa_colors"><div class="select_option_colorpicker select_option selected" data-value="grey"><span class="yith_wccl_value" style="background: rgb(120, 110, 110);"></span></div></div>
                                                </div>
                                            </div>

                                            <a href="#" class="cmsmasters_quick_view_button yith-wcqv-button empty cmsmasters_theme_icon_quick_view button" data-product_id="13641" title="Quick View"></a><a href="/product/mens-sport-quick-dry-t-shirt-grey/?action=asd&amp;id=13641" class="compare button cmsmasters_compare_btn" data-product_id="13641" rel="nofollow" title="Compare">Compare</a><div class="cmsmasters_add_wishlist_button add-to-wishlist-13641"><div class="yith-wcwl-add-button show" style="display:block"><a href="/product/mens-sport-quick-dry-t-shirt-grey/?add_to_wishlist=13641" rel="nofollow" data-product-id="13641" data-product-type="variable" class="button cmsmasters_theme_icon_wishlist add_to_wishlist" title="Wishlist"></a><img src="http://sports-store.cmsmasters.net/wp-content/themes/sports-store/woocommerce/cmsmasters-framework/theme-style/yith-woocommerce-wishlist/img/loader.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden"></div><div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div><div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none"><a href="http://sports-store.cmsmasters.net/wishlist/" class="button browse_wishlist cmsmasters_theme_icon_wishlist" rel="nofollow" title="Wishlist"></a></div></div></div>			<header class="cmsmasters_product_header entry-header">
                                            <h5 class="cmsmasters_product_title entry-title">
                                                <a href="http://sports-store.cmsmasters.net/product/mens-long-sleeve-t-shirt/">Men’s Long Sleeve T-Shirt</a>
                                            </h5>
                                        </header>
                                        <div class="cmsmasters_product_cat entry-meta"><a href="http://sports-store.cmsmasters.net/product-category/for-men/" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">For Men</a>, <a href="http://sports-store.cmsmasters.net/product-category/t-shirts/" class="cmsmasters_cat_color cmsmasters_cat_91" rel="category tag">T-shirts</a></div>			<div class="cmsmasters_product_info">

                                            <span class="price"><span class="woocommerce-Price-amount amount"><span><span class="woocommerce-Price-currencySymbol">£</span></span>25.00</span></span>

                                            <div class="cmsmasters_star_rating" itemscope="" itemtype="http://schema.org/AggregateRating" title="Rated 5.00 out of 5">
                                                <div class="cmsmasters_star_trans_wrap">
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                    <span class="cmsmasters_theme_icon_star_empty cmsmasters_star"></span>
                                                </div>
                                                <div class="cmsmasters_star_color_wrap" style="width:100%">
                                                    <div class="cmsmasters_star_color_inner">
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                    </div>
                                                </div>
                                                <span class="rating dn"><strong itemprop="ratingValue">5.00</strong> out of 5</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>

                        </ul>
                    </div>

                </section>

            </div>
        </div>
        </div>
    </div>
@stop
