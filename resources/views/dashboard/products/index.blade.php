@extends('layouts.dapp')
@section('title','Products')
@section('dashboard-title','Products')

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
                                <th>Title</th>
{{--                                <th>Email</th>--}}
                                <th>Added on</th>
                                <th>action</th>
                                {{--                                <th></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->title}}</td>
{{--                                    <td>{{$user->email}}</td>--}}
                                    <td><span class="status-p bg-info">{{$product->created_at}}</span></td>
                                    <td>Edit-Delete</td>
                                    {{--                                <td>$433,060</td>--}}
                                </tr>
                            @empty
                                There is no Products!
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
