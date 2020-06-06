<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow">
    <meta name="robots" content="nosnippet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ URL::to('/') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Homex template">
    <meta name="keywords" content="">
    <meta name="author" content="unicoder">
    <link rel="shortcut icon" href="{{asset('theme/default/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/bootstrap-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/color.css')}}" id="color-change">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/default/fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/toaster/jquery.toast.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/overit.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugin/md-icons/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('DataTable/datatables.min.css')}}">
    @yield('head')
</head>
<body>
<div id="loader-wrapper">
  <div id="loader"></div>
</div>
 @include('admin.include.topbar')
    <div class="full-row deshbord">
        <div class="container-fluid">
            <div class="row">
               @include('admin.include.leftSidebar')
               <div class="col-md-11 col-xl-10 bg-gray">
                      <div class="row">
                          <div class="full-row deshbord_panel w-100 mb-5">
                              @yield('content')
                          </div>
                          <div class="dashboard_copyright bg-white py-4 color-secondery text-center">© {{ now()->year }} {{ config('app.name', 'Laravel') }} All right reserved</div>
                      </div>
                </div>
            </div>
         </div>
    </div>
    <a href="#" class="bg-default color-white" id="scroll"><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('theme/default/js/jquery.min.js')}}"></script>
    <script src="{{asset('theme/default/js/greensock.js')}}"></script>
    <script src="{{asset('theme/default/js/layerslider.transitions.js')}}"></script>
    <script src="{{asset('theme/default/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <script src="{{asset('theme/default/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/default/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('DataTable/datatables.min.js')}}"></script>
    <script src="{{asset('theme/default/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('theme/default/js/tmpl.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.dependClass-0.1.js')}}"></script>
    <script src="{{asset('theme/default/js/draggable-0.1.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.slider.js')}}"></script>
    <script src="{{asset('theme/default/js/wow.js')}}"></script>
    <script src="{{asset('theme/default/js/YouTubePopUp.jquery.js')}}"></script>
    <script src="{{asset('theme/default/js/chart.min.js') }}"></script>
    <script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>
    <script src="{{asset('plugin/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('theme/default/js/custom.js')}}"></script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/utility.js')}}"></script>
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/place.js')}}"></script>
    @yield('js')
    @yield('script')
    <script type="text/javascript">
        $(document).ready(function() {
  setTimeout(function(){
    $('body').addClass('loaded');
  }, 500);
});
    </script>
</body>
</html>