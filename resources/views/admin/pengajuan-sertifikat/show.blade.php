@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('pengajuan-sertifikat.index') }}">{{$title2}}</a></li>
        <li class=" breadcrumb-item text-sm text-white active" aria-current="page">{{$title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Header  -->
        <div class="card shadow-lg card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="/avatar/{{$pengajuan_sertifikat->peserta_academies->users->avatar}}" alt="user img" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$pengajuan_sertifikat->peserta_academies->users->profil_users->nama_lengkap}}
                            </h5>

                            <p class="mb-0 font-weight-bold text-sm">
                                {{$pengajuan_sertifikat->peserta_academies->academies->nama_kelas}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header  -->

        <!-- Riwayat Belajar -->
        <div class="col-md-12 pt-4">
            @foreach($data_silabus_kelas as $silabus)

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-0">{{$silabus->judul_silabus}}</h6>
                            <p class="text-sm mb-1">{{$silabus->deskripsi}}</p>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-0">
                    <hr class="horizontal dark">

                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Materi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Durasi Belajar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nilai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($silabus->materi_silabuses as $materi)
                                <tr>
                                    <td>
                                        <p class="text-sm px-3 mb-0">{{$materi->judul_materi}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0 text-center">
                                            {{gmdate('H:i:s', $materi->lama_belajar)}}
                                        </p>
                                    </td>

                                    @if($materi->tipe_materi == 1 || $materi->tipe_materi == 2)
                                    <td>
                                        <p class="text-xs mb-0 text-center">
                                            -
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">
                                            -
                                        </p>
                                    </td>
                                    @elseif($materi->tipe_materi == 3)
                                    <td>
                                        <p class="text-xs mb-0 text-center">
                                            {{$materi->nilai_kuis}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">
                                            -
                                        </p>
                                    </td>
                                    @elseif($materi->tipe_materi == 4)
                                    <td>
                                        <p class="text-xs mb-0 text-center">
                                            {{$materi->nilai_submission->poin}}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-xs mb-0">
                                            {{$materi->nilai_submission->catatan_verifikasi}}
                                        </p>
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Riwayat Belajar -->

    </div>
</div>

@endsection