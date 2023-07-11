@extends('layouts.app')
@section('title', $supplier->title)

@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{url('/suppliers')}}">Brands<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{$supplier->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

{{--    <div class="px-4 py-5 my-5 text-center">--}}
{{--        <img class="d-block mx-auto mb-4" src="https://abystone.com/wp-content/uploads/2023/02/cropped-logo-noname.png" alt="" width="72">--}}
{{--        <h1 class="display-5 fw-bold">{{$supplier->title}}</h1>--}}
{{--        <h3 class="display-6 fw-bold mb-3">{{$supplier->slogan}}</h3>--}}
{{--        <div class="col-lg-6 mx-auto">--}}
{{--            <p class="lead mb-4">{{$supplier->about}}</p>--}}
{{--            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">--}}
{{--                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>--}}
{{--                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://getbootstrap.com/docs/5.0/examples/heroes/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <img class="d-block mb-4" src="https://abystone.com/wp-content/uploads/2023/02/cropped-logo-noname.png" alt="" width="72">

                <h1 class="display-5 fw-bold lh-1">{{$supplier->title}}</h1>
                <h3 class="display-6 fw-bold mb-3">{{$supplier->slogan}}</h3>
                <p class="lead mb-4">{{$supplier->about}}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="#products" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Products</a>
                    <a href="#inquire" type="button" class="btn btn-outline-secondary btn-lg px-4">Inquire</a>
                </div>
            </div>
        </div>
    </div>


        <div class="p-5 bg-light rounded-3" id="products">
            <div class="container-fluid py-5">
                <div class="container">
                <h1 class="display-5 fw-bold my-5">{{$supplier->title}}'s Products</h1>
                <div class="row">
                    @forelse($products as $product)
                        <a href="{{url('/products',$product->slug)}}">
                        <div class="col-md-4 col-6 my-4">
                            <div class="card h-100">
    {{--                            <img src="https://via.placeholder.com/370x370" class="card-img-top" alt="...">--}}
                                <img src="https://abystone.com/wp-content/uploads/2023/02/A128.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <p class="card-text">{{Str::limit($product->description,100)}}</p>
                                </div>
                            </div>
                        </div>
                        </a>
                    @empty
                        <div class="">
                            {{$supplier->title}} has no products.
                        </div>
                    @endforelse

                </div>
{{--                <button class="btn btn-primary btn-lg mt-5" type="button">Inquire Now!</button>--}}
                </div>
            </div>
        </div>



{{--    Form--}}
        <div class="p-5 mb-4 bg-info rounded-3" id="inquire">
            <div class="container-fluid py-5">
                <div class="container">
                <h1 class="display-5 fw-bold my-5">{{$supplier->title}}'s Inquire</h1>

                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">###</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Discription</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>






@endsection
