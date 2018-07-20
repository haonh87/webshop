@extends('layouts.master')
@section('script')
<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
</script>

@stop
@section('content')
<div class="container">
	<ul class="breadcrumb">
		<li><a href="{{ route('index') }}"><i
				class="fa fa-home"></i></a></li>
		<li>
			<a href="{{ route('product.show', ['product_id'=>$product->id]) }}">
				{{ $product->LocaleName() }}
			</a>
		</li>
	</ul>
	<div class="row">
	<?php 
		$img_src = "images/products/product".$product->id."/";
		$img_magnificent = "images/products/product".$product->id."/".$product->getIndexImage();
	?>
		<div id="content" class="col-sm-12 product_page">
			<div class="row product-content-columns">
				<!-- Content left -->
				<div class="col-sm-5 col-lg-7 product_page-left">
					<!-- product image -->
					<div id="default_gallery" class="product-gallery">
						<div class="image-thumb">
							<ul id="image-additional" class="image-additional">

							@foreach($product_colors as $product_color)
								
								<li>
									<a href="#" data-image="{{ asset($img_src.$product_color->picture) }}">
										<img src="{{ asset($img_src.$product_color->picture) }}"
										alt="" />
									</a>
								</li>
							@endforeach
							</ul>
						</div>
						<div id="product-image" class="product-image">
							<div class="magnificent-wrap">
								<div class="magnificent" data-magnificent="product-image">
									<div class="polaroid">
										<div class="inner">
											<img
												src="{{ asset($img_magnificent) }}" />
										</div>
									</div>
								</div>
							</div>
							<div class="magnificent-viewport-wrap">
								<div data-magnificent-viewport="product-image">
									<div class="inner">
										<img
											src="{{ asset($img_magnificent) }}" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<script class="source">
							$(function () {
								$('#product-image [data-magnificent]').magnificent();
							});
						</script>
					<div id="full_gallery">
						<ul id="gallery">
						@foreach($product_colors as $product_color)
							<li>
								<a href="{{ asset($img_src.$product_color->picture) }}" data-something="something" data-another-thing="anotherthing">
									<img src="{{ asset($img_src.$product_color->picture) }}" title="{{ $product->LocaleName() }}" alt="{{ $product->LocaleName() }}" />
								</a>
							</li>
						@endforeach
						</ul>
					</div>

				</div>

				<!-- Content right -->
				<div class="col-sm-7 col-lg-5 product_page-right">
					<div class="general_info product-info">

						<h1 class="product-title">{{ $product->LocaleName() }}</h1>

						<!-- Prodyuct rating status -->
						<div  id="rating" class="rating-section product-rating-status">
							<div class="rating">
								@for( $i =1; $i<= 5; $i++ )
									<span class="fa fa-stack">
									@if($i<= $product->getStar())
										<i class="fa fa-star fa-stack-2x"></i>
									@endif
										<i class="fa fa-star-o fa-stack-2x"></i>
									</span>
								@endfor
								 &nbsp; &nbsp; 
								<a onclick="document.getElementById('tab-review').scrollIntoView();">
									{{ $product->votes->count() }} {{ trans('lang.reviews') }}
								</a> / 
								<a onclick="document.getElementById('tab-review').scrollIntoView();">
									{{ trans('lang.write_a_review') }}
								</a>
							</div>
						</div>

						<div class="price-section">
							<span class="price-new">{{ '$'.$product->price }}</span>
							<div class="reward-block"></div>
						</div>

						<ul class="list-unstyled product-section">
							<li>{{ trans('lang.category') }}: <a
								href="{{route('category',$product->category->id)}}">{{ $product->category->localeName() }}</a></li>
							<li>{{ trans('lang.product_code') }}: <span>{{ $product->artice_id }}</span></li>
							<li>{{ trans('lang.availability') }}: <span>{{ $product->localeStatus() }}</span></li>
						</ul>
					</div>

					<div id="product">

						<!-- Product options -->
						<div class="product-options form-horizontal">
							<h3>{{ trans('lang.available_options') }}</h3>
							<div class="form-group required">
								<label class="control-label col-sm-4">{{ trans('lang.color') }}</label>
								<div class="col-sm-8">
									<div id="color_option">
									@foreach($product_colors as $product_color)
										<div class="radio">
											<label> <input type="radio" name="color"
												value="{{ $product_color->id }}" />
												{{ $product_color->localeColor() }}
											</label>
										</div>
									@endforeach
									</div>
								</div>
							</div>
							<div class="form-group required">
								<label class="control-label col-sm-4">{{ trans('lang.size') }}</label>
								<div class="col-sm-8">
									<select name="size_option" id="size_option"
										class="form-control">
										<option value="">--- {{ trans('lang.please_select') }} ---</option>
									@foreach($product_sizes as $product_size)
										<option value="{{ $product_size->id }}">{{ $product_size->size }}</option>
									@endforeach
									</select>
								</div>
							</div>
						</div>

						<!-- product reccurings -->
						<div class="product-reccurings"></div>

						<!-- Add to cart form -->
						<div class="form-group form-horizontal">
							<div class="form-group">
								<label class="control-label col-sm-4" for="input-quantity">{{ trans('lang.qty') }}</label>
								<div class="col-sm-2">
									<input type="text" name="quantity" value="1" size="2"
										id="input-quantity" class="form-control" />
								</div>
							</div>

							<input type="hidden" name="product_id" value="{{ $product->id }}" />
							<button type="button" id="button-cart"
								data-loading-text="Loading..."
								class="product-btn-add cart-icon">{{ trans('lang.add_to_cart') }}</button>
						</div>

						<ul class="product-buttons">
							<li><button class="product-btn" onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}','{{ $product->id }}');">
									<i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm">{{ trans('lang.add_to_wish_list') }}</span>
								</button></li>
							<li><button type="button" class="product-btn"
									onclick="compare.add('{{ route('productCompare.update', $product->id) }}','{{ $product->id }}');">
									<i class="fa fa-exchange"></i> <span
										class="hidden-xs hidden-sm">{{ trans('lang.compare_this_product') }}</span>
								</button></li>
						</ul>
					</div>

				</div>
			</div>

			<!-- Product specifications -->


			<!-- Product reviews -->

			<div id="tab-review" class="product-reviews product-section">
				<h3 class="product-section_title">{{ trans('lang.reviews') }} ( {{ $product->votes->count() }} )</h3>
				<form class="form-horizontal">

					<!-- Reviews list -->
					<div id="review">
					@foreach($product->votes as $vote)
						<div class="review-item">
							<div class="row">
								<div class="col-sm-3">
									<div class="review-score">
									@for( $i =1; $i<= 5; $i++ )
										<span class="fa fa-stack">
										@if($i<= $vote->star)
											<i class="fa fa-star fa-stack-2x"></i>
										@endif
											<i class="fa fa-star-o fa-stack-2x"></i>
										</span>
									@endfor
									</div>
									<div class="review-author"><strong>{{ $vote->user->name }}</strong></div>
									<div class="review-date">
									{{ date('Y-m-d',strtotime($vote->created_at)) }}</div>
								</div>
								<div class="col-sm-9">
									{{ $vote->comment }}
								</div>
							</div>
						</div>
					@endforeach
					</div>

					<!-- Review form -->
					@if(!Auth::check())
						<div class="review-form-title">
							<h3 class="product-section_title" id="reviews_form_title" data-toggle="modal" data-target="#login-modal">{{ trans('lang.log_in_to_write_a_review') }}</h3>
						</div>
					@else
					<div class="review-form-title">
						<h3 class="product-section_title" id="reviews_form_title">{{ trans('lang.write_a_review') }}</h3>
					</div>
					<div class="product-review-form" id="reviews_form">
						<div class="form-group required">
							<label class="control-label col-sm-3" for="input-review">{{ trans('lang.your_review') }}</label>
							<div class="col-sm-9">
								<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
								<div class="help-block">
									<span class="text-danger">{{ trans('lang.note') }}:</span> HTML is not translated!
								</div>
							</div>
						</div>
						<div class="form-group required">
							<label class="control-label col-sm-3">{{ trans('lang.rating') }}</label>
							<div class="col-sm-9">
								&nbsp;&nbsp;&nbsp; Bad&nbsp; <input type="radio" name="rating"
									value="1" /> &nbsp; <input type="radio" name="rating"
									value="2" /> &nbsp; <input type="radio" name="rating"
									value="3" /> &nbsp; <input type="radio" name="rating"
									value="4" /> &nbsp; <input type="radio" name="rating"
									value="5" /> &nbsp;Good
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3">
								<div class="pull-right">
									<button type="button" id="button-review"
										data-loading-text="Loading..." class="btn btn-primary" onclick="postReview('{{ route('product.vote') }}','{{ $product->id }}');">{{ trans('lang.continue') }}</button>
								</div>
							</div>

						</div>

					</div>
					@endif
				</form>
			</div>
			<!-- Related products -->
			@if(!$product_relates->isEmpty())
			<div class="related-products product-section">
				<h3 class="product-section_title">{{ trans('lang.related_products') }}</h3>
				<div class="related-slider">

					<div>
						@foreach($product_relates as $product_relate)
							<?php 
								$img_src = "images/products/product".$product_relate->id."/";
							?>
							<div class="product-thumb transition">
								<div class="image">
									<a class="lazy" style="padding-bottom: 100%"
										href="{{ route('product.show', $product_relate->id) }}">
										<img alt="Aliquam eget" title="Aliquam eget"
										class="img-responsive"
										data-src="{{ asset($img_src.$product_relate->getIndexImage()) }}"
										src="#" />
									</a>
								</div>
								<div class="caption">
									<div class="name">
										<a
											href="{{ route('product.show', $product_relate->id) }}">
											{{ $product_relate->localeName() }}
											</a>
									</div>
									<p>{{ $product_relate->localeDescription() }}</p>

									<!-- Rating -->
									<div class="rating">
										@for( $i =1; $i<= 5; $i++ )
											<span class="fa fa-stack">
											@if($i<= $product_relate->getStar())
												<i class="fa fa-star fa-stack-2x"></i>
											@endif
												<i class="fa fa-star-o fa-stack-2x"></i>
											</span>
										@endfor
									</div>

									<!-- price -->
									<p class="price">
										<span class="price-new">{{ '$'.$product_relate->price }}</span>
									</p>
								</div>
								<div class="cart-button">
									<button class="product-btn-add cart-icon"
										data-toggle="tooltip" title="{{ trans('lang.add_to_cart') }}" type="button"
										onclick="cart.add(''{{ route('product.show', $product->id) }}','{{ $product_relate->id }}');"></button>
									<div class="secondary-btns">
										<button class="product-btn" type="button"
											data-toggle="tooltip" title="{{ trans('lang.add_to_wish_list') }}"
											onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}','{{ $product_relate->id }}');">
											<i class="fa fa-heart"></i>
										</button>
										<button class="product-btn" type="button"
											data-toggle="tooltip" title="{{ trans('lang.compare_this_product') }}"
											onclick="compare.add('{{ route('productCompare.update', $product->id) }}','{{ $product_relate->id }}');">
											<i class="fa fa-exchange"></i>
										</button>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						@endforeach
					</div>

				</div>
			</div>
		@endif
		</div>
	</div>
</div>
<script>
	jQuery('#reviews_form_title').addClass('close-tab');
	jQuery('#reviews_form_title').on("click", function(){
	if (jQuery(this).hasClass('close-tab')) { jQuery(this).removeClass('close').parents('#tab-review').find('#reviews_form').slideToggle(); }
		else {
		jQuery(this).addClass('close-tab').parents('#tab-review').find('#reviews_form').slideToggle();
	}
	})
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
	var myPhotoSwipe = $("#gallery a").photoSwipe({ enableMouseWheel: false , enableKeyboard: false, captionAndToolbarAutoHideDelay:0 });
	});
</script>
<script type="text/javascript"><!--
	$('#button-cart').on('click', function() {
		var url = $(location).attr('href').split("/");
		$.ajax({
			url: '{{ route("cart.store") }}',
			type: 'post',
			data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
			dataType:'json',
			beforeSend: function() {
				$('#button-cart').button('loading');
			},
			complete: function() {
				$('#button-cart').button('reset');
			},
			success: function(json) {
				$('.alert, .text-danger').remove();
				$('.form-group').removeClass('has-error');

				if (json['error']) {
					if (json['error']['size']) {
						$('#size_option').parent().after('<div class="text-danger">' + json['error']['size'] + '</div>');
					}
					if(json['error']['color']){
						$('#color_option').parent().after('<div class="text-danger">' + json['error']['color'] + '</div>');
					}
					// Highlight any found errors
					$('.text-danger').parent().addClass('has-error');
				}
				
				if (json['success']) {
					$('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					
					var url      = window.location.href;
					$('#cart').load(url+' #cart');
					<!--$('html, body').animate({ scrollTop: 0 }, 'slow');-->
					setTimeout(function() {$('.alert').fadeOut(1000)},3000)
				}
			}
		});
	});
	//-->
</script>
<script type="text/javascript"><!--
	$('#review').delegate('.pagination a', 'click', function(e) {
		e.preventDefault();

		$('#review').fadeOut('slow');

		$('#review').load(this.href);

		$('#review').fadeIn('slow');
	});

	// $('#review').load('index.php?route=product/product/review&product_id=33');

	
	//-->
</script>
@stop