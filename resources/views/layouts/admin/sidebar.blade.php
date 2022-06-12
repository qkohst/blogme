<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
        <img src="/admin-assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Qkoh St</span>
    </a>
</div>
<hr class="horizontal dark mt-0">
<div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>

        <!-- Home Menu Navbar -->
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Menu</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-dashboard-web text-info text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Tentang Kami</span>
            </a>
            <a class="nav-link {{ Route::is('team.*') ? 'active' : '' }}" href="{{ route('team.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-team-alt text-success text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Tim Kami</span>
            </a>
            <a class="nav-link {{ Route::is('faq.*') ? 'active' : '' }}" href="{{ route('faq.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-question text-primary text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">FAQ</span>
            </a>
            <a class="nav-link {{ Route::is('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-contact-add text-dark text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Contact</span>
            </a>
            <a class="nav-link {{ Route::is('bank.*') ? 'active' : '' }}" href="{{ route('bank.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-credit-card text-warning text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Rekening Bank</span>
            </a>
        </li>
        <!-- End Home Menu Navbar -->

        <!-- Program Menu Navbar -->
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Program Academy</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('academy.*') ? 'active' : '' }}" href="{{ route('academy.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-learn text-info text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Academy</span>
            </a>
            <a class="nav-link {{ Route::is('peserta.*') ? 'active' : '' }}" href="{{ route('peserta.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-group-students text-dark text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pendaftaran Peserta</span>
            </a>
            <a class="nav-link {{ Route::is('submission.*') ? 'active' : '' }}" href="{{ route('submission.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-cloud-upload text-primary text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Submission Kelas</span>
            </a>
            <a class="nav-link {{ Route::is('pengajuan-sertifikat.*') ? 'active' : '' }}" href="{{ route('pengajuan-sertifikat.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-license text-warning text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Pengajuan Sertifikat</span>
            </a>

            <a class="nav-link {{ Route::is('laporan-materi.*') ? 'active' : '' }}" href="{{ route('laporan-materi.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-warning text-danger text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Laporan Materi</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Program Lainnya</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/guestbooks">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-workers-group text-success text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Forum Q&A</span>
            </a>
            <a class="nav-link" href="/guestbooks">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-world text-primary text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Blog</span>
            </a>
            <a class="nav-link" href="/guestbooks">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-search-job text-dark text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Job</span>
            </a>
            <a class="nav-link" href="/guestbooks">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-license text-warning text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Event</span>
            </a>
            <a class="nav-link" href="/guestbooks">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-badge text-reset text-lg opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Partnership</span>
            </a>
        </li>
        <!-- End Program Menu Navbar -->

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('logout') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-user-alt-4  text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
            </a>
            <a class="nav-link " href="{{ route('logout') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-key  text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Change Password</span>
            </a>
            <a class="nav-link " href="{{ route('logout') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 mb-1 d-flex align-items-center justify-content-center">
                    <i class="icofont-logout text-danger text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </a>
        </li>
    </ul>
</div>
<div class="sidenav-footer mx-3">
    <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="/admin-assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
            <div class="docs-info">
                <h6 class="mb-0">Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </h6>
                <p class="text-xs font-weight-bold mb-0"> Developed By <a href="https://qkohst.github.io/" target="_black">Qkoh St</a>
                </p>
            </div>
        </div>
    </div>
</div>