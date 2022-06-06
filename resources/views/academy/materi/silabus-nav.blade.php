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

    <!-- ======= Materi Section ======= -->
    <section id="materi">
        <div class="container">

            <div class="row">

                <!-- Left Nav  -->
                <div class="col-lg-3">
                    <a href="" class="btn btn-dark btn-block d-none d-lg-block"><i class="icofont-comment"></i> Diskusikan Materi</a>
                    <!-- LANJUT DISINI -->
                    <a href="" class="btn btn-outline-dark btn-block d-none d-lg-block"><i class="icofont-warning-alt"></i> Laporkan Materi</a>

                    <div class="text-lg my-3">
                        Daftar Modul
                    </div>

                    <div class="faq pt-2 mb-0 pb-0">
                        <ul class="faq-list">

                            @foreach($silabus_academies as $silabus)
                            <li data-aos="fade-up">
                                <a data-toggle="collapse" class="{{ $silabus->id !=$materi->silabus_academy_id ? 'collapsed' : '' }} text-dark" href="#faq{{$silabus->id}}" title="{{$silabus->judul_silabus}}">{!! substr(strip_tags($silabus->judul_silabus), 0, 30) !!} <i class="icofont-simple-up"></i></a>
                                <div id="faq{{$silabus->id}}" class="collapse {{ $silabus->id ==$materi->silabus_academy_id ? 'show' : '' }}" data-parent=".faq-list">
                                    @foreach($silabus->materi_silabuses as $matery)
                                    <a href="{{ route('modul.index', $academy->id) }}?materi={{$matery->id}}" class="text-sm my-2 {{ request('materi') ==$matery->id ? 'text-primary' : '' }} {{ $matery->status_belajar != null ? '' : 'disabled' }}">{{$matery->judul_materi}}
                                        @if($matery->tipe_pembaca == 'Semua Orang')
                                        <small>(Gratis)</small>
                                        @endif
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    @yield('materi')
                </div>

            </div>
        </div>
    </section><!-- End Materi Section -->

</main><!-- End #main -->
@endsection

@section('scripts')

@yield('page_scripts')

@endsection