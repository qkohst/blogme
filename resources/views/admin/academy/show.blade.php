@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.index') }}">{{$title2}}</a></li>
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
                            <img src="/admin-assets/img/academies/{{$academy->gambar}}" alt="academy img" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$academy->nama_kelas}}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                @if($academy->level == 'Dasar')
                                <span class="badge badge-sm bg-gradient-light text-dark">{{$academy->level}}</span>
                                @elseif($academy->level == 'Pemula')
                                <span class="badge badge-sm bg-gradient-dark">{{$academy->level}}</span>
                                @elseif($academy->level == 'Menengah')
                                <span class="badge badge-sm bg-gradient-warning">{{$academy->level}}</span>
                                @elseif($academy->level == 'Mahir')
                                <span class="badge badge-sm bg-gradient-success">{{$academy->level}}</span>
                                @else
                                <span class="badge badge-sm bg-gradient-primary">{{$academy->level}}</span>
                                @endif

                                {{$academy->kategories->nama_kategori}}
                                | <i class="icofont-ui-clock"></i> {{$academy->durasi_belajar}} jam belajar
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#detail" role="tab" aria-selected="true">
                                        <i class="icofont-file-text"></i>
                                        <span class="ms-2">Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#siswa" role="tab" aria-selected="false">
                                        <i class="icofont-group-students"></i>
                                        <span class="ms-2">Siswa</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="#silabus" role="tab" aria-selected="false">
                                        <i class="icofont-learn"></i>
                                        <span class="ms-2">Silabus</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Menu  -->

        <!-- Tab Content  -->
        <div class="col-md-12 pt-4">
            <div class="tab-content">
                <!-- Tab Detail  -->
                <div class="active tab-pane" id="detail">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Detail Kelas</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" href="{{ route('academy.edit', $academy->id) }}"><i class="fas fa-pencil-alt me-2"></i>Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-2">
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-8 mr-2">
                                    <p class="text-uppercase font-weight-bold text-sm">Deskripsi</p>
                                    <p>{!!$academy->deskripsi!!}</p>
                                </div>
                                <div class="col-md-4 ml-2">
                                    <div class="row">

                                        <div class="col-12">
                                            <p class="text-uppercase font-weight-bold text-sm">Peralatan Belajar</p>
                                            <p class="text-sm mb-1">Spesifikasi minimal perangkat:</p>

                                            <p class="mb-0 font-weight-bold text-sm">
                                                <i class="icofont-micro-chip"></i>
                                                Prosesor
                                            </p>
                                            <p class="text-sm mb-1">{{$academy->minimum_processor}}</p>

                                            <p class="mb-0 font-weight-bold text-sm">
                                                <i class="icofont-resize"></i>
                                                Layar
                                            </p>
                                            <p class="text-sm mb-1">{{$academy->minimum_layar}}</p>

                                            <p class="mb-0 font-weight-bold text-sm">
                                                <i class="icofont-brand-microsoft"></i>
                                                Sistem Operasi
                                            </p>
                                            <p class="text-sm mb-1">{{$academy->minimum_sistem_operasi}}</p>

                                            <p class="mb-0 font-weight-bold text-sm">
                                                <i class="icofont-save"></i>
                                                RAM
                                            </p>
                                            <p class="text-sm">{{$academy->minimum_ram}}</p>

                                            <p class="text-sm mb-1">Tools yang dibutuhkan :</p>
                                            @foreach($tools_academies as $tool)
                                            <p class="mb-1 text-sm">
                                                {!!$tool->tools->icon!!}
                                                {{$tool->tools->nama_tool}}
                                            </p>
                                            @endforeach
                                        </div>

                                        <hr class="horizontal dark mt-3">
                                        <div class="col-12">
                                            <p class="text-uppercase font-weight-bold text-sm">Teknologi</p>
                                            <p class="text-sm mb-1">Teknologi yang digunakan :</p>
                                            @foreach($technologies_academies as $teknologi)
                                            <p class="mb-1 text-sm">
                                                {!!$teknologi->technologies->icon!!}
                                                {{$teknologi->technologies->nama_teknologi}}
                                            </p>
                                            @endforeach
                                        </div>

                                        <hr class="horizontal dark mt-3">
                                        <div class="col-12">
                                            <p class="text-uppercase font-weight-bold text-sm">Fasilitas Kelas</p>
                                            <p class="text-sm mb-1">Yang akan didapatkan peserta ketika mengikuti kelas :</p>
                                            @foreach($fasilitas_academies as $fasilitas)
                                            <p class="mb-1 text-sm">
                                                {!!$fasilitas->fasilitas->icon!!}
                                                {{$fasilitas->fasilitas->nama_fasilitas}}
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Siswa  -->
                <div class="tab-pane" id="siswa">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h6 class="mb-0">Data Siswa</h6>
                                    <p class="text-sm mb-1">Data siswa terdaftar dalam kelas</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Progres Pengerjaan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center px-2">
                                                    <div>
                                                        <img src="/admin-assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Spotify</h6>
                                                        <p class="text-xs mb-0">kukohsantoso013@gmail.com</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">60%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Silabus  -->
                <div class="tab-pane" id="silabus">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h6 class="mb-0">Silabus</h6>
                                    <p class="text-sm mb-1">Data silabus pembelajaran</p>
                                </div>
                                <div class="col-6 text-end">
                                    <a class="btn bg-gradient-primary mb-0" href="{{ route('academy.silabus.create', $academy->id) }}"><i class="fas fa-plus me-2"></i>Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Silabus</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Waktu Belajar</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Materi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>
                                                <p class="text-sm px-3 font-weight-bold">Persiapan Belajar</p>
                                            </td>

                                            <td>
                                                <p class="text-xs">
                                                    <i class="icofont-clock-time"></i> 269 menit
                                                </p>
                                            </td>
                                            <td>
                                                <span class="text-capitalize badge badge-sm bg-gradient-info">
                                                    <i class="icofont-ui-file"></i> 6 Artikel | <i class="icofont-checked"></i> 1 Ujian | <i class="icofont-file-avi-mp4"></i> 1 Vidio Interaktif
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                </a>
                                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                                            <i class="icofont-eye-alt mx-2"></i> Lihat Materi
                                                        </a>
                                                        <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                                            <i class="icofont-plus mx-2"></i> Tambah Materi
                                                        </a>
                                                        <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                                            <i class="icofont-ui-edit mx-2"></i> Edit Silabus
                                                        </a>
                                                        <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                                            <i class="icofont-ui-delete mx-2"></i> Hapus Silabus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Tools  -->
            </div>
        </div>
        <!-- End Tab Content  -->

    </div>
</div>

@endsection

@section('scripts')
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script>
    //== Class definition
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-delete').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Hapus data secara permanen !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn bg-gradient-primary'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-outline-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $(`#delete${id}`).submit();
                    } else {
                        swal.close();
                    }
                });
            });
        };
        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    }();
    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
@endsection