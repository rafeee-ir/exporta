@extends('layouts.app')
@section('title','Posts')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">

            <div class="row blog-single-main">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-md-6 col-12 mb-4" style="margin-top: 30px">
                                <!-- Start Single Blog  -->
                                <div class="shop-single-blog">
                                    <a href="{{url('/blog',$post->slug)}}" title="{{$post->title}}">
                                        <img class="d-block w-100" style="object-fit: cover; aspect-ratio: 16/9"  src="@if(isset($post->image)) {{asset('storage/uploads/posts/'.$post->image)}} @else https://placehold.co/480x270?text={{$post->title}} @endif" alt="{{$post->title}}">
                                    </a>
                                    <div class="content">
{{--                                        <p class="date">{{$post->created_at}}</p>--}}
                                        <a href="{{url('/blog',$post->slug)}}" class="title">{{$post->title}}</a>
                                        <p class="card-text mb-4">{{strip_tags(Str::limit($post->content,50))}}</p>
{{--                                        <a href="{{url('/post',$post->id)}}" class="more-btn">Continue Reading</a>--}}
                                    </div>
                                </div>
                                <!-- End Single Blog  -->
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="main-sidebar">
                                    <h3>There is no blog posts yet.</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <div class="form">
                                <form method="GET" action="{{url('/search')}}">

                                <input type="text" name="s" placeholder="Search products Here...">
                                <button class="button" type="submit" href="#"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
{{--                        <div class="single-widget category">--}}
{{--                            <h3 class="title">Blog Categories</h3>--}}
{{--                            <ul class="categor-list">--}}
{{--                                <li><a href="#">Men's Apparel</a></li>--}}
{{--                                <li><a href="#">Women's Apparel</a></li>--}}
{{--                                <li><a href="#">Bags Collection</a></li>--}}
{{--                                <li><a href="#">Accessories</a></li>--}}
{{--                                <li><a href="#">Sun Glasses</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
{{--                        <div class="single-widget recent-post">--}}
{{--                            <h3 class="title">Recent post</h3>--}}
{{--                            <!-- Single Post -->--}}
{{--                            <div class="single-post">--}}
{{--                                <div class="image">--}}
{{--                                    <img src="https://via.placeholder.com/100x100" alt="#">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>--}}
{{--                                    <ul class="comment">--}}
{{--                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2020</li>--}}
{{--                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- End Single Post -->--}}
{{--                            <!-- Single Post -->--}}
{{--                            <div class="single-post">--}}
{{--                                <div class="image">--}}
{{--                                    <img src="https://via.placeholder.com/100x100" alt="#">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>--}}
{{--                                    <ul class="comment">--}}
{{--                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>Mar 05, 2019</li>--}}
{{--                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>59</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- End Single Post -->--}}
{{--                            <!-- Single Post -->--}}
{{--                            <div class="single-post">--}}
{{--                                <div class="image">--}}
{{--                                    <img src="https://via.placeholder.com/100x100" alt="#">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>--}}
{{--                                    <ul class="comment">--}}
{{--                                        <li><i class="fa fa-calendar" aria-hidden="true"></i>June 09, 2019</li>--}}
{{--                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>44</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- End Single Post -->--}}
{{--                        </div>--}}
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
{{--                        <div class="single-widget side-tags">--}}
{{--                            <h3 class="title">Tags</h3>--}}
{{--                            <ul class="tag">--}}
{{--                                <li><a href="#">business</a></li>--}}
{{--                                <li><a href="#">wordpress</a></li>--}}
{{--                                <li><a href="#">html</a></li>--}}
{{--                                <li><a href="#">multipurpose</a></li>--}}
{{--                                <li><a href="#">education</a></li>--}}
{{--                                <li><a href="#">template</a></li>--}}
{{--                                <li><a href="#">Ecommerce</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
{{--                        <div class="single-widget newsletter">--}}
{{--                            <h3 class="title">Newslatter</h3>--}}
{{--                            <div class="letter-inner">--}}
{{--                                <h4>Subscribe & get news <br> latest updates.</h4>--}}
{{--                                <div class="form-inner">--}}
{{--                                    <input type="email" placeholder="Enter your email">--}}
{{--                                    <a href="#">Submit</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->


@endsection
