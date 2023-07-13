@extends('layouts.app')
@section('title','FAQ')

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <div class="container">
        <div class="row m-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Frequently asked questions (FAQ)</h4>
                                <div class="list-group list-group-flush">
                                    @forelse($faqs as $faq)
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{$faq->question}}</h5>
{{--                                            <small class="text-muted">3 days ago</small>--}}
                                        </div>
                                        <div class="mb-1">{!! $faq->answer !!}</div>
{{--                                        <small class="text-muted">Donec id elit non mi porta.</small>--}}
                                    </a>
                                    @empty
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Oh no!</strong> There is no faqs here!
                                        </div>

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
