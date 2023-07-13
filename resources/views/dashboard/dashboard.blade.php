@extends('layouts.dapp')
@section('title','Overview')
@section('dashboard-title','Dashboard')

@section('content')
<div class="row m-4">
    <div class="card-deck col-12 mb-4">
        <div class="card bg-dark border-danger border">
            <div class="card-header h5 text-center text-muted">All Users</div>
            <div class="card-body text-center text-light h4">{{$users_count}}</div>
        </div>
        <div class="card bg-dark border-success border">
            <div class="card-header h5 text-center text-muted">My Brands</div>
            <div class="card-body text-center text-light h4">{{$suppliers_count}}</div>

        </div>
        <div class="card bg-dark border-secondary border">
            <div class="card-header h5 text-center text-muted">My Products</div>
            <div class="card-body text-center text-light h4">{{$products_count}}</div>
        </div>
        <div class="card border-info border bg-dark">
            <div class="card-header h5 text-center text-muted">My Posts</div>
            <div class="card-body text-center text-light h4">{{$posts_count}}</div>
        </div>
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
