<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('pageTitle') - {{ $setting->sitename }}</title>

        <!-- Scripts -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="d-flex flex-column min-vh-100 mb-2">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item px-2">
                                <a class="menu-link nav-link" href="{{ route('login') }}">{{ __('Home') }}</a>
                            </li>

                            <li class="nav-item px-2">
                                <a class="menu-link nav-link" href="{{ route('login') }}">{{ __('Live Streams') }}</a>
                            </li>

                            <li class="nav-item px-2 dropdown">
                                <a id="navbarDropdown" class="menu-link nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categories
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>

                                </div>
                            </li>

                            <li class="nav-item px-2">
                                <a class="menu-link nav-link" href="{{ route('login') }}">{{ __('Explore') }}</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item px-2">
                                        <a class="menu-link nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item px-2">
                                        <a class="btn btn-primary" href="{{ route('register') }}" role="button">{{ __('Sign Up') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
    
        <!-- <div class="footer">
            <div class="container text-center">
                <div >
                    <div class="row">
                        <div class="col">
                            <div class="footer-header">
                                <h4>For Students</h4>
                            </div>
                            <div class="footer-body">
                                <ul>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                    <li><a href="">one</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                        <div class="col">col</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">col-8</div>
                    <div class="col-4">col-4</div>
                </div>
            </div>
        </div> -->

        <div class="footer-widget section-pad">
			<div class="container">
				<div class="row">

					<div class="widget-row row">
						<div class="footer-col col-md-3 col-12 mb-2">
							<!-- Each Widget -->
							<div class="wgs wgs-footer wgs-text">
                                <p><img src="{{ asset('images/logo.png') }}" class="img-fluid img-thumbnail"></p>
                                <p class="text-justify">Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                            </div>
						</div>

						<div class="footer-col col-md-2 col-4 mb-2">
							<!-- Each Widget -->
							<div class="wgs wgs-footer wgs-menu">
								<h5 class="wgs-title">Categories</h5>
                                <div class="wgs-content">
                                    <ul class="menu">
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                        <li><a href="{{ url('department') }}">Name d</a></li>
                                    </ul>
                                </div>
							</div>
							<!-- End Widget -->
						</div>

						<div class="footer-col col-md-2 col-4 mb-2">
							<!-- Each Widget -->
							<div class="wgs wgs-footer wgs-menu">
								<h5 class="wgs-title">Quick Links</h5>
								<div class="wgs-content">
									<ul class="menu">
										<li><a href="{{ url('/about') }}">About</a></li>
										<li><a href="{{ url('/deans') }}">Blog</a></li>
	                                    <li><a href="{{ url('/') }}">Resources</a></li>
	                                    <li><a href="{{ url('/lecturers') }}">Review</a></li>
										<li><a href="{{ url('/dean') }}">Help & Support</a></li>
										<li><a href="{{ url('/dean-speech') }}">Success Story</a></li>
									</ul>
								</div>
							</div>
							<!-- End Widget -->
						</div>

                        <div class="footer-col col-md-2 col-4 mb-2">
							<!-- Each Widget -->
							<div class="wgs wgs-footer wgs-menu">
								<h5 class="wgs-title">Quick Links</h5>
								<div class="wgs-content">
									<ul class="menu">
										<li><a href="{{ url('/about') }}">Carear</a></li>
										<li><a href="{{ url('/deans') }}">Contact Us</a></li>
	                                    <li><a href="{{ url('/') }}">Privacy Policy</a></li>
	                                    <li><a href="{{ url('/lecturers') }}">Terms of Service</a></li>
										<li><a href="{{ url('/dean') }}">Features</a></li>
										<li><a href="{{ url('/dean-speech') }}">Pricing</a></li>
									</ul>
								</div>
							</div>
							<!-- End Widget -->
						</div>

						<div class="footer-col col-md-3  col-12 mb-2">
							<!-- Each Widget -->
							<div class="wgs wgs-footer">
								<h5 class="wgs-title">Get In Touch</h5>
								<div class="wgs-content">
									<p>
                                        <strong>Clique School Services</strong><br>
                                        936 Kiehn Route West Ned Tennessee London</p>
                                        <p><span>Phone</span>: 08066267671</p>
                                        <p><span>Email</span>: info@cliqueschool.com</p>
									<ul class="social">
										<li><a href=""><em class="fa fa-facebook" aria-hidden="true"></em></a></li>
										<li><a href=""><em class="fa fa-twitter" aria-hidden="true"></em></a></li>
										<li><a href=""><em class="fa fa-linkedin" aria-hidden="true"></em></a></li>
									</ul>
								</div>
							</div>
							<!-- End Widget -->
						</div>

					</div><!-- Widget Row -->

				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
			    <div class="elfsight-app-df276c1d-6ac7-4e4d-8ff8-4abb8ffa8f4c"></div>
				<div class="row">
					<div class="site-copy col-sm-7">
						<p>&copy; {{ date('Y') }} full ame</p>
					</div>
					<div class="site-by col-sm-5 al-right">
						<p>Powered by <a href="https://zallasoftng.com.ng" target="_blank">Zallasoft Technologies & Solutions</a></p>
					</div>
	 				
				</div>
			</div>
		</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $(".dropdown").hover(function(){
                    var dropdownMenu = $(this).children(".dropdown-menu");
                    if(dropdownMenu.is(":visible")){
                        dropdownMenu.parent().toggleClass("open");
                    }
                });
            });     
        </script>
    </body>
</html>
