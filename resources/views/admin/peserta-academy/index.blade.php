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
                @if($peserta_academy->count() == 0)
                <hr class="horizontal dark">
                <div class="text-center mb-2">Belum ada pendaftaran peserta kelas</div>
                @else
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Identitas Peserta</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pengajuan</th>
                                <th class="text-dark opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peserta_academy as $peserta)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="/avatar/{{$peserta->users->avatar}}" class="avatar avatar-sm me-3" alt="peserta image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-uppercase">{{$peserta->users->profil_users->nama_lengkap}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$peserta->users->email}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="text-sm mb-0">{{$peserta->academies->nama_kelas}}</h6>
                                    <p class="text-xs text-secondary mb-0">Biaya : Rp.{{$peserta->academies->biaya}}</p>
                                </td>
                                <td class="align-middle">
                                    <span class="text-secondary text-xs font-weight-bold">{{$peserta->updated_at}}</span>
                                </td>
                                <td class="align-middle ms-auto text-center">
                                    <a class="btn btn-link text-primary px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalVerifikasi{{$peserta->id}}"><i class="icofont-verification-check text-primary me-2"></i>Verifikasi</a>
                                </td>
                            </tr>

                            <!-- Modal Verifikasi -->
                            <div class="modal fade" id="modalVerifikasi{{$peserta->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi {{$title}}</h5>
                                        </div>
                                        <form id="formVerifikasi{{$peserta->id}}" action="{{ route('peserta.update', $peserta->id) }}" method="post">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-4">
                                                        <img src="/bukti_transfer/{{$peserta->bukti_transfer}}" class="me-3" width="100%" alt="Images">
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="example-text-input" class="form-control-label">Status Verifikasi</label> <br>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="approved" {{ old('status') == "approved" ? "checked" : "" }}>
                                                            <label class="form-check-label" for="inlineRadio1">Setujui</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="rejected" {{ old('status') == "rejected" ? "checked" : "" }}>
                                                            <label class="form-check-label" for="inlineRadio2">Tolak</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 form-group">
                                                        <label for="example-text-input" class="form-control-label">Catatan</label>
                                                        <textarea class="form-control" name="catatan">{{old('catatan')}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="#" class="btn btn-primary btn-save" data-id="{{$peserta->id}}">Simpan</a>
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
</script>
@endsection