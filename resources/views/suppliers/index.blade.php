@extends('layouts.app')
@section('title','Brands')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Brands</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

<div class="container my-5">
    <div class="row">
        @forelse($suppliers as $supplier)
        <div class="col-md-6 mb-3">
            <a href="{{url('/brands',$supplier->slug)}}">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="@if(isset($supplier->logo)){{asset('storage/uploads/suppliers/'.$supplier->logo)}}@else https://via.placeholder.com/370x370 @endif" alt="{{$supplier->title}}">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">{{$supplier->title}}</h5>
                        <p class="card-text">{{strip_tags(Str::limit($supplier->about,100))}}</p>
                        <p class="card-text"><small class="text-muted">Funded at {{ date('Y', strtotime($supplier->funded_at))}}</small></p>
                    </div>
                </div>
            </div>
        </div>
            </a>
        </div>
        @empty
            <div class="col-12">
                There is no supplier here
            </div>
        @endforelse
    </div>
</div>
@endsection
