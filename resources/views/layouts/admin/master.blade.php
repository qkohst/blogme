<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../admin-assets/img/logo.png">
    <link rel="icon" type="image/png" href="../admin-assets/img/logo.png">
    <title>
        Qkoh St | {{$title}}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/admin-assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/admin-assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
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

        <!-- Main Content -->
        @yield('content')
        <!-- End Main Content -->

    </main>

    <!-- Sweet Alert -->
    @include('sweetalert::alert')

    <!--   Core JS Files   -->
    <script src="/admin-assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/admin-assets/js/core/popper.min.js"></script>
    <script src="/admin-assets/js/core/bootstrap.min.js"></script>
    <script src="/admin-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/admin-assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/admin-assets/js/argon-dashboard.min.js?v=2.0.2"></script>

    <!-- Page Scripts -->
    @yield('scripts')
    <!-- End Page Scripts -->
</body>

</html>