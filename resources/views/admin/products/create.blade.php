@extends('layouts.admin.app')

@section('css_open')
 <link href="{{ asset('/css1/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
@stop
@section('script_close')
<script src="{{ asset('js1/fileinput.min.js') }}" type="text/javascript"></script>
@stop
@section('content')
<div id="content">
@if(Session::has('message'))
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('message') }}</strong>
  </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-error fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ Session::get('error') }}</strong>
  </div>
@endif
    <div class="page-header">
        <h1>Tạo mới sản phẩm</h1>
    </div>
    
    <div class="container">
    <br/>
    <br>
        <form action="{{ route('products.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
            <div class="form-group col-sm-4 col-md-8">
                <label for="category">Danh Mục</label>
                  <select class="form-control selectpicker" title="Chọn danh mục" id="category" name="category_id" required>
                      @php
                          App\Helpers\MenuHelper::showCategories($categories->toArray())
                      @endphp
                  </select>
            </div>

            <div class="form-group col-sm-4 col-md-8">
              <label for="name">Tên sản phẩm</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm" required>
            </div>

            <div class="form-group col-sm-4 col-md-8">
              <label for="model">Mô hình</label>
              <input type="text" class="form-control" id="model" name="model_ids" placeholder="Mô hình sản phẩm" required>
            </div>

            <div class="form-group col-sm-4 col-md-8">
              <label for="price">Giá</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="Giá sản phẩm" required>
            </div>

            <div class="form-group col-sm-4 col-md-8">
              <label for="description">Mô tả</label>
              <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
            </div>

            <div class="form-group col-sm-4 col-md-8">
                <label for="content">Nội dung</label>
                <textarea class="form-control" rows="5" id="content_product" name="Nội dung sản phẩm" required></textarea>
            </div>

            {{ Form::select('product_color_ids[]', $productColors, null, ['class' => 'form-control hidden', 'id' => 'product_color_ids', 'multiple']) }}

            <div class="form-group col-sm-4 col-md-8">
                <label for="product_size_ids">Kích cỡ</label>
                {{ Form::select('product_size_ids[]', $productColors, null, ['class' => 'form-control selectpicker', 'required', 'id' => 'product_size_ids', 'multiple', 'title' => 'Chọn kích cỡ']) }}
            </div>

            <div class="form-group col-sm-4 col-md-8">
                <input id="input-file" class="file" type="file" multiple data-min-file-count="1" name="image[]" required>
            </div>

            <div class="form-group col-sm-4 col-md-8">
                <button id="add_image" type="button" class="btn btn-primary">Add Picture</button>
            </div>

            <div class ="form-group col-sm-4 col-md-8">
                <br>
                <a class="btn btn-success" href="{{ action('Admin\ProductController@index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script type="text/javascript">
    var i=1;
    $("#add_image").click(function() {
        $(this).parent().before('<div class="form-group col-sm-4 col-md-8">' +
        '<label for="color">Color:</label>' +
        '<select type="text" class="form-control" name="color['+i+']" placeholder="Màu sắc" required>' +
        +''+$('#product_color_ids').html() +''+'</select></div>' +
        '<div class="form-group col-sm-4 col-md-8">' +
        '<input id="input-file" class="file" type="file" multiple data-min-file-count="1" name = "image[]" required>' +
        '</div>');
        i++;
        $.getScript("{{ asset('js1/fileinput.min.js') }}")
    });
    $("#frmExcel").submit(function( event ) {
      var ext = $('#myFile').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['xls','xlsx']) == -1) {
            alert('invalid extension!');
            return false;
        }
      return true;
    });
    $("input:checkbox").click(function() {
        if ($(this).is(":checked")) {
            var group = "input:checkbox[name='" + $(this).attr("name") + "']";
            $(group).prop("checked", false);
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
    CKEDITOR.replace( 'content_product' );
</script>
@endsection