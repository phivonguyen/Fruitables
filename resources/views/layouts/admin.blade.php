<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Beatiful Flowers</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('bftt.png') }}" />

    @yield('styles')
</head>

<body>
    <div class="container-scroller">
        @include('layouts.inc.admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            @include('layouts.inc.admin.nav')
            <div class="main-panel">

                <div class="content-wrapper pb-0">
                    @yield('content')
                </div>
                @include('layouts.inc.frontend.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot/jquery.flot.pie.js') }}"></script>
    <!-- End plugin js')}} for this page -->
    <!-- inject:js')}} -->
    <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/admin/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js')}} for this page -->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    @yield('scripts')
</body>

</html>
