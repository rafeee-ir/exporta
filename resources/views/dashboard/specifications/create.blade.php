@extends('layouts.dapp')
@section('title','Add Specification')
@section('dashboard-title','Add Specification')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-light h4">
                    Add new Specification
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('dashboardspecifications.store')}}" method="post">
                                @csrf
                                @include('form-alerts')

                                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Title*</label>
                                            <input required class="form-control input @if($errors->has('title')) border border-danger @endif" type="text" value="{{old('title')}}" id="title" name="title" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">Description</label>
                                    <textarea style="min-height: 300px" rows="10" id="editor" name="description" placeholder="" class="form-control @if($errors->has('description')) border border-danger @endif">{{old('description')}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_id" class="col-form-label">Choose Product*</label>
                                            <select class="form-control @if($errors->has('product_id')) border border-danger @endif" name="product_id" id="product_id" required>
                                                <option value="0">Select Product</option>

                                                @foreach($products as $item)

                                                    @if (old('product_id') == $item->id)

                                                        <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                                    @else
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>

@endsection
@section('script')
    <script src="{{url('assets/js/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                editor.ui.view.editable.element.style.height = '300px';
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
