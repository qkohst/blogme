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
                    <li><a href="{{ route('courses.show', $sertifikat->peserta_academies->academy_id) }}">{{$title2}}</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Materi Section ======= -->
    <section id="materi">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="card cta bg-gradient-secondary py-4">
                        @if($sertifikat->status == 'waiting')
                        <div class="text-center">
                            <h3>Proses Verifikasi</h3>
                            <p>Pengajuan sertifikat anda sedang dalam proses verifikasi, tim kami akan melakukan verifikasi paling lambat 2 x 24 jam. </p>
                            <a class="cta-btn btn-dark" href="{{ route('courses.show', $sertifikat->peserta_academies->academy_id) }}"><i class="icofont-home"></i> Ke Beranda Kelas</a>
                        </div>
                        @elseif($sertifikat->status == 'rejected')
                        <div class="text-center">
                            <h3>Tidak Lulus</h3>
                            <p>{{$sertifikat->catatan_verifikasi}}</p>
                            <a class="cta-btn btn-dark" href="{{ route('courses.show', $sertifikat->peserta_academies->academy_id) }}"><i class="icofont-home"></i> Ke Beranda Kelas</a>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Materi Section -->

</main><!-- End #main -->
@endsection