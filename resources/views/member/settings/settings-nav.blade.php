@extends('layouts.member.master')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('profile.index') }}">Member</a></li>
                    <li><a href="{{ route('settings.index') }}?pages=profile">Settings</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Profile Section ======= -->
    <section id="profile" class="profile">
        <div class="container">

            <div class="row">

                <!-- Left Nav  -->
                <div class="col-lg-3">
                    <div class="text-lg mb-3">
                        Pengaturan
                    </div>

                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item" data-aos="fade-up">
                            <a class="nav-link {{ request('pages') == 'profile' ? 'active show' : '' }}" href="{{ route('settings.index') }}?pages=profile">
                                <p class="text-md"><i class="icofont-user"></i> Profil</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                            <a class="nav-link {{ request('pages') == 'personal' ? 'active show' : '' }}" href="{{ route('settings.index') }}?pages=personal">
                                <p class="text-md"><i class="icofont-contacts"></i> Data Pribadi</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                            <a class="nav-link {{ request('pages') == 'academy' ? 'active show' : '' }}" href="{{ route('settings.index') }}?pages=academy">
                                <p class="text-md"><i class="icofont-license"></i> Academy</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                            <a class="nav-link {{ request('pages') == 'account' ? 'active show' : '' }}" href="{{ route('settings.index') }}?pages=account">
                                <p class="text-md"><i class="icofont-key"></i> Ganti Password</p>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-9 col-md-12 mt-4 mt-lg-0">
                    @yield('pages')
                </div>

            </div>
        </div>
    </section><!-- End Profile Section -->



</main><!-- End #main -->
@endsection

@section('scripts')

@yield('page_scripts')

@endsection