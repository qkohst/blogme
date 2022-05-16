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
                    <li class="nav-item {{ $kategory->nama_kategori == $title ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('courses.kategori', $kategory->id) }}">{{$kategory->nama_kategori}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">Semua Kelas</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="search form-control-sm justify-content-center mx-2 mb-3">
            <form action="" method="post">
                <input type="text" name="search" placeholder="Cari semua kelas"><input type="submit" value="Telusuri">
            </form>
        </div>
    </div>

    <!-- ======= Academy Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <span>{{$kategori->nama_kategori}}</span>
                <h2>{{$kategori->nama_kategori}}</h2>
                <p>{{$kategori->deskripsi}}</p>
            </div>

            <div class="row">
                @if($academies->count() == 0)
                <p class="text-secondary">Belum ada kelas pada kategori ini</p>
                @else
                @foreach($academies as $academy)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="{{ route('courses.show', $academy->id) }}">
                        <div class="member">
                            <img src="/admin-assets/img/academies/{{$academy->gambar}}" alt="Img">
                            <h4 class="text-left" title="{{$academy->nama_kelas}}">{!! substr(strip_tags($academy->nama_kelas), 0, 30) !!}</h4>
                            <small class="float-left text-dark mr-2"><i class="icofont-clock-time"></i> {{round($academy->durasi_belajar/60)}} Jam</small>
                            <small class="float-left text-dark mr-2"><i class="icofont-chart-histogram"></i> {{$academy->level}}</small>
                            <small class="float-left text-dark mr-2"><i class="icofont-layers"></i> {{$academy->kategories->nama_kategori}}</small>

                            <p class="text-left pt-4">
                                {!! substr(strip_tags($academy->deskripsi), 0, 150) !!}...
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Academy Section -->

</main><!-- End #main -->
@endsection