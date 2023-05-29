@extends('layouts.app')
@section('pageTitle', 'Login')
@section('content')
<div class="page-title-wrap">
    <div class="container">
        <div class="text-center text-white">
            <h3 class="page-title mb-3" style="color: #fff">Welcome to {{ $setting->sitename }}</h3>
            <p>Login and Start Learning!</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
                            <label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
                        </div>
                     
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                    <hr>
                    <p class="text-center">Already have an account? <a href="{{ url('login') }}">Log In</a></p>
                    @if (Route::has('password.request'))
                        <p class="text-center"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
