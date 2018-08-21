@extends('layouts.admin.app')

@section('content')

  @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif
    <div class="row">
    <div class="module-head">
        <h1>
            <span>Danh sách đơn hàng</span>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-condensed margin-bottom-10">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên khách</th>
                            <th>SDT</th>
                            <th>Địa chỉ</th>
                            <th>Thanh Toán</th>
                            <th>Ghi chú</th>
                            <th>Ngày giao hàng</th>
                            <th>Trạng thái</th>
                            <th>Tổng giá</th>
                            <th class="text-right">Lựa chọn</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>
                            <a href ="#">{{ $order->customer->name }}</a>
                        </td>
                        <td>{{ $order->customer->mobile }}</td>
                        <td>{{ $order->customer->address }}</td>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $order->note }}</td>
                        <td>{{ $order->deliver_date }}</td>
                        <td>
                            @if($order->status==1)
                                {{ 'Ordered' }}
                            @else
                                {{ 'None' }}
                            @endif
                        </td>
                        <td>{{ $order->total }}</td>
                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ action('Admin\OrderController@show', $order->id) }}">View</a>
                            <a class="btn btn-warning " href="{{ action('Admin\OrderController@edit', $order->id) }}">Edit</a>
                            <form action="{{ action('Admin\OrderController@destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>
            {!! '<center>'.$orders->appends(Request::except('page'))->render().'</center>' !!}
        </div>
    </div>
    </div>
@endsection