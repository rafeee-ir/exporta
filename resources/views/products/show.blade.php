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
                            <li><a href="{{route('suppliers.show',$product->supplier->slug)}}">{{$product->supplier->title}}<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{route('suppliers.show',$product->supplier->slug.'#products')}}">Products<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{$product->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container my-5">
        @include('form-alerts')

        <div class="row">
            <div class="col-md-8">
                <h1>{{$product->title}} <small>| <a href="{{route('suppliers.show',$product->supplier->slug)}}">{{$product->supplier->title}}</a></small></h1>
                <h3 class="text-info">{{$product->price_fob}}<small>{{$product->price_currency}} FOB</small></h3>
                <hr class="w-25">
                <p>{!! $product->description !!}</p>
            </div>
            <div class="col-md-4 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @if(isset($product->featured_image))
                            <div class="carousel-item active border">
                                <img src="{{asset('storage/uploads/products/'.$product->featured_image)}}" class="d-block w-100" style="object-fit: cover;aspect-ratio: 1" alt="{{$product->title.' image'}}">
                            </div>
                            @foreach($slider as $slide)
                                <div class="carousel-item border">
                                    <img src="{{asset('storage/uploads/products/'.$slide)}}" class="d-block w-100" style="object-fit: cover;aspect-ratio: 1" alt="{{$product->title}}">
                                </div>
                            @endforeach
                            <div class="carousel-item border">
                                <img src="{{asset('storage/uploads/products/'.$product->featured_image)}}" class="d-block w-100" style="object-fit: cover;aspect-ratio: 1" alt="{{$product->title.' image'}}">
                            </div>
                        @else
                            <div class="carousel-item active border">
                                <img src="https://placehold.co/300x300?text={{$product->title}}" class="d-block w-100">
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2>{{$product->title}}' Gallery</h2>
                <hr class="w-25">
            </div>
            <div class="coll-12">
                <div class="row">
                    @foreach($slider as $slide)

                    <div class="col-md-4">
                        <img src="{{asset('storage/uploads/products/'.$slide)}}" class="d-block w-100" style="border: 10px solid white;object-fit: cover;aspect-ratio: 1" alt="{{$product->title}}">
                    </div>
                    @endforeach
                </div>
            </div>

            </div>
        </div>
        </div>

    <div class="p-5 rounded-3" id="contact" style="background-color: #D1C2B7">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold my-5">Contact {{$product->supplier->title}}</h1>
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            @include('form-alerts')
                            <input type="hidden" name="supplier_id" value="{{$product->supplier->id}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="url" value="{{url()->current()}}">
                            @auth
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            @endauth
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input value="{{old('name')}}" type="text" class="form-control @if($errors->has('name')) border border-danger @endif" id="name" name="name" placeholder="John Duo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject" class="form-label">Your Subject</label>
                                        <input value="{{old('subject')}}" type="text" class="form-control @if($errors->has('subject')) border border-danger @endif" id="subject" name="subject" placeholder="Buy Someting..">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Your Email<span>*</span></label>
                                        <input value="{{old('email')}}" type="email" class="form-control @if($errors->has('email')) border border-danger @endif" id="email" name="email" placeholder="info@exportaworld.com">
                                        <small class="text-light">*Required</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile" class="form-label">Your Mobile</label>
                                        <input value="{{old('mobile')}}" type="tel" class="form-control @if($errors->has('mobile')) border border-danger @endif" id="mobile" name="mobile" placeholder="+1800451245">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Your Message<span>*</span></label>
                                        <textarea name="message" class="form-control @if($errors->has('message')) border border-danger @endif" rows="5" placeholder="Tell us what do you need to know?">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleIndicators')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 2000,
            touch: true
        })
    </script>
@endsection
@section('style')
    <style>

    </style>
@endsection






