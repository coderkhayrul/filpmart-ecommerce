@include('website.includes.header')

<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('website.includes.topbar')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== CONTENT ============================================== -->
            @yield('norman_content')
            <!-- /.home-banner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
@include('website.includes.footer')
