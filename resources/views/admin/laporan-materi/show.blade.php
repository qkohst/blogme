@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('laporan-materi.index') }}">{{$title2}}</a></li>
        <li class=" breadcrumb-item text-sm text-white active" aria-current="page">{{$title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-uppercase mb-0">{{$title}}</h6>
                    </div>
                </div>
            </div>

            <hr class="horizontal dark">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div>
                                <img src="/avatar/{{$laporan->users->avatar}}" class="avatar avatar-sm me-3" alt="User image">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm text-uppercase">{{$laporan->users->profil_users->nama_lengkap}}</h6>
                                <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$laporan->updated_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ route('laporan-materi.edit',$laporan->id) }}" target="_black" title="Lihat detail materi">
                            <p class="text-xs text-secondary mb-0">{{$laporan->materi_silabuses->judul_materi}}</p>
                            <h6 class="mb-0 text-sm">{{$laporan->materi_silabuses->silabus_academies->academies->nama_kelas}}</h6>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-xs text-secondary mb-0">Jenis</p>
                        @if($laporan->tipe == '1')
                        <h6 class="mb-0 text-sm">Teknis</h6>
                        @else
                        <h6 class="mb-0 text-sm">Perbaikan Konten</h6>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <p class="text-xs text-secondary mb-1 mt-4">Deskripsi Laporan</p>
                    <p class="text-sm mb-0">{!!$laporan->deskripsi!!}</p>
                </div>
            </div>

            <div class="card-footer pt-0 pb-2">
                <a href="{{ route('laporan-materi.edit',$laporan->id) }}" target="_black" class="btn btn-primary btn-sm ms-auto">Detail Materi</a>
            </div>
        </div>
    </div>
</div>

@endsection