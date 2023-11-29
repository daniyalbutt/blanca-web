<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="apple-touch-icon" href="">
	<link rel="shortcut icon" type="image/x-icon" href="">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/colors.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/vertical-menu-modern.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/palette-gradient.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/login-register.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row"> </div>
			<div class="content-body">
				<section class="row flexbox-container">
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
							<div class="card border-grey border-lighten-3 px-1 py-1 m-0">
								<div class="card-header border-0">
									<div class="card-title text-center"> <img src="{{ asset('images/logo.png') }}" alt="branding logo" width="120"> </div>
								<div class="card-content">
									<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1 mt-3">
                                        <span>Account Details</span></p>
									<div class="card-body">
										<form method="POST" class="form-horizontal" novalidate action="{{ route('login') }}">
                                            @csrf
											<fieldset class="form-group position-relative has-icon-left">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												<div class="form-control-position"> <i class="la la-user"></i> </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
											</fieldset>
											<fieldset class="form-group position-relative has-icon-left">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="current-password">
												<div class="form-control-position"> <i class="la la-key"></i> </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
											</fieldset>
											<div class="form-group row">
												<div class="col-sm-6 col-12 text-center text-sm-left pr-0" style="padding-left: 33px;">
													<fieldset>
                                                        <input class="form-check-input chk-remember" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
														<label for="remember-me"> Remember Me</label>
													</fieldset>
												</div>
												<div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
											</div>
											<button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/vendors.min.js') }}"></script>
	<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
	<script src="{{ asset('js/app-menu.min.js') }}"></script>
	<script src="{{ asset('js/app.min.js') }}"></script>
</body>

</html>