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
                    <li><a href="{{ route('orders.index') }}?pages=waiting">Pesanan Saya</a></li>
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
                    <a href="{{ route('orders.index') }}?pages=banks" class="btn btn-dark btn-block {{ request('pages') == 'paid' ? 'd-none' : '' }}"><i class="icofont-warning-alt"></i> Informasi Pembayaran</a>

                    <div class="text-lg my-3">
                        Pesanan Saya
                    </div>

                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item" data-aos="fade-up">
                            <a class="nav-link {{ request('pages') == 'waiting' ? 'active show' : '' }}" href="{{ route('orders.index') }}?pages=waiting">
                                <p class="text-md"><i class="icofont-ui-timer"></i> Menunggu Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                            <a class="nav-link {{ request('pages') == 'process' ? 'active show' : '' }}" href="{{ route('orders.index') }}?pages=process">
                                <p class="text-md"><i class="icofont-spinner"></i> Proses Verifikasi</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                            <a class="nav-link {{ request('pages') == 'rejected' ? 'active show' : '' }}" href="{{ route('orders.index') }}?pages=rejected">
                                <p class="text-md"><i class="icofont-close"></i> Pesanan Ditolak</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                            <a class="nav-link {{ request('pages') == 'paid' ? 'active show' : '' }}" href="{{ route('orders.index') }}?pages=paid">
                                <p class="text-md"><i class="icofont-check"></i> Pesanan Selesai</p>
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