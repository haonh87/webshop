@extends('layouts.master')
@section('script')

@stop
@section('content')
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
            {!!$sub_navi !!}
        </ul>
        <div class="row">
            @include('frontend.sidebar')
            <div id="content" class="col-sm-9">
                <br><br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>CUSTOMER</th>
                        <th>PAYMENT</th>
                        <th>NOTE</th>
                        <th>DELIVER</th>
                        <th>CREATED</th>
                        <th>STATUS</th>
                        <th>TOTAL</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(!is_null($orders))
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href ="#">
                                    {{ App\Customer::findOrFail($order->customers_id)->name }}
                                </a>
                            </td>
                            <td>{{ $order->payment_type }}</td>
                            <td>{{ $order->note }}</td>
                            <td>{{ $order->deliver_date }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if($order->status==1)
                                    {{ 'Ordered' }}
                                @else
                                    {{ 'None' }}
                                @endif
                            </td>
                            <td>{{ $order->total }}</td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ route('myaccount.order.show', $order->id) }}">View</a>
                                </td>
                        </tr>

                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

@endsection