<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="base-url" id="base_url" content="{{url('/')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Starter</title>
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('plugin/toaster/jquery.toast.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugin/confirm/jquery-confirm.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  @yield('link')
  @yield('css')
</head>
<body class="hold-transition login-page">
 @yield('content')
@yield('modal')
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>
<script src="{{asset('plugin/confirm/jquery-confirm.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
@yield('js')
@yield('script')
</body>
</html>
