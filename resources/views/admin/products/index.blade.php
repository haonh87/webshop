@extends('layouts.admin')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			<a href="{{ route('admin.products.create') }}" class="btn btn-info">Create New Product</a>
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
					@foreach($categories as $category)
						<option value="{{$category->id}}" <?php if($category->id == $old_cate_id) {echo "selected";} ?>>
							{{$category->name_ru}}
						</option>
					@endforeach
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
	    @foreach($products as $product)
	    	<?php 
	    		$img = asset('images/products/product'.$product->id.'/'.$product->getIndexImage());
	    	?>
	    	<tr>
	        <td><a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">{{$product->name_ru}}</a></td>
	        <td>{{$product->price}}</td>
	        <td><a href="{{ route('admin.categories.show',$product->category->id) }}">{{$product->category->name_ru}}</a></td>
	        <td>{{$product->description_ru}}</td>
	        <td>{{$product->getStar() . '/5'}}</td>
	        <td>
	        	<a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">
	        		<img src="{{ $img }}" class="img-rounded compress" style="width:7em; height:5em;"/>
	        	</a>
	        </td>
	        <td>
	            <div style=" display: table" >
			        <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}" class="btn btn-info">View</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.edit',['product_id'=>$product->id]) }}" class="btn btn-warning">Edit</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		            <form action="{{ route('admin.products.destroy',['product_id'=>$product->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		            	<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                        	<input type="submit" class = "btn btn-danger" value="Delete" />
			            </form>
			         </div>
	            </div>
	        </td>
	      </tr>
		@endforeach
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
