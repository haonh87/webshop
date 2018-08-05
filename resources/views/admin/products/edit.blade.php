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
            <form action="{{ route('products.update', $productData->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group col-sm-4 col-md-8">
                    <label for="category">Danh Mục</label>
                    <select class="form-control selectpicker" title="Chọn danh mục" id="category" name="category_id" required>
                        @php
                            App\Helpers\MenuHelper::showCategories($categories->toArray(), $parent_id = 0, $char = '', $productData->category_id);
                        @endphp
                    </select>
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" value="{{ $productData->name }}" id="name" name="name" placeholder="Tên sản phẩm" required>
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="model">Mô hình</label>
                    <input type="text" class="form-control" value="{{ $productData->model_ids }}" id="model" name="model_ids" placeholder="Mô hình sản phẩm" required>
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" value="{{ $productData->price }}" id="price" name="price" placeholder="Giá sản phẩm" required>
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" rows="5" id="description" name="description" required>{{ $productData->description }}</textarea>
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="content">Nội dung</label>
                    <textarea class="form-control" rows="5" id="content_product" name="content" required>{{ $productData->content }}</textarea>
                </div>

                {{ Form::select('product_color_ids[]', $productColors, null, ['class' => 'form-control hidden', 'id' => 'product_color_ids', 'multiple']) }}

                <div class="form-group col-sm-4 col-md-8">
                    <label for="product_size_ids">Kích cỡ</label>
                    {{ Form::select('product_size_ids[]', $productSizes, explode(',', $productData->product_size_ids), ['class' => 'form-control selectpicker', 'required', 'id' => 'product_size_ids', 'multiple', 'title' => 'Chọn kích cỡ']) }}
                </div>

                <div class="form-group col-sm-4 col-md-8">
                    <label for="product_size_ids">Hình ảnh</label>
                    <div class="file-upload">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Choose File</div>
                            <div class="file-select-name" id="noFile">No file chosen...</div>
                            <input type="file" name="image[]" class="file" id="input-file">
                            {{--<img src="{{ asset('images/' . $productData->productImages[0]->img_path) }}" alt="" class="image_current">--}}
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <div class="row">
                        @foreach($productData->productImages as $image)
                            <div class="col-md-4 image_database">
                                <span class="remove_image_database">x</span>
                                <img src="{{ asset('images/' . $image->img_path) }}" alt="" data-url="{{ $image->img_path }}" class="image_current">
                                <input type="hidden" name="remove_image[]" value="" class="remove_image">
                            </div>
                        @endforeach
                    </div>
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
            var html = '<div class="form-group col-sm-4 col-md-8 image_new"><span class="remove_image">x</span>' +
                '<label for="color">Color:</label>' +
                '<select type="text" class="form-control select2_addNew" name="color['+i+']" placeholder="Màu sắc" required>' +
                +''+$('#product_color_ids').html() +''+'</select>' +
                '<div class="file-upload">' +
                '<div class="file-select">' +
                '<div class="file-select-button" id="fileName">Choose File</div>' +
                '<div class="file-select-name" id="noFile">No file chosen...</div>' +
                '<input type="file" name="image[]" class="file" id="input-file" required>' +
                '</div>' +
                '</div>'+
                '</div>';
            $(this).parent().before(html).promise().done(function( arg1 ) {
                $('.select2_addNew').select2();
                $('.file').bind('change', function () {
                    var filename = $(this).val();
                    if (/^\s*$/.test(filename)) {
                        $(this).closest(".file-upload").removeClass('active');
                        $(this).closest(".file-upload").find("#noFile").text("No file chosen...");
                    }
                    else {
                        $(this).closest(".file-upload").addClass('active');
                        $(this).closest(".file-upload").find("#noFile").text(filename.replace("C:\\fakepath\\", ""));
                    }
                });
            });
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

        $( document ).ready(function() {
            $('.selectpicker').select2();
            $('.file').bind('change', function () {
                var filename = $(this).val();
                if (/^\s*$/.test(filename)) {
                    $(this).closest(".file-upload").removeClass('active');
                    $(this).closest(".file-upload").find("#noFile").text("No file chosen...");
                }
                else {
                    $(this).closest(".file-upload").addClass('active');
                    $(this).closest(".file-upload").find("#noFile").text(filename.replace("C:\\fakepath\\", ""));
                }
            });
            $(document).on('click', '.remove_image', function () {
                $(this).closest('.image_new').remove();
            });
            $(document).on('click', '.remove_image_database', function () {
                $(this).closest('.image_database').addClass('wrap_image_remove');
                var value = $(this).closest('.image_database').find('.image_current').attr('data-url');
                $(this).closest('.image_database').find('.remove_image').val(value);
            });
        });
    </script>
@endsection