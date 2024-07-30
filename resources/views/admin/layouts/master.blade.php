<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: adminX - Admin ::</title>

    @include('admin.layouts.head')

</head>

<body class="theme-blue light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Search  -->
    <div class="search-bar">
        <div class="search-icon"> <i class="material-icons">search</i> </div>
        <input type="text" placeholder="Explor adminX...">
        <div class="close-search"> <i class="material-icons">close</i> </div>
    </div>

    <!-- Top Bar -->
    @include('admin.layouts.navbar')
    <!-- #Top Bar -->

    <!--Side menu and right menu -->
    <!-- Left Sidebar -->
    @include('admin.layouts.left-sidebar')
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    @include('admin.layouts.right-sidebar')
    <!-- #END# Right Sidebar -->

    <!-- main content -->
    @yield('content')

    @include('admin.layouts.script')

</body>

</html>
