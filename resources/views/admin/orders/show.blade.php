@extends('layouts.admin.app')

@section('content')
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ Session::get('message') }}</strong>
          </div>
        @endif
        <div class="module-head">
            <h1>
                <span>Chi tiết đơn hàng</span>
            </h1>
        </div>
        <div class="module-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-condensed margin-bottom-10">
                        <thead>
                          <tr>
                            <th>Tên sản phẩm</th>
                            <th>Model</th>
                            <th>Diễn tả</th>
                            <th>Danh mục</th>
                            <th>Nội dung</th>
                            <th>Màu</th>
                            <th>Độ lớn</th>
                            <th>Giá</th>
                            <th>Chất lượng</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($orderItem as $item)
                          <tr>
                            <td>
                                <a href = "{{ route('products.show', ['p_id'=>$item->product->id]) }}">
                                {{ $item->product->name }}
                                </a>
                            </td>
                            <td>{{ $item->product->model_ids }}</td>
                            <td>{{ $item->product->description }}</td>
                            <td>
                                <a href = "{{ route('admin.category-management', ['cat_id'=>$item->product->category_id]) }}">
                                {{ $item->product->category->name }}
                                </a>
                            </td>
                            <td>{{ $item->product->content }}</td>
                            <td>{{ $item->color->name }}</td>
                            <td>{{ $item->size->name }}</td>
                            <td>{{ $item->product->price }}</td>
                            <td>{{ $item->quantity }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                </table>
                <a class="btn btn-default" href="{{ action('Admin\OrderController@index', $order->id) }}">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection