<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Default Header (Fluid) - Layouts | Front - Admin &amp; Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Font -->
    <link href="{{asset('theme/front/assets/font/css27217.css?family=Open+Sans:wght@400;600&amp;display=swap')}}" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/assets/vendor/icon-set/style.css')}}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/theme.minc619.css?v=1.0')}}">
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/overit.css')}}">
</head>
<body>

@include('admin.layout.accounting.header')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <!-- Content -->

            @yield('content')

    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
@include('admin.layout.accounting.rightBar')


<!-- ========== END SECONDARY CONTENTS ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('theme/front/assets/js/vendor.min.js')}}"></script>

<!-- JS Front -->
<script src="{{asset('theme/front/assets/js/theme.min.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of unfold
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });

        // initialization of form search
        $('.js-form-search').each(function () {
            new HSFormSearch($(this)).init()
        });

        // initialization of mega menu
        var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
            desktop: {
                position: 'left'
            }
        }).init();
    });
</script>

<!-- IE Support -->

    <script src="{{asset('theme/front/assets/vendor/babel-polyfill/polyfill.min.js')}}"></script>
@yield('script')
</body>

<!-- Mirrored from htmlstream.com/front-dashboard/layouts/header-default-fluid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Nov 2020 19:57:59 GMT -->
</html>
