@extends('layouts.dapp')
@section('title','Overview')
@section('dashboard-title','Dashboard')

@section('content')
<div class="row m-4">
    <div class="card-deck col-12 mb-4">
        @can('user-create')
            <div class="card bg-light border-danger border">
                <a href="{{url('dashboard/users')}}">
                    <div class="card-header h5 text-center text-muted">All Users</div>
                    <div class="card-body text-center h4">{{$users_count}}</div>
                </a>
            </div>
        @endcan
        @can('supplier-create')
            <div class="card bg-light border-success border">
                <a href="{{url('dashboard/brands')}}">
                    <div class="card-header h5 text-center text-muted">My Brands</div>
                    <div class="card-body text-center h4">{{$suppliers_count}}</div>
                </a>
            </div>
        @endcan
        @can('product-create')
            <div class="card bg-light border-secondary border">
                <a href="{{url('dashboard/products')}}">
                    <div class="card-header h5 text-center text-muted">My Products</div>
                    <div class="card-body text-center h4">{{$products_count}}</div>
                </a>
            </div>
        @endcan
        @can('post-create')
            <div class="card border-info border bg-lihgt">
                <a href="{{url('dashboard/posts')}}">
                    <div class="card-header h5 text-center text-muted">My Posts</div>
                    <div class="card-body text-center h4">{{$posts_count}}</div>
                </a>
            </div>
        @endcan
        @can('contact-create')
            <div class="card border-danger border bg-light">
                <a href="{{url('dashboard/contacts')}}">
                    <div class="card-header h5 text-center text-muted">Contacted</div>
                    <div class="card-body text-center h4">{{$contacts_count}}</div>
                </a>
            </div>
        @endcan
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-dark text-light">
                Last Activities
            </div>
            <div class="card-body">
                <div class="recent-activity">

                    @forelse($activities as $activity)
                        <div class="timeline-task">
                            <div class="icon bg3">
                                @if($activity->log_name == 'login')
                                    <i class="fa fa-key"></i>

                                @else
                                    <i class="fa fa-envelope"></i>

                                @endif
                            </div>
                            <div class="tm-title">
                                <h4>{{$activity->log_name}}</h4>
                                <span class="time"><i class="ti-time"></i>{{$activity->diff}}</span>
                            </div>
                            <p>{{$activity->description}}</p>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
