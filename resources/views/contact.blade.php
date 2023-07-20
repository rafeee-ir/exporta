@extends('layouts.app')

@section('title','Contact us')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{url('/')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="form-main">
                            <div class="title">
                                <h4>Get in touch</h4>
                                <h3>Write us a message</h3>
                            </div>
                            <form class="form" action="{{route('contact.store')}}" method="post">
                                @csrf
                                @include('form-alerts')
                                <input type="hidden" name="url" value="{{url()->current()}}">

                            @auth
                                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                @endauth                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Name</label>
                                            <input class="@if($errors->has('name')) border border-danger @endif" name="name" type="text" placeholder="" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Subjects</label>
                                            <input class="@if($errors->has('subject')) border border-danger @endif" name="subject" type="text" placeholder="" value="{{old('subject')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Email<span>*</span></label>
                                            <input class="@if($errors->has('email')) border border-danger @endif" name="email" type="email" placeholder="" value="{{old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <label>Your Phone</label>
                                            <input class="@if($errors->has('mobile')) border border-danger @endif" name="mobile" type="text" placeholder="" value="{{old('mobile')}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <label>your message<span>*</span></label>
                                            <textarea class="@if($errors->has('message')) border border-danger @endif" name="message" placeholder="">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="single-head">
                            <div class="single-info">
                                <i class="fa fa-phone"></i>
                                <h4 class="title">Call us Now:</h4>
                                <ul>
                                    <li>Soon</li>
                                    {{--                                    <li>+522 672-452-1120</li>--}}
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-envelope-open"></i>
                                <h4 class="title">Email:</h4>
                                <ul>
                                    <li><a href="mailto:info@exportaworld.com">info@exportaworld.com</a></li>
                                    <li><a href="mailto:sales@exportaworld.com">sales@exportaworld.com</a></li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <i class="fa fa-location-arrow"></i>
                                <h4 class="title">Our Address:</h4>
                                <ul>
                                    <li>3 Jacinth Court, Huddersfield, West Yorkshire, HD2 1DT</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact -->
@include('newsletter')
@endsection
