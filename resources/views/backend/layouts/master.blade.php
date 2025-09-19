<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Blog Dashboard - @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/backend/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet">
    @yield('styles')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('backend.layouts.header')

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('backend.layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        @include('backend.layouts.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('assets/backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/settings.js') }}"></script>
    <script src="{{ asset('assets/backend/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/backend/js/styleSwitcher.js') }}"></script>

    @yield('scripts')

</body>

</html>
