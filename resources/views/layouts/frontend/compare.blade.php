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
		<li>
			<a href="{{ route('index') }}"><i class="fa fa-home"></i></a>
		</li>
		<li>
			<a href="{{ route('productCompare.index') }}" style="display: none;">{{ trans('lang.product_comparison') }}</a>
		</li>
	</ul>
@if(count($products) < 2 || empty($products))
	<div class="container">
	    <div class="row">
		    <div id="content" class="col-sm-12">
		    		<h1>{{ trans('lang.product_comparison') }}</h1>
			  	  	<p>{{ trans('lang.chose_2') }}</p>
			  <div class="buttons">
				<div class="pull-right">
					<a href="{{ route('index') }}" class="btn btn-default">{{ trans('lang.continue') }}</a>
				</div>
			  </div>
		  	 </div>
		</div>
</div>
@else
	<div class="row">
		<div id="content" class="col-sm-12">
			<h1>{{ trans('lang.product_comparison') }}</h1>
			<div class="table-responsive">
				<table class="table table-bordered ">
					<thead>
						<tr>
							<td colspan="5"><strong>{{ trans('lang.product_details') }}</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td width="12%">{{ trans('lang.product') }}</td>
						@foreach($products as $product)
							<td width="{{$width_td}}%">
								<a href="{{ route('product.show', ['id'=>$product->id]) }}"><strong>{{ $product->localeName() }}</strong></a>
							</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.image') }}</td>
						@foreach($products as $product)
						<?php 
							$img_src = "images/products/product".$product->id."/";
						?>
							<td class="text-center">
								<img width="100%" src="{{ asset($img_src.$product->getIndexImage()) }}" alt="{{ $product->localeName() }}" title="{{ $product->localeName() }}" class="img-thumbnail">
							</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.price') }}</td>
						@foreach($products as $product)
							<td>
								<span class="price-new">{{ '$'.$product->price }}</span>
							</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.model') }}</td>
						@foreach($products as $product)
							<td>{{ $product->artice_id }}</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.category') }}</td>
							{{--{{dd($product->category)}}--}}
						@foreach($products as $product)
							<td>{{ $product->category->localeName() }}</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.availability') }}</td>
						@foreach($products as $product)
							<td>{{ $product->localeStatus()}}</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.rating') }}</td>
						@foreach($products as $product)
							<td class="rating">
							@for( $i =1; $i<= 5; $i++ )
								<span class="fa fa-stack">
								@if($i<= $product->getStar())
									<i class="fa fa-star fa-stack-2x"></i>
								@endif
									<i class="fa fa-star-o fa-stack-2x"></i>
								</span>
							@endfor
								<br> {{ trans('lang.based_on') }} {{ $product->votes->count() }} {{ trans('lang.reviews') }}.
							</td>
						@endforeach
						</tr>
						<tr>
							<td>{{ trans('lang.summary') }}</td>
						@foreach($products as $product)
							<td class="description">
								{{ $product->localeDescription() }}
							</td>
						@endforeach
						</tr>
						<tr>
							<td></td>
						@foreach($products as $product)
							<td>
								<input type="button" value="{{ trans('lang.add_to_cart') }}" class="btn btn-primary btn-block" onclick="cart.add('{{ route('product.show', $product->id) }}','{{ $product->id }}');"> 
								<a onclick="compareRemove('{{ route('productCompare.destroy',$product->id) }}','{{$product->id}}');" class="btn btn-danger btn-block" id ="button-compare{{$product->id}}">{{ trans('lang.remove') }}</a>
							</td>
						@endforeach
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endif
</div>
<script type="text/javascript">
	function compareRemove(url, id){
		var _error = '{{ trans('lang.error') }}';
		$.ajax({
			url: url,
			type: 'DELETE',
			dataType:'json',
			beforeSend: function() {
				$('#button-compare'+id).unbind('click');
				$('#button-compare'+id).button('loading');
			},
			complete: function() {
				$('#button-compare'+id).button('reset');
			},
			success: function(json) {
				if (json['error']) {
					$('.breadcrumb').after('<div class="alert alert-error">' + json['error'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					setTimeout(function(){// wait for 5 secs
	           			location.reload(); // then reload the page.
	      			}, 3000);
				}
				if (json['success']) {
					$('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					console.log('ggg');
					var url= window.location.href;
					$('#content').load(url+' #content');
					setTimeout(function() {$('.alert').fadeOut(1000)},3000)
				}
			},
			error: function(){
				$('.breadcrumb').after('<div class="alert alert-error">'+_error+' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				setTimeout(function(){// wait for 5 secs
	           			location.reload(); // then reload the page.
	      			}, 3000);
			}
		});
	}
</script>
@stop