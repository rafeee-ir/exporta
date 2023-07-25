@extends('layouts.app')
@section('title','Home')

@section('content')
<!-- Slider Area -->
<section class="hero-slider d-none d-md-block">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12">
                    <div class="text-inner">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="hero-text">
                                    <h1><span>{{$set->main_banner_subtitle}} </span>{{$products_count}} New Arrivals</h1>
                                    <p>{{$set->main_banner_text}}</p>
                                    <div class="button">
                                        <a href="{{route('products.index')}}" class="btn">{{$set->main_banner_button_text}}</a>
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
                    <img src="{{url('images/cup.jpg')}}" alt="#">
                    <div class="content">
                        <p>White Label</p>
                        <h3>Use your <br>own<span> BRAND</span></h3>
                        <a href="/contact">Turn on your factory</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
            <!-- Single Banner  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-banner">
                    <img src="{{url('images/stone.jpg')}}" alt="#">
                    <div class="content">
                        <p>be natural</p>
                        <h3>stones from the  <br> mines of <span>IRAN</span></h3>
                        <a href="/products" class="btn">start Explore</a>
                    </div>
                </div>
            </div>
            <!-- /End Single Banner  -->
        </div>
    </div>
</section>
<!-- End Midium Banner -->



<section class="section hero-pro-banner mt-3 mt-md-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 offset-md-2 col-xs-12">
                <div class="section-title mb-60">
                    <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Welcome to Exporta</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Currently You are using <br> very first Version of EXPORTAWORLD.</h2>
                    <p class="text-white wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        Please, contact us for more information</p>

                    <div class="button">
                        <a href="/contact" target="_blank" rel="nofollow" class="btn wow fadeInUp" data-wow-delay=".8s">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Start Shop The Latest Products  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>The Latest Products</h2>
                </div>
            </div>
        </div>
        <div class="owl-carousel">

            @forelse($products as $product)
                <div class="my-4">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <a href="{{url('/products',$product->slug)}}">
                            <img src="@if(isset($product->featured_image)){{asset('storage/uploads/products/'.$product->featured_image)}}@else https://placehold.co/300x300?text={{$product->title}} @endif" alt="{{$product->title}}">
                        </a>
                        <div class="content">
                            <a href="{{url('/products',$product->slug)}}" class="title">{{$product->title}}</a>
{{--                            <p class="card-text mb-4">{{strip_tags(Str::limit($product->description,50))}}</p>--}}
{{--                            <a href="{{url('/products',$product->id)}}" class="more-btn">More Detail</a>--}}
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            @empty
                    There is no post here
            @endforelse
        </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="text-center">
                                <a href="{{route('products.index')}}" class="btn btn-primary" type="button">Visit All Products <i class="ti ti-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- End Shop The Latest Products  -->




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
        <div class="owl-carousel-blog">
            @forelse($posts as $post)
                <div class="my-4">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <a href="{{url('/blog',$post->slug)}}" title="{{$post->title}}">
                            <img class="d-block w-100" style="object-fit: cover; aspect-ratio: 16/9"  src="@if(isset($post->image)) {{asset('storage/uploads/posts/'.$post->image)}} @else https://placehold.co/480x270?text={{$post->title}} @endif" alt="{{$post->title}}">
                        </a>
                        <div class="content">
{{--                            <p class="date">{{$post->created_at}}</p>--}}
                            <a href="{{url('/blog',$post->slug)}}" class="title">{{$post->title}}</a>
                            <p class="card-text mb-4">{{strip_tags(Str::limit($post->content,50))}}</p>
{{--                            <a href="{{url('/post',$post->id)}}" class="more-btn">Continue Reading</a>--}}
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

@include('newsletter')
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                // animateOut: 'fadeOut',
                // animateIn: 'slideInRight',
                items:1,
                stagePadding:50,
                smartSpeed:450,
                margin:20,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            });
            $(".owl-carousel-blog").owlCarousel({
                loop:true,
                // animateOut: 'fadeOut',
                // animateIn: 'slideInRight',
                items:1,
                stagePadding:50,
                smartSpeed:450,
                margin:20,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>


@endsection
