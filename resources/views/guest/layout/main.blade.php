<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Al Hoor Real Estate</title>
    <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/custom.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <script src="{{asset('theme/js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('theme/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
    @yield("js")
    @yield("script")
</body>

</html>
