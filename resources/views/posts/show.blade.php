@extends('layouts.app')
@section('title',$post->title)

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{route('blog.index')}}">Blog<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{$post->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                <hr class="w-25">
{{--                <p>{!! $post->content !!}</p>--}}
            </div>
            <div class="col-md-8 my-5">
                <img class="d-block w-100" style="object-fit: cover; aspect-ratio: 16/9"  src="@if(isset($post->image)) {{asset('storage/uploads/posts/'.$post->image)}} @else https://placehold.co/480x270?text={{$post->title}} @endif" alt="{{$post->title}}">
            </div>
            <div class="col-md-8">
{{--                <h1>{{$post->title}}</h1>--}}
{{--                <hr class="w-25">--}}
                <p>{!! $post->content !!}</p>
            </div>

        </div>
    </div>

@endsection





