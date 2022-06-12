@extends('layouts.member.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('profile.index') }}?pages=tentang-saya">Member</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id=" about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-2">
                    <img src="/avatar/{{$user->avatar}}" class="rounded" alt="Images" height="250">
                </div>
                <div class="col-lg-9 pt-lg-0 content">
                    <h3>{{$user->profil_users->nama_lengkap}}</h3>
                    <h5>{{$user->profil_users->headline}}</h5>

                    <p class="mb-1"><i class="icofont-email"></i> {{$user->email}}</p>
                    <p><i class="icofont-location-pin"></i> {{$user->data_pribadi_users->kota_domisili}}</p>
                    <p>Bergabung sejak : {{date('d M Y', strtotime($user->created_at))}}</p>

                    <div class="d-flex">
                        <a href="{{ route('settings.index') }}?pages=profile" class="btn btn-outline-success"><i class="icofont-ui-settings"></i> Pengaturan</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts mb-0">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">{{$data_peserta->count()}}</span>
                    <p>Kelas Dipelajari</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Blog Ditulis</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Job Dicari</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Event Dihadiri</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <section id="team" class="team mt-0 pt-0">
        <div class="container">
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'tentang-saya' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=tentang-saya">Tentang Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'academy' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=academy">Academy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'forum-qa' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=forum-qa">Forum Q&A</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'blog' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'job' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=job">Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request('pages') == 'event' ? 'active' : '' }}" href="{{ route('profile.index') }}?pages=event">Event</a>
                </li>
            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">

                @yield('pages')

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection