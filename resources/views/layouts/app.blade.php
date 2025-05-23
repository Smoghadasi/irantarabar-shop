<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
    <title>فروشگاه ایران ترابر</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="" property="og:title">
    <meta content="" property="og:type">
    <meta content="" property="og:url">
    <meta content="" property="og:image">

    <!-- Place favicon.ico in the root directory -->

    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font/bootstrap-icon/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugin/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugin/countdown/countdown.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugin/rasta-contact/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mega-menu.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <meta content="#f4f5f9" name="theme-color">
</head>

<body>

<!-- start header -->

@include('partials.home.header')

<!-- end header -->

<!-- start mega menu -->



<!-- end mega menu -->



@yield('content')

<!-- start footer -->

@include('partials.home.footer')

<!-- end footer -->

<!-- start bottom menu -->

<div class="mobile-footer d-lg-none d-flex">
    <div class="parent">
        <div class="item" onclick="topFunction()">
            <i class="bi bi-chevron-up font-20"></i>
        </div>
        <div class="item">
            <a href="index.html">
                <i class="bi bi-house font-20"></i>
            </a>
        </div>
        <div class="item item-float">
            <a href="#offcanvasCart" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasCart">
                <i class="bi bi-bag font-20"></i>
            </a>
        </div>
        <div class="item">
            <a href="index.html">
                <i class="bi bi-archive"></i>
            </a>
        </div>
        <div class="item">
            <a href="index.html">
                <i class="bi bi-person"></i>
            </a>
        </div>
    </div>
</div>

<!-- end bottom menu -->




<div class="float-btn">
    <div class="container-fluid">
        <!-- contact us floating -->
        <div class=" btn_collapzion" id="btncollapzion"></div>
        <div class="" id="contactOverlay"></div>
        <!-- end contact us floating -->
    </div>
</div>

<script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle-5.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/countdown/countdown.js') }}"></script>
<script src="{{ asset('assets/js/plugin/rasta-contact/script.js') }}"></script>
<script src="{{ asset('assets/js/plugin/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@yield('script')
</body>

</html>
