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
                                        <td>
                                            <p>
                                            @if (!empty($product->product_color_ids))
                                            @php
                                                $idColors = explode(',', $product->product_color_ids);
                                            @endphp
                                            @foreach ($idColors as $key => $idColor)
                                                @if ($key != count($idColors) - 1)
                                                    {{ $colors[$idColor]. ',' }}
                                                @else
                                                    {{ $colors[$idColor] }}
                                                @endif
                                            @endforeach
                                            @endif
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Size</th>
                                        <td>
                                            <p>
                                                @if (!empty($product->product_size_ids))
                                                    @php
                                                        $idSizes = explode(',', $product->product_size_ids);
                                                    @endphp
                                                    @foreach ($idSizes as $key => $idSize)
                                                        @if ($key != count($idSizes) - 1)
                                                            {{ $sizes[$idSize]. ',' }}
                                                        @else
                                                            {{ $sizes[$idSize] }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </p>
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
                            @foreach($relateProducts as $product)
                                <li class="post-13483 product type-product status-publish has-post-thumbnail product_cat-for-men product_cat-t-shirts product_tag-clothing product_tag-men product_tag-sports product_tag-t-shirts first instock shipping-taxable purchasable product-type-variable">
                                    <article class="cmsmasters_product">
                                        <figure class="cmsmasters_product_img">
                                            <a href="http://sports-store.cmsmasters.net/product/mens-sport-quick-dry-t-shirt-grey/">
                                                @foreach($product->productImages as $key => $productImage)
                                                    @if ($key < 2)
                                                        <img width="540" height="540" src="{{ asset('images/' .$productImage->img_path) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image">
                                                    @endif
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

                </section>

            </div>
        </div>
        </div>
    </div>
@stop
