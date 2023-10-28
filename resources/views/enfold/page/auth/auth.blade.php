<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- --------------------------- Fonts ---------------------------------------- -->

	<!-- Google Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" media="all" rel="stylesheet" type="text/css" />
	<!-- -------------x------------- Fonts --------------------x------------------- -->

	<title>@yield('title') | {{ config('app.name') }}</title>
	<link rel="stylesheet" href="{{asset('enfold/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('enfold/css/my-login.css')}}">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="{{ asset('enfold/images/enfold.png') }}" alt="logo" style="padding-top: 30%;">
					</div>
					<div class="card fat">
						@yield('content')
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; Your Company
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="{{asset('enfold/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('enfold/js/popper.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('enfold/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('enfold/js/my-login.js')}}" type="text/javascript"></script>
</body>

</html>