@extends('layouts.admin.app')

@section('content')
<div id="content">
    <div class="page-header">
        <h1>Chi tiết sản phẩm</h1>
    </div>

<table class="table">
    <thead>
      <tr>
        <th>Mã</th>
        <th>Loại</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Lượt xem</th>
        <th>Lượng bán</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{$product->id}}</td>
        <td>
            <a href="{{ route('admin.category-management',$product->category->id) }}">{{$product->category->name}}</a>
        </td>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>
        @if(!empty($product->view_count))
            <span>{{$product->view_count}}</span>
        @else
            <span>0</span>
        @endif
        </td>
        <td>
        @if(!empty($product->sell_count))
            <span>{{$product->sell_count}}</span>
        @else
            <span>0</span>
        @endif
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <center><h3>Ảnh sản phẩm</h3></center><br/>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
        @foreach($product->productImages as $key => $productImage)
            <div <?php
                if($key == 0){
                    echo 'class="item active"';
                }else{
                    echo 'class="item"';
                }
             ?>>
              <img src="{{ asset('images/' . $productImage->img_path) }}" alt="Chania">
            </div>
        @endforeach
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div>

            <a class="btn btn-default" href="{{ action('Admin\ProductController@index') }}">Back</a>
            <a class="btn btn-warning" href="{{ action('Admin\ProductController@edit', $product->id) }}">Edit</a>
            <form action="{{ action('Admin\ProductController@destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
</div>
@endsection