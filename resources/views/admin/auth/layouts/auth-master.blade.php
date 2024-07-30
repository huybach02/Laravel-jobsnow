<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: adminX Admin ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/login2.css') }}" rel="stylesheet">

    <!-- adminX You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('admin/assets/css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-blue">

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

    <script src="{{ asset('admin/assets/js/pages/login2/jparticles.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/login2/particle.js') }}"></script>

    <script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script><!-- Custom Js -->
    <script src="{{ asset('admin/assets/js/pages/login2/event.js') }}"></script>
</body>

</html>
