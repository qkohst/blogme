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
                    <h3>Posting Tulisan Terbaikmu</h3>
                    <p>
                        Tempat santai bagi programmer untuk menjelajah hal seputar pemrograman dalam bentuk sumber referensi bacaan, tutorial coding/proyek IT, serta berita terbaru terkait framework coding.
                    </p>

                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Tulis Blog</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Blog Section ======= -->
    <section id="Blog">
        <div class="container">

            <!-- Seach Form  -->
            <div class="search justify-content-center">
                <form action="" method="post">
                    <input type="text" name="search" placeholder="Find your text"><input type="submit" value="Telusuri">
                </form>
            </div>
            <!-- End Seach Form  -->

            <div class="row pt-4">

                <!-- Questiont List  -->
                <div class="col-lg-9 col-md-12">

                    <a href="" role="button">
                        <div class="card">
                            <div class="post px-3 py-3">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="member-assets/img/about.png" class="img-fluid" alt="academy-img">
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="pt-2">
                                            Cara Mengatasi Error Di Laravel
                                        </p>

                                        <p class="text-dark">
                                            Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                        </p>

                                        <span class="badge bg-light">#laravel</span>
                                        <span class="badge bg-light">#php</span>

                                    </div>
                                </div>

                                <p>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                        <span class="username">
                                            <a href="#" class="pl-3">Jonathan Burke Jr.</a>

                                            <span class="float-right btn-tool">
                                                <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                <a href="#" class="link-black text-sm mr-2"><i class="icofont-like"></i> 0</a>
                                                <a href="#" class="link-black text-sm"><i class="icofont-speech-comments"></i> 0</a>
                                                <a href="#" class="link-black text-sm"><i class="icofont-book-mark"></i> 0</a>
                                            </span>

                                        </span>
                                        <span class="description pl-1">7:30 PM today</span>


                                    </div>

                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="" role="button">
                        <div class="card">
                            <div class="post px-3 py-3">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="member-assets/img/about.png" class="img-fluid" alt="academy-img">
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="pt-2">
                                            Cara Mengatasi Error Di Laravel
                                        </p>

                                        <p class="text-dark">
                                            Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                        </p>

                                        <span class="badge bg-light">#laravel</span>
                                        <span class="badge bg-light">#php</span>

                                    </div>
                                </div>

                                <p>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                        <span class="username">
                                            <a href="#" class="pl-3">Jonathan Burke Jr.</a>

                                            <span class="float-right btn-tool">
                                                <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                <a href="#" class="link-black text-sm mr-2"><i class="icofont-like"></i> 0</a>
                                                <a href="#" class="link-black text-sm"><i class="icofont-speech-comments"></i> 0</a>
                                                <a href="#" class="link-black text-sm"><i class="icofont-book-mark"></i> 0</a>
                                            </span>

                                        </span>
                                        <span class="description pl-1">7:30 PM today</span>


                                    </div>

                                </p>
                            </div>
                        </div>
                    </a>

                    <div class="text-center pt-2">
                        <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                    </div>

                </div>

                <!-- Right Nav  -->
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-header pb-2">
                            # Trending Tags
                        </div>
                        <div class="card-body">
                            <div class="mb-1">
                                <button type="button" class="btn btn-sm btn-light">
                                    #laravel
                                </button>
                                <small> x 4</small>
                            </div>
                            <div class="mb-1">
                                <button type="button" class="btn btn-sm btn-light">
                                    #php
                                </button>
                                <small> x 4</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection