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
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="icofont-plus me-2"></i>Tambah</a>
                    </div>
                    <!-- Modal Tambah-->
                    <div class="modal fade" id="modalTambah" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
                                </div>
                                <form action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nama Bank</label>
                                                    <select class="form-select" name="nama_bank" onchange="enableForm(this);">
                                                        <option value="">-- Pilih Nama Bank --</option>
                                                        <option value="BRI">BRI</option>
                                                        <option value="MANDIRI">MANDIRI</option>
                                                        <option value="BNI">BNI</option>
                                                        <option value="BTN">BTN</option>
                                                        <option value="DANAMON">DANAMON</option>
                                                        <option value="PERMATA">PERMATA</option>
                                                        <option value="BCA">BCA</option>
                                                        <option value="MAYBANK">MAYBANK</option>
                                                        <option value="CIMB NIAGA">CIMB NIAGA</option>
                                                        <option value="Lainnya">Lainnnya .... </option>
                                                    </select>
                                                    <input type="text" class="form-control mt-3" name="other_bank" id="other_bank" placeholder="Masukkan nama bank" style="display: none;">

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Nomor Rekening</label>
                                                    <input type="number" class="form-control" name="nomor_rekening">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Rekening Atas Nama</label>
                                                    <input type="text" class="form-control" name="nama_pemilik">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Gambar</label>
                                                    <input class="form-control" type="file" name="gambar" accept="image/png, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 p-3">
                <hr class="horizontal dark">
                @if($rekening_bank->count() == 0)
                <div class="text-center mb-2">Data rekening bank belum tersedia</div>
                @else
                <div class="row">
                    @foreach($rekening_bank as $bank)
                    <div class="col-12 mb-4">
                        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                            <img class="w-10 me-3 mb-0 d-none d-lg-block" src="/admin-assets/img/rekening_bank/{{$bank->gambar}}" alt="logo">

                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">{{$bank->nama_bank}}</h6>
                                <span class="mb-2 text-xs">Nomor Rekening : <span class="text-dark font-weight-bold ms-sm-2">{{$bank->nomor_rekening}}</span></span>
                                <span class="mb-2 text-xs">Atas Nama : <span class="text-dark ms-sm-2 font-weight-bold">{{$bank->nama_pemilik}}</span></span>
                            </div>

                            <div class="ms-auto text-end">
                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modalEdit{{$bank->id}}"><i class="icofont-pencil-alt-2 text-dark me-2" aria-hidden="true"></i>Edit</a>

                                <a href="#" class="btn btn-link text-danger text-gradient px-3 mb-0 btn-delete" data-id="{{$bank->id}}">
                                    <form action="{{ route('bank.destroy', $bank->id) }}" method="post" id="delete{{$bank->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{$bank->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
                                </div>
                                <form id="formEdit{{$bank->id}}" action="{{ route('bank.update', $bank->id) }}" method="post">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Bank</label>
                                            <input class="form-control" type="text" name="nama_bank" value="{{$bank->nama_bank}}" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Nomor Rekening</label>
                                                <input type="number" class="form-control" name="nomor_rekening" value="{{$bank->nomor_rekening}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Rekening Atas Nama</label>
                                                <input type="text" class="form-control" name="nama_pemilik" value="{{$bank->nama_pemilik}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="#" class="btn btn-primary btn-save" data-id="{{$bank->id}}">Simpan</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                    text: "Simpan perubahan data !",
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
                        $(`#formEdit${id}`).submit();
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
        if (that.value == "Lainnya") {
            document.getElementById("other_bank").style.display = "block";
        } else {
            document.getElementById("other_bank").style.display = "none";
        }
    }
</script>
@endsection