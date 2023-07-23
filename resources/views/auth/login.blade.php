@extends('layouts.app_no_menu')

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Login to the modern world business</h1>
                <p class="col-lg-10 fs-4">Login text goes here!</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('Email Address') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" @error('password') is-invalid @enderror required autocomplete="current-password">
                        <label for="password">{{ __('Password') }}</label>

                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <hr class="my-4">

{{--                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
