@extends('layouts.app')
@section('title',$product->title)

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{url('/products')}}">Products<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{url('/suppliers/abystone')}}">Abystone<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{$product->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$product->title}} <small>| Abystone</small></h1>
                <h3 class="text-info">{{$product->price_fob}}<small>{{$product->price_currency}} FOB</small></h3>
                <hr class="w-25">
                <p>{{$product->description}}</p>
            </div>
            <div class="col-md-4 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active border">
                            <img src="https://abystone.com/wp-content/uploads/2023/02/A128.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item border">
                            <img src="https://via.placeholder.com/512x512" class="d-block w-100" alt="...">
                        </div>
                    </div>
{{--                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                        <span class="visually-hidden">Previous</span>--}}
{{--                    </button>--}}
{{--                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--                        <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                        <span class="visually-hidden">Next</span>--}}
{{--                    </button>--}}
                </div>
            </div>
        </div>
        <hr class="w-25">
    </div>
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleIndicators')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 2000,
            touch: true
        })    </script>
@endsection
