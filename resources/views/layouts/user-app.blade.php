<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/colors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/vertical-menu-modern.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/palette-gradient.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-jvectormap-2.0.3.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/morris.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- BEGIN: Header-->
	<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item mr-auto">
						<a class="navbar-brand" href="index.html"><img class="brand-logo" alt="modern admin logo" src="{{ asset('images/logo.png') }}">
							<h3 class="brand-text">Modern</h3></a>
					</li>
					<li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
					<li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
				</ul>
			</div>
			<div class="navbar-container content">
				<div class="collapse navbar-collapse" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
					</ul>
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a></div>
						</li>
						<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1 user-name text-bold-700">{{ Auth::user()->name }}</span><span class="avatar avatar-online">
                            <img src="{{ asset('images/user.jpg') }}" alt="avatar"><i></i></span></a>
							<div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
								<div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="ft-power"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- END: Header-->
	<!-- BEGIN: Main Menu-->
	<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class=" nav-item {{ (request()->routeIs('user.home'))? 'active' : '' }}">
                    <a href="{{ route('user.home') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
				</li>
				<li class=" nav-item {{ ( request()->routeIs('user.client') || request()->routeIs('user.checklist') )? 'active' : '' }}">
                    <a href="{{ route('user.client') }}"><i class="la la-user"></i><span class="menu-title" data-i18n="Clients">Clients</span></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END: Main Menu-->
    <!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
            @yield('content')
		</div>
	</div>
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<!-- BEGIN: Footer-->
	<footer class="footer footer-static footer-light navbar-border navbar-shadow">
		<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href="#" target="_blank">CUSTOM MADE</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span>
		</p>
	</footer>
	<!-- END: Footer-->
	<script src="{{ asset('js/vendors.min.js') }}"></script>
	<script src="{{ asset('js/chart.min.js') }}"></script>
	<script src="{{ asset('js/raphael-min.js') }}"></script>
	<script src="{{ asset('js/morris.min.js') }}"></script>
	<script src="{{ asset('js/jquery-jvectormap-2.0.3.min.js') }}"></script>
	<script src="{{ asset('js/jquery-jvectormap-world-mill.js') }}"></script>
	<script src="{{ asset('js/visitor-data.js') }}"></script>
	<script src="{{ asset('js/app-menu.min.js') }}"></script>
	<script src="{{ asset('js/app.min.js') }}"></script>
	<script src="{{ asset('js/footer.min.js') }}"></script>
	<script src="{{ asset('js/dashboard-sales.min.js') }}"></script>
</body>

</html>