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
                            <form action="{{route('dashboardproducts.store')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Product Title*</label>
                                            <input required class="form-control input" type="text" value="" id="title" name="title" placeholder="Ex: Iphone 18 pro max">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">Description</label>
                                    <textarea style="min-height: 300px" rows="10" id="editor" name="description" placeholder="Tell about product..." class="form-control"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier_id" class="col-form-label">Choose brand*</label>
                                            <select class="form-control" name="supplier_id" id="supplier_id" required>
                                                <option value="0" selected>Select brand</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="minimum_order_qty" class="col-form-label">Minimum order quantity</label>
                                            <input class="form-control" type="text" id="minimum_order_qty" name="minimum_order_qty" placeholder="1000 ply">
{{--                                            <small class="form-text text-muted">Write completely</small>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="production_capacity" class="col-form-label">Production capacity	in a year</label>
                                            <input class="form-control" type="text" id="production_capacity" name="production_capacity" placeholder="...">
{{--                                            <small class="form-text text-muted">Write completely</small>--}}
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="logo" class="col-form-label">Put brand's logo here</label>--}}
{{--                                            <input class="form-control" type="file" value="" id="logo" name="logo"  accept=".jpg,.jpeg,.png">--}}
{{--                                            <small class="form-text text-muted">JPG,PNG in 370px*370px | Max: 1MB</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="banner" class="col-form-label">Put brand's page banner here</label>--}}
{{--                                            <input class="form-control" type="file" value="" id="banner" name="banner"  accept=".jpg,.jpeg,.png">--}}
{{--                                            <small class="form-text text-muted">JPG,PNG in 700px*500px Max: 2MB</small>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="row">
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="supplying" class="col-form-label">Which kind of products do you have?</label>--}}
{{--                                            <select class="form-control" id="supplying" name="supplying" multiple aria-label="multiple select example">--}}
{{--                                                <option>bla bla</option>--}}
{{--                                                <option>bla bla</option>--}}
{{--                                                <option>bla bla</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published" class="col-form-label">Publish now?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="published" name="published" value="1">
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
    <script src="{{url('storage/assets/js/ckeditor.js')}}"></script>
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
