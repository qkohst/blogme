@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('dashboard') }}">Dashboard</a></li>
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
            <div class="card-body px-0 pt-0 pb-2">
                @if($data_laporan_materi->count() == 0)
                <hr class="horizontal dark">
                <div class="text-center mb-2">Belum ada data laporan</div>
                @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Pelapor</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Materi</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tipe Laporan</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-dark opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_laporan_materi as $laporan)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/avatar/{{$laporan->users->avatar}}" class="avatar avatar-sm me-3" alt="User image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase">{{$laporan->users->profil_users->nama_lengkap}}</h6>
                                            <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$laporan->created_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="text-sm mb-0">{{$laporan->materi_silabuses->judul_materi}}</h6>
                                    <p class="text-xs text-secondary mb-0">{{$laporan->materi_silabuses->silabus_academies->academies->nama_kelas}}</p>
                                </td>
                                <td class="align-middle">
                                    @if($laporan->tipe == '1')
                                    <span class="text-secondary text-xs font-weight-bold">Teknis</span>
                                    @else
                                    <span class="text-secondary text-xs font-weight-bold">Perbaikan Konten</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if($laporan->status == '1')
                                    <span class="badge badge-sm bg-gradient-info">Telah Dibaca</span>
                                    @else
                                    <span class="badge badge-sm bg-gradient-secondary">Belum Dibaca</span>
                                    @endif
                                </td>
                                <td class="align-middle ms-auto text-center">
                                    <a class="btn btn-link text-primary px-2 mb-0" href="{{ route('laporan-materi.show',$laporan->id) }}" target="_black"><i class="icofont-eye-alt text-primary me-2"></i>Detail</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection