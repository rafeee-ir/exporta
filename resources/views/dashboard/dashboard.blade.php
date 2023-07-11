@extends('layouts.dapp')
@section('title','Overview')
@section('dashboard-title','Dashboard')

@section('content')
<div class="row m-4">
    <div class="card-deck col-12 mb-4">
        <div class="card bg-dark text-light">
            <div class="card-header">102 Users</div>
        </div>
        <div class="card bg-dark text-light">
            <div class="card-header">5 Brands</div>
        </div>
        <div class="card bg-dark text-light">
            <div class="card-header">100 Products</div>
        </div>
        <div class="card bg-dark text-light">
            <div class="card-header">15 Posts</div>
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
                                <span class="time"><i class="ti-time"></i>{{$activity->created_at}}</span>
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
