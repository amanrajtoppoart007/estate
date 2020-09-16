<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Al Hoor Real Estate</title>
    <link rel="stylesheet" href="{{asset('theme/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('theme/fontawesome/css/all.min.css')}}">
    @yield("link")
    @yield("css")
</head>

<body>
    <!-- NavBar -->
    @include("user.include.navbar")
    <!-- End NavBar -->
     @yield("content")
    <!-- Footer -->
      @include("user.include.footer")
    <!-- End Footer -->

    <script src="{{asset('theme/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('theme/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield("js")
    @yield("script")
</body>

</html>
