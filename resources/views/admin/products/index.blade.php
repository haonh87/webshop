@extends('layouts.admin.app')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			<a href="{{-- {{ route('admin.products.create') }} --}}" class="btn btn-info">Create New Product</a>
		</div>
		<?php 
			$old_product_name="";
			$old_cate_id = "";
			if(isset($pro_name)){
				$old_product_name = $pro_name;
			}
			if(isset($cate_id)){
				$old_cate_id = $cate_id;
			}
		?>
	  	<div class="col-xs-6 col-md-6">
	  	<form action="{{ route('admin.product.search') }}" method="get" accept-charset="utf-8" class="form-inline" role="form">
		  	<div class="row">
		  		<div class="form-group">    
		            <input type="text" name='pro_name' class="form-control" 
		            placeholder="Product name" value="{{ $old_product_name }}"/>
			    </div>
	  			<div class="form-group">
				<select class="form-control" name="cate_id">
					<option value="">Select Category</option>
				</select>
				</div>
		        <button type="submit" id="search" class='btn btn-primary'>Search</button>
		  	</div>
	  	</form>
			
	  	</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>NAME</th>
	        <th>PRICE</th>
	        <th>CATEGORY</th>
	        <th>DESCRIPTION</th>
	        <th>RATE</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>
	</table>
	{!! '<center>'.$products->appends(Request::except('page'))->render().'</center>' !!}
</div>
<script type="text/javascript">
	$(".compress").hover(function(){
  	$(".image").show();
},
function(){
   $(".image").hide()
}
);
</script>
@stop
