@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.index') }}">{{$title4}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/admin/academy/{{$materi->silabus_academies->academies->id}}">{{$title3}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/admin/academy/{{$materi->silabus_academies->academies->id}}/silabus/{{$materi->silabus_academies->id}}">{{$title2}}</a></li>
        <li class=" breadcrumb-item text-sm text-white active" aria-current="page">{{$title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <!-- Tab Menu  -->
        <div class="card shadow-lg card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="/admin-assets/img/academies/{{$materi->silabus_academies->academies->gambar}}" alt="academy img" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$materi->silabus_academies->academies->nama_kelas}}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{$materi->silabus_academies->judul_silabus}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Menu  -->

        <!-- Tab Content  -->
        <div class="col-md-12 pt-4">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="text-uppercase mb-0">{{$title}}</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-primary mb-0" href="/admin/silabus/{{$materi->silabus_academies->id}}/submission/{{$materi->id}}/edit"><i class="icofont-pencil-alt-2 me-2"></i>Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-bold text-sm">{{$materi->judul_materi}}</p>
                            <p>{!!$materi->submission_materis->isi_materi!!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Content  -->

    </div>
</div>

@endsection