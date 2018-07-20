<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]>
<html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="_token" content="{!! csrf_token() !!}"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
::-webkit-scrollbar {
	border: none;
	border-image-source: initial;
	border-image-slice: initial;
	border-image-width: initial;
	border-image-outset: initial;
	border-image-repeat: initial;
	background-color: rgb(255, 255, 255);
	width: 8px;
	height: 8px;
}

::-webkit-scrollbar-thumb {
	background-color: rgb(191, 191, 191);
	border: 1px solid rgb(186, 186, 186);
	border-image-source: initial;
	border-image-slice: initial;
	border-image-width: initial;
	border-image-outset: initial;
	border-image-repeat: initial;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ trans('lang.clothes') }}</title>
<script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen"/>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/camera.css') }}" type="text/css" rel="stylesheet" media="screen"/>

<link href="{{ asset('css/css.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ asset('css/magnificent.css') }}" rel="stylesheet">
<link href="{{ asset('css/owl.transitions.css') }}" type="text/css" rel="stylesheet" media="screen"/>
<link href="{{ asset('css/photoswipe.css') }}" rel="stylesheet">
<link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css') }}" type="text/css" rel="stylesheet" media="screen"/>


<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/camera.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/device.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.easing.1.3.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/cloudflare.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/magnificent/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>

@yield('script')
</head>
<body class="common-home">
@include('login')
	<div class="swipe">
		<div class="swipe-menu">
			<ul>
				<li>
					<a href="{{route('myaccount.index')}}" title="My Account">
					<i class="fa fa-user"></i> <span>{{ trans('lang.my_account') }}</span></a>
				</li>
				@if(!Auth::check())
					<li><a href="{{ route('myaccount.create') }}"><i class="fa fa-user"></i> {{ trans('lang.register') }}</a></li>
					<li><a href="#"><i class="fa fa-lock"></i>{{ trans('lang.login') }}</a></li>
				@else
					<li><a href="@if(Auth::check()){{route('myaccount.index')}} @endif">{{ trans('lang.my_account') }}</a></li>
					<li><a href="{{route('myaccount.old.orders')}}">{{ trans('lang.order_history') }}</a></li>
					<li><a href="{{ route('authLogout') }}">{{ trans('lang.logout') }}</a></li>
				@endif
				<li><a href="{{ route('wishlist.index') }}" id="wishlist-total2" title="Wish List ({{ $count_wishlist }})">
				<i class="fa fa-heart"></i> <span>{{ trans('lang.wish_list()') }} ({{ $count_wishlist }})</span> </a></li>
				<li>
					<a href="{{ route('cart.index') }}">
						<i class="fa fa-shopping-cart"></i>
						<span>{{ trans('lang.shopping_cart') }}</span>
					</a>
				</li>
				<li>
					<a href="{{ route('cart.checkout') }}" title="Checkout">
						<i class="fa fa-share"></i>
						<span>{{ trans('lang.checkout') }}</span>
					</a>
				</li>
			</ul>
			<ul class="foot">
				<li><a href="#">{{ trans('lang.about_us') }}</a></li>
			</ul>
			<ul class="foot foot-1">
				<li><a href="#">{{ trans('lang.contact_us') }}</a></li>
			</ul>
			{{--<ul class="footer foot-2">
				<li><a href="#">{{ trans('lang.my_account') }}</a></li>
				<li><a href="#">{{ trans('lang.wish_list') }}</a></li>
			</ul>--}}
		</div>
	</div>
	<div id="page">
		<div class="shadow"></div>
		<div class="toprow-1">
			<a class="swipe-control" href="#">
				<i class="fa fa-align-justify"></i>
			</a>
		</div>
		@if (session('message'))
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong></strong> {{ session('message') }}
			</div>
		@endif
		@if (session('message_error'))
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong></strong> {{ session('message_error') }}
			</div>
		@endif
		@if(!empty($errors->first('wishlish')))
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>{{ trans('lang.warning') }} </strong> {{ $errors->first('wishlish') }}
			</div>
		@endif
		@if(!empty($errors->first('myaccount')))
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>{{ trans('lang.warning') }} </strong> {{ $errors->first('myaccount') }}
			</div>
		@endif
		<header class="header">
			<div id="stuck" class="stuck-menu">
				<div class="container">
					<nav id="top-links" class="nav">
						<ul class="list-inline">
							<li class="first">
								<a href="{{ route('index') }}"><i class="fa fa-home"></i><span>{{ trans('lang.home') }}</span> </a>
							</li>
							<li>
								<a href="{{ route('wishlist.index') }}" id="wishlist-total" title="Wish List ({{ $count_wishlist }})">
									<i class="fa fa-heart"></i> <span>{{ trans('lang.wish_list()') }} ({{ $count_wishlist }})</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" title="{{ trans('lang.my_account') }}" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-user"></i> <span>{{ trans('lang.my_account') }}</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-left">
								@if(!Auth::check())
									<li><a href="{{ route('myaccount.create') }}">{{ trans('lang.register') }}</a></li>
									<li>
									<a href="#" data-toggle="modal" data-target="#login-modal">{{ trans('lang.login') }}</a>
									</li>
								@else

									<li><a href="@if(Auth::check()){{route('myaccount.index')}} @endif">{{ trans('lang.my_account') }}</a></li>
									<li><a href="{{route('myaccount.old.orders')}}">{{ trans('lang.order_history') }}</a></li>
									<li><a href="{{ route('authLogout') }}">{{ trans('lang.logout') }}</a></li>
								@endif
								</ul>
							</li>
							<li>
								<a href="{{ route('cart.index') }}" title="Shopping Cart">
									<i class="fa fa-shopping-cart"></i> <span>{{ trans('lang.shopping_cart') }}</span>
								</a>
							</li>
							<li>
								<a href="{{ route('cart.checkout') }}" title="Checkout"><i class="fa fa-share"></i>
								 <span>{{ trans('lang.checkout') }}</span>
								</a>
							</li>
						</ul>
					</nav>
					<div class="right-menu">
						<div class="box-cart">
							<div id="cart" class="cart">
								<button type="button" data-toggle="dropdown"
									data-loading-text="Loading..." class="dropdown-toggle">
									<i class="cart-icon"></i> 
									<span id="cart-total" class="cart-total">{{ Cart::count() }} {{ trans('lang.item') }} - ${{ Cart::count()*1.2 }}</span>
								</button>
								<ul class="dropdown-menu pull-right">
								@if(empty(Cart::count()))
									<li>
										<p class="text-center">{{ trans('lang.your_shopping_cart_is_empty') }}</p>
									</li>
								@else
									<li>
										<div>
											<table class="table">
												<tbody>
												@foreach(Cart::content() as $item)
													<?php 
														$product = $item->product;
														$img_src = "images/products/product".$item->id."/";
														$product_color = App\Models\ProductColor::find($item->options->color);
													?>
													<tr>
														<td class="text-center">
															<div class="image">
																<a
																	href="{{ route('product.show',['product_id'=>$item->id]) }}">
																	<img
																	src="{{ asset($img_src.$product_color->picture) }}"
																	alt="{{ $item->name }}" title="{{ $item->name }}"
																	class="img-thumbnail"></a>
															</div>
														</td>
														<td class="text-left">
															<div class="name">
																<a
																	href="{{ route('product.show',['product_id'=>$item->id]) }}">
																	{{ $item->name }}
																	</a>
															</div> - 
																<small>{{ $product_color->localeColor() }}</small> - 
																<small>{{ $item->size_option }}</small>
															
															<div>
																x {{ $item->qty }} 
																<span class="price-cart">${{ $item->price }}</span>
															</div>
														</td>
														<td class="text-right"></td>
														<td class="text-center">
															<button type="button"
																onclick="cart.remove('{{ route("cart.destroy", $item->rowid) }}','{{ $item->rowid }}');"
																title="Remove" class="btn btn-danger btn-xs">
																<i class="fa fa-times"></i>
															</button>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</li>
									<li>
										<div>
											<table class="table total">
												<tbody>
													<tr>
														<td class="text-right"><strong>{{ trans('lang.sub_total') }}</strong></td>
														<td class="text-right">${{ Cart::total() }}</td>
													</tr>
													<tr>
														<td class="text-right"><strong>{{ trans('lang.VAT') }} (20%)</strong></td>
														<td class="text-right">${{ Cart::total()*0.2 }}</td>
													</tr>
													<tr>
														<td class="text-right"><strong>{{ trans('lang.total') }}</strong></td>
														<td class="text-right">${{ Cart::total()*1.2 }}</td>
													</tr>
												</tbody>
											</table>
											<p class="text-right">
												<a class="btn btn-primary"
													href="{{ route('cart.index') }}">
													{{ trans('lang.view_cart') }}</a>
													<a class="btn btn-primary"
													href="{{ route('cart.checkout') }}">
													{{ trans('lang.checkout') }}</a>
											</p>
										</div>
									</li>
								@endif
								</ul>
							</div>
						</div>
						<div class="box-language">
								<div class="btn-group">
									<span class="dropdown-toggle" data-toggle="dropdown">
									<img src="{{ asset('images/flags/'.LaravelLocalization::getCurrentLocale().'.png') }}" alt="{{ LaravelLocalization::getCurrentLocaleName() }}" title="{{ LaravelLocalization::getCurrentLocaleName() }}">  {{ LaravelLocalization::getCurrentLocale() }}<span class="hidden-xs hidden-sm hidden-md hidden">Language</span>
									</span>
									<ul class="dropdown-menu pull-right">
										 @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
									        <li>
									            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
									                <img src="{{ asset('images/flags/'.$localeCode.'.png') }}" alt="{{ $properties['native'] }}" title="{{ $properties['native'] }}">
									                {{ $properties['native'] }}
									            </a>
									        </li>
									    @endforeach
									</ul>
								</div>
								<input type="hidden" name="code" value="">
								<input type="hidden" name="redirect" value="#">
						</div>
					</div>
				</div>
			</div>
			<div id="logo" class="logo">
				<a href="{{ route('index') }}">
				<img src="{{ asset('images/logo.png') }}" title="Clothes online store" alt="Clothes online store"
					class="img-responsive" /></a>
			</div>
			<div class="bg-1">
				<div class="container">
					<div class="category-block">
						<div class="fleft">
							<div id="menu-gadget" class="menu-gadget">
								<div id="menu-icon" class="menu-icon">{{ trans('lang.categories') }}</div>
								{!! $menu !!}
							</div>
							<div id="tm_menu" class="nav__primary">
								{!! $menu !!}
								<div class="clear"></div>
							</div>
						</div>
						<div class="fright">
							<div class="search-box" id="search-box">
								<i id="toggle-search" class="fa fa-search" data-toggle="dropdown"></i>
								<div id="search" class="search">
								<form method="GET" action="{{ route('search.product') }}" accept-charset="UTF-8">
									<input type="text" name="search" value="" placeholder="Search" />
									<button type="submit" class="button-search"><span></span></button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	@yield('content')
	</div>
@include('layouts.footer')
</body>
