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
                <div class="col-lg-3 d-none d-lg-block">
                    <img src="/admin-assets/img/academies/{{$academy->gambar}}" class="rounded" alt="Images" height="250">
                </div>
                <div class="col-lg-9 pt-lg-0 content">
                    <h3>{{$academy->nama_kelas}}</h3>

                    <p>Teknologi :
                        @foreach($academy->technology_academies as $technology)
                        <small class="badge badge-secondary my-1">{!!$technology->technologies->icon!!} {{$technology->technologies->nama_teknologi}}</small>
                        @endforeach

                    </p>
                    <ul>
                        <li><i class="icofont-badge"></i> Level : {{$academy->level}}</li>
                        <li><i class="icofont-layers"></i> {{$academy->kategories->nama_kategori}}</li>
                        <li><i class="icofont-clock-time"></i> {{round($academy->silabus_academies->sum('waktu_belajar')/60)}} Jam Belajar</li>
                    </ul>
                    <div class="d-flex">
                        <!-- Perbaiiki Ini -->
                        @if(is_null($check_peserta))
                        <a href="{{ route('register.academy', $academy->id) }}" class="btn-get-started scrollto mr-1 px-3">Belajar Sekarang</a>
                        @else
                        @if(is_null($riwayat_belajar_terakhir))
                        <a href="#silabus" class="btn-get-started scrollto mr-1 px-3">Mulai Sekarang</a>
                        @else
                        <a href="{{ route('modul.index', $academy->id) }}?materi={{$riwayat_belajar_terakhir->materi_silabus_id}}" class="btn-get-started scrollto mr-1 px-3">Lanjutkan Belajar</a>
                        @endif
                        @endif

                        <a href="#silabus" class="get-started-btn scrollto text-md px-3">Lihat Silabus</a>
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
                @foreach($academy->fasilitas_academies as $fasilitas)
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
                            @foreach($academy->tools_academies as $tool)
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
                @if($academy->silabus_academies->count() == 0)
                <p class="text-secondary">Belum ada materi pada kelas ini</p>
                @else

                <?php $no_silabus = 0; ?>
                @foreach($academy->silabus_academies as $silabus)
                <?php $no_silabus++; ?>
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

                                @if ($silabus->materi_silabuses->count() == 0)
                                <span class="text-capitalize badge badge-md bg-gradient-secondary">
                                    Materi belum ditemukan
                                </span>
                                @else
                                <span class="text-capitalize badge badge-md bg-gradient-dark">
                                    @if($silabus->materi_silabuses->where('tipe_materi',1)->count() != 0)
                                    {{$silabus->materi_silabuses->where('tipe_materi',1)->count()}} <small class="mr-1">Artikel</small>
                                    @endif

                                    @if($silabus->materi_silabuses->where('tipe_materi',2)->count() != 0)
                                    {{$silabus->materi_silabuses->where('tipe_materi',2)->count()}} <small class="mr-1">Vidio Interaktif</small>
                                    @endif

                                    @if($silabus->materi_silabuses->where('tipe_materi',3)->count() != 0)
                                    {{$silabus->materi_silabuses->where('tipe_materi',3)->count()}} <small class="mr-1">Kuis</small>
                                    @endif
                                    @if($silabus->materi_silabuses->where('tipe_materi',4)->count() != 0)
                                    {{$silabus->materi_silabuses->where('tipe_materi',4)->count()}} <small class="mr-1">Submission</small>
                                    @endif
                                </span>
                                @endif

                                <small class="ml-2 text-secondary">{{$silabus->waktu_belajar}} menit belajar</small>
                            </a>

                        </div>

                        <div id="faq{{$silabus->id}}" class="card-footer collapse" data-parent=".faq-list">
                            <?php $no_materi = 0; ?>
                            @foreach($silabus->materi_silabuses as $materi)
                            <?php $no_materi++; ?>
                            <a href="{{ route('modul.index', $academy->id) }}?materi={{$materi->id}}" class="ml-3 my-2 {{ $no_silabus == 1 && $no_materi == 1 ? '' : 'disabled' }}">
                                <span class="align-middle text-md">
                                    @if($materi->tipe_pembaca != 'Semua Orang')
                                    <i class="icofont-lock text-md"></i>
                                    @endif
                                    {{$materi->judul_materi}}
                                </span>
                            </a>
                            @endforeach
                        </div>

                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Silabus Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">

            <div class="section-title">
                <span>Testimonials</span>
                <h2>Testimonials</h2>
                <p>Pendapat mereka yang telah menyelesaikan kelas ini.</p>
            </div>

            <div class="owl-carousel testimonials-carousel">

                @foreach($academy->testimoni_academies as $testimoni)
                <div class="testimonial-item">
                    <p class="px-4 py-4 mb-4">
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{$testimoni->testimoni}}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/avatar/{{$testimoni->peserta_academies->users->avatar}}" class="testimonial-img" alt="User Image">
                    <h3>{{$testimoni->peserta_academies->users->profil_users->nama_lengkap}}</h3>
                    <h4>{{$testimoni->peserta_academies->users->profil_users->headline}}</h4>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection