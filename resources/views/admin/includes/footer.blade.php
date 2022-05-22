<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())

                </script> © All rights reserved.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    <a href="#!" class="text-decoration-underline">Filpmart</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
@include('admin.includes.rightbar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
{{-- <div class="rightbar-overlay"></div> --}}
{{-- NOTIFICATION START --}}
<script>
    @if (Session::has('success'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("{{ Session::get('success') }}");
    @endif
    @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<!-- JAVASCRIPT -->
<script src="{{ asset('backend') }}/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('backend') }}/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="{{ asset('backend') }}/libs/pace-js/pace.min.js"></script>

@yield('custom-script')
<!-- apexcharts -->
<script src="{{ asset('backend') }}/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="{{ asset('backend') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('backend') }}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="{{ asset('backend') }}/js/pages/dashboard.init.js"></script>
<!-- Bootstrap Toasts Js -->
<script src="{{ asset('backend') }}/js/pages/bootstrap-toasts.init.js"></script>

<script src="{{ asset('backend') }}/js/app.js"></script>
</body>

</html>
