@extends('layouts.member.master')

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.css">
@endsection

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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.kategori', $kategory->id) }}">{{$kategory->nama_kategori}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item active">
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
                <span>Semua Kelas</span>
                <h2>Semua Kelas</h2>
                <p>Tersedia dari level dasar hingga profesional sesuai kebutuhan industri terkini.</p>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <form>
                        <div class="form-group">
                            <label for="level" class="text-sm">Level Kelas</label>
                            <select class="form-control select2" name="level[]" multiple="multiple" data-placeholder="Semua Level" style="width: 100%;">
                                <option value="Dasar" {{ in_array('Dasar', old('level', [])) ? 'selected' : '' }}>Dasar</option>
                                <option value="Pemula" {{ in_array('Pemula', old('level', [])) ? 'selected' : '' }}>Pemula</option>
                                <option value="Menengah" {{ in_array('Menengah', old('level', [])) ? 'selected' : '' }}>Menengah</option>
                                <option value="Mahir" {{ in_array('Mahir', old('level', [])) ? 'selected' : '' }}>Mahir</option>
                                <option value="Profesional" {{ in_array('Profesional', old('level', [])) ? 'selected' : '' }}>Profesional</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="form-group">
                            <label for="teknologi" class="text-sm">Teknologi</label>
                            <select class="form-control select2" name="teknologi[]" multiple="multiple" data-placeholder="Semua Teknologi" style="width: 100%;">
                                @foreach($technologies as $technology)
                                <option value="{{$technology->id}}" {{ in_array($technology->id, old('teknologi', [])) ? 'selected' : '' }}>{{$technology->nama_teknologi}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form>
                        <div class="form-group">
                            <label for="jenis_kelas" class="text-sm">Jenis Kelas</label>
                            <select class="form-control" name="jenis_kelas" id="jenis_kelas">
                                <option value="">Semua Kelas</option>
                                <option value="Gratis">Kelas Gratis</option>
                                <option value="Berbayar">Kelas Berbayar</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
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

            </div>


        </div>
    </section>
    <!-- End Academy Section -->

</main><!-- End #main -->
@endsection

@section('scripts')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="/admin-assets/plugins/select2/js/select2.full.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
@endsection