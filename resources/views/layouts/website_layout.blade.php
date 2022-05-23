@include('website.includes.header')

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('website.includes.topbar')

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                @include('website.includes.sidebar')
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                @yield('website_content')
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand1.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt="">
                            </a> </div>
                        <!--/.item-->

                        <div class="item m-t-10"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand2.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt="">
                            </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand3.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand4.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand5.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand6.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand2.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand4.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand1.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->

                        <div class="item"> <a href="#" class="image"> <img
                                    data-echo="{{ asset('frontend') }}/images/brands/brand5.png"
                                    src="{{ asset('frontend') }}/images/blank.gif" alt=""> </a> </div>
                        <!--/.item-->
                    </div>
                    <!-- /.owl-carousel #logo-slider -->
                </div>
                <!-- /.logo-slider-inner -->

            </div>
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
    @include('website.includes.footer')
