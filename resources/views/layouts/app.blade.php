<!doctype html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/') }}assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }}</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords"
        content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/frest_admin">




    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="https://demos.pixinvent.com/frest-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />


    <!-- Helpers -->
    <script src="{{ asset('/') }}assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('/') }}assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/') }}assets/js/config.js"></script>

    @yield('addStyle')
</head>

<body>


    @yield('content')

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('/') }}assets/vendor/libs/hammer/hammer.js"></script>

    <script src="{{ asset('/') }}assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('/') }}assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/') }}assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('addScript')
</body>

</html>
