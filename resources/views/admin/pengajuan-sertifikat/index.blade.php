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
                @if($data_pengajuan_sertifikat->count() == 0)
                <hr class="horizontal dark">
                <div class="text-center mb-2">Belum ada pengajuan sertifikat kelas</div>
                @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Identitas Peserta</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                                <th class="text-dark opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_pengajuan_sertifikat as $pengajuan_sertifikat)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/avatar/{{$pengajuan_sertifikat->peserta_academies->users->avatar}}" class="avatar avatar-sm me-3" alt="user image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase">{{$pengajuan_sertifikat->peserta_academies->users->profil_users->nama_lengkap}}</h6>
                                            <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$pengajuan_sertifikat->updated_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" title="Lihat intruksi pengajuan_sertifikat">
                                        <h6 class="text-sm mb-0">{{$pengajuan_sertifikat->peserta_academies->academies->nama_kelas}}</h6>
                                        <p class="text-xs text-secondary mb-0">
                                            {{$pengajuan_sertifikat->peserta_academies->academies->level}}
                                            {{$pengajuan_sertifikat->peserta_academies->academies->kategories->nama_kategori}}

                                        </p>
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a href="javascript:;" class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icofont-options"></i>
                                    </a>
                                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="{{ route('pengajuan-sertifikat.show', $pengajuan_sertifikat->id) }}" target="_black">
                                                <i class="icofont-eye-alt mx-2"></i> Riwayat Belajar
                                            </a>
                                            <button type="button" class="dropdown-item border-radius-md" data-bs-toggle="modal" data-bs-target="#modalVerifikasi{{$pengajuan_sertifikat->id}}">
                                                <i class="icofont-verification-check mx-2"></i> Verifikasi
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <!-- Modal Verifikasi -->
                            <div class="modal fade" id="modalVerifikasi{{$pengajuan_sertifikat->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi {{$title}}</h5>
                                        </div>
                                        <form id="formVerifikasi{{$pengajuan_sertifikat->id}}" action="{{ route('pengajuan-sertifikat.update', $pengajuan_sertifikat->id) }}" method="post" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="/avatar/{{$pengajuan_sertifikat->peserta_academies->users->avatar}}" class="avatar avatar-sm me-3" alt="pengajuan_sertifikat image">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm text-uppercase">{{$pengajuan_sertifikat->peserta_academies->users->profil_users->nama_lengkap}}</h6>
                                                                <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$pengajuan_sertifikat->updated_at->diffForHumans()}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="mb-0 text-sm">{{$pengajuan_sertifikat->peserta_academies->academies->nama_kelas}}</h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{$pengajuan_sertifikat->peserta_academies->academies->level}}
                                                            {{$pengajuan_sertifikat->peserta_academies->academies->kategories->nama_kategori}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="horizontal dark">
                                                <div class="row">
                                                    <div class="col-lg-6 form-group">
                                                        <label for="example-text-input" class="form-control-label">Status Verifikasi</label> <br>
                                                        <select class="form-select" aria-label="Default select example" name="status" onchange="enableForm(this);">
                                                            <option value="" selected>-- Pilih Status Verifikasi --</option>
                                                            <option value="approved">Lulus</option>
                                                            <option value="rejected">Tidak Lulus</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="form-control-label">File Sertifikat <small class="text-warning"><i>* .pdf</i></small></label>
                                                            <input class="form-control" id="sertifikatDisable" type="file" disabled>
                                                            <input class="form-control" id="sertifikatEnable" type="file" name="file_sertifikat" accept="application/pdf" style="display: none;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="example-text-input" class="form-control-label">Catatan</label>
                                                        <textarea class="form-control" name="catatan_verifikasi" rows="4"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="#" class="btn btn-primary btn-save" data-id="{{$pengajuan_sertifikat->id}}">Simpan</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

@section('scripts')
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script>
    //== Class definition
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-save').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Verifikasi pengajuan sertifikat kelas !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Simpan',
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
                        $(`#formVerifikasi${id}`).submit();
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

    function enableForm(that) {
        if (that.value == "approved") {
            document.getElementById("sertifikatEnable").style.display = "block";
            document.getElementById("sertifikatDisable").style.display = "none";
        } else {
            document.getElementById("sertifikatEnable").style.display = "none";
            document.getElementById("sertifikatDisable").style.display = "block";
        }
    }
</script>
@endsection