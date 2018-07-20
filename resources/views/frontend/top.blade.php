@extends('layouts.master')
@section('script')
<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
</script>
	<script>
	    jQuery(function(){
	        jQuery('#camera_wrap_0').camera({
	            navigation: false,
	            playPause: false,
	            thumbnails: false,
	            navigationHover: false,
	            barPosition: 'top',
	            loader: false,
	            time: 3000,
	            transPeriod:800,
	            alignment: 'center',
	            autoAdvance: true,
	            mobileAutoAdvance: true,
	            barDirection: 'leftToRight',
	            barPosition: 'bottom',
	            easing: 'easeInOutExpo',
	            fx: 'random',
	            height: '40.512820512820512820512820512821%',
	            minHeight: '300px',
	            hover: true,
	            pagination: true,
	            loaderColor         : '#1f1f1f',
	            loaderBgColor       : 'transparent',
	            loaderOpacity       : 1,
	            loaderPadding       : 0,
	            loaderStroke        : 3,
	            });
	    });
	</script>
@stop
@section('content')
<div class="header_modules">
	<div class="container">
			<div class="fluid_container">
				<div class="camera_container">
					<div id="camera_wrap_0">
						<div title="slide-1"
							data-thumb="{{ asset('images/slide-1-1170x474.jpg') }}"
							data-src="{{ asset('images/slide-1-1170x474.jpg') }}">
						</div>
						<div title="slide-2"
							data-thumb="{{ asset('images/slide-2-1170x474.jpg') }}"
							data-src="{{ asset('images/slide-2-1170x474.jpg') }}">
						</div>
						<div title="slide-3"
							data-thumb="{{ asset('images/slide-3-1170x474.jpg') }}"
							data-src="{{ asset('images/slide-3-1170x474.jpg') }}">
						</div>
						<div title="slide-4"
							data-thumb="{{ asset('images/slide-4-1170x474.jpg') }}"
							data-src="{{ asset('images/slide-4-1170x474.jpg') }}">
						</div>
						<div title="slide-5"
							data-thumb="{{ asset('images/slide-5-1170x474.jpg') }}"
							data-src="{{ asset('images/slide-5-1170x474.jpg') }}">
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
	</div>
	<div class="bg-2">
		<div class="container">
			<div id="banner0" class="banners row">
				<div class="col-sm-4 banner-1">
					<div class="banner-box">
						<a class="clearfix" href="#">
						<img src="{{ asset('images/banner-1-370x370.jpg') }}" alt="banner-1" class="img-responsive" />
							<div class="s-desc">
								<h1>{{ trans('lang.new_arrive') }}</h1>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 banner-2">
					<div class="banner-box">
						<a class="clearfix" href="#">
							<img src="{{ asset('images/banner-2-370x370.jpg') }}"
							alt="banner-2" class="img-responsive" />
							<div class="s-desc">
								<h1>{{ trans('lang.big_sale') }}</h1>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-4 banner-3">
					<div class="banner-box">
						<a class="clearfix" href="#"> <img
							src="{{ asset('images/banner-3-370x370.jpg') }}"
							alt="banner-3" class="img-responsive" />
							<div class="s-desc">
								<h1>{{ trans('lang.sunglasses') }}</h1>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box_html custom-banners1">
		<div class="html-block">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<h1>{{ trans('lang.free_shipping') }}</h1>
					</div>
					<div class="col-sm-4">
						<h1>{{ trans('lang.call_us') }}: (099) 9999999</h1>
					</div>
					<div class="col-sm-4">
						<h1>{{ trans('lang.send_gift') }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="container">

	<div class="container">
		<div class="row">
			<div id="content" class="col-sm-12">
				<div class="box featured">
					<div class="box-heading">
						<h3>{{ trans('lang.featured') }}</h3>
					</div>
					<div class="box-content">
						<div class="row">
						@foreach($products as $product)
						<?php
							$img_src = "images/products/product".$product->id."/";
						?>
							<div class="product-layout col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="product-thumb transition">
									<div class="quick_info">
										<div id="{{ 'quickview_'.$product->id }}" class="quickview-style">
											<div>
												<div class="left col-sm-4">
													<div class="quickview_image image">
														<a href="{{ route('product.show',['product_id'=>$product->id]) }}">
															<img alt="{{$product->localeName()}}" title="{{ $product->localeName() }}" class="img-responsive"
															src="{{ asset($img_src.$product->getIndexImage()) }}" />
														</a>
													</div>
												</div>
												<div class="right col-sm-8">
													<h2>{{ $product->localeName() }}</h2>
													<div class="inf">
														<p class="product_model model">{{ $product->localeName() }}</p>
														<div class="price">{{ '$'.$product->price }}</div>
													</div>
													<div class="cart-button">
														<button class="btn btn-add cart-icon"
															data-toggle="tooltip" title="{{ trans('lang.add_to_cart') }}" type="button"
															onclick="cart.add('{{ route('product.show', $product->id) }}','{{ $product->id }}');"></button>
														<button class="btn btn-icon" type="button"
															data-toggle="tooltip" title="Add to Wish List"
															onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}','{{ $product->id }}');">
															<i class="fa fa-heart"></i>
														</button>
														<button class="btn btn-icon" type="button"
															data-toggle="tooltip" title="Compare this Product"
															onclick="compare.add('{{ route('productCompare.update', $product->id) }}','{{ $product->id }}');">
															<i class="fa fa-exchange"></i>
														</button>
													</div>
													<div class="clear"></div>
													<div class="rating">
													@for( $i =1; $i<= 5; $i++ )
														<span class="fa fa-stack">
														@if($i<= $product->getStar())
															<i class="fa fa-star fa-stack-2x"></i>
														@endif
															<i class="fa fa-star-o fa-stack-2x"></i>
														</span>
													@endfor
													</div>
												</div>
												<div class="col-sm-12">
													<div class="quickview_description description">
														<p>
															{{ $product->localeDescription() }}
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="image">
										<a class="lazy" style="padding-bottom: 100%"
											href="{{ route('product.show',['product_id'=>$product->id]) }}">
											<img alt="{{ $product->localeName() }}" title="{{ $product->localeName() }}"
											class="img-responsive" data-src="{{ asset($img_src.$product->getIndexImage()) }}"
											src="{{ asset($img_src.$product->getIndexImage()) }}" />
										</a>
									</div>
									<div class="caption">
										<div class="name">
											<a href="{{ route('product.show',['product_id'=>$product->id]) }}">{{ $product->localeName() }}</a>
										</div>
										<div class="rating">
											@for( $i =1; $i<= 5; $i++ )
												<span class="fa fa-stack">
												@if($i<= $product->getStar())
													<i class="fa fa-star fa-stack-2x"></i>
												@endif
													<i class="fa fa-star-o fa-stack-2x"></i>
												</span>
											@endfor
										</div>
										<div class="price">{{ '$'.$product->price }}</div>
									</div>
									<div class="cart-button">
										<button class="product-btn-add cart-icon"
											data-toggle="tooltip" title="{{ trans('lang.add_to_cart') }}" type="button"
											onclick="cart.add('{{ route('product.show', $product->id) }}','{{ $product->id }}');"></button>
										<div class="secondary-btns">
											<button class="product-btn" type="button"
												data-toggle="tooltip" title="{{ trans('lang.add_to_wish_list') }}"
												onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}','{{ $product->id }}');">
												<i class="fa fa-heart"></i>
											</button>
											<button class="product-btn" type="button"
												data-toggle="tooltip" title="{{ trans('lang.compare_this_product') }}"
												onclick="compare.add('{{ route('productCompare.update', $product->id) }}','{{ $product->id }}');">
												<i class="fa fa-exchange"></i>
											</button>
											<a class="quickview product-btn" data-rel="details"
												data-toggle="tooltip" title="Quick View"
												href="{{ '#quickview_'.$product->id }}"> <i class="fa fa-check-square-o"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{!! '<center>'.$products->appends(\Request::except('page'))->render().'</center>' !!}
<br><br><br><br>
@stop
