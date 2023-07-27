@extends('layouts.dapp')
@section('title','Contacts')
@section('dashboard-title','All Contacts')

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
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>When</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>User</th>
                                <th>Brand</th>
                                <th>Product</th>
                                <th>URL</th>

                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contacts as $contact)
                                <tr>
                                    <td><small>{{$contact->diff}}</small></td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->mobile}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>{{$contact->user->name ?? 'None'}}</td>
                                    <td>{{$contact->supplier->title ?? 'None'}}</td>
                                    <td>{{$contact->product->title ?? 'None'}}</td>
                                    <td>{{$contact->url}}</td>

                                    <td>
                                        <form action="{{ route('dashboardcontacts.destroy',$contact->id) }}" method="POST" class="visually-hidden">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
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
