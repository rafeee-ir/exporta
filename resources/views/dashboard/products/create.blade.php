@extends('layouts.dapp')
@section('title','Add Product')
@section('dashboard-title','Add Product')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-light h4">
                    Add new product
                </div>
                <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                            <form action="{{route('dashboardproducts.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('form-alerts')

                                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Product Title*</label>
                                            <input required class="form-control input @if($errors->has('title')) border border-danger @endif" type="text" value="{{old('title')}}" id="title" name="title" placeholder="Ex: Iphone 18 pro max">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">Description</label>
                                    <textarea style="min-height: 300px" rows="10" id="editor" name="description" placeholder="Tell about product..." class="form-control @if($errors->has('description')) border border-danger @endif">{{old('description')}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier_id" class="col-form-label">Choose brand*</label>
                                            <select class="form-control @if($errors->has('supplier_id')) border border-danger @endif" name="supplier_id" id="supplier_id" required>
                                                <option value="0">Select brand</option>

                                                @foreach($suppliers as $supplier)
                                                    @if (old('supplier_id') == $supplier->id)

                                                    <option value="{{$supplier->id}}" selected>{{$supplier->title}}</option>
                                                    @else
                                                        <option value="{{$supplier->id}}">{{$supplier->title}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="minimum_order_qty" class="col-form-label">Minimum order quantity</label>
                                            <input class="form-control @if($errors->has('minimum_order_qty')) border border-danger @endif" value="{{old('minimum_order_qty')}}" type="text" id="minimum_order_qty" name="minimum_order_qty" placeholder="1000 ply">
                                            <small class="form-text text-muted">Write completely</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="production_capacity" class="col-form-label">Production capacity	in a year</label>
                                            <input class="form-control @if($errors->has('production_capacity')) border border-danger @endif" value="{{old('production_capacity')}}" type="text" id="production_capacity" name="production_capacity" placeholder="...">
                                            <small class="form-text text-muted">Write completely</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="featured_image" class="col-form-label">Main product image</label>
                                            <input class="form-control" type="file" value="" id="featured_image" name="featured_image"  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 500px*500px | Max: 2MB</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slider_images" class="col-form-label">Put other product images</label>
                                            <input type="file" class="form-control" id="slider_images" name="slider_images[]" multiple  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 500px*500px Max: 2MB</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplying" class="col-form-label">Which kind of products do you have?</label>
                                            <select class="form-control" id="supplying" name="categories[]" multiple aria-label="multiple select example">
                                                @forelse($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                                @empty
                                                    <option>You must add some categories first</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published" class="col-form-label">Publish now?</label>
                                            <div class="form-check">
                                                <input onclick="checkboxHelper(this)"  class="form-check-input" type="checkbox" id="published" name="published" value="1">
                                                <label class="form-check-label" for="published">
                                                    Publish
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Product</button>
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
    <script>
        const checkboxHelper = checkbox => {
            if(document.getElementById('published').value==1){
                document.getElementById('published').value=0;
            }else{
                document.getElementById('published').value=1;
            }
        }
    </script>
@endsection
