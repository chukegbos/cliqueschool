@extends('layouts.app')
@section('pageTitle', 'Register')
@section('content')
<div class="page-title-wrap">
    <div class="container">
        <div class="text-center text-white">
            <h3 class="page-title mb-3" style="color: #fff">Welcome to {{ $setting->sitename }}</h3>
            <p>Sign Up and Start Learning!</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">{{ __('Fullname') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="notification_email">
                            <label class="form-check-label" for="exampleCheck1">Subscirbe me for email newsletter and exciting offers</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2" required>
                            <label class="form-check-label" for="exampleCheck1">By signing up, you agree to our <a href="{{ url('terms-of-use') }}">Terms of Use</a> and <a href="{{ url('privacy-policy') }}">Privacy Policy</a>.</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">Already have an account? <a href="{{ url('login') }}">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
