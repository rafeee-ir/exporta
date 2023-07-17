@extends('layouts.dapp')
@section('title','Brands')
@section('dashboard-title','Brands')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    {{--                    <h4 class="header-title">{{$users_count}} users</h4>--}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="data-tables datatable-dark">
                        <table id="dataTable" class="">
                            <thead class="text-capitalize">
                            <tr>
                                <th>Title</th>
                                <th>Slogan</th>
                                <th>Added on</th>
                                <th>Funded at</th>
                                <th>Published</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($suppliers as $supplier)
                                <tr>
                                    <th scope="row">{{$supplier->title}}</th>
                                    <td>{{$supplier->slogan}}</td>
                                    <td>{{$supplier->diff}}</td>
                                    <td>{{$supplier->funded_at}}</td>
                                    <td>
                                        @if($supplier->published === 1)
                                            <i class="ti-check-box text-success"></i>
                                        @elseif($supplier->published === 0)
                                            <i class="ti-close text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('dashboardbrands.destroy',$supplier->id) }}" method="POST" class="visually-hidden" onSubmit="if(!confirm('Are you sure?')){return false;}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge badge-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                There is no Brands!
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
