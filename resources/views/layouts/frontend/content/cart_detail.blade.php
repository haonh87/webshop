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
	<div id="sub-content" class="">
	<h1>{{ trans('lang.shopping_cart') }}</h1>
@if(!empty(Cart::total()))
	<form class="shoping_cart" action="" method="post" enctype="multipart/form-data">
			<div class="table-responsive">
			  <table class="table table-bordered">
				<thead>
					<tr>
						<td class="text-center">{{ trans('lang.image') }}</td>
						<td class="text-left">{{ trans('lang.product_name') }}</td>
						<td class="text-left">{{ trans('lang.model') }}</td>
						<td class="text-left">{{ trans('lang.quantity') }}</td>
						<td class="text-right">{{ trans('lang.unit_price') }}</td>
						<td class="text-right">{{ trans('lang.total') }}</td>
					</tr>
				</thead>
				<tbody>
				@foreach(Cart::content() as $row)
					<?php 
						$product = $row->product;
						$img_src = "images/products/product".$row->id."/";
						$product_color = App\Models\ProductColor::find($row->options->color);
						$product_size = App\Models\ProductSize::find($row->options->size_option);
					?>
					<tr>
						<td class="text-center">
							<div class="image"><a href="{{ route('product.show', ['product_id'=>$row->id]) }}">
							<img src="{{ asset($img_src.$product_color->picture) }}" 
								alt="{{ $product->localeName() }}" title="{{ $product->localeName() }}" class="img-thumbnail" style="width:5em; height:5em;"></a></div>
						 </td>
						<td class="text-left">
							<a href="{{ route('product.show', ['product_id'=>$row->id]) }}">{{ $product->localeName() }}</a>
							<br>
							  <small>Color: {{ $product_color->localeColor() }}</small>
							<br>
							  <small>Size: {{ $product_size->size }}</small>

						</td>
						<td class="text-left">{{ $product->artice_id }}</td>
						<td class="text-left">
							<div class="input-group btn-block" style="max-width: 200px;">
								<p class="clearfix"><input type="text" id="quantity{{ $row->rowid }}" value="{{ $row->qty }}" size="1" class="form-control cart-q" id="cart-q"></p>
								<div>
									<button type="button" 
									onclick="cart.update('{{ route("cart.update", $row->rowid) }}','{{ $row->rowid }}');" 
									data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-refresh"></i>
									</button>
									<button type="button" data-toggle="tooltip" title="" class="btn btn-danger" 
									onclick="cart.remove('{{ route("cart.destroy", $row->rowid) }}','{{ $row->rowid }}');" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
								</div>
							</div>
						</td>
						<td class="text-right"><div class="price">{{ '$'.$row->price }}</div></td>
						<td class="text-right"><div class="price price-total">{{ '$'.$row->subtotal }}</div></td>
					</tr>
				@endforeach
				</tbody>
			  </table>
			</div>
	</form>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6">
		  	<table class="table table-bordered">
				<tbody>
					<tr>
					  <td class="text-right"><strong>{{ trans('lang.sub_total') }}:</strong></td>
					  <td class="text-right"><div class="price">{{ '$'.Cart::total() }}</div></td>
					</tr>
					<tr>
					  <td class="text-right"><strong>{{ trans('lang.VAT') }} (20%):</strong></td>
					  <td class="text-right"><div class="price">{{ '$'.Cart::total()*0.2 }}</div></td>
					</tr>
					<tr>
					  <td class="text-right"><strong>{{ trans('lang.total') }}:</strong></td>
					  <td class="text-right"><div class="price">{{ '$'.Cart::total()*1.2 }}</div></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div>
		<div class="buttons">
			<div class="pull-left">
				<a href="{{ route('index') }}" class="btn btn-default">{{ trans('lang.shopping_cart') }}</a>
			</div>
		<div class="pull-right">
			<a href="{{ route('cart.checkout') }}" class="btn btn-primary">{{ trans('lang.checkout') }}</a>
		</div>
	  </div>
@else
	<p>{{ trans('lang.your_shopping_cart_is_empty') }}</p>
	<div class="pull-right">
		<a href="{{ route('index') }}" class="btn btn-primary">{{ trans('lang.continue') }}</a>
	</div>
@endif
</div>
</div>