<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GYMBEO</title>
    <link type="text/css" href="{{ asset('admins/custom.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('admins/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
    <link type="text/css" href="{{ asset('admins/css/theme.css') }}" rel="stylesheet">
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
            <div class="col-md-3">
                <!-- menu left -->
            @include('layouts.admin.widgets.sidebar')
            <!-- menu left -->
            </div>
            <!--/.span3-->
            <div class="col-md-9">
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
<script src="{{ asset('admins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
<script src="{{ asset('admins/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
{{--to file not load--}}
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
{{--to file not load--}}
<script src="{{ asset('admins/scripts/common.js') }}" type="text/javascript"></script>
@yield('script')
</body>
</html>
