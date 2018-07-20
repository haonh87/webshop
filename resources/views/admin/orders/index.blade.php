@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h1>Orders</h1>
    </div>

  @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CUSTOMER</th>
                        <th>PAYMENT</th>
                        <th>NOTE</th>
                        <th>DELIVER</th>
                        <th>STATUS</th>
                        <th>TOTAL</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        <a href ="#">
                            {{ App\Customer::findOrFail($order->customers_id)->name }}
                        </a>
                    </td>
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
@endsection