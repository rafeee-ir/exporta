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
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="col-form-label">Brand Title</label>
                                            <input class="form-control input" type="text" value="" id="title" name="title" placeholder="Ex: Apple inc.">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slogan" class="col-form-label">Brand Slogan</label>
                                            <input class="form-control input" type="text" value="" id="slogan" name="slogan" placeholder="Ex: The Best and...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="about" class="col-form-label">About Brand</label>
                                    <textarea id="about" name="about" placeholder="Tell people something about your brand..." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="funded_at" class="col-form-label">When your brand funded?</label>
                                    <input class="form-control" type="month" value="" id="funded_at" name="funded_at" placeholder="January 2019">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo" class="col-form-label">Put brand's logo here</label>
                                            <input class="form-control" type="file" value="" id="logo" name="logo"  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 370px*370px</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner" class="col-form-label">Put brand's page banner here</label>
                                            <input class="form-control" type="file" value="" id="banner" name="banner"  accept=".jpg,.jpeg,.png">
                                            <small class="form-text text-muted">JPG,PNG in 700px*500px</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplying" class="col-form-label">Which kind of products do you have?</label>
                                            <select class="form-control" id="supplying" name="supplying" multiple aria-label="multiple select example">
                                                <option>bla bla</option>
                                                <option>bla bla</option>
                                                <option>bla bla</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="published" class="col-form-label">Publish now?</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="published">
                                                <label class="form-check-label" for="published">
                                                    Publish
                                                </label>
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
