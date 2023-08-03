@extends('layouts.dapp')
@section('title','Posts')
@section('dashboard-title','Posts')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="data-tables datatable-dark">
                        <table id="dataTable" class="text-center">
                            <thead class="text-capitalize">
                            <tr>
                                <th>date</th>
                                <th>Title</th>
                                <th>by</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td><span class="badge">{{$post->diff}}</span></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>

                                        <form action="{{ route('dashboardposts.destroy',$post->id) }}" method="POST" class="visually-hidden"  onSubmit="if(!confirm('Are you sure?')){return false;}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group btn-group-sm" role="group" aria-label="action-button-group">
                                                <a href="{{route('blog.show',$post->slug)}}" target="_blank" type="button" class="btn btn-outline-secondary" title="visit {{$post->title}}"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('dashboardposts.update',$post->id)}}" type="button" class="btn btn-warning" title="Edit {{$post->title}}"><i class="fa fa-pencil"></i></a>
                                                <button type="submit" class="btn btn-danger" title="Delete {{$post->title}}"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>


                                    </td>
                                    <td>
                                        {!! $post->content !!}
                                    </td>
                                </tr>
                            @empty
                                There is no Posts!
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
