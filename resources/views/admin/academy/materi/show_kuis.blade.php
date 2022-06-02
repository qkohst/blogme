@extends('layouts.admin.master')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
@endsection

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
                            <button type="button" class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                <i class="icofont-plus me-2"></i>Tambah Soal</a>
                            </button>
                        </div>

                        <!-- Modal Add -->
                        <form id="form-add" action="{{ route('store.kuis') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="modalAdd" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="hidden" name="materi_silabus_id" value="{{$materi->id}}">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label text-uppercase">Soal </label>
                                                        <textarea class="form-control summernote" name="soal">{{old('soal')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Jawaban A</label>
                                                        <textarea class="form-control summernote" name="jawaban_a">{{old('jawaban_a')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Jawaban B</label>
                                                        <textarea class="form-control summernote" name="jawaban_b">{{old('jawaban_b')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Jawaban C</label>
                                                        <textarea class="form-control summernote" name="jawaban_c">{{old('jawaban_c')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Jawaban D</label>
                                                        <textarea class="form-control summernote" name="jawaban_d">{{old('jawaban_d')}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Kunci Jawaban</label> <br>
                                                        <select class="form-control form-select" name="kunci_jawaban">
                                                            <option value="">-- Pilih Kunci Jawaban --</option>
                                                            <option value="A" {{ old('kunci_jawaban') == 'A' ? "selected" : "" }}>A</option>
                                                            <option value="B" {{ old('kunci_jawaban') == 'B' ? "selected" : "" }}>B</option>
                                                            <option value="C" {{ old('kunci_jawaban') == 'C' ? "selected" : "" }}>C</option>
                                                            <option value="D" {{ old('kunci_jawaban') == 'D' ? "selected" : "" }}>D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Poin</label> <br>
                                                        <input class="form-control" type="number" name="poin" value="{{old('poin')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer me-3">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="#" class="btn btn-primary btn-store">Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Modal Add -->

                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <hr class="horizontal dark">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-weight-bold text-sm">{{$materi->judul_materi}}</p>
                            @if($materi->kuis_materis->count() == 0)
                            <div class="text-center mb-2">Soal belum tersedia</div>
                            @else
                            <ul class="list-group">
                                @foreach($materi->kuis_materis as $kuis)
                                <li class="list-group-item border-1 pb-1 px-4 mb-4 bg-gray-80 border-radius-lg">
                                    {!!$kuis->soal!!}
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio1" disabled {{ $kuis->kunci_jawaban == "A" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio1">{!!$kuis->jawaban_a!!}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio2" disabled {{ $kuis->kunci_jawaban == "B" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio2">{!!$kuis->jawaban_b!!}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio3" disabled {{ $kuis->kunci_jawaban == "C" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio3">{!!$kuis->jawaban_c!!}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineRadio4" disabled {{ $kuis->kunci_jawaban == "D" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio4">{!!$kuis->jawaban_d!!}</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="badge badge-sm bg-gradient-dark">Poin : {{$kuis->poin}}</span>
                                        </div>
                                        <div class="col-md-6 text-end">

                                            <form action="/admin/silabus/{{$materi->silabus_academies->id}}/kuis/{{$materi->id}}" method="post" id="deletekuis{{$kuis->id}}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="kuis_id" value="{{$kuis->id}}">
                                                <button type="button" class="btn btn-link text-dark px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalEdit{{$kuis->id}}">
                                                    <i class="icofont-ui-edit me-2"></i> Edit
                                                </button>
                                                <a href="#" class="btn btn-link text-danger px-2 mb-0 btn-delete" data-id="kuis{{$kuis->id}}">
                                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                                </a>
                                            </form>

                                        </div>

                                        <!-- Modal Edit -->
                                        <form id="form-edit{{$kuis->id}}" action="/admin/silabus/{{$materi->silabus_academies->id}}/kuis/{{$materi->id}}" method="post" enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal fade" id="modalEdit{{$kuis->id}}" aria-labelledby="exampleModalLabel{{$kuis->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel{{$kuis->id}}">Edit Soal</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <input type="hidden" name="kuis_id" value="{{$kuis->id}}">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label text-uppercase">Soal </label>
                                                                        <textarea class="form-control summernote" name="soal">{{$kuis->soal}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Jawaban A</label>
                                                                        <textarea class="form-control summernote" name="jawaban_a">{{$kuis->jawaban_a}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Jawaban B</label>
                                                                        <textarea class="form-control summernote" name="jawaban_b">{{$kuis->jawaban_b}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Jawaban C</label>
                                                                        <textarea class="form-control summernote" name="jawaban_c">{{$kuis->jawaban_c}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Jawaban D</label>
                                                                        <textarea class="form-control summernote" name="jawaban_d">{{$kuis->jawaban_d}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Kunci Jawaban</label> <br>
                                                                        <select class="form-control form-select" name="kunci_jawaban">
                                                                            <option value="" disabled>-- Pilih Kunci Jawaban --</option>
                                                                            <option value="A" {{ $kuis->kunci_jawaban == 'A' ? "selected" : "" }}>A</option>
                                                                            <option value="B" {{ $kuis->kunci_jawaban == 'B' ? "selected" : "" }}>B</option>
                                                                            <option value="C" {{ $kuis->kunci_jawaban == 'C' ? "selected" : "" }}>C</option>
                                                                            <option value="D" {{ $kuis->kunci_jawaban == 'D' ? "selected" : "" }}>D</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="example-text-input" class="form-control-label">Poin</label> <br>
                                                                        <input class="form-control" type="number" name="poin" value="{{$kuis->poin}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer me-3">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <a href="#" class="btn btn-primary btn-save" id="{{$kuis->id}}">Simpan</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Modal Edit -->
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Content  -->

    </div>
</div>

@endsection

@section('scripts')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    });

    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function(e) {
            $('.sidenav').hide();
        });

        $('.modal').on('hidden.bs.modal', function(e) {
            $('.sidenav').show();
        });
    });
</script>

<script>
    //== Class definition
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

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
                        var button_id = $(this).attr("id");
                        $('#form-edit' + button_id + '').submit();
                    } else {
                        swal.close();
                    }
                });
            });

            $('.btn-store').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Tambahkan data baru !",
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
                        $('#form-add').submit();
                    } else {
                        swal.close();
                    }
                });
            });

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