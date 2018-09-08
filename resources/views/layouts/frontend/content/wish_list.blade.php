@section('script')
<script type="text/javascript">
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
</script>
@stop
<div id="content" class="col-sm-9">
	<h2>My Wish List</h2>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td class="text-center">{{ trans('lang.image') }}</td>
					<td class="text-left">{{ trans('lang.produce_name') }}</td>
					<td class="text-left">{{ trans('lang.model') }}</td>
					<td class="text-right">{{ trans('lang.stock') }}</td>
					<td class="text-right">{{ trans('lang.unit_price') }}</td>
					<td class="text-right">{{ trans('lang.action') }}</td>
				</tr>
			</thead>
			<tbody>
			@foreach($parameters as $product)
			<?php 
				$img_src = "images/products/product".$product->id."/"
			?>
				<tr id="{{ 'tblRow'.$product->id }}">
					<td class="text-center">
					<a href="{{ route('product.show',['product_id'=>$product->id]) }}">
						<img src="{{ asset($img_src.$product->getIndexImage()) }}" alt="{{ $product->localeName() }}" title="{{ $product->localeName() }}" style="width:5em; height:5em">
					</a>
					</td>
					<td class="text-left"><a href="{{ route('product.show',['product_id'=>$product->id]) }}">{{ $product->localeName() }}</a></td>
					<td class="text-left">{{ $product->artice_id }}</td>
					<td class="text-right">{{ $product->status }}</td>
					<td class="text-right"><div class="price">{{ '$'.$product->price }}</div></td>
					<td class="text-right">
						<button type="button" onclick="cart.add('{{ route('product.show', $product->id) }}','{{ $product->id }}');" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="{{ trans('lang.add_to_cart') }}">
						<i class="fa fa-shopping-cart"></i>
						</button> 
						<a data-toggle="tooltip" title="" class="btn btn-danger"
						data-original-title="Remove" onclick="wishlist.remove('{{ route('wishlist.destroy', $product->id) }}','{{ $product->id }}');">
						<i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="buttons clearfix">
		<div class="pull-right">
			<a href="{{ route('index') }}" class="btn btn-primary">{{ trans('lang.continue') }}</a>
		</div>
	</div>
</div>