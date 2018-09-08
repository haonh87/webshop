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
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('lang.name') }}</th>
                        <th>{{ trans('lang.birth_day') }}</th>
                        <th>{{ trans('langgender') }}</th>
                        <th>{{ trans('lang.email') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{auth::user()->name}}</td>
                        <td>{{auth::user()->birthdate}}</td>
                        <td>@if(auth::user()->gender==1){{ trans('lang.male') }} @else {{ trans('lang.female') }} @endif</td>
                        <td>{{auth::user()->email}}</td>
                        {{--<td><button class="btn btn-success">Edit</button></td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>

@endsection