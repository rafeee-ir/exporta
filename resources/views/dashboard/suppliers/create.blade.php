@extends('layouts.dapp')
@section('title','Add brand')
@section('dashboard-title','Add brand')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-light h4">
                    Add brand
                </div>
                <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                  @include('form-alerts')
                            <form action="{{route('dashboardbrands.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{Auth::id()}}" name="user_id">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Brand Title*</label>
                                            <input required class="form-control input @if($errors->has('title')) border border-danger @endif" type="text" value="{{old('title')}}" id="title" name="title" placeholder="Ex: Apple inc.">
                                            @if($errors->has('title'))
                                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slogan" class="col-form-label">Brand Slogan</label>
                                            <input class="form-control input @if($errors->has('slogan')) border border-danger @endif" type="text" value="{{old('slogan')}}" id="slogan" name="slogan" placeholder="Ex: The Best and...">
                                            @if($errors->has('slogan'))
                                                <small class="text-danger">{{ $errors->first('slogan') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="editor" class="col-form-label">About Brand</label>
                                    <textarea id="editor" name="about" placeholder="Tell people something about your brand..." class="form-control @if($errors->has('about')) border border-danger @endif">{{old('about')}}</textarea>
                                    @if($errors->has('about'))
                                        <small class="text-danger">{{ $errors->first('about') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="funded_at" class="col-form-label">When your brand funded?</label>
                                    <input class="form-control @if($errors->has('funded_at')) border border-danger @endif" type="month" value="{{old('funded_at')}}" id="funded_at" name="funded_at" placeholder="January 2019">
                                    @if($errors->has('funded_at'))
                                        <small class="text-danger">{{ $errors->first('funded_at') }}</small>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo" class="col-form-label">Put brand's logo here</label>
                                            <input class="form-control @if($errors->has('logo')) border border-danger @endif" type="file" value="{{old('logo')}}" id="logo" name="logo"  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 370px*370px | Max: 1MB</small>
                                            @if($errors->has('logo'))
                                                <small class="text-danger">{{ $errors->first('logo') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner" class="col-form-label">Put brand's page banner here</label>
                                            <input class="form-control @if($errors->has('banner')) border border-danger @endif" type="file" value="{{old('banner')}}" id="banner" name="banner"  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 700px*500px Max: 2MB</small>
                                            @if($errors->has('banner'))
                                                <small class="text-danger">{{ $errors->first('banner') }}</small>
                                            @endif
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
                                            @if($errors->has('supplying'))
                                                <small class="text-danger">{{ $errors->first('supplying') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published" class="col-form-label">Publish now?</label>
                                            <div class="form-check">
                                                <input onclick="checkboxHelper(this)"  class="form-check-input @if($errors->has('published')) border border-danger @endif" type="checkbox" value="1" name="published" id="published">
                                                <label class="form-check-label" for="published">
                                                    Publish
                                                </label>
                                                @if($errors->has('published'))
                                                    <small class="text-danger">{{ $errors->first('published') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Brand</button>
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
