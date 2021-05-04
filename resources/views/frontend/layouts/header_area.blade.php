<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png') }}" type="image/png">
	<title>Comodo Games</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flaticon/flaticon.css') }}">
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-center">
							<li class="nav-item {{Request::routeIs('home') ? 'active' : ''}}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
							<li class="nav-item {{Request::routeIs('about') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about') }}">About</a></li>
							<li class="nav-item {{Request::routeIs('gallery') ? 'active' : ''}}"><a class="nav-link" href="{{ route('gallery')}}">Gallery</a></li>
							<li class="nav-item submenu dropdown {{Request::routeIs('price') ? 'active' : ''}} {{Request::routeIs('elements') ? 'active' : ''}} {{Request::routeIs('games') ? 'active' : ''}}">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="{{ route('price') }}">Pricing</a>
									<li class="nav-item"><a class="nav-link" href="{{ route('games')}}">Games</a>
									<li class="nav-item"><a class="nav-link" href="{{ route('elements')}}">Elements</a>
								</ul>
							</li>
							<li class="nav-item {{Request::routeIs('blog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog')}}">Blog</a></li>
							<li class="nav-item {{Request::routeIs('contact') ? 'active' : ''}}"><a class="nav-link" href="{{ route('contact')}}">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							@guest	
								<li class="nav-item"><a href="{{ route('login') }}" class="primary_btn">join us</a></li>
							@else 
								<li class="nav-item"><a href="{{ route('user.index') }}" class="primary_btn">dashboard</a></li>
								{{-- <li class="nav-item">
									<a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i></a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									  	@csrf
									</form>
								</li> --}}
							@endguest 
						</ul>
					</div>
				</div>
			</nav>
		</div>
		
	</header>

	<!--================Header Menu Area =================-->
