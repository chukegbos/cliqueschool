<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pageTitle') - {{ $setting->sitename }}</title>
        <!-- Favicon icon -->
        <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

        <!-- prism css -->
        <link rel="stylesheet" href="{{ asset('user/css/plugins/prism-coy.css') }}">
        <!-- vendor css -->
        <link rel="stylesheet" href="{{ asset('user/css/plugins/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    </head>
    <style>
        .btn-orange{
            background: #E99C66;
            color: #fff;
        }
        .btn-grey{
            background: #7782BA;
            color: #fff;
        }
    </style>
    <body>
        @include('components.header') 
    
        <div class="container-fluid content-main">
            @include('components.nav') 
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                @if ($message = Session::get('success'))
                                    <div class="mt-2">
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="mt-2">
                                        <div class="alert alert-danger">
                                            <strong>Error!</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                </div>
                                @endif
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <script src="{{ asset('user/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('user/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('user/js/pcoded.min.js') }}"></script>
    	<script src="{{ asset('user/js/menu-setting.min.js') }}"></script>
        <script src="{{ asset('user/js/plugins/prism.js') }}"></script>
        <script src="{{ asset('user/js/plugins/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('user/js/plugins/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            $('#user-list-table').DataTable();
        </script>
    </body>
</html>
