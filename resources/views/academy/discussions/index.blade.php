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

    <!-- ======= Diskusi Section ======= -->
    <section id="diskusi">
        <div class="container">

            <div class="row">

                <!-- Left Nav  -->
                <div class="col-lg-3">
                    <div class="text-lg">
                        Diskusi Kelas
                    </div>
                    <p class="my-3 text-secondary text-sm">Fitur diskusi ini bertujuan untuk mempermudah siswa dalam memahami materi akademi. <br> Kamu dapat bertanya dan menjawab hal teknis terkait materi Kelas ini.</p>

                    <a href="{{ route('discussions.create', $academy->id) }}" class="btn btn-dark btn-block mb-3"><i class="icofont-plus"></i> Buat Diskusi Baru</a>

                    <div class="text-lg my-3 d-none d-lg-block">
                        Pilih Berdasarkan Modul
                    </div>

                    <div class="faq pt-2 mb-0 pb-0 d-none d-lg-block">
                        <ul class="faq-list">

                            @foreach($silabus_academies as $silabus)
                            <li data-aos="fade-up">
                                <a data-toggle="collapse" class="text-dark" href="#faq{{$silabus->id}}" title="{{$silabus->judul_silabus}}">{!! substr(strip_tags($silabus->judul_silabus), 0, 30) !!} <i class="icofont-simple-down"></i></a>
                                <div id="faq{{$silabus->id}}" class="collapse" data-parent=".faq-list">
                                    @foreach($silabus->materi_silabuses as $matery)
                                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$matery->id}}" class="text-sm my-2">{{$matery->judul_materi}}
                                    </a>
                                    @endforeach
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="text-lg mt-3 d-none d-lg-block">
                        Keyword Terpopuler
                    </div>
                    <p class="d-none d-lg-block text-sm">Pada semua kelas</p>

                    <div class="d-none d-lg-block">
                        <form action="{{ route('discussions.index', $academy->id)}}" method="get">
                            @if(request('materi'))
                            <input type="hidden" name="materi" value="{{request('materi')}}">
                            @endif
                            @if(request('search'))
                            <input type="hidden" name="search" value="{{request('search')}}">
                            @endif

                            @foreach($keywords_populer as $keyword)
                            <button name="keyword" value="{{$keyword->key}}" type="submit" class="btn btn-light badge">#{{$keyword->key}}</button>
                            @endforeach
                        </form>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12">
                    <!-- Seach Form  -->
                    <div class="search justify-content-center mb-3">
                        <form action="{{ route('discussions.index', $academy->id)}}" method="get">
                            @if(request('materi'))
                            <input type="hidden" name="materi" value="{{request('materi')}}">
                            @endif
                            @if(request('keyword'))
                            <input type="hidden" name="keyword" value="{{request('keyword')}}">
                            @endif

                            <input type="text" name="search" value="{{request('search')}}" placeholder="Cari judul diskusi"><input type="submit" value="Telusuri">
                        </form>
                    </div>
                    <!-- End Seach Form  -->
                    <!-- Filter  -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <small class="text-sm">Filter berdasarkan : </small><br>

                                @if(request('materi') != null || request('search') != null || request('keyword') != null )

                                @if(request('materi'))
                                <span class="badge badge-dark">materi</span>
                                @endif
                                @if(request('search'))
                                <span class="badge badge-dark">judul</span>
                                @endif
                                @if(request('keyword'))
                                <span class="badge badge-dark">keyword</span>
                                @endif

                                @else
                                <small class="text-dark">Semua diskusi di kelas ini</small>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('discussions.index', $academy->id)}}" method="get">
                                @if(request('materi'))
                                <input type="hidden" name="materi" value="{{request('materi')}}">
                                @endif
                                @if(request('search'))
                                <input type="hidden" name="search" value="{{request('search')}}">
                                @endif
                                @if(request('keyword'))
                                <input type="hidden" name="keyword" value="{{request('keyword')}}">
                                @endif

                                <div class="form-group">
                                    <small class="text-sm">Urutkan berdasarkan : </small>
                                    <select class="form-control form-control-sm" name="orderBy" id="orderBy" onchange="this.form.submit()">
                                        <option value="Terbaru" {{request('orderBy')=='' ? "selected" : "" }}>Terbaru</option>
                                        <option value="Terlama" {{ request('orderBy') =='Terlama' ? "selected" : "" }}>Terlama</option>
                                        <option value="Selesai" {{ request('orderBy') =='Selesai' ? "selected" : "" }}>Selesai terlebih dahulu</option>
                                        <option value="Belum Selesai" {{ request('orderBy') =='Belum Selesai' ? "selected" : "" }}>Belum Selesai terlebih dahulu</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <small class="text-sm">Hapus Semua Filter : </small>
                                <a href="{{ route('discussions.index', $academy->id) }}" class="btn btn-sm btn-dark btn-block">Hapus Filter</a>
                            </div>
                        </div>
                    </div>

                    @if($data_diskusi->count() == 0)
                    <div class="alert bg-gradient-info text-center" role="alert">
                        Tidak ada diskusi yang dapat ditampilkan. Ayo <a href="{{ route('discussions.create', $academy->id) }}" class="alert-link">buat diskusi</a> sekarang!
                    </div>
                    @else

                    @foreach($data_diskusi as $diskusi)
                    <a href="" role="button">
                        <div class="card">
                            <div class="post px-3 py-3">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="/avatar/{{$diskusi->users->avatar}}" alt="user image">
                                    <span class="pl-sm-2">
                                        {{$diskusi->pertanyaan}}
                                    </span>
                                    <span class="description">Oleh : {{$diskusi->users->username}} | {{$diskusi->created_at->diffForHumans()}}
                                        @if($diskusi->status == 0)
                                        | <span class="badge badge-info">Selesai</span>
                                        @endif
                                    </span>
                                </div>

                                <p class="text-dark">
                                    @if(strip_tags($diskusi->uraian_pertanyaan) > 150)
                                    {!! substr(strip_tags($diskusi->uraian_pertanyaan), 0, 150) !!} ...
                                    @else
                                    {!! strip_tags($diskusi->uraian_pertanyaan) !!}
                                    @endif
                                </p>

                                <p class="text-dark text-sm mb-0">Keywords:</p>

                                <form action="{{ route('discussions.index', $academy->id)}}" method="get">
                                    @if(request('materi'))
                                    <input type="hidden" name="materi" value="{{request('materi')}}">
                                    @endif
                                    @if(request('search'))
                                    <input type="hidden" name="search" value="{{request('search')}}">
                                    @endif

                                    @foreach($diskusi->kata_kunci_diskusis as $key)
                                    <button name="keyword" value="{{$key->kata_kuncis->key}}" type="submit" class="btn btn-light badge">#{{$key->kata_kuncis->key}}</button>
                                    @endforeach
                                </form>

                                <p class="my-2">
                                    <a href="{{ route('discussions.index', $diskusi->materi_silabuses->silabus_academies->academy_id) }}" class="link-black text-sm mr-2">
                                        <i class="icofont-group-students"></i> {{ substr($diskusi->materi_silabuses->silabus_academies->academies->nama_kelas, 0, 15) }} ...
                                    </a>
                                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$diskusi->materi_silabus_id}}" class="link-black text-sm mr-2">
                                        <i class="icofont-book-alt"></i> {{ substr($diskusi->materi_silabuses->judul_materi, 0, 15) }} ...
                                    </a>
                                    <a href="#" class="link-black text-sm mr-2">
                                        <i class="icofont-comment mr-1"></i> 5 Pembahasan
                                    </a>
                                </p>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <!-- Pagination  -->
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-4">
                            {{$data_diskusi->appends(request()->query())->links()}}
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </section><!-- End Diskusi Section -->

</main><!-- End #main -->
@endsection