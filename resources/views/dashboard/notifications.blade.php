@extends('layouts.dapp')
@section('title','Notifications')
@section('dashboard-title','Notifications')

@section('content')


    <div class="row">
        <!-- Custom Content start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Notifications</h4>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small>Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                            <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Custom Content end -->
    </div>

@endsection
