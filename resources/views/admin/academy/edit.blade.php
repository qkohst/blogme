@extends('layouts.admin.master')

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.css">
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.index') }}">{{$title3}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.show', $academy->id) }}">{{$title2}}</a></li>
        <li class=" breadcrumb-item text-sm text-white active" aria-current="page">{{$title}}</li>
    </ol>
</nav>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form class="form-edit" action="{{ route('academy.update', $academy->id) }}" method="post">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Data Kelas</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kelas</label>
                                <input class="form-control" type="text" name="nama_kelas" value="{{$academy->nama_kelas}}" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected>-- Pilih Kategori --</option>
                                    @foreach($kategories as $kategory)
                                    <option value="{{$kategory->id}}" {{ $academy->kategories_id == $kategory->id ? "selected" : "" }}>{{$kategory->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Level</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio1" value="Dasar" {{ $academy->level == "Dasar" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio1">Dasar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio2" value="Pemula" {{ $academy->level == "Pemula" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio2">Pemula</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio3" value="Menengah" {{ $academy->level == "Menengah" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio3">Menengah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio4" value="Mahir" {{ $academy->level == "Mahir" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio4">Mahir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio5" value="Profesional" {{ $academy->level == "Profesional" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio5">Profesional</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Fasilitas Kelas</label> <br>
                                @foreach($fasilitas_academies as $fasilitas)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$fasilitas->id}}" checked disabled>
                                    <label class="form-check-label" for="inlineCheckbox{{$fasilitas->id}}">{{$fasilitas->fasilitas->nama_fasilitas}}</label>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi</label>
                                <textarea class="form-control summernote" name="deskripsi">{{$academy->deskripsi}}</textarea>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Peralatan Belajar</p>
                        <p class="text-sm">Spesifikasi minimal perangkat:</p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">RAM</label>
                                    <input class="form-control" type="text" name="minimum_ram" value="{{$academy->minimum_ram}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Layar</label>
                                    <input class="form-control" type="text" name="minimum_layar" value="{{$academy->minimum_layar}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Sistem Operasi</label>
                                    <input class="form-control" type="text" name="minimum_sistem_operasi" value="{{$academy->minimum_sistem_operasi}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Prosesor</label>
                                    <input class="form-control" type="text" name="minimum_processor" value="{{$academy->minimum_processor}}">
                                </div>
                            </div>
                        </div>
                        <p class="text-sm">Tools yang dibutuhkan :</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tools</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="select tools" style="width: 100%;" disabled>
                                        @foreach($tools_academies as $tool)
                                        <option selected>{{$tool->tools->nama_tool}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Teknologi</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Teknologi Yang Digunakan</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="select teknologi" style="width: 100%;" disabled>
                                        @foreach($technologies_academies as $technology)
                                        <option selected>{{$technology->technologies->nama_teknologi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Status Kelas</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="status" @if ($academy->status == 'on') checked @endif>
                                    <label class="form-check-label" for="rememberMe">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer pt-0 pb-2">
                    <a href="#" class="btn bg-gradient-primary btn-sm ms-auto btn-save">Simpan</a>
                    <a href="{{ route('academy.show', $academy->id) }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="/admin-assets/plugins/select2/js/select2.full.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        // Summernote
        $('.summernote').summernote()
    })
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
                        $('.form-edit').submit();
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