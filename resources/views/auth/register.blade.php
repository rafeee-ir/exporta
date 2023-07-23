@extends('layouts.app_no_menu')

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Join now!</h1>
                <p class="col-lg-10 fs-4">Register text goes here!</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name">{{ __('Name') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">{{ __('Email Address') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password">{{ __('Password') }}</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    </div>



                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Register') }}</button>

                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>

@endsection
