<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/assets/css/components.css') }}">
    <link href="{{ asset('vendor/assets/img/logo_hap-removebg-preview.png') }}" rel="icon">
    <style>
        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('components.header')
            <div class="main-sidebar sidebar-style-2">
                @include('components.sidebar')
            </div>
            <div class="main-content">
                @yield('content')
            </div>
            @include('components.footer')
        </div>
    </div>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const themeOptions = document.body.classList.contains("theme-dark") ? {
                skin: "oxide-dark",
                content_css: "dark",
            } : {
                skin: "oxide",
                content_css: "default",
            }

            tinymce.init({
                selector: "#deskripsi",
                ...themeOptions
            })
            tinymce.init({
                selector: "#dark",
                toolbar: "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
                plugins: "code",
                ...themeOptions,
            })
        })
    </script>
    <script src="{{ asset('vendor/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/stisla.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('vendor/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('vendor/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/custom.js') }}"></script>
</body>

</html>
