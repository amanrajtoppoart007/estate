<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Al Hoor Real Estate</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="base-url" content="{{ URL::to('/') }}">
    <link rel="stylesheet" href="{{asset('theme/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('theme/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/toaster/jquery.toast.min.css')}}">
    @yield("link")
    @yield("css")
</head>

<body>
    <!-- NavBar -->
    @include("guest.include.navbar")
    <!-- End NavBar -->
     @yield("content")
    <!-- Footer -->
      @include("guest.include.footer")
    <!-- End Footer -->
      @yield("modal")
    <script src="{{asset('theme/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('theme/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/ajax.js')}}"></script>
    @yield("js")
    @yield("script")
</body>

</html>
