<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin-assets/img/logo.png">
    <link rel="icon" type="image/png" href="/admin-assets/img/logo.png">
    <title>
        Qkoh St | {{$title}}
    </title>
    <!-- Nucleo Icons -->
    <link href="/admin-assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- icofont Icons -->
    <link href="/member-assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="/admin-assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
    <!-- Page Style -->
    @yield('style')
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <!-- Sidebar  -->
        @include('layouts.admin.sidebar')
        <!-- End Sidebar  -->

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <!-- Main Content -->
            @yield('content')
            <!-- End Main Content -->

            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                Theme <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Sweet Alert -->
    @include('sweetalert::alert')

    <!--   Core JS Files   -->
    <script src="/admin-assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/admin-assets/js/core/popper.min.js"></script>
    <script src="/admin-assets/js/core/bootstrap.min.js"></script>
    <script src="/admin-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/admin-assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/admin-assets/js/argon-dashboard.min.js?v=2.0.2"></script>

    <!-- Page Scripts -->
    @yield('scripts')
    <!-- End Page Scripts -->
</body>

</html>