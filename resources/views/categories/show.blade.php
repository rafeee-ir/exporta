@extends('layouts.app')
@section('title', 'Category ' . $category->category ?? '')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{url('/categories')}}">Categories<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{$category->category ?? ''}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->




    <div class="container-fluid bg-light py-4">
        <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2>{{$category->suppliers->count()}} Brand<small>s of {{$category->category}}</small></h2>
            </div>
            <div class="col-12">
                <div class="owl-carousel mb-3">
                    @forelse($category->suppliers as $supplier)
                        <div class="" style="width: 160px">
                            <a href="{{url('/brands',$supplier->slug)}}" title="{{$supplier->title}}">
                                <img src="@if(isset($supplier->logo)){{asset('storage/uploads/suppliers/'.$supplier->logo)}}@else https://via.placeholder.com/370x370 @endif" alt="{{$supplier->title}}">
                            </a>
                        </div>
                    @empty
                        {{--                        <div class="col-12">--}}
                        {{--                            There is no supplier here--}}
                        {{--                        </div>--}}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    </div>



    <div class="container my-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h2>{{$category->products->count()}} Product<small>s in {{$category->category}}</small></h2>
            </div>
            @forelse($category->products as $product)
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
                    Nothing found
                </div>
            @endforelse
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                // animateOut: 'fadeOut',
                // animateIn: 'slideInRight',
                items:1,
                // stagePadding:50,
                smartSpeed:450,
                margin:20,
                autoplay:true,
                autoplayTimeout:5000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:4
                    },
                    1000:{
                        items:7
                    }
                }
            });
        });
    </script>


@endsection
