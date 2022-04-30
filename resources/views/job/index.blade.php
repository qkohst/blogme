@extends('layouts.member.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$title}}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="/member-assets/img/about.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>Menghubungkan Anak Bangsa Terbaik
                        pada Pilihan Karir yang Relevan</h3>
                    <p>
                        Bangun Karir dengan Bekerja di Perusahaan Ternama. Jaringan adalah salah satu hal penting yang tidak dimiliki oleh semua orang dalam mendapatkan kesempatan kerja yang layak. Dengan menjadi anggota komunitas Developer Dicoding, hal tersebut bisa kamu dapatkan dengan mudah.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Academy Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <span>Lowongan Terbaru</span>
                <h2>Lowongan Terbaru</h2>
                <p>Berikut adalah daftar lowongan terbaru di Dicoding Job Platform.</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">QA Tester</h4>
                            <small class="float-left badge bg-light ">Remote</small><br>

                            <small class="float-left text-secondary">oleh: PT. Aditya Inovasi Makmur</small>
                            <span class="float-right">2 hari lagi</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">Devops Engineer</h4>
                            <small class="float-left badge bg-light ">Filltime</small><br>

                            <small class="float-left text-secondary">oleh: NBS (PT Kode Aplikasi Indonesia)</small>
                            <span class="float-right">2 hari lagi</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">Junior Backend Developer</h4>
                            <small class="float-left badge bg-light ">Remote</small><br>

                            <small class="float-left text-secondary">oleh: PT. Aditya Inovasi Makmur</small>
                            <span class="float-right">2 hari lagi</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

            </div>

            <div class="text-center pt-2">
                <a href="#">Lihat Lowongan Lainnya <i class="icofont-rounded-down"></i></a>
            </div>
        </div>
    </section>
    <!-- End Academy Section -->

</main><!-- End #main -->
@endsection