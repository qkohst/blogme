@extends('layouts.member.master')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('courses.index') }}">Academy</a></li>
                    <li><a href="{{ route('courses.show', $academy->id) }}">{{$title2}}</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Diskusi Section ======= -->
    <section id="diskusi">
        <div class="container">

            <div class="row">

                <!-- Left Nav  -->
                <div class="col-lg-3">
                    <div class="text-lg">
                        Diskusi Kelas
                    </div>
                    <p class="my-3 text-secondary">Fitur diskusi ini bertujuan untuk mempermudah siswa dalam memahami materi akademi. <br> Kamu dapat bertanya dan menjawab hal teknis terkait materi Kelas ini.</p>

                    <a href="{{ route('discussions.create', $academy->id) }}" class="btn btn-dark btn-block mb-3"><i class="icofont-plus"></i> Buat Diskusi Baru</a>

                    <div class="text-lg my-3 d-none d-lg-block">
                        Pilih Berdasarkan Modul
                    </div>

                    <div class="faq pt-2 mb-0 pb-0 d-none d-lg-block">
                        <ul class="faq-list">

                            @foreach($silabus_academies as $silabus)
                            <li data-aos="fade-up">
                                <a data-toggle="collapse" class="text-dark" href="#faq{{$silabus->id}}" title="{{$silabus->judul_silabus}}">{!! substr(strip_tags($silabus->judul_silabus), 0, 30) !!} <i class="icofont-simple-down"></i></a>
                                <div id="faq{{$silabus->id}}" class="collapse" data-parent=".faq-list">
                                    @foreach($silabus->materi_silabuses as $matery)
                                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$matery->id}}" class="text-sm my-2">{{$matery->judul_materi}}
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="text-lg my-3 d-none d-lg-block">
                        Keyword Populer
                    </div>

                    <div class="d-none d-lg-block">
                        <a href=""><span class="btn btn-light badge">#laravel</span></a>
                        <a href=""><span class="btn btn-light badge">#php</span></a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    <!-- Seach Form  -->
                    <div class="search justify-content-center mb-3">
                        <form action="" method="post">
                            <input type="text" name="search" placeholder="Cari judul diskusi"><input type="submit" value="Telusuri">
                        </form>
                    </div>
                    <!-- End Seach Form  -->

                    <!-- Filter  -->
                    <form action="{{ route('courses.index') }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <small class="text-sm">Filter berdasarkan : </small><br>

                                    <!-- <span class="badge badge-dark">Keyword</span>
                                    <span class="badge badge-dark">Keyword</span> -->

                                    <small class="text-dark">Tampilkan semua</small>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <small class="text-sm">Urutkan berdasarkan : </small>
                                    <select class="form-control form-control-sm" name="orderBy" id="orderBy" onchange="this.form.submit()">
                                        <option value="Terbaru" {{request('orderBy')=='' ? "selected" : "" }}>Terbaru</option>
                                        <option value="Terlama" {{ request('orderBy') =='Terlama' ? "selected" : "" }}>Terlama</option>
                                        <option value="Selesai" {{ request('orderBy') =='Selesai' ? "selected" : "" }}>Selesai terlebih dahulu</option>
                                        <option value="Belum Selesai" {{ request('orderBy') =='Belum Selesai' ? "selected" : "" }}>Belum Selesai terlebih dahulu</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>

                    <a href="" role="button">
                        <div class="card">
                            <div class="post px-3 py-3">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="/member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                    <span class="pl-2">
                                        Cara Mengatasi Error Di Laravel
                                    </span>
                                    <span class="description">Oleh : Jonathan Burke Jr. | 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->

                                <p class="text-dark">
                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                </p>

                                <span class="badge bg-light">#laravel</span>
                                <span class="badge bg-light">#php</span>

                                <p class="my-2">
                                    <a href="#" class="link-black text-sm mr-2">
                                        <i class="icofont-book-alt"></i> Submission
                                    </a>
                                    <a href="#" class="link-black text-sm mr-2">
                                        <i class="icofont-comment mr-1"></i> 5 Pembahasan
                                    </a>
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="" role="button">
                        <div class="card">
                            <div class="post px-3 py-3">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="/member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                    <span class="pl-2">
                                        Cara Mengatasi Error Di Laravel <span class="badge badge-info">Selesai</span>
                                    </span>
                                    <span class="description">Oleh : Jonathan Burke Jr. | 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->

                                <p class="text-dark">
                                    Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                </p>

                                <span class="badge bg-light">#laravel</span>
                                <span class="badge bg-light">#php</span>

                                <p class="my-2">
                                    <a href="#" class="link-black text-sm mr-2">
                                        <i class="icofont-book-alt"></i> Submission
                                    </a>
                                    <a href="#" class="link-black text-sm mr-2">
                                        <i class="icofont-comment mr-1"></i> 5 Pembahasan
                                    </a>
                                </p>
                            </div>
                        </div>
                    </a>



                    <div class="text-center">
                        <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Diskusi Section -->

</main><!-- End #main -->
@endsection