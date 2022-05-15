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
                <p class="text-sm mb-1">Kuis pilihan ganda</p>
            </div>
            <form action="{{ route('kuis.materi.store', $silabus->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Judul Kuis</label>
                                <input class="form-control" type="text" name="judul_kuis" value="{{old('judul_kuis')}}">
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
                            </div>
                        </div>
                    </div>

                    <!-- Soal -->
                    <hr class="horizontal dark">
                    <div class="row">

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <ul class="list-group" id="dynamic_form">
                                    <li class="list-group-item border-1 pt-4 pb-1 px-4 mb-4 bg-gray-100 border-radius-lg" id="form0">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label text-uppercase">Soal </label>
                                                    <textarea class="form-control summernote" name="soal[]">{{old('soal[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban A</label>
                                                    <textarea class="form-control summernote" name="jawaban_a[]">{{old('jawaban_a[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban B</label>
                                                    <textarea class="form-control summernote" name="jawaban_b[]">{{old('jawaban_b[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban C</label>
                                                    <textarea class="form-control summernote" name="jawaban_c[]">{{old('jawaban_c[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban D</label>
                                                    <textarea class="form-control summernote" name="jawaban_d[]">{{old('jawaban_d[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Kunci Jawaban</label> <br>
                                                    <select class="form-control form-select" name="kunci_jawaban[]">
                                                        <option value="">-- Pilih Kunci Jawaban --</option>
                                                        <option value="A" {{in_array('A', old("kunci_jawaban") ?: []) ? "selected": ""}}>A</option>
                                                        <option value="B" {{in_array('B', old("kunci_jawaban") ?: []) ? "selected": ""}}>B</option>
                                                        <option value="C" {{in_array('C', old("kunci_jawaban") ?: []) ? "selected": ""}}>C</option>
                                                        <option value="D" {{in_array('D', old("kunci_jawaban") ?: []) ? "selected": ""}}>D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Poin</label> <br>
                                                    <input class="form-control" type="number" name="poin[]" value="{{old('poin[]')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-12 text-end">
                                <button class=" btn btn-gradient-dark text-dark px-3 mb-0 btn-add text-end" type="button"><i class="icofont-plus text-dark me-2" aria-hidden="true"></i>Tambah Soal</button>
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
<!-- jQuery -->
<script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
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
        var no = 1;
        $('.btn-add').click(function() {
            no++;
            $('#dynamic_form').append('<li class="list-group-item border-1 pt-4 pb-1 px-4 mb-4 bg-gray-100 border-radius-lg" id="li' + no + '"><div class="row" id="form' + no + '"></div></li>');
            $('#form' + no + '').append(`
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label text-uppercase">Soal </label>
                                                    <textarea class="form-control summernote" name="soal[]">{{old('soal[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban A</label>
                                                    <textarea class="form-control summernote" name="jawaban_a[]">{{old('jawaban_a[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban B</label>
                                                    <textarea class="form-control summernote" name="jawaban_b[]">{{old('jawaban_b[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban C</label>
                                                    <textarea class="form-control summernote" name="jawaban_c[]">{{old('jawaban_c[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban D</label>
                                                    <textarea class="form-control summernote" name="jawaban_d[]">{{old('jawaban_d[]')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Kunci Jawaban</label> <br>
                                                    <select class="form-control form-select" name="kunci_jawaban[]">
                                                        <option value="">-- Pilih Kunci Jawaban --</option>
                                                        <option value="A" {{in_array('A', old("kunci_jawaban") ?: []) ? "selected": ""}}>A</option>
                                                        <option value="B" {{in_array('B', old("kunci_jawaban") ?: []) ? "selected": ""}}>B</option>
                                                        <option value="C" {{in_array('C', old("kunci_jawaban") ?: []) ? "selected": ""}}>C</option>
                                                        <option value="D" {{in_array('D', old("kunci_jawaban") ?: []) ? "selected": ""}}>D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Poin</label> <br>
                                                    <input class="form-control" type="number" name="poin[]" value="{{old('poin[]')}}">
                                                </div>
                                            </div>
            `);
            $('#form' + no + '').append('<div class="col-md-6 text-end pt-4"><button class="btn btn-link text-danger text-gradient px-3 mb-0 btn-delete" id="' + no + '" type="button"><i class="icofont-ui-delete me-2"></i>Hapus</button></div>');
            $('.summernote').summernote();

            $('html, body').animate({
                scrollTop: $('#li' + no + '').offset().top
            }, 500);
        });

        $(document).on('click', '.btn-delete', function() {
            var button_id = $(this).attr("id");
            $('#li' + button_id + '').remove();
        });
    });
</script>
@endsection