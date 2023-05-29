@extends('layouts.app')
@section('pageTitle', 'Verify Email')
@section('content')
<div class="page-title-wrap">
    <div class="container">
        <div class="text-center text-white">
            <h3 class="page-title mb-3" style="color: #fff">Verify Your Email Address</h3>
            <p>you have not yet verified your email!</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <br>
                    
                    <a href="{{ url('email/resend') }}" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</a>.
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
