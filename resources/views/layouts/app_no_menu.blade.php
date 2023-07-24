<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    @include('layouts.google-tag-head')

    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    {{--    <title>{{config('app.name')}} - @yield('title')</title>--}}

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{url('images/favicon.png')}}">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{url('css/magnific-popup.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('css/font-awesome.css')}}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{url('css/jquery.fancybox.min.css')}}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{url('css/themify-icons.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{url('css/niceselect.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{url('css/flex-slider.min.css')}}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{url('css/owl-carousel.css')}}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{url('css/slicknav.min.css')}}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{url('css/reset.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/responsive.css')}}">

    @yield('style')


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
@include('layouts.google-tag-body')

<div id="app">

    <!-- Header -->
{{--    <header class="header shop">--}}
{{--        <!-- Topbar -->--}}
{{--        <div class="topbar">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-5 col-md-12 col-12">--}}
{{--                        <!-- Top Left -->--}}
{{--                        <div class="top-left">--}}
{{--                            <ul class="list-main">--}}
{{--                                --}}{{--                                <li><i class="ti-headphone-alt"></i> Soon</li>--}}
{{--                                <li><a href="{{url('contact')}}"><i class="ti-email"></i> info@exporta.com</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!--/ End Top Left -->--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-7 col-md-12 col-12">--}}
{{--                        <!-- Top Right -->--}}
{{--                        <div class="right-content">--}}
{{--                            <ul class="list-main">--}}
{{--                                <!-- <li><i class="ti-location-pin"></i> Store location</li>--}}
{{--                                <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> -->--}}

{{--                                @if (Route::has('login'))--}}
{{--                                    @auth--}}
{{--                                        <li><i class="ti-dashboard"></i> <a href="{{ url('/dashboard') }}">Dashboard</a></li>--}}
{{--                                        --}}{{--                                    @else--}}
{{--                                        <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>--}}
{{--                                        --}}{{--                                        @if (Route::has('register'))--}}
{{--                                        --}}{{--                                            <li><i class="ti-user"></i><a href="{{ route('register') }}">Register</a></li>--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                    @endauth--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- End Top Right -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- End Topbar -->--}}
{{--        <div class="middle-inner">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-2 col-md-2 col-12">--}}
{{--                        <!-- Logo -->--}}
{{--                        <div class="logo">--}}
{{--                            <a href="{{url('/')}}"><img src="{{url('images/5.png')}}" alt="logo"></a>--}}
{{--                        </div>--}}
{{--                        <!--/ End Logo -->--}}
{{--                        <!-- Search Form -->--}}
{{--                        <div class="search-top">--}}
{{--                            <div class="top-search"><a href="#"><i class="ti-search"></i></a></div>--}}
{{--                            <!-- Search Form -->--}}
{{--                            <div class="search-top">--}}
{{--                                <form class="search-form" method="GET" action="{{url('/search')}}">--}}
{{--                                    <input type="text" placeholder="Search here..." name="s" value="{{ request('s') }}">--}}
{{--                                    <button value="s" type="submit"><i class="ti-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!--/ End Search Form -->--}}
{{--                        </div>--}}
{{--                        <!--/ End Search Form -->--}}
{{--                        <div class="mobile-nav"></div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-8 col-md-7 col-12">--}}
{{--                        <div class="search-bar-top">--}}
{{--                            <div class="search-bar">--}}
{{--                                --}}{{--                                <select>--}}
{{--                                --}}{{--                                    <option selected="selected">All Category</option>--}}
{{--                                --}}{{--                                    <option>Animal & Animal Products</option>--}}
{{--                                --}}{{--                                    <option>Vegetable Products</option>--}}
{{--                                --}}{{--                                    <option>Foodstuffs</option>--}}
{{--                                --}}{{--                                    <option>Mineral Products</option>--}}
{{--                                --}}{{--                                    <option>Chemicals & Allied Industries</option>--}}
{{--                                --}}{{--                                    <option>Plastics / Rubbers</option>--}}
{{--                                --}}{{--                                    <option>Raw Hides, Skins, Leather, & Furs</option>--}}
{{--                                --}}{{--                                    <option>Wood & Wood Products</option>--}}
{{--                                --}}{{--                                    <option>Textiles</option>--}}
{{--                                --}}{{--                                    <option>Footwear / Headgear</option>--}}
{{--                                --}}{{--                                    <option>Stone / Glass</option>--}}
{{--                                --}}{{--                                    <option>Metals</option>--}}
{{--                                --}}{{--                                    <option>Machinery / Electrical</option>--}}
{{--                                --}}{{--                                </select>--}}
{{--                                <form method="GET" action="{{url('/search')}}">--}}
{{--                                    <input name="s" placeholder="Search Products Here..." type="search" value="{{ request('s') }}">--}}
{{--                                    <button class="btnn" type="submit"><i class="ti-search"></i></button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-2 col-md-3 col-12">--}}
{{--                        <div class="right-bar">--}}
{{--                            <!-- Search Form -->--}}
{{--                            <div class="sinlge-bar">--}}
{{--                                <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>--}}
{{--                            </div>--}}
{{--                            <div class="sinlge-bar">--}}
{{--                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>--}}
{{--                            </div>--}}
{{--                            @auth--}}
{{--                                <div class="sinlge-bar">--}}
{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                    <a href="{{ route('logout') }}" class="single-icon" onclick="event.preventDefault();--}}
{{--                               document.getElementById('logout-form').submit();" title="{{ __('Logout') }}"><i class="fa fa-key" aria-hidden="true"></i></a>--}}
{{--                                </div>--}}
{{--                            @endauth--}}
{{--                            <!-- <div class="sinlge-bar shopping">--}}
{{--                            <a href="#" class="single-icon"><i class="ti-bag"></i>  -->--}}
{{--                            <!-- <span class="total-count">2</span> -->--}}
{{--                            <!-- </a> -->--}}
{{--                            <!-- Shopping Item -->--}}
{{--                            <!-- <div class="shopping-item">--}}
{{--                                <div class="dropdown-cart-header">--}}
{{--                                    <span>2 Items</span>--}}
{{--                                    <a href="#">View Cart</a>--}}
{{--                                </div>--}}
{{--                                <ul class="shopping-list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>--}}
{{--                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>--}}
{{--                                        <h4><a href="#">Woman Ring</a></h4>--}}
{{--                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>--}}
{{--                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>--}}
{{--                                        <h4><a href="#">Woman Necklace</a></h4>--}}
{{--                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="bottom">--}}
{{--                                    <div class="total">--}}
{{--                                        <span>Total</span>--}}
{{--                                        <span class="total-amount">$134.00</span>--}}
{{--                                    </div>--}}
{{--                                    <a href="checkout.html" class="btn animate">Checkout</a>--}}
{{--                                </div> -->--}}
{{--                            <!-- </div> -->--}}
{{--                            <!--/ End Shopping Item -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- Header Inner -->--}}
{{--        <div class="header-inner">--}}
{{--            <div class="container">--}}
{{--                <div class="cat-nav-head">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-3">--}}
{{--                            <div class="all-category">--}}
{{--                                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>--}}
{{--                                <ul class="main-category">--}}
{{--                                    @foreach($categoriesInMenus as $category)--}}
{{--                                        <li><a href="{{url('/category/'.$category->slug)}}">{{$category->category}}</a></li>--}}

{{--                                    @endforeach--}}
{{--                                    --}}{{--                                    <li><a href="#">Furniture and interior decoration</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Food and grocery</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Kitchen appliance</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Catering equipment</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Health and beauty</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Handicrafts and decorative</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Clothes, shoes and accessories</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Sport equipment</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Toys, children and baby</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Petrochemicals</a></li>--}}
{{--                                    --}}{{--                                    <li><a href="#">Construction material and equipment</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-9 col-12">--}}
{{--                            <div class="menu-area">--}}
{{--                                <!-- Main Menu -->--}}
{{--                                <nav class="navbar navbar-expand-lg">--}}
{{--                                    <div class="navbar-collapse">--}}
{{--                                        <div class="nav-inner">--}}
{{--                                            <ul class="nav main-menu menu navbar-nav">--}}
{{--                                                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>--}}
{{--                                                <li class="{{ request()->is('brands') ? 'active' : '' }}"><a href="{{ url('/brands') }}">Brands</a></li>--}}
{{--                                                <li class="{{ request()->is('products') ? 'active' : '' }}"><a href="{{ url('/products') }}">Products</a></li>--}}
{{--                                                --}}{{--                                                <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{ url('/services') }}">Services</a></li>--}}
{{--                                                <!-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>--}}
{{--                                                    <ul class="dropdown">--}}
{{--                                                        <li><a href="cart.html">Cart</a></li>--}}
{{--                                                        <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li> -->--}}
{{--                                                --}}{{--                                                <li class="{{ request()->is('posts') ? 'active' : '' }}"><a href="{{ url('/posts') }}">Posts</a></li>--}}
{{--                                                --}}{{--                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>--}}
{{--                                                --}}{{--                                                <ul class="dropdown">--}}
{{--                                                --}}{{--                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>--}}
{{--                                                --}}{{--                                                </ul>--}}
{{--                                                --}}{{--                                            </li>--}}
{{--                                                --}}{{--                                                <li class="{{ request()->is('pricing') ? 'active' : '' }}"><a href="{{ url('/pricing') }}">Pricing</a></li>--}}
{{--                                                <li class="{{ request()->is('faq') ? 'active' : '' }}"><a href="{{ url('/faq') }}">FAQ</a></li>--}}
{{--                                                <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}">Contact Us</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </nav>--}}
{{--                                <!--/ End Main Menu -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!--/ End Header Inner -->--}}
{{--    </header>--}}
    <!--/ End Header -->
    <main class="">
        @yield('content')
    </main>
    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{url('images/logo2.png')}}" alt="#"></a>
                            </div>
                            <p class="text">
                                We at Exportaworld have provided different products that you may choose your desired quality and quantity. We are not distributor but exporter.
                            </p>
                            <p class="call">Got Question? Send us 24/7<span><a href="{{route('contact.index')}}">Contact us</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
{{--                    <div class="col-lg-2 col-md-6 col-12">--}}
{{--                        <!-- Single Widget -->--}}
{{--                        <div class="single-footer links">--}}
{{--                            <h4>Information</h4>--}}
{{--                            <ul>--}}
{{--                                <li><a href="{{url('about')}}">About Us</a></li>--}}
{{--                                <li><a href="{{url('faq')}}">Faq</a></li>--}}
{{--                                --}}{{--                                <li><a href="#">Terms & Conditions</a></li>--}}
{{--                                <li><a href="{{ url('contact') }}">Contact Us</a></li>--}}
{{--                                --}}{{--                                <li><a href="#">Help</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Widget -->--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-2 col-md-6 col-12">--}}
{{--                        <!-- Single Widget -->--}}
{{--                        <div class="single-footer links">--}}
{{--                            <h4>Customer Service</h4>--}}
{{--                            <ul>--}}
{{--                                <li><a href="#">Payment Methods</a></li>--}}
{{--                                <li><a href="#">Shipping</a></li>--}}
{{--                                <li><a href="#">Privacy Policy</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Widget -->--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-3 col-md-6 col-12">--}}
{{--                        <!-- Single Widget -->--}}
{{--                        <div class="single-footer social">--}}
{{--                            <h4>Get In Tuch</h4>--}}
{{--                            <!-- Single Widget -->--}}
{{--                            <div class="contact">--}}
{{--                                <ul>--}}
{{--                                    3 Jacinth Court, Huddersfield, West Yorkshire, HD2 1DT--}}
{{--                                    <li>3 Jacinth Court, Huddersfield,</li>--}}
{{--                                    <li>West Yorkshire, HD2 1DT</li>--}}
{{--                                    <li><a href="mailto=info@exportaworld.com">info@exportaworld.com</a></li>--}}
{{--                                    --}}{{--                                    <li>+032 3456 1111</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <!-- End Single Widget -->--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="ti-facebook"></i></a></li>--}}
{{--                                <li><a href="#"><i class="ti-twitter"></i></a></li>--}}
{{--                                <li><a href="#"><i class="ti-flickr"></i></a></li>--}}
{{--                                <li><a href="#"><i class="ti-instagram"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- End Single Widget -->--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <div class="copyright">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2020 <a href="{{ url('/') }}" target="_blank">Exportaworld</a>  -  All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right">
                                <img src="{{url('images/payments.png')}}" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /End Footer Area -->
</div>

<!-- Jquery -->
<script src="{{url('js/jquery.min.js')}}"></script>
<script src="{{url('js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{url('js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
<!-- Color JS -->
<script src="{{url('js/colors.js')}}"></script>
<!-- Slicknav JS -->
<script src="{{url('js/slicknav.min.js')}}"></script>
<!-- Owl Carousel JS -->
<script src="{{url('js/owl-carousel.js')}}"></script>
<!-- Magnific Popup JS -->
<script src="{{url('js/magnific-popup.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{url('js/waypoints.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{url('js/finalcountdown.min.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{url('js/nicesellect.js')}}"></script>
<!-- Flex Slider JS -->
<script src="{{url('js/flex-slider.js')}}"></script>
<!-- ScrollUp JS -->
<script src="{{url('js/scrollup.js')}}"></script>
<!-- Onepage Nav JS -->
<script src="{{url('js/onepage-nav.min.js')}}"></script>
<!-- Easing JS -->
<script src="{{url('js/easing.js')}}"></script>
<!-- Active JS -->
<script src="{{url('js/active.js')}}"></script>
@yield('script')


</body>
</html>
