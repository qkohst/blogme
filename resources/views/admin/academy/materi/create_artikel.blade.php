@extends('layouts.admin.master')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.index') }}">{{$title3}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.show', $silabus->academies->id) }}">{{$title2}}</a></li>
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
                <div class="row gx-3">
                    <div class="col-auto">
                        <div class="avatar avatar-lg position-relative">
                            <img src="/admin-assets/img/academies/{{$silabus->academies->gambar}}" alt="academy img" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$silabus->academies->nama_kelas}}
                            </h5>
                            <p class="text-sm">
                                Silabus : {{$silabus->judul_silabus}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Tab Menu  -->
    </div>

    <div class="col-md-12 pt-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
                <p class="text-sm mb-1">Artikel pembelajaran</p>
            </div>
            <form action="{{ route('artikel.materi.store', $silabus->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Judul Materi</label>
                                <input class="form-control @error('judul_materi') is-invalid @enderror" type="text" name="judul_materi" value="{{old('judul_materi')}}">
                                @error('judul_materi')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Tipe Pembaca</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipe_pembaca" id="inlineRadio1" value="Semua Orang" {{ old('tipe_pembaca') == "Semua Orang" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio1">Semua Orang</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipe_pembaca" id="inlineRadio2" value="Member" {{ old('tipe_pembaca') == "Member" ? "checked" : "" }}>
                                    <label class="form-check-label" for="inlineRadio2">Member</label>
                                </div>
                                @error('tipe_pembaca')
                                <br>
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Isi Materi</label>
                                <textarea class="form-control @error('isi_materi') is-invalid @enderror summernote" name="isi_materi">{{old('isi_materi')}}</textarea>
                                @error('isi_materi')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer pt-0 pb-2">
                    <button class="btn bg-gradient-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <a href="{{ route('academy.show', $silabus->academies->id) }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Bootstrap 4 -->
<script src="/admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection