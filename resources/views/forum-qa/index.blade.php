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
                    <h3>Find the best answer to your technical question,
                        help others answer theirs</h3>
                    <p class="font-italic">
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there
                        isn't anything embarrassing hidden in the middle of text.
                    </p>
                    <ul>
                        <li><i class="icofont-question"></i> Anybody can ask a question</li>
                        <li><i class="icofont-check"></i> Anybody can answer</li>
                        <li><i class="icofont-expand-alt"></i> The best answers are voted up and rise to the top</li>
                    </ul>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Tanyakan Sesuatu</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Questions Section ======= -->
    <section id="questions" class="section-bg">
        <div class="container">

            <!-- Seach Form  -->
            <div class="search justify-content-center">
                <form action="" method="post">
                    <input type="text" name="search" placeholder="Find your question"><input type="submit" value="Telusuri">
                </form>
            </div>
            <!-- End Seach Form  -->

            <div class="row pt-4">

                <!-- Questiont List  -->
                <div class="col-lg-9 col-md-12">
                    <div class="card card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" href="#new" data-toggle="tab">Baru</a></li>
                                <li class="nav-item"><a class="nav-link" href="#active" data-toggle="tab">Aktif</a></li>
                                <li class="nav-item"><a class="nav-link" href="#notanswer" data-toggle="tab">Belum Dijawab</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- New Questiont -->
                                <div class="active tab-pane" id="new">

                                    <a href="" role="button">
                                        <div class="card">
                                            <div class="post px-3 py-3">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-2">
                                                        Cara Mengatasi Error Di Laravel
                                                    </span>
                                                    <span class="description">Jonathan Burke Jr. | 7:30 PM today</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <p class="text-dark">
                                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                                </p>

                                                <span class="badge bg-light">#laravel</span>
                                                <span class="badge bg-light">#php</span>

                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                    <a href="#" class="link-black text-sm"><i class="icofont-like"></i> 0</a>
                                                    <span class="float-right">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Jawaban (5)
                                                        </a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" role="button">
                                        <div class="card">
                                            <div class="post px-3 py-3">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-2">
                                                        Cara Mengatasi Error Di Laravel
                                                    </span>
                                                    <span class="description">Jonathan Burke Jr. | 7:30 PM today</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <p class="text-dark">
                                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                                </p>

                                                <span class="badge bg-light">#laravel</span>
                                                <span class="badge bg-light">#php</span>

                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                    <a href="#" class="link-black text-sm"><i class="icofont-like"></i> 0</a>
                                                    <span class="float-right">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Jawaban (5)
                                                        </a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                                    </div>
                                </div>
                                <!-- End New Questiont -->

                                <!-- Aktif Questiont -->
                                <div class="tab-pane" id="active">
                                    <a href="" role="button">
                                        <div class="card">
                                            <div class="post px-3 py-3">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-2">
                                                        Cara Menga
                                                    </span>
                                                    <span class="description">Jonathan Burke Jr. | 7:30 PM today</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <p class="text-dark">
                                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                                </p>

                                                <span class="badge bg-light">#laravel</span>
                                                <span class="badge bg-light">#php</span>

                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                    <a href="#" class="link-black text-sm"><i class="icofont-like"></i> 0</a>
                                                    <span class="float-right">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Jawaban (5)
                                                        </a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                                    </div>
                                </div>
                                <!-- End Aktif Questiont -->

                                <!-- Belum Jawab Questiont -->
                                <div class="tab-pane" id="notanswer">
                                    <a href="" role="button">
                                        <div class="card">
                                            <div class="post px-3 py-3">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="../member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-2">
                                                        Cara Mengatasi Error Di Laravel
                                                    </span>
                                                    <span class="description">Jonathan Burke Jr. | 7:30 PM today</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <p class="text-dark">
                                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                                </p>

                                                <span class="badge bg-light">#laravel</span>
                                                <span class="badge bg-light">#php</span>

                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"> <i class="icofont-eye-alt"></i> 0</a>
                                                    <a href="#" class="link-black text-sm"><i class="icofont-like"></i> 0</a>
                                                    <span class="float-right">
                                                        <a href="#" class="link-black text-sm">
                                                            <i class="far fa-comments mr-1"></i> Jawaban (5)
                                                        </a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="text-center">
                                        <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                                    </div>

                                </div>
                                <!-- End Belum Jawab Questiont -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
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
    </section><!-- End Questions Section -->

</main><!-- End #main -->
@endsection