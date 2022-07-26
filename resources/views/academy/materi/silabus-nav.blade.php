@extends('layouts.member.master')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
@endsection

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
                    @if(!is_null($peserta) && $peserta->status == 'finish')
                    <div class="card bg-gradient-info">
                        <div class="card-body">
                            <p class="my-0 text-center">Anda telah menyelesaikan kelas ini.</p>
                        </div>
                    </div>
                    <a href="{{ route('sertifikat.show', $peserta->id) }}" target="_black" class="btn btn-outline-secondary bg-light btn-block d-none d-lg-block"><i class="icofont-license"></i> Lihat Sertifikat</a>
                    @else
                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$materi->id}}" target="_black" class="btn btn-outline-secondary bg-light btn-block d-none d-lg-block"><i class="icofont-comment"></i> Diskusikan Materi</a>

                    <a href="#" class="btn btn-outline-secondary bg-light btn-block d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#modalLapor"><i class="icofont-warning-alt"></i> Laporkan Materi</a>

                    <!-- Modal Lapor -->
                    <div class="modal fade" id="modalLapor" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    Laporkan Materi
                                </div>
                                <form action="{{ route('lapor.materi') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="materi_silabus_id" value="{{$materi->id}}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tipe">Tipe</label> <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineFormCheck1" name="tipe" value="1" required>
                                                <label class="form-check-label" for="inlineFormCheck1">
                                                    Masalah Teknis
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineFormCheck2" name="tipe" value="2">
                                                <label class="form-check-label" for="inlineFormCheck2">
                                                    Perbaikan Konten
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control summernote" name="deskripsi" id="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-dark">Kirim Laporan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <a href="" class="btn btn-outline-secondary bg-light btn-block d-none d-lg-block mt-2"><i class="icofont-circled-left"></i> Koridor Kelas</a>

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

<script src="/admin-assets/js/core/bootstrap.min.js"></script>

<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>

@yield('page_scripts')

@endsection