<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="robots" content="nosnippet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="base-url" content="{{ URL::to('/') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" href="{{asset('theme/default/images/favicon.ico')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/overit.css')}}">
  @yield('head')
  @yield('css')
</head>
<body class="hold-transition layout-fixed">
<div class="wrapper">
    <div class="content" id="content_wrapper">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
</div>
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
@yield('js')
@yield('script')
</body>
</html>
