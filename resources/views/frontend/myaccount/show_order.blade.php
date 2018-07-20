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
                    {{--{{dd($orderItem)}}--}}
                    @foreach($orderItem as $item)
                        {{--{{dd($item->size)}}--}}
                        <tr class="table table-striped">
                            <td>
                                <a href = "{{ route('product.show', $item->product->id) }}">
                                    {{ $item->product->localeName() }}
                                </a>
                            </td>
                            <td>{{ $item->product->model }}</td>
                            <td>{{ $item->product->artice_id }}</td>
                            <td>
                                <a href = "{{ route('category', ['cat_id'=>$item->product->category->id]) }}">
                                    {{ $item->product->category->localeName() }}
                                </a>
                            </td>
                            <td>{{ $item->product->silk_id }}</td>
                            <td>{{ $item->color->localeColor() }}</td>
                            <td>{{ $item->size->size }}</td>
                            <td>{{ $item->product->price }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection