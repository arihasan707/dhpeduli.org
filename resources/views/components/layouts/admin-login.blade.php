<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{asset('backend/css/remixicon.css')}}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/bootstrap.min.css')}}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/apexcharts.css')}}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/dataTables.min.css')}}">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.quill.snow.css')}}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/flatpickr.min.css')}}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/full-calendar.css')}}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/jquery-jvectormap-2.0.5.css')}}">
    <!-- Popup css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/magnific-popup.css')}}">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{asset('backend/css/lib/slick.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
</head>

<body>
    {{ $slot }}

    <!-- jQuery library js -->
    <script src="{{asset('backend/js/lib/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('backend/js/lib/bootstrap.bundle.min.js')}}"></script>
    <!-- Apex Chart js -->
    <script src="{{asset('backend/js/lib/apexcharts.min.js')}}"></script>
    <!-- Data Table js -->
    <script src="{{asset('backend/js/lib/dataTables.min.js')}}"></script>
    <!-- Iconify Font js -->
    <script src="{{asset('backend/js/lib/iconify-icon.min.js')}}"></script>
    <!-- jQuery UI js -->
    <script src="{{asset('backend/js/lib/jquery-ui.min.js')}}"></script>
    <!-- Vector Map js -->
    <script src="{{asset('backend/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <script src="{{asset('backend/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- Popup js -->
    <script src="{{asset('backend/js/lib/magnifc-popup.min.js')}}"></script>
    <!-- Slick Slider js -->
    <script src=" {{asset('backend/js/lib/slick.min.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('backend/js/app.js')}}"></script>

    <script>
        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle('.toggle-password');
        // ========================= Password Show Hide Js End ===========================
    </script>

</body>

</html>