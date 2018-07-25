<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GYMBEO</title>
    <link type="text/css" href="{{ asset('admins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    {{--<link type="text/css" href="{{ asset('admins/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">--}}
    <link type="text/css" href="{{ asset('admins/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admins/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
    <link type="text/css" href="{{ asset('admins/custom.css') }}" rel="stylesheet">
@yield('css_open')
<!-- jQuery -->
    <script src="{{ asset('admins/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admins/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
</head>

<body>
<!-- header -->
@include('layouts.admin.widgets.header')
<!-- header -->

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <!-- menu left -->
            @include('layouts.admin.widgets.sidebar')
            <!-- menu left -->
            </div>
            <!--/.span3-->
            <div class="span9">
                <div class="content">
                    <div class="module">
                        @yield('content')
                    </div>
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<div class="footer">
    <div class="container">
        <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
    </div>
</div>
{{--<div id="wrapper">--}}

{{--<!-- Navigation -->--}}
{{--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">--}}
{{--<!-- Brand and toggle get grouped for better mobile display -->--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">--}}
{{--<span class="sr-only">Toggle navigation</span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="{{route('adminIndex')}}">MPMODA Admin</a>--}}
{{--</div>--}}
{{--<!-- Top Menu Items -->--}}
{{--<ul class="nav navbar-right top-nav">--}}
{{--<li class="dropdown">--}}
{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>--}}
{{--{{ Auth::user()->name }}--}}
{{--<b class="caret"></b></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li>--}}
{{--<a href="{{ route('logout') }}"><i class="fa fa-fw fa-user"></i> Logout</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<div class="collapse navbar-collapse navbar-ex1-collapse">--}}
{{--<ul class="nav navbar-nav side-nav">--}}
{{--<li>--}}
{{--<a href="--}}{{-- {{ route('admin.products.index') }} --}}{{--"><i class="fa fa-fw fa-dashboard"></i>Product--}}
{{--Management</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ action('Admin\CategoryController@index') }}"><i class="fa fa-fw fa-dashboard"></i>Category--}}
{{--Management</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ action('Admin\VoteController@index') }}"><i class="fa fa-fw fa-dashboard"></i>Vote--}}
{{--Management</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ action('Admin\OrderController@index') }}">--}}
{{--<i class="fa fa-fw fa-dashboard"></i>Order Management</a>--}}
{{--</li>--}}
{{--@if(Auth::user()->role_id ==1)--}}
{{--<li>--}}
{{--<a href="{{ action('Admin\UserController@index') }}"><i class="fa fa-fw fa-dashboard"></i>Account--}}
{{--Management</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{ action('Admin\CustomerController@index') }}"><i class="fa fa-fw fa-dashboard"></i>Customer--}}
{{--Management</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--<!-- /.navbar-collapse -->--}}
{{--</nav>--}}

{{--<div id="page-wrapper">--}}

{{--<div class="container-fluid">--}}

{{--<!-- Page Heading -->--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12">--}}
{{--@yield('content')--}}
{{--</div>--}}
{{--</div>--}}
{{--<!-- /.row -->--}}

{{--</div>--}}
{{--<!-- /.container-fluid -->--}}

{{--</div>--}}
{{--<!-- /#page-wrapper -->--}}

{{--</div>--}}
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ asset('admins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/common.js') }}" type="text/javascript"></script>
@yield('script_close')
</body>
</html>
