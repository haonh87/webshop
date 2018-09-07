@extends('layouts.master')
@section('script')
    <script>
        jQuery(document).on('click', '.rating span', function () {
            var rateNumber = jQuery(this).attr('data-value');
            jQuery('.rating-number').val(rateNumber);
            jQuery('.rating span').removeClass('active');
            jQuery('.rating span').each(function (index) {
                if (jQuery(this).attr('data-value') <= rateNumber) {
                    jQuery(this).addClass('active');
                }
            })
        });
    </script>
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Chi tiết sản phẩm'])
        @include('frontend.message')
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
                                <div class="caroufredsel_wrapper">
                                    <ul class="yith_magnifier_gallery">
                                        @if (count($product->productImages) > 1)
                                            @foreach($product->productImages as $key => $productImage)
                                                @if ($key > 0)
                                                    <li class="yith_magnifier_thumbnail first" style="width: 155px;">
                                                        <a href="{{ asset('images/'. $product->productImages[$key]->img_path) }}" class="yith_magnifier_thumbnail first" title="Men’s Sport Quick Dry T-Shirt Grey-1" data-small="{{ asset('images/'. $product->productImages[$key]->img_path) }}">
                                                            <img src="{{ asset('images/'. $product->productImages[$key]->img_path) }}" alt="" sizes="(max-width: 100px) 100vw, 100px">
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

                        <form class="variations_form cart initialized" action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data" style="display: block;">
                            {{ csrf_field() }}
                            <table class="variations" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td class="label"><label for="pa_colors">Màu sắc</label></td>
                                    <td class="value">
                                        <select id="pa_colors" style="width: 200px;" class="yith_wccl_custom" name="attribute_pa_color" data-attribute_name="attribute_pa_colors" data-show_option_none="yes" data-default_value="grey">
                                            @if (!empty($product->product_color_ids))
                                            @php
                                                $idColors = explode(',', $product->product_color_ids);
                                            @endphp
                                            @foreach ($idColors as $key => $idColor)
                                                <option value="{{ $idColor }}">{{ $colors[$idColor] }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><label for="pa_size">Kích cỡ</label></td>
                                    <td class="value">
                                        <select id="pa_size" style="width: 200px;" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size" data-show_option_none="yes" data-default_value="m">
                                            @if (!empty($product->product_size_ids))
                                                @php
                                                    $idSizes = explode(',', $product->product_size_ids);
                                                @endphp
                                                @foreach ($idSizes as $key => $idSize)
                                                    <option value="{{ $idSize }}">{{ $sizes[$idSize] }}</option>
                                                @endforeach
                                            @endif
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

                                    <button type="submit" class="single_add_to_cart_button button alt">
                                        @php
                                        $checkAddCart = 'Thêm Giỏ Hàng';
                                        @endphp
                                        @if(count($cartShare) > 0)
                                            @foreach($cartShare as $cart)
                                                @if($cart->id == $product->id)
                                                    @php
                                                    $checkAddCart = 'Đã Thêm Giỏ Hàng';
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        {{ $checkAddCart }}
                                    </button>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <input type="hidden" name="product_image" value="{{ $product->productImages[0]->img_path }}">
                                </div>
                            </div>

                        </form>

                        <div class="product_meta">



                            <span class="sku_wrapper"><span class="product_meta_title">Mã: </span><span class="sku" data-o_content="N/A">{{ $product->model_ids }}</span></span>


                            <span class="posted_in"><span class="product_meta_title">Danh muc:</span>
                                <span class="product_meta_info">
                                    <a href="{{ route('product.list', ['category' => $product->category->name]) }}" class="cmsmasters_cat_color cmsmasters_cat_81" rel="category tag">{{
                                    $product->category->name
                                    }}</a>
                                </span>
                            </span>

                        </div>

                        <div class="clear"></div><aside class="share_posts">

                            <div class="share_posts_inner">
                                <a href="https://www.facebook.com/sharer/sharer.php?display=popup&amp;u={{ route('product.show', ['product' => $product->id]) }}">Facebook</a>
                                <a href="https://plus.google.com/share?url={{ route('product.show', ['product' => $product->id]) }}">Google+</a>
                                <a href="https://twitter.com/intent/tweet?text=Check+out+%27Men%E2%80%99s+Sport+Quick+Dry+T-Shirt+Grey%27+on+Sports+Store+website&amp;url={{ route('product.show', ['product' => $product->id]) }}">Twitter</a>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="cmsmasters_tabs tabs_mode_tab cmsmasters_woo_tabs">
                    <ul class="cmsmasters_tabs_list">
                        <li class="description_tab cmsmasters_tabs_list_item current_tab">
                            <a href="#tab-description">
                                <span>Mô Tả</span>
                            </a>
                        </li>
                        <li class="additional_information_tab cmsmasters_tabs_list_item">
                            <a href="#tab-additional_information">
                                <span>Thông tin sản phẩm</span>
                            </a>
                        </li>
                        <li class="reviews_tab cmsmasters_tabs_list_item">
                            <a href="#tab-reviews">
                                <span>Đánh giá</span>
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
                                    @if (count($productVotes) > 0)
                                    <div id="comments" class="post_comments cmsmasters_woo_comments">
                                        <h2 class="post_comments_title">{{ count($productVotes) }} Đánh giá cho <span>{{ $product->name }}</span></h2>
                                        <ol class="commentlist">
                                            @foreach($productVotes as $productVote)
                                            <li itemprop="review" itemscope="" itemtype="http://schema.org/Review" class="comment byuser comment-author-cmsmasters bypostauthor even thread-even depth-1" id="li-comment-25">
                                                <div id="comment-25" class="comment_container cmsmasters_comment_item">
                                                    <figure class="cmsmasters_comment_item_avatar">
                                                        <img alt="" src="http://0.gravatar.com/avatar/cec22fb290043e2c1b9972d9bc2f0cfb?s=70&amp;d=mm&amp;r=g" srcset="http://0.gravatar.com/avatar/cec22fb290043e2c1b9972d9bc2f0cfb?s=140&amp;d=mm&amp;r=g 2x" class="avatar avatar-70 photo" height="70" width="70">		</figure>
                                                    <div class="comment-text cmsmasters_comment_item_cont">
                                                        <div class="cmsmasters_comment_item_cont_info">
                                                            <h5 class="cmsmasters_comment_item_title" itemprop="author">{{ $productVote->user->fullname }}</h5>

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
                                                                        @for($i=0; $i<$productVote->star; $i++)
                                                                        <span class="cmsmasters_theme_icon_star_full cmsmasters_star"></span>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                <span class="rating dn"><strong itemprop="ratingValue">{{ $productVote->star }}</strong> trên 5</span>
                                                            </div>
                                                            <time class="cmsmasters_comment_item_date" itemprop="datePublished" datetime="{{ $productVote->created_at }}">{{ $productVote->created_at }}</time>
                                                        </div>
                                                        <div itemprop="description" class="description cmsmasters_comment_item_content">
                                                            <p>{{ $productVote->comment }}</p>
                                                            <div class="star-rating"><span style="width:100%">Đánh giá <strong class="rating">{{ $productVote->star }}</strong> trên 5</span></div>			</div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                    @endif
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond" style="padding-bottom: 0px;">
                                                <h3 id="reply-title" class="comment-reply-title">Thêm đánh giá
                                                    <small>
                                                        <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                                                    </small>
                                                </h3>
                                                <form action="{{ route('product.vote') }}" method="post" id="commentform" class="comment-form" novalidate="">
                                                    {!! Form::token() !!}
                                                    <p class="comment-form-rating" style="margin-bottom: 0px;padding-bottom: 0px;">
                                                        <label for="rating">Đánh giá sản phẩm</label>
                                                        <div class="rating" style="margin-bottom: 20px;">
                                                            <span class="star" data-value="5">☆</span>
                                                            <span class="star" data-value="4">☆</span>
                                                            <span class="star" data-value="3">☆</span>
                                                            <span class="star" data-value="2">☆</span>
                                                            <span class="star" data-value="1">☆</span>
                                                        </div>
                                                        <input type="hidden" name="star" class="rating-number" value="">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <textarea name="comment" id="comment" cols="67" rows="2" placeholder="Chi tiết đánh giá"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>
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

                    <h2>Sản phẩm liên quan</h2>

                    <div class="cmsmasters_products_wrap">
                        <ul class="products columns-4 cmsmasters_products">
                            @foreach($relateProducts as $product)
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

                </section>

            </div>
        </div>
        </div>
    </div>
@stop
