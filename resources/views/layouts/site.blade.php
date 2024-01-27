<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <link rel="shortcut icon" href="{{ asset('acdf/img/favicon.png') }}" type="image/png">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#003DA7">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#003DA7">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#003DA7">

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/bootstrap.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/font-awesome.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/animate.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/jquery.fancybox.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}">--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('acdf-new/js/slick-js/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf-new/js/slick-js/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf-new/js/toastr/toastr.min.css') }}">
    @yield('css')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('acdf/css/new.style.css?version=1.0.1.174') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('acdf-new/css/styles.css?version=1.0.1.174') }}">
    @yield('meta')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     --}}
</head>

<body>

@include('layouts._header', ['header_menu' => menu('header-menu')])

<div class="site-content-wrap">
    @yield('content')
</div>

@include('layouts._footer', ['footer_menu' => menu('footer-menu'), 'contacts' => getContacts()])

<script src="{{ asset('/acdf/js/jquery.min.js') }}"></script>
<script src="{{ asset('/acdf/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/acdf/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
@yield('js')
{{--<script src="{{ asset('/acdf/js/main.js?v=1.0.0.13') }}"></script>--}}
<script src="{{ asset('/acdf-new/js/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/acdf-new/js/gsap/gsap.min.js') }}"></script>
<script src="{{ asset('/acdf-new/js/gsap/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('/acdf-new/js/slick-js/slick.min.js') }}"></script>

<script src="{{ asset('/acdf-new/js/main.js?v=1.0.0.13') }}"></script>
<script>
    <?php if (Session::has('success')): ?>
    toastr.success("<?= Session::get('success') ?>");
    <?php endif; ?>

    <?php if (Session::has('error')): ?>
    toastr.error("<?= Session::get('error') ?>");
    <?php endif; ?>

    <?php if (Session::has('info')): ?>
    toastr.info("<?= Session::get('info') ?>");
    <?php endif; ?>

    <?php if (Session::has('warning')): ?>
    toastr.warning("<?= Session::get('warning') ?>");
    <?php endif; ?>
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script>
    $(document).ready(function() {
        $('#birthday').datepicker({
            dateFormat: 'yy-mm-dd', // Change date format if needed
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0' // Adjust the year range as needed
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#birthday').datepicker({
            dateFormat: 'yy-mm-dd', // Change date format if needed
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0' // Adjust the year range as needed
        });
    });
</script>


</body>
</html>
