@extends('layouts.master')

@section('content')
<!--content center -->
<div class="container">
	<ul class="breadcrumb">
		<li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
		{!!$sub_navi !!}
	</ul>
	<div class="row">
		@include('frontend.sidebar')
		@include($blade_include, ['parametes'=>$parameters, 'parameters2'=>$parameters2])
	</div>
</div>

<script type="text/javascript">
    $('#search-box').remove();
</script>
<!--End content center-->

@stop