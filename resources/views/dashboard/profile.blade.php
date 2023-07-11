@extends('layouts.dapp')
@section('title','Overview')
@section('dashboard-title','Dashboard')

@section('content')
    <div class="row">  <!-- nav tab start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">{{$user->name}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit profile</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="ProfileContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2>{{$user->name}} <span class="badge badge-info badge-pill">{{$user->email}}</span></h2>
                                            <hr>
                                            <p>Joined at: <span class="text-info">{{$user->created_at}}</span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <div class="row">
                                <!-- Textual inputs start -->
                                <div class="col-12 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Edit Profile</h4>
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Name</label>
                                                    <input class="form-control" type="text" value="{{$user->name}}" id="name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-form-label">Email</label>
                                                    <input class="form-control" type="email" value="{{$user->email}}" id="email" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mobile" class="col-form-label">Mobile</label>
                                                    <input class="form-control" type="tel" value="" id="mobile">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="password" class="">Password</label>
                                                            <input type="password" class="form-control" id="password" value="" placeholder="Password" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="repeat-password" class="">Repeat password</label>
                                                            <input type="password" class="form-control" id="repeat-password" value="" placeholder="Password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Textual inputs end -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- nav tab end -->

    </div>
@endsection
