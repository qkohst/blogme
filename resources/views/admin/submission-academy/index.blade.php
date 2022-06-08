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
                @if($data_submission->count() == 0)
                <hr class="horizontal dark">
                <div class="text-center mb-2">Belum ada submission kelas</div>
                @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Identitas Peserta</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Submission Kelas</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Detail Submission</th>
                                <th class="text-dark opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_submission as $submission)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/avatar/{{$submission->peserta_academies->users->avatar}}" class="avatar avatar-sm me-3" alt="submission image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase">{{$submission->peserta_academies->users->profil_users->nama_lengkap}}</h6>
                                            <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$submission->updated_at->diffForHumans()}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" title="Lihat intruksi submission">
                                        <h6 class="text-sm mb-0">{{$submission->submission_materis->materi_silabuses->judul_materi}}</h6>
                                        <p class="text-xs text-secondary mb-0">Kelas : {{$submission->submission_materis->materi_silabuses->silabus_academies->academies->nama_kelas}}</p>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{$submission->link_jawaban}}" target="_black" title="Lihat submission">
                                        <h6 class="text-sm mb-0">{{$submission->link_jawaban}}</h6>
                                        <p class="text-xs text-secondary mb-0">
                                            {!! substr(strip_tags($submission->deskripsi), 0, 40) !!}...
                                        </p>
                                    </a>
                                </td>
                                <td class="align-middle ms-auto text-center">
                                    <a class="btn btn-link text-primary px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalVerifikasi{{$submission->id}}"><i class="icofont-verification-check text-primary me-2"></i>Verifikasi</a>
                                </td>
                            </tr>

                            <!-- Modal Verifikasi -->
                            <div class="modal fade" id="modalVerifikasi{{$submission->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi {{$title}}</h5>
                                        </div>
                                        <form id="formVerifikasi{{$submission->id}}" action="{{ route('submission.update', $submission->id) }}" method="post">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="/avatar/{{$submission->peserta_academies->users->avatar}}" class="avatar avatar-sm me-3" alt="submission image">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm text-uppercase">{{$submission->peserta_academies->users->profil_users->nama_lengkap}}</h6>
                                                                <p class="text-xs text-secondary mb-0"><i class="icofont-clock-time me-1"></i>{{$submission->updated_at->diffForHumans()}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p class="text-xs text-secondary mb-0">Link Submission</p>
                                                        <h6 class="mb-0 text-sm"><a href="{{$submission->link_jawaban}}" target="_black">{{$submission->link_jawaban}}</a></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p class="text-xs text-secondary mb-1 mt-4">Deskripsi</p>
                                                    <p class="text-sm mb-0">{{!empty($submission->deskripsi) ? $submission->deskripsi:''}}</p>
                                                </div>
                                                <hr class="horizontal dark">
                                                <div class="row">
                                                    <div class="col-lg-6 form-group">
                                                        <label for="example-text-input" class="form-control-label">Status Verifikasi</label> <br>
                                                        <select class="form-select" aria-label="Default select example" name="status" onchange="enableForm(this);">
                                                            <option value="" selected>-- Pilih Status --</option>
                                                            <option value="approved">Setujui</option>
                                                            <option value="rejected">Tolak</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 form-group">
                                                        <label for="example-text-input" class="form-control-label">Nilai</label> <span class="text-xs text-secondary">(0 s/d 100)</span> <br>

                                                        <input type="number" class="form-control" id="nilaiDisable" placeholder="0" disabled>
                                                        <input type="number" class="form-control" name="nilai" id="nilaiEnable" style="display: none;">
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="example-text-input" class="form-control-label">Catatan</label>
                                                        <textarea class="form-control" name="catatan" rows="4">{{old('catatan')}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="#" class="btn btn-primary btn-save" data-id="{{$submission->id}}">Simpan</a>
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

            $('.btn-save').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Simpan status verifkasi !",
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
            document.getElementById("nilaiEnable").style.display = "block";
            document.getElementById("nilaiDisable").style.display = "none";
        } else {
            document.getElementById("nilaiEnable").style.display = "none";
            document.getElementById("nilaiDisable").style.display = "block";
        }
    }
</script>
@endsection