@section('script')
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		});
	</script>
@stop
<?php
//$product_top = $parameters->shift(); //get first item from collection sorted by sell_count desc
$img_src = "images/products/product".$product_top->id."/".$product_top->getIndexImage(); //define path to image
?>
<div id="content" class="col-sm-9">
	<h2>{{ $parameters2->localeName() }}</h2>
	<div class="row">
		<div class="col-sm-2">
			<div class="image">
				<img src="{{ asset($img_src) }}"
					alt="{{ $parameters2->localeName() }}" title="{{ $parameters2->localeName() }} " class="img-thumbnail">
			</div>
		</div>
		<div class="col-sm-10">
			<p>
				<b> {{ $parameters2->localeName() }}: </b>
				{{ $parameters2->localeDescription() }}
			</p>
			<p>
				<b>{{$product_top->localeName()}}: </b> {{$product_top->localeDescription()}}.
			</p>
		</div>
	</div>
	<hr>
	<h3>{{ trans('lang.refine_search') }}</h3>
	<div class="product-filter clearfix">
		<div class="row">
			<div class="col-sm-12 col-md-2">
				<label class="control-label" for="input-sort">{{ trans('lang.sort_by') }}:</label>
			</div>
			<div class="col-sm-12 col-md-3">
				<select id="input-sort" class="form-control col-sm-3"
					onchange="submitValue(this);">
					<option
						value="sell_count-DESC"
						selected="selected">Default</option>
					<option
						value="name{{ trans('lang.lang_name') }}-ASC">{{ trans('lang.name') }}
						(A - Z)</option>
					<option
						value="name{{ trans('lang.lang_name') }}-DESC">{{ trans('lang.name') }}
						(Z - A)</option>
					<option
						value="price-ASC">{{ trans('lang.price') }}
						({{ trans('lang.low') }} &gt; {{ trans('lang.high') }})</option>
					<option
						value="price-DESC">{{ trans('lang.price') }}
						({{ trans('lang.high') }} &gt; {{ trans('lang.low') }})</option>
					<option
						value="view_count-DESC">{{ trans('lang.view') }}
						({{ trans('lang.highest') }})</option>
				</select>
			</div>
			<div class="col-sm-12 col-md-2">
				<label class="control-label" for="input-limit">{{ trans('lang.show') }}:</label>
			</div>
			<div class="col-sm-12 col-md-2">
				<select id="input-limit" class="form-control" onchange="submitValue(this);">
					<option
						value="6"
						selected="selected">6</option>
					<option
						value="18">18</option>
					<option
						value="27">27</option>
					<option
						value="36">36</option>
					<option
						value="72">72</option>
					<option
						value="100">100</option>
				</select>
			</div>
			<div class="col-sm-12 col-md-3 text-right">
				<div class="button-view">
					<button type="button" id="list-view" class="btn btn-default"
						data-toggle="tooltip" title="" data-original-title="List">
						<i class="fa fa-th-list"></i>
					</button>
					<button type="button" id="grid-view" class="btn btn-default active"
						data-toggle="tooltip" title="" data-original-title="Grid">
						<i class="fa fa-th"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="nav-cat clearfix">
		<div class="pull-left"></div>
		<div class="pull-right">
			<a href="{{ route('productCompare.index') }}" id="compare-total" class="btn">
				{{ trans('lang.compare') }} ({{ count(Session::get('product_list',0)) }})
			</a>
		</div>
	</div>
	<div class="row">
		<div id = "product_content">
	@foreach($parameters as $product)
	<?php
		$img_src = "images/products/product".$product->id."/".$product->getIndexImage();
	?>
		<div
			class="product-layout product-grid col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="product-thumb transition" id = "product_container">
				<div class="quick_info">
					<div id="{{ 'quickview_'.$product->id }}" class="quickview-style">
						<div>
							<div class="left col-sm-4">
								<div class="quickview_image image">
									<a href="{{ route('product.show',['product_id'=>$product->id]) }}">
										<img alt="{{ $product->localeName() }}" title="{{ $product->localeName() }}" class="img-responsive"
										src="{{ asset($img_src) }}" />
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
										onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}',{{ $product->id }});">
										<i class="fa fa-heart"></i>
									</button>
									<button class="btn btn-icon" type="button"
										data-toggle="tooltip" title="{{ trans('lang.compare') }}"
										onclick="compare.add('{{ route('productCompare.update', $product->id) }}',{{ $product->id }});">
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
						<img alt="Quisque eget" title="Quisque eget"
						class="img-responsive"
						data-src="{{ asset($img_src) }}"
						src="{{ asset($img_src) }}">
					</a>
				</div>
				<div>
					<div class="caption">
						<div class="name name-product">
							<a
								href="{{ route('product.show',['product_id'=>$product->id]) }}">
								{{ $product->localeName() }}</a>
						</div>
						<div class="description">{{ $product->localeDescription() }}</div>
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
						<div class="price price-product">
							<span class="price-new">${{ $product->price }}</span>
						</div>
					</div>
					<div class="cart-button">
						<button class="product-btn-add cart-icon" data-toggle="tooltip"
							title="" type="button" onclick="cart.add('{{ route('product.show', $product->id) }}','{{ $product->id }}');"
							data-original-title="{{ trans('lang.add_to_cart') }}"></button>
						<div class="secondary-btns">
							<button class="product-btn" type="button" data-toggle="tooltip"
								title="" onclick="wishlist.add('{{ route('wishlist.store',$product->id) }}','{{ $product->id }}');"
								data-original-title="{{ trans('lang.add_to_wish_list') }}">
								<i class="fa fa-heart"></i>
							</button>
							<button class="product-btn" type="button" data-toggle="tooltip"
								title="" onclick="compare.add('{{ route('productCompare.update', $product->id) }}','{{ $product->id }}');"
								data-original-title="{{ trans('lang.compare_this_product') }}">
								<i class="fa fa-exchange"></i>
							</button>
							<a class="quickview product-btn" data-rel="details"
								data-toggle="tooltip" title="Quick View"
								href="{{ '#quickview_'.$product->id }}"> <i class="fa fa-check-square-o"></i>
							</a>
						</div>
					</div>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	@endforeach
		<div class="clearfix hidden-xs"></div>
	</div>
	</div>
</div>
<script type="text/javascript">
	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
	    options.async = true;
	});
	function submitValue(obj){
		var url = window.location.href;
		var data = "";
		data ='take='+ $('#input-limit').val();
		var value = $('#input-sort').val();
		value = value.split('-');
		data += '&field='+value[0]+'&option='+value[1];
		var _error = '{{ trans("lang.error") }}';
		$.ajax({
			url: url,
			data: data,
			dataType: "text",
			success: function(data){
				// var success =  $($.parseHTML(data)).filter("#content");
				product_content = $(data).find("#product_content");
				//console.log(product_content);
				$('#product_content').parent().html(product_content);
				$('.lazy').attr('class','lazy lazy-loaded');
				$('img').error(function() {
					$(this).parent().attr('class','lazy');
					//console.log('thth');
				});
				//console.log(data);
        		// html = data;
    		},
    		error: function(){
    			$('#content').parent().before('<div class="alert alert-info"><i class="fa fa-info-circle"></i>'+_error+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
    		}
    	});
	};
</script>
