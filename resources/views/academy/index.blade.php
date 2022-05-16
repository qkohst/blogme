@extends('layouts.member.master')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Belajar kursus IT lebih murah di Qkoh St</h1>
                <h2>Solusimu untuk bisa mahir di bidang IT. Ratusan hingga ribuan kursus pilihan yang menarik dengan berbagai tingkatan berbeda.</h2>
                <div class="d-flex">
                    <a href="{{ route('courses.index') }}" class="btn-get-started scrollto">Belajar Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="member-assets/img/about.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Academy Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title">
                <span>Pilihan Kursus</span>
                <h2>Pilihan Kursus</h2>
                <p>Kami memiliki 50+ partner dan 500+ kursus yang menunggumu untuk dipelajari.</p>
            </div>

            <div class="row">
                @foreach($kategories as $kategory)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-3">
                    <a href="{{ route('courses.kategori', $kategory->id) }}">
                        <div class="icon-box py-5">
                            <div class="icon"><img src="admin-assets/img/kategory/{{$kategory->gambar}}" class="img-fluid" alt="academy-img"></div>
                            <h4>{{$kategory->nama_kategori}}</h4>
                            <p class="text-secondary">{{$kategory->deskripsi}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Academy Section -->

</main><!-- End #main -->
@endsection