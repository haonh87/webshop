@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h1>Order / Detail/{{ $order->id }} </h1>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif
<table class="table">
    <thead>
      <tr>
        <th>NAME</th>
        <th>MODEL</th>
        <th>CODE</th>
        <th>CATEGORY</th>
        <th>SILK</th>
        <th>COLOR</th>
        <th>SIZE</th>
        <th>PRICE</th>
        <th>QUALTITY</th>
      </tr>
    </thead>
    <tbody>
    @foreach($orderItem as $item)
      {{--{{dd($item->size)}}--}}
      <tr class="success">
        <td>
            <a href = "{{ route('admin.products.show', ['p_id'=>$item->product->id]) }}">
            {{ $item->product->name_ru }}
            </a>
        </td>
        <td>{{ $item->product->model }}</td>
        <td>{{ $item->product->artice_id }}</td>
        <td>
            <a href = "{{ route('admin.categories.show', ['cat_id'=>$item->product->category->id]) }}">
            {{ $item->product->category->name_ru }}
            </a>
        </td>
        <td>{{ $item->product->silk_id }}</td>
        <td>{{ $item->color->color_ru }}</td>
        <td>{{ $item->size->size }}</td>
        <td>{{ $item->product->price }}</td>
        <td>{{ $item->quantity }}</td>
      </tr>
    @endforeach
    </tbody>
</table>

            <a class="btn btn-default" href="{{ action('Admin\OrderController@index', $order->id) }}">Back</a>
        </div>
    </div>


@endsection