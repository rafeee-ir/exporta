@extends('layouts.dapp')
@section('title','FAQs')
@section('dashboard-title','FAQs')

@section('content')


    <div class="container">
        <div class="row m-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Frequently asked questions (FAQ)</h4>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="list-group list-group-flush">
                                    @forelse($faqs as $faq)
                                        <span class="list-group-item list-group-item-action flex-column align-items-start">
                                            @can('faq-delete')
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{$faq->question}}</h5>
                                                <form action="{{ url('dashboard/faqs',$faq->id) }}" method="POST" class="visually-hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="confirm('Are you sure?')" class="badge badge-danger">Delete</button>
                                                </form>
                                            </div>
                                            @endcan
                                            <div class="mb-1">{!! $faq->answer !!}</div>
                                        </span>
                                    @empty
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Oh no!</strong> There is no faqs here!
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
