<!doctype html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}'s Dashboard | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{url('images/dfavicon.png')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="{{url('assets/css/export.css')}}" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/responsive.jqueryui.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{url('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{url('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>



</head>

<body>

{{--<!--[if lt IE 8]>--}}
{{--<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>--}}
{{--<![endif]-->--}}
<!-- preloader area start -->
{{--<div id="preloader">--}}
{{--    <div class="loader"></div>--}}
{{--</div>--}}
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    @include('dashboard.menu')
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        @include('dashboard.header')
        <!-- header area end -->
        <div class="main-content-inner">

            @yield('content')

        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <span class="text-sm-left"><a href="{{url('/')}}">{{config('app.name')}}</a>. © Copyright 2023. All right reserved.</span>
        </div>
    </footer>
    <!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->
@include('dashboard.offset')
<!-- offset area end -->
<!-- jquery latest version -->
<script src="{{url('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{url('assets/js/popper.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('assets/js/metisMenu.min.js')}}"></script>
<script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('assets/js/jquery.slicknav.min.js')}}"></script>

{{--<!-- start chart js -->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>--}}
{{--<!-- start highcharts js -->--}}
{{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--<!-- start zingchart js -->--}}
{{--<script src="https://cdn.zingchart.com/zingchart.min.js"></script>--}}
{{--<script>--}}
{{--    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";--}}
{{--    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];--}}
{{--</script>--}}
<!-- all line chart activation -->
<script src="{{url('assets/js/line-chart.js')}}"></script>
<!-- all pie chart -->
<script src="{{url('assets/js/pie-chart.js')}}"></script>
<!-- Start datatable js -->
<script src="{{url('assets/js/jquery.dataTables.js')}}"></script>
<script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('assets/js/responsive.bootstrap.min.js')}}"></script>
<!-- others plugins -->
<script src="{{url('assets/js/plugins.js')}}"></script>
<script src="{{url('assets/js/scripts.js')}}"></script>
@yield('script')
</body>

</html>
