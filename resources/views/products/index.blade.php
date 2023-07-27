@extends('layouts.app')
@section('title','Products')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container my-5">
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4  mb-3">
                    <a href="{{url('/products',$product->slug)}}">
                        <div class="card" style="">
                            <img src="@if(isset($product->featured_image)){{asset('storage/uploads/products/'.$product->featured_image)}}@else https://placehold.co/300x300?text={{$product->title}} @endif" alt="{{$product->title}}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text">{{strip_tags(Str::limit($product->description,100))}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Price (FOB): {{$product->price_fob}}{{$product->price_currency}}</li>
                                <li class="list-group-item">Min. order (Qty): {{$product->minimum_order_qty}}</li>
                                <li class="list-group-item">Brand: {{$product->supplier->title}}</li>
                            </ul>
{{--                            <div class="card-body">--}}
{{--                                <a href="#" class="card-link">Labels</a>--}}
{{--                                <a href="#" class="card-link">Categories</a>--}}
{{--                            </div>--}}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    There is no products here
                </div>
            @endforelse
        </div>
    </div>
@endsection
