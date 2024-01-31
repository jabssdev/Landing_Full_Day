<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://www.wrraptheme.com/templates/lucid/html/light/index.html by Cyotek WebCopy 1.8.0.652, martes, 28 de julio de 2020, 02:30:35 a.m -->

<head>
    <title>Admin - Pyrus</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template" />
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('admin/assets/icon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.6.95/css/materialdesignicons.css"
        media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}" />

    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/chartist/css/chartist.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/toastr/toastr.min.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/color_skins.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/sweetalert2.min.css') }}">
    <link href="{{ asset('admin/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    @yield('styles')
</head>

<body class="theme-cyan">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img src="{{ asset('admin/assets/imagenes/load2.png') }}" />
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->

    <div id="wrapper">
        <div>
            @include('admin.layouts.header')
            @include('admin.layouts.menu')
            <div id="main-content">
                <div class="container-fluid">
                    @yield('titulo')

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('admin/assets/bundles/chartist.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/knob.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('admin/sweetalert2.min.js') }} "></script>

    <script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/dropzone.js') }}"></script>

    <script src="{{ asset('admin/jquery.dataTables.js') }}"></script>
    <!-- Jquery Knob-->


    <script src="{{ asset('admin/assets/js/index.js') }}"></script>
    <script src="{{ asset('admin/pyrus/datatables.init.js') }}"></script>
    <script src="{{ asset('admin/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/dataTables.responsive.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>
    @yield('scripts')
</body>
<!-- Copied from http://www.wrraptheme.com/templates/lucid/html/light/index.html by Cyotek WebCopy 1.8.0.652, martes, 28 de julio de 2020, 02:30:35 a.m -->

</html>
