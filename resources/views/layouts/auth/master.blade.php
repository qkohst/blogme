<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/admin-assets/img/logo.png">
    <link rel="icon" type="image/png" href="/admin-assets/img/logo.png">
    <title>
        Qkoh St | {{$title}}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/admin-assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="/admin-assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/member-assets/vendor/icofont/icofont.min.css" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="/admin-assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
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


    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-110">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <!-- Main Content -->
                            @yield('content')
                            <!-- End Main Content -->
                        </div>

                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('/member-assets/img/login-image.jpg');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Jadilah Bagian Dari Kami"</h4>
                                <p class="text-white position-relative">Ikutan diskusi forum tanya jawab, tulis blog dan Membangun portofolio semua di Qkoh St</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer  -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
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
    @include('sweetalert::alert')

    <!--   Core JS Files   -->
    <script src="/admin-assets/js/core/popper.min.js"></script>
    <script src="/admin-assets/js/core/bootstrap.min.js"></script>
    <script src="/admin-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/admin-assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="/admin-assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>

</html>