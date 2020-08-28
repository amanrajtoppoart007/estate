<!DOCTYPE html>

<html lang="en">



<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="csrf-token" content="{{csrf_token()}}">

	<meta name="base-url" content="{{URL::to('/')}}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="description" content="Homex template">

	<meta name="keywords" content="">

	<meta name="author" content="Unicoder">

	<link rel="shortcut icon" href="{{asset('theme/default/images/favicon.ico')}}">

	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/bootstrap-slider.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/jquery-ui.css')}}">

	<!-- <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/layerslider.css')}}"> -->

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/color-skyblue.css')}}" id="color-change">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/responsive.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/owl.carousel.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('plugin/md-icons/css/materialdesignicons.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('theme/default/fonts/flaticon/flaticon.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('plugin/toaster/jquery.toast.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

	<title>{{config('app.name','Property Finder')}} - Find Your Dream Home</title>

	<link href="{{asset('theme/custom/css/slick.css')}}" rel="stylesheet">

	<!-- <link href="{{asset('theme/custom/css/chosen.min.css')}}" rel="stylesheet"> -->

	<link href="{{asset('theme/custom/css/nouislider.min.css')}}" rel="stylesheet">

	<link href="{{asset('theme/custom/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />

	<link href="{{asset('theme/custom/css/new-theme.css')}}" rel="stylesheet">

	<link href="{{asset('css/preloader.css')}}" rel="stylesheet">

	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">

</head>



<body>

	<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">

		<div class="d-flex justify-content-center y-middle position-relative">

			<div class="spinner-border" role="status">

				<span class="sr-only">Loading...</span>

			</div>

		</div>

	</div>

	@yield('header')

	@yield('navbar')

	@yield('content')

	@include('guest.include.footer')

	@yield('modal')

	<a href="#" class="bg-default color-white" id="scroll"><i class="fa fa-angle-up"></i></a>

	<script src="{{asset('theme/default/js/jquery.min.js')}}"></script>

	<script src="{{asset('theme/default/js/greensock.js')}}"></script>

	<script src="{{asset('theme/default/js/layerslider.transitions.js')}}"></script>

	<script src="{{asset('theme/default/js/layerslider.kreaturamedia.jquery.js')}}"></script>

	<script src="{{asset('theme/default/js/popper.min.js')}}"></script>

	<script src="{{asset('theme/default/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('theme/default/js/owl.carousel.min.js')}}"></script>

	<script src="{{asset('theme/default/js/tmpl.js')}}"></script>

	<script src="{{asset('theme/default/js/jquery.dependClass-0.1.js')}}"></script>

	<script src="{{asset('theme/default/js/draggable-0.1.js')}}"></script>

	<script src="{{asset('theme/default/js/jquery.slider.js')}}"></script>

	<script src="{{asset('theme/default/js/wow.js')}}"></script>

	<script src="{{asset('theme/default/js/YouTubePopUp.jquery.js')}}"></script>

	<script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>

	<script src="{{asset('theme/default/js/validate.js')}}"></script>

	<script src="{{asset('js/sweetalert2.js')}}"></script>

	<script src="{{asset('theme/default/js/custom.js')}}"></script>

	<script src="{{asset('js/custom.js')}}"></script>

	<script src="{{asset('js/ajax.js')}}"></script>

	<script src="{{asset('theme/custom/js/slick.min.js')}}"></script> <!-- slick slider -->

	<script src="{{asset('theme/custom/js/nouislider.min.js')}}"></script>

	<!-- <script src="{{asset('theme/custom/js/chosen.jquery.min.js')}}"></script>  -->
	
	<script src="{{asset('theme/custom/js/isotope.min.js')}}"></script> <!-- isotope-->

	<script src="{{asset('theme/custom/js/wNumb.js')}}"></script> <!-- price formatting -->

	<script src="{{asset('theme/custom/js/global.js')}}"></script>

	@yield('script')

</body>



</html>