<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.green.css')}}">
	<script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/1.js')}}"></script>
</head>
<body>
  	<!--Navbar-->
  	@include('layouts.navbar')
	<!--End navbar-->
	<!-- Breadcrumb -->
	@yield('breadcrumb')
	<!-- End breadcrumb -->
	<div class="main mt-4">
		<div class="container">
			<div class="row">
					<!-- Article -->
					@yield('content')
					<!-- End article -->
				<div class="col-lg-3">
					<!-- Categories -->
					@include('layouts.sidebar')
					<!-- End categories -->
				</div>	<!--  End right -->

			</div> <!-- End row -->
			@yield('below')
		</div> <!-- End container -->
	</div><!--  End main -->
	<!-- Footer -->
	@include('layouts.footer')
	<!-- End footer -->
	@yield('script')
</body>
</html>