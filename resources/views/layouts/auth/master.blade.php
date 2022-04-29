<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../admin-assets/img/logo.png">
    <link rel="icon" type="image/png" href="../admin-assets/img/logo.png">
    <title>
        Qkoh St |
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../admin-assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../admin-assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                @include('layouts.auth.navbar')
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <!-- Main Content -->
    @yield('content')
    <!-- End Main Content -->

    <!-- Footer  -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-2 mt-2">
                    <a href="https://web.facebook.com/qkohst" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-facebook"></span>
                    </a>
                    <a href="https://www.instagram.com/qkoh_st/" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="https://twitter.com/qkohst" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="https://www.youtube.com/channel/UCHO5t3O1satYKfGnlxGDVsg/videos" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-youtube"></span>
                    </a>
                    <a href="https://github.com/qkohst" target="_blank" class="text-secondary me-xl-4 me-4">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                    <a href="https://www.linkedin.com/in/kukoh-santoso-87674217a" target="_blank" class="text-secondary">
                        <span class="text-lg fab fa-linkedin"></span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script> Developed By <a href="https://qkohst.github.io/" target="_black">Qkoh St</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Sweet Alert -->

    <!--   Core JS Files   -->
    <script src="../admin-assets/js/core/popper.min.js"></script>
    <script src="../admin-assets/js/core/bootstrap.min.js"></script>
    <script src="../admin-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../admin-assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../admin-assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>

</html>