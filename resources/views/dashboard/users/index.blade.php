@extends('layouts.dapp')
@section('title','Users')
@section('dashboard-title','Users')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
{{--                    <h4 class="header-title">{{$users_count}} users</h4>--}}
                    <div class="data-tables datatable-dark">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined at</th>
                                <th>action</th>
{{--                                <th></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><span class="status-p bg-info">{{$user->created_at}}</span></td>
                                <td>Edit-Delete</td>
{{--                                <td>$433,060</td>--}}
                            </tr>
                            @empty
                                There is no users!
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>

@endsection
