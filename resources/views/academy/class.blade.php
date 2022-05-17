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
                    <li class="nav-item {{ $kategory->id == request('kategories') ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('courses.index') }}?kategories={{$kategory->id}}">{{$kategory->nama_kategori}}</a>
                    </li>
                    @endforeach
                    <li class="nav-item {{ request('kategories') == null ? "active" : "" }}">
                        <a class="nav-link" href="{{ route('courses.index') }}">Semua Kelas</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="search form-control-sm justify-content-center mx-2 mb-3">
            <form action="{{ route('courses.index') }}">
                @if(request('kategories'))
                <input type="hidden" name="kategories" value="{{request('kategories')}}">
                @endif
                @if(request('jenis_kelas'))
                <input type="hidden" name="jenis_kelas" value="{{request('jenis_kelas')}}">
                @endif
                <input type="text" name="search" placeholder="Cari kelas" value="{{request('search')}}" onfocus="this.value=''"><input type="submit" value="Telusuri">
            </form>
        </div>
    </div>

    <!-- ======= Academy Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            @if($kategori == null)
            <div class="section-title">
                <span>Semua Kelas</span>
                <h2>Semua Kelas</h2>
                <p>Tersedia dari level dasar hingga profesional sesuai kebutuhan industri terkini.</p>
            </div>
            @else
            <div class="section-title">
                <span>{{$kategori->nama_kategori}}</span>
                <h2>{{$kategori->nama_kategori}}</h2>
                <p>{{$kategori->deskripsi}}</p>
            </div>
            @endif

            <form action="{{ route('courses.index') }}">
                <div class="row">

                    @if(request('kategories'))
                    <input type="hidden" name="kategories" value="{{request('kategories')}}">
                    @endif
                    @if(request('search'))
                    <input type="hidden" name="search" value="{{request('search')}}">
                    @endif

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="level" class="text-sm">Level Kelas</label>
                            <select class="form-control select2" name="level[]" multiple="multiple" data-placeholder="Semua Level" style="width: 100%;" onchange="this.form.submit()">
                                <option value="Dasar" {{ in_array('Dasar', request('level', [])) ? 'selected' : '' }}>Dasar</option>
                                <option value="Pemula" {{ in_array('Pemula', request('level', [])) ? 'selected' : '' }}>Pemula</option>
                                <option value="Menengah" {{ in_array('Menengah', request('level', [])) ? 'selected' : '' }}>Menengah</option>
                                <option value="Mahir" {{ in_array('Mahir', request('level', [])) ? 'selected' : '' }}>Mahir</option>
                                <option value="Profesional" {{ in_array('Profesional', request('level', [])) ? 'selected' : '' }}>Profesional</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="jenis_kelas" class="text-sm">Jenis Kelas</label>
                            <select class="form-control" name="jenis_kelas" id="jenis_kelas" onchange="this.form.submit()">
                                <option value="Semua Jenis" request('jenis_kelas')=='' ? "selected" : "" }}>Semua Jenis</option>
                                <option value="Gratis" {{ request('jenis_kelas') =='Gratis' ? "selected" : "" }}>Kelas Gratis</option>
                                <option value="Berbayar" {{ request('jenis_kelas') =='Berbayar' ? "selected" : "" }}>Kelas Berbayar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                @if($academies->count()==0)
                <div class="col-12 text-center pt-3">
                    <p class="font-weight-bold text-secondary">
                        Kelas tidak ditemukan
                    </p>
                </div>
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

                <div class="col-12 d-flex justify-content-center">
                    {{$academies->links()}}
                </div>

                @endif
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