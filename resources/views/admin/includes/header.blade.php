<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Filpmart Ecommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Filpmart Ecommerce" name="description" />
    <meta content="Filpmart" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend') }}/images/favicon.ico">

    <!-- plugin css -->
    <link href="{{ asset('backend') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />
    @yield('custom-css')
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- SweetAlert --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    {{-- Toster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
