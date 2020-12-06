<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ URL::to('/') }}">
    <!-- Title -->
    <title>Al hoor Estate</title>
    <?php /*
    <title>{{ config('app.name', 'Laravel') }}</title>

 */ ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/assets/vendor/icon-set/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert2.css')}}">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/theme.minc619.css?v=1.0')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/overit.css')}}">
    @yield('head')
</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl">
<div  id="custom-animated-loader" class="custom-animated-loader text-center">
    <img  class="custom-animated-loader-content" src="{{asset('assets/img/loader.gif')}}" alt="">
</div>

@include('admin.layout.include.navbar')

<!-- ========== MAIN CONTENT ========== -->

@include('admin.layout.include.leftSideBar')
<main id="content" role="main" class="main">
@yield('content')

<!-- Footer -->
    <div class="footer mt-5 pt-8">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="font-size-sm mb-0">&copy;  <span class="d-none d-sm-inline-block">2020 Softwarefuels Consultency Services PVT LTD.</span></p>
            </div>
            <div class="col-auto">
                <div class="d-flex justify-content-end">
                    <!-- List Dot -->
                    <ul class="list-inline list-separator">
                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">.</a>
                        </li>

                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">.</a>
                        </li>


                    </ul>
                    <!-- End List Dot -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->


@include('admin.layout.include.speedLink')






<!-- ========== END SECONDARY CONTENTS ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('theme/front/assets/js/vendor.min.js')}}"></script>

<!-- JS Front -->
<script src="{{asset('theme/front/assets/js/theme.min.js')}}"></script>

<!-- JS Plugins Init. -->


<script src="{{asset('plugin/toaster/jquery.toast.min.js') }}"></script>
<script src="{{asset('plugin/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/utility.js')}}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/place.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#custom-animated-loader").hide();
    })
</script>
<script>
    $(document).on('ready', function () {
        // initialization of navbar vertical navigation
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

        // initialization of tooltip in navbar vertical menu
        $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

        $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
            if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
            }
        });

        // initialization of unfold
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });

        // initialization of form search
        $('.js-form-search').each(function () {
            new HSFormSearch($(this)).init()
        });
    });
</script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
@yield('js')
@yield('modal')
@yield('script')
</body>

</html>
