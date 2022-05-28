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

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <img src="/admin-assets/img/academies/{{$academy->gambar}}" class="rounded" alt="Images" height="225">
                </div>
                <div class="col-lg-9 pt-lg-0 content">
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
                        <li><i class="icofont-pay"></i> Biaya :
                            @if($academy->jenis_kelas == 'Gratis')
                            <b>Gratis</b>
                            @else
                            Rp.{{$academy->biaya}}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="text-center">
                <h3>{{$title}}</h3>
                <p>Daftar sebagai anggota, untuk mendapatkan akses penuh seluruh materi yang ada pada kelas ini.</p>
                <form id="form-register" action="{{ route('store_register.academy', $academy->id) }}" method="post">
                    @csrf
                    <a class="cta-btn btn-register" href="#">Daftar Sekarang</a>
                </form>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Fasilitas Section ======= -->
    <section id="fasilitas" class="featured-services testimonials">
        <div class="container mb-4">
            <p class="text-uppercase font-weight-bold pt-4">Apa yang akan Anda dapatkan</p>

            <div class="owl-carousel testimonials-carousel ">
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

</main><!-- End #main -->
@endsection


@section('scripts')

<script>
    $('.btn-register').click(function(e) {
        $(`#form-register`).submit();
    });
</script>
@endsection