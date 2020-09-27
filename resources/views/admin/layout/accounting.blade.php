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
    <link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/toaster/jquery.toast.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/select2/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/overit.css')}}">
    @yield('head')
    @yield('css')
</head>
<body class="sidebar-collapse layout-top-nav">
<div  id="custom-animated-loader" class="custom-animated-loader text-center">
    <img  class="custom-animated-loader-content" src="{{asset('assets/img/loader.gif')}}" alt="">
</div>
<div class="wrapper">
    @include('admin.layout.accounting.navbar')
    @include('admin.include.sidebar')
    <div class="content-wrapper">
        @yield('breadcrumb')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.include.footer')
    @include('admin.include.aside-control')
    @yield('aside-control')
</div>
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#custom-animated-loader").hide();
    })
</script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('DataTable/datatables.min.js')}}"></script>
<script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>
<script src="{{asset('plugin/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/utility.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/place.js')}}"></script>

@yield('js')
@yield('modal')
@yield('script')
</body>
</html>
