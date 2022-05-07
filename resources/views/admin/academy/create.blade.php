@extends('layouts.admin.master')

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.css">
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote.css">
@endsection

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
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form action="{{ route('academy.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Data Kelas</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Kelas</label>
                                <input class="form-control" type="text" name="nama_kelas" value="{{old('nama_kelas')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" accept="image/png, image/jpeg" value="{{old('gambar')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Level</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio1" value="Dasar" {{ old('level') == "Dasar" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio1">Dasar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio2" value="Pemula" {{ old('level') == "Pemula" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio2">Pemula</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio3" value="Menengah" {{ old('level') == "Menengah" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio3">Menengah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio4" value="Mahir" {{ old('level') == "Mahir" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio4">Mahir</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level" id="inlineRadio5" value="Profesional" {{ old('level') == "Profesional" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio5">Profesional</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Fasilitas Kelas</label> <br>
                                @foreach($data_fasilitas as $fasilitas)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="fasilitas_kelas[]" id="inlineCheckbox{{$fasilitas->id}}" value="{{$fasilitas->id}}" {{ in_array($fasilitas->id, old('fasilitas_kelas', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox{{$fasilitas->id}}">{{$fasilitas->nama_fasilitas}}</label>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected>-- Pilih Kategori --</option>
                                    @foreach($kategories as $kategory)
                                    <option value="{{$kategory->id}}" {{ old('kategori') == $kategory->id ? "selected" : "" }}>{{$kategory->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Durasi Belajar <span>(* jam)</span></label>
                                <input class="form-control" type="number" name="durasi_belajar" value="{{old('durasi_belajar')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi Kelas</label>
                                <textarea class="form-control summernote" name="deskripsi">{{old('deskripsi')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Peralatan Belajar</p>
                    <p class="text-sm">Spesifikasi minimal perangkat:</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RAM</label>
                                <input class="form-control" type="text" name="minimum_ram" value="{{old('minimum_ram')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Layar</label>
                                <input class="form-control" type="text" name="minimum_layar" value="{{old('minimum_layar')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Sistem Operasi</label>
                                <input class="form-control" type="text" name="minimum_sistem_operasi" value="{{old('minimum_sistem_operasi')}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Prosesor</label>
                                <input class="form-control" type="text" name="minimum_processor" value="{{old('minimum_processor')}}">
                            </div>
                        </div>
                    </div>
                    <p class="text-sm">Tools yang dibutuhkan :</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tools</label>
                                <select class="form-control select2" name="tools[]" multiple="multiple" data-placeholder="select tools" style="width: 100%;">
                                    @foreach($tools as $tool)

                                    <option value="{{$tool->id}}" {{ in_array($tool->id, old('tools', [])) ? 'selected' : '' }}>{{$tool->nama_tool}}</option>
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
                                <select class="form-control select2" name="teknologi[]" multiple="multiple" data-placeholder="select teknologi" style="width: 100%;">
                                    @foreach($technologies as $technology)

                                    <option value="{{$technology->id}}" {{ in_array($technology->id, old('teknologi', [])) ? 'selected' : '' }}>{{$technology->nama_teknologi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer pt-0 pb-2">
                    <button class="btn bg-gradient-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <a href="{{ route('academy.index') }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="/admin-assets/plugins/select2/js/select2.full.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection