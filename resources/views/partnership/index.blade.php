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
                    <h3>Bersama Membangun Talenta Digital di Indonesia</h3>
                    <p>
                        Kotakode membuka peluang kolaborasi dengan berbagai institusi untuk mendukung ekosistem digital di Indonesia
                    </p>
                    <ul>
                        <li class="pb-0">
                            <h5>Mengapa bermitra dengan Kotakode <i class="icofont-question"></i></h5>
                        </li>
                    </ul>
                    <ul class="faq-list">
                        <li data-aos="fade-up">
                            <a data-toggle="collapse" class="" href="#faq1"><i class="icofont-check-circled"></i> Jangkau Ribuan Programmer Di Indonesia <i class="icofont-rounded-down"></i></a>
                            <div id="faq1" class="collapse show" data-parent=".faq-list">
                                <p>
                                    Kotakode adalah tempat tujuan programmer Indonesia. Dengan bekerjasama dengan Kotakode, Anda dapat menjangkau puluhan ribu programmer Indonesia untuk meningkatkan acara Anda berikutnya.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <a data-toggle="collapse" href="#faq2" class="collapsed"><i class="icofont-check-circled"></i> Tingkatkan Kredibilitas Brand Anda <i class="icofont-rounded-down"></i></a>
                            <div id="faq2" class="collapse" data-parent=".faq-list">
                                <p>
                                    Kotakode adalah salah satu pemimpin di bidang teknologi Indonesia. Ketika Anda menjadi partner kami, brand Anda akan secara otomatis dipercayai oleh komunitas tech di Indonesia.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Gabung Sekarang</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <span>Tipe Partnership</span>
                <h2>Tipe Partnership</h2>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>Community Partner</h3>
                        <div class="icon"><i class="icofont-ui-user-group"></i></div>
                        <ul>
                            <p>Kotakode berkolaborasi dengan Bootcamp IT, KOMINFO, serta Institusi Pendidikan untuk memfasilitasi murid dalam proses belajar pemrograman.</p>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Gabung Sekarang</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in">
                        <h3>Media Partner</h3>
                        <div class="icon"><i class="icofont-multimedia"></i></div>
                        <ul>
                            <p>Kotakode membuka peluang kolaborasi untuk mengadakan webinar, lomba, maupun promosi melalui marketing channel Kotakode.</p>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Gabung Sekarang</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <span>Community Partner</span>
                <h2>Community Partner</h2>
                <p>
                    Kotakode berkolaborasi dengan Perusahaan Online IT Training, Pemerintah, Institusi Pendidikan, organisasi non-profit untuk memfasilitasi murid dalam belajar pemrograman.
                </p>
            </div>

            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in">
                        <img src="/member-assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="100">
                        <img src="/member-assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="150">
                        <img src="/member-assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="200">
                        <img src="/member-assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                        <img src="/member-assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                        <img src="/member-assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                        <img src="/member-assets/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="client-logo">
                        <img src="/member-assets/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->
</main><!-- End #main -->
@endsection