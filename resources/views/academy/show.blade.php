@extends('layouts.member.master')
@section('content')

<main id="main">

    <div class="breadcrumbs container bg-white pt-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white mx-2">
            <button class="navbar-toggler text-md" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-lg-none text-md" href="#">Kategori</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav d-flex mt-0 mt-lg-0 text-sm">
                    @foreach($kategories as $kategory)
                    <li class="nav-item {{ $kategory->id == $academy->kategories_id ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('courses.index') }}?kategories={{$kategory->id}}">{{$kategory->nama_kategori}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Semua Kelas</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="/admin-assets/img/academies/{{$academy->gambar}}" class="rounded" alt="Images" height="250">
                </div>
                <div class="col-lg-9 pt-4 pt-lg-0 content">
                    <h3>{{$academy->nama_kelas}}</h3>

                    <p>Teknologi :
                        @foreach($technologies_academies as $technology)
                        <small class="badge badge-secondary my-1">{!!$technology->technologies->icon!!} {{$technology->technologies->nama_teknologi}}</small>
                        @endforeach

                    </p>
                    <ul>
                        <li><i class="icofont-badge"></i> Level : {{$academy->level}}</li>
                        <li><i class="icofont-layers"></i> {{$academy->kategories->nama_kategori}}</li>
                        <li><i class="icofont-clock-time"></i> {{round($durasi_belajar/60)}} Jam Belajar</li>
                    </ul>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto mr-1">Mulai Belajar</a>
                        <a href="#silabus" class="get-started-btn scrollto text-md">Lihat Silabus</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Fasilitas Section ======= -->
    <section id="fasilitas" class="featured-services testimonials ">
        <div class="container">
            <p class="text-uppercase font-weight-bold pt-4">Apa yang akan Anda dapatkan</p>

            <div class="owl-carousel testimonials-carousel">
                @foreach($fasilitas_academies as $fasilitas)
                <div class="testimonial-item mx-2">
                    <div class="icon-box">
                        <div class="icon">
                            {!!$fasilitas->fasilitas->icon!!}
                            <span class="title align-top ml-1">{{$fasilitas->fasilitas->nama_fasilitas}}</span>
                        </div>
                        <p class="description">
                            {{$fasilitas->fasilitas->deskripsi}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Fasilitas Section -->

    <!-- ======= Deskripsi Section ======= -->
    <section id="deskripsi">
        <div class="container">

            <div class="row pt-4">
                <div class="col-lg-8 col-md-12 pr-3">
                    <p class="text-uppercase font-weight-bold">Deskripsi Kelas</p>
                    <p>{!!$academy->deskripsi!!}</p>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="row">

                        <div class="col-12">
                            <p class="text-uppercase font-weight-bold text-sm">Peralatan Belajar</p>
                            <p class="text-sm mb-1">Spesifikasi minimal perangkat:</p>

                            <p class="mb-0 font-weight-bold text-sm">
                                <i class="icofont-micro-chip"></i>
                                Prosesor
                            </p>
                            <p class="text-sm mb-1">{{$academy->minimum_processor}}</p>

                            <p class="mb-0 font-weight-bold text-sm">
                                <i class="icofont-resize"></i>
                                Layar
                            </p>
                            <p class="text-sm mb-1">{{$academy->minimum_layar}}</p>

                            <p class="mb-0 font-weight-bold text-sm">
                                <i class="icofont-brand-microsoft"></i>
                                Sistem Operasi
                            </p>
                            <p class="text-sm mb-1">{{$academy->minimum_sistem_operasi}}</p>

                            <p class="mb-0 font-weight-bold text-sm">
                                <i class="icofont-save"></i>
                                RAM
                            </p>
                            <p class="text-sm">{{$academy->minimum_ram}}</p>

                            <p class="text-sm mb-1">Tools yang dibutuhkan :</p>
                            @foreach($tools_academies as $tool)
                            <p class="mb-1 text-sm">
                                {!!$tool->tools->icon!!}
                                {{$tool->tools->nama_tool}}
                            </p>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Deskripsi Section -->

    <!-- ======= Silabus Section ======= -->
    <section id="silabus" class="faq section-bg">
        <div class="container">

            <div class="section-title">
                <span>Silabus</span>
                <h2>Silabus</h2>
                <p>Materi yang akan Anda pelajari pada kelas ini.</p>
            </div>

            <div class="row">
                @if($silabus_academies->count() == 0)
                <p class="text-secondary">Belum ada materi pada kelas ini</p>
                @else
                @foreach($silabus_academies as $silabus)
                <div class="col-12 faq-list">
                    <div class="card" data-aos="fade-up">

                        <div class="card-body mx-3">
                            <a data-toggle="collapse" class="collapsed" href="#faq{{$silabus->id}}">
                                <span class="font-weight-bold">
                                    {{$silabus->judul_silabus}} <i class="icofont-simple-up"></i>
                                </span>
                                <p class="text-dark mb-2">
                                    {{$silabus->deskripsi}}
                                </p>

                                @if ($silabus->count_artikel == 0 && $silabus->count_vidio == 0 && $silabus->count_kuis == 0 && $silabus->count_submission == 0)
                                <span class="text-capitalize badge badge-md bg-gradient-secondary">
                                    Materi belum ditemukan
                                </span>
                                @else
                                <span class="text-capitalize badge badge-md bg-gradient-dark">
                                    @if($silabus->count_artikel != 0)
                                    {{$silabus->count_artikel}} <small class="mr-1">Artikel</small>
                                    @endif

                                    @if($silabus->count_vidio != 0)
                                    {{$silabus->count_vidio}} <small class="mr-1">Vidio Interaktif</small>
                                    @endif

                                    @if($silabus->count_kuis != 0)
                                    {{$silabus->count_kuis}} <small class="mr-1">Kuis</small>
                                    @endif
                                    @if($silabus->count_submission != 0)
                                    {{$silabus->count_submission}} <small class="mr-1">Submission</small>
                                    @endif
                                </span>
                                @endif

                                <small class="ml-2 text-secondary">{{$silabus->waktu_belajar}} menit belajar</small>
                            </a>

                        </div>

                        <div id="faq{{$silabus->id}}" class="card-footer collapse" data-parent=".faq-list">
                            @foreach($silabus->materi_silabuses as $materi)
                            <p class="ml-3 my-2"><a href="#" class="text-md"><i class="icofont-simple-right text-md"></i> {{$materi->judul_materi}}</a></p>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Silabus Section -->

</main><!-- End #main -->
@endsection