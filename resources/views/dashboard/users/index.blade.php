@extends('layouts.dapp')
@section('title','Users')
@section('dashboard-title','Users')

@section('content')


{{--    <div class="row">--}}
{{--        <!-- data table start -->--}}
{{--        <div class="col-12 mt-5">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="header-title">{{$users_count}} users</h4>--}}
{{--                    <div class="data-tables datatable-dark">--}}
{{--                        <table id="dataTable" class="text-center">--}}
{{--                            <thead class="text-capitalize">--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th>Joined at</th>--}}
{{--                                <th>action</th>--}}
{{--                                <th></th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @forelse($users as $user)--}}
{{--                                <tr>--}}
{{--                                <th scope="row">{{$user->id}}</th>--}}
{{--                                <td>{{$user->name}}</td>--}}
{{--                                <td>{{$user->email}}</td>--}}
{{--                                <td><span class="status-p bg-info">{{$user->created_at}}</span></td>--}}
{{--                                <td>Edit-Delete</td>--}}
{{--                                <td>$433,060</td>--}}
{{--                            </tr>--}}
{{--                            @empty--}}
{{--                                There is no users!--}}
{{--                            @endforelse--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- data table end -->--}}
{{--    </div>--}}


    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('dashboardusers.create') }}"> Create New User </a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('dashboardusers.show',$user->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('dashboardusers.edit',$user->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['dashboardusers.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>


{!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
