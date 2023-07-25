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
                            <li><a href="{{url('/brands')}}">Brands<i class="ti-arrow-right"></i></a></li>
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
        @include('form-alerts')
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="@if(isset($supplier->banner)){{asset('storage/uploads/suppliers/'.$supplier->banner)}}@else https://placehold.co/700x500?text=BRAND20%BANNER @endif" class="d-block mx-lg-auto img-fluid" alt="{{$supplier->title}}" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <img class="d-block mb-4 border border-2 border-dark" src="@if(isset($supplier->logo)){{asset('storage/uploads/suppliers/'.$supplier->logo)}}@else https://placehold.co/300x300?text=LOGO @endif" alt="" width="72">

                <h1 class="display-5 fw-bold lh-1">{{$supplier->title}}</h1>
                <h3 class="display-6 fw-bold mb-3">{{$supplier->slogan}}</h3>
                <p class="lead mb-4">{!! $supplier->about !!}</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="#products" type="button" class="btn btn-primary btn-lg px-4 me-md-2"><i class="ti-angle-down"></i> Products</a>
                    <a href="#contact" type="button" class="btn btn-outline-secondary btn-lg px-4"><i class="ti-angle-down"></i> Contact {{$supplier->title}}</a>
                </div>
            </div>
        </div>
    </div>


        <div class="py-5 bg-light rounded-3" id="products">
            <div class="container-fluid py-5">
                <div class="container">
                <h1 class="display-5 fw-bold mt-5">{{$supplier->title}}'s Products</h1>
                <div class="row">
                    @forelse($supplier->products as $product)
                        <a href="{{url('/products',$product->slug)}}">
                        <div class="col-md-4 col-12 mt-4">
                            <div class="card h-100">
    {{--                            <img src="https://via.placeholder.com/370x370" class="card-img-top" alt="...">--}}
                                <img src="@if(isset($product->featured_image)){{asset('storage/uploads/products/'.$product->featured_image)}}@else https://placehold.co/300x300?text={{$product->title}} @endif" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->title}}</h5>
                                    <p class="card-text mb-4">{{strip_tags(Str::limit($product->description,100))}}</p>
                                    <a href="{{url('/products',$product->slug)}}" class="btn btn-sm btn-info">More Detail</a>
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




        <div class="p-5 rounded-3" id="contact" style="background-color: #D1C2B7">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h1 class="display-5 fw-bold my-5">Contact {{$supplier->title}}</h1>
                            <form action="{{route('contact.store')}}" method="post">
                                @csrf
                                @include('form-alerts')
                                <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                                <input type="hidden" name="url" value="{{url()->current()}}">
                                @auth
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                @endauth
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input value="{{old('name')}}" type="text" class="form-control @if($errors->has('name')) border border-danger @endif" id="name" name="name" placeholder="John Duo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject" class="form-label">Your Subject</label>
                                            <input value="{{old('subject')}}" type="text" class="form-control @if($errors->has('subject')) border border-danger @endif" id="subject" name="subject" placeholder="Buy Someting..">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Your Email<span>*</span></label>
                                            <input value="{{old('email')}}" type="email" class="form-control @if($errors->has('email')) border border-danger @endif" id="email" name="email" placeholder="info@exportaworld.com">
                                            <small class="text-light">*Required</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile" class="form-label">Your Mobile</label>
                                            <input value="{{old('mobile')}}" type="tel" class="form-control @if($errors->has('mobile')) border border-danger @endif" id="mobile" name="mobile" placeholder="+1800451245">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="message" class="form-label">Your Message<span>*</span></label>
                                            <textarea name="message" class="form-control @if($errors->has('message')) border border-danger @endif" rows="5" placeholder="Tell us what do you need to know?">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>






@endsection
@section('script')
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection
