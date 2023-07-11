@extends('layouts.app')
@section('title','Home')

@section('content')
<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12">
                    <div class="text-inner">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="hero-text">
                                    <h1><span>New Products </span>+128 New Arrivals</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="button">
                                        <a href="#" class="btn">Explore Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->



<!-- Start Midium Banner  -->
<section class="midium-banner mt-4">
    <div class="container">
        <div class="row">
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{asset('storage/images/cup.jpg')}}" alt="#">
                    <div class="content">
                        <p>White Label</p>
                        <h3>Use your <br>own<span> BRAND</span></h3>
                        <a href="#">Turn on your factory</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{asset('storage/images/stone.jpg')}}" alt="#">
                    <div class="content">
                        <p>be natural</p>
                        <h3>stones from the  <br> mines of <span>IRAN</span></h3>
                        <a href="#" class="btn">start Explore</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Midium Banner -->



<section class="section free-version-banner" style="margin-top: 200px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 offset-md-2 col-xs-12">
                <div class="section-title mb-60">
                    <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Welcome to Exporta</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Currently You are using <br> very first Version of Exporta.</h2>
                    <p class="text-white wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        Please, contact us for more information</p>

                    <div class="button">
                        <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" rel="nofollow" class="btn wow fadeInUp" data-wow-delay=".8s">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4 col-12 mb-4" style="margin-top: 30px">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <a href="{{url('/post',$post->id)}}" title="{{$post->visit_count}} view">
                            <img src="@if(isset($post->featured_image)){{asset('storage/images/',$post->featured_image)}}@else https://via.placeholder.com/370x370 @endif" alt="{{$post->title}}">
                        </a>
                        <div class="content">
                            <p class="date">{{$post->created_at}}</p>
                            <a href="{{url('/post',$post->id)}}" class="title">{{$post->title}}</a>
                            <a href="{{url('/post',$post->id)}}" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            @empty
                    There is no post here
            @endforelse
        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>shiping managment</h4>
                    <p>save your money</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Report monthly</h4>
                    <p>Look what you have done</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Pricing</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get <span>5%</span> off your first subscription</p>
                        <form action="" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Your email address" required="" type="email">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
@endsection
