<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<meta charset="utf-8">
		<title>BROWN BOOST</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href=" {{asset('css/templatemo-style.css')}}">
		<script src="{{asset('js/jquery.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.singlePageNav.min.js')}}"></script>
		<script src="{{asset('js/typed.js')}}"></script>
		<script src="{{asset('js/wow.min.js')}}"></script>
		<script src="{{asset('js/custom.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

		<!-- Logo del sitio -->
		<link rel="apple-touch-icon" sizes="86x86" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

<body>
    @include('layouts.preloader')
    @include('layouts.menu')
    @yield('contenido')
    @include('layouts.footer')
</body>
</html>
