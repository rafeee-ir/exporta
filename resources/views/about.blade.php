@extends('layouts.app')

@section('title','About us')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">About us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>We Are Exportaworld</h4>
                                <h1>About Us</h1>
                                <p class="pt-3" style="font-size: 1.1rem">We at <span class="text-info">Exportaworld</span> have provided different products that you may choose your desired quality and quantity. We are not distributor but exporter. We have trusted partners all over the world who supply our products. <span class="text-info">Exportaworld</span> is responsible for quality checking and delivering your cargo at any port all over Europe and UK based on your order.</p>
                                <p class="pt-3" style="font-size: 1.1rem">May you are a professional trader, a retailer or a small café, by placing your order online we are ready to ship it from one pallet to containers. Also, you may choose your way of shipping, from air for smaller quantity of orders to ocean freight for higher volumes. We are here to cover your need as the best way we can.</p>
                                <p class="pt-3" style="font-size: 1.1rem">If you have any question about our products and services please write to us using this form, we would be more than happy to help you.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Call us Now:</h4>
                                <ul>
                                    <li>Soon</li>
{{--                                    <li>+522 672-452-1120</li>--}}
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                    <li><a href="mailto:info@exportaworld.com">info@exportaworld.com</a></li>
                                    <li><a href="mailto:sales@exportaworld.com">sales@exportaworld.com</a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Our Address:</h4>
                                <ul>
                                    <li>3 Jacinth Court, Huddersfield, West Yorkshire, HD2 1DT</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->

    {{--    <!-- Map Section -->--}}
    {{--    <div class="map-section">--}}
    {{--        <div id="myMap"></div>--}}
    {{--    </div>--}}
    {{--    <!--/ End Map Section -->--}}

    <!-- Start Shop Newsletter  -->
{{--    <section class="shop-newsletter section">--}}
{{--        <div class="container">--}}
{{--            <div class="inner-top">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-8 offset-lg-2 col-12">--}}
{{--                        <!-- Start Newsletter Inner -->--}}
{{--                        <div class="inner">--}}
{{--                            <h4>Newsletter</h4>--}}
{{--                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>--}}
{{--                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">--}}
{{--                                <input name="EMAIL" placeholder="Your email address" required="" type="email">--}}
{{--                                <button class="btn">Subscribe</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <!-- End Newsletter Inner -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- End Shop Newsletter -->
@endsection
