@extends('layouts.admin.app')

@section('content')
    @php
        $old_product_name="";
        $old_cate_id = "";
        if(isset($pro_name)){
            $old_product_name = $pro_name;
        }
        if(isset($cate_id)){
            $old_cate_id = $cate_id;
        }
    @endphp
    <div class="module-head">
        <h1>
            <span>Danh sách sản phẩm</span>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-large pull-right">Tạo mới</a>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.product.search') }}" method="get" accept-charset="utf-8" role="form">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <div class="controls-group text-right">
                                <input type="text" name='pro_name' class="form-control"
                                       placeholder="Product name" value="{{ $old_product_name }}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select name="cate_id" class="form-control">
                                <option value="">--Danh mục--</option>
                                @php
                                    App\Helpers\MenuHelper::showCategories($categories->toArray())
                                @endphp
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="control-group">
                                <button type="submit" id="search" class='btn btn-primary btn-large btn-block'>Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped table-condensed table-hover" style="margin-top: 10px;">
            <tr>
                <th>NAME</th>
                <th>PRICE</th>
                <th>CATEGORY</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('products.show',['product_id'=>$product->id]) }}">{{$product->name}}</a>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{ route('admin.category-management',$product->category->id) }}">{{$product->category->name}}</a>
                    </td>
                    <td>
                        <a href="{{ route('products.show',['product_id'=>$product->id]) }}">
                            <img src="{{ '' }}" class="img-rounded compress" style="width:7em; height:5em;"/>
                        </a>
                    </td>
                    <td>
                        <div style=" display: table">
                            <div style="display: table-cell;  vertical-align: center;">
                                <a href="{{ route('products.show',['product_id'=>$product->id]) }}"
                                   class="btn btn-info">View</a>
                            </div>
                            <div style="display: table-cell;  vertical-align: center;">
                                <a href="{{ route('products.edit',['product_id'=>$product->id]) }}"
                                   class="btn btn-warning">Edit</a>
                            </div>
                            <div style="display: table-cell;  vertical-align: center;">
                                <form action="{{ route('products.destroy',['product_id'=>$product->id]) }}"
                                      method="POST" style="display: inline;"
                                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE"><input type="hidden"
                                                                                              name="_token"
                                                                                              value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete"/>
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
        $(".compress").hover(function () {
                $(".image").show();
            },
            function () {
                $(".image").hide()
            }
        );
    </script>
@stop
