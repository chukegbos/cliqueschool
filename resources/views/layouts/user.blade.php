<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pageTitle') - {{ $setting->sitename }}</title>

        <link rel="icon" type="image/png" href="{{ asset('user/images/fav.png') }}">

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
        <link href="{{ asset('user/vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/vertical-responsive-menu.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/night-mode.css') }}" rel="stylesheet">

        <link href="{{ asset('user/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/vendor/OwlCarousel/assets/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('user/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
        <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('user/vendor/semantic/semantic.min.css') }}">
        <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    </head>

    <body>
        @include('components.header') 
        @include('components.nav') 

        <div class="wrapper">
            <div class="sa4d25">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('components.footer')    
        </div>
        
        <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('user/vendor/OwlCarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('user/vendor/semantic/semantic.min.js') }}"></script>
        <script src="{{ asset('user/js/custom.js') }}"></script>
        <script src="{{ asset('user/js/night-mode.js') }}"></script>
    </body>
</html>