@extends('layouts.master')
@section('content')
    <center>
        <div id="container" class="clear">
            <section id="fof" class="clear">
                <div class="hgroup">
                    <h1><a href="{{route('index')}}" style="
    text-decoration: underline;
    font-family: initial;
    color: #0F1167;
">MPMODA</a></h1>
                    <h2>Error ! <span></span></h2>
                    <h3>Function Maintained. Be right back.</h3>
                </div>
                <h5 style="color: #DF9813;"><a href="javascript:history.go(-1)">&laquo; Go Back</a> / <a href="{{route('index')}}">Go Home &raquo;</a></h5>
                <h5>{{$logTime}}</h5>
            </section>
        </div>
    </center>
@stop