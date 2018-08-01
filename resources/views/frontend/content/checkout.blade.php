@section('script')
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
</script>
@stop
<div id="content" class="col-sm-9">
	<h1>{{ trans('lang.checkout') }}</h1>
	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<div class="panel-collapse collapse in"
				id="collapse-checkout-confirm" style="height: auto;">
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<td class="text-left">{{ trans('lang.product_name') }}</td>
									<td class="text-left">{{ trans('lang.model') }}</td>
									<td class="text-right">{{ trans('lang.quantity') }}</td>
									<td class="text-right">{{ trans('lang.unit_price') }}</td>
									<td class="text-right">{{ trans('lang.total') }}</td>
								</tr>
							</thead>
							<tbody>
							@foreach(Cart::content() as $item)
								<?php
								$product = $item->product;
								$img_src = "images/products/product".$item->id."/";
								$product_color = App\Models\ProductColor::find($item->options->color);
								$product_size = App\Models\ProductSize::find($item->options->size_option);
								?>
								<tr>
									<td class="text-left">
										<a href="{{ route('product.show', ['product_id'=>$item->id]) }}">{{ $product->localeName() }}</a>
										<br>
										<small>Color: {{ $product_color->localeColor() }}</small>
										<br>
										<small>Size: {{ $product_size->size }}</small>

									</td>
									<td class="text-left">{{ $item->product->artice_id }}</td>
									<td class="text-right">{{ $item->qty }}</td>
									<td class="text-right">{{ $item->price }}</td>
									<td class="text-right">{{ $item->subtotal }}</td>
								</tr>
							@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="4" class="text-right"><strong>{{ trans('lang.sub_total') }}:</strong></td>
									<td class="text-right">${{ Cart::total() }}</td>
								</tr>
								<tr>
									<td colspan="4" class="text-right"><strong>{{trans('lang.VAT') }} (20%):</strong></td>
									<td class="text-right">${{ Cart::total()*0.2 }}</td>
								</tr>
								<tr>
									<td colspan="4" class="text-right"><strong>{{ trans('lang.total') }}:</strong></td>
									<td class="text-right">${{ Cart::total()*1.2 }}</td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="buttons">
						<div class="pull-right">
							<input type="button" value="Confirm Order" id="button-confirm"
								class="btn btn-primary"  data-toggle="collapse" data-target="#user_info">
						</div>
						<div class="pull-left">
							<a class="btn btn-large btn-info" href="{{ route('cart.index') }}">{{ trans('lang.back') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
		<?php 
			$name = "";
			$email = "";
			$phone = "";
			$mobile = "";
			$company="";
			$address1 = "";
			$address2 = "";
			$city = "";
			if(Auth::check()){
				if(Auth::user()->customer != null){
					$name = Auth::user()->customer->name;
					$email = Auth::user()->customer->email;
					$phone = Auth::user()->customer->phone;
					$mobile = Auth::user()->customer->mobile;
					$address2 = Auth::user()->customer->address;
				}
			}
		?>
			<div class="collapse panel-body" id = "user_info">
			<form action="{{ route('cart.checkout') }}" method="post" accept-charset="utf-8">
				<div class="row">
					<div class="col-sm-6">
						<fieldset id="account">
							<legend>{{ trans('lang.your_personal_details') }}</legend>
							<div class="form-group required">
								<label class="control-label" for="input-payment-lastname">{{ trans('lang.your_name') }}</label> <input type="text" name="lastname" value="{{ $name }}"
									placeholder="Last Name" id="input-payment-lastname"
									class="form-control" required >
							</div>
							<div class="form-group required">
								<label class="control-label" for="input-payment-email">E-Mail</label>
								<input type="email" name="email" value="{{ $email }}" placeholder="E-Mail" id="input-payment-email" class="form-control" required>
							</div>
							<div class="form-group required">
								<label class="control-label" for="input-payment-telephone">
								{{ trans('lang.telephone') }} (xxx-xxx-xxx)</label>
								<input type="text" name="telephone" value="{{ $phone }}"
									placeholder="Telephone" id="input-payment-telephone"
									class="form-control" required pattern="^\d{4}-\d{3}-\d{4}$">
							</div>
							<div class="form-group">
								<label class="control-label" for="input-payment-fax">{{ trans('lang.mobile') }}</label>
								<input type="text" name="mobile" value="{{ $mobile }}" placeholder="Mobile"
									id="input-payment-fax" class="form-control">
							</div>
						</fieldset>
					</div>
					<div class="col-sm-6">
						<fieldset id="address" class="">
							<legend>{{ trans('lang.your_address') }}</legend>
							<div class="form-group">
								<label class="control-label" for="input-payment-company">{{ trans('lang.company') }}</label>
								<input type="text" name="company" value=""
									placeholder="Company" id="input-payment-company"
									class="form-control">
							</div>
							<div class="form-group required">
								<label class="control-label" for="input-payment-address-1">{{ trans('lang.address') }}
									1</label> <input type="text" name="address_1" value="{{ $address1 }}"
									placeholder="Address 1" id="input-payment-address-1"
									class="form-control" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="input-payment-address-2">{{ trans('lang.address') }}
									2</label> <input type="text" name="address_2" value="{{ $address2 }}"
									placeholder="Address 2" id="input-payment-address-2"
									class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label" for="input-payment-city">{{ trans('lang.city') }}</label>
								<input type="text" name="city" value="{{ $city }}" placeholder="City"
									id="input-payment-city" class="form-control">
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="buttons">
							<div class="pull-right">
									<input type="submit" value="Submit" id="button-submit" class="btn btn-large btn-info"/>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).delegate('#button-login', 'click', function() {
    $.ajax({
        url: "{{ route('login') }}",
        type: 'post',
        data: $('#collapse-checkout-option :input'),
        dataType: 'json',
        beforeSend: function() {
          $('#button-login').button('loading');
    },  
        complete: function() {
            $('#button-login').button('reset');
        },              
        success: function(json) {
            $('.alert, .text-danger').remove();
            $('.form-group').removeClass('has-error');
      
            if (json['success']) {
                $('#collapse-payment-address').toggle();
            } else if (json['error']) {
                $('#collapse-checkout-option .panel-body').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error']['warning'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
           
        // Highlight any found errors
        $('input[name=\'email\']').parent().addClass('has-error');  
        $('input[name=\'password\']').parent().addClass('has-error');    
       }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    }); 
});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/i);
    return pattern.test(emailAddress);
};
//--></script>