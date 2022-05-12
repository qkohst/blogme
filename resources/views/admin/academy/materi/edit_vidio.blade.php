@extends('layouts.admin.master')


@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('academy.index') }}">{{$title4}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/admin/academy/{{$vidio->materi_silabuses->silabus_academies->academies->id}}">{{$title3}}</a></li>
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/admin/academy/{{$vidio->materi_silabuses->silabus_academies->academies->id}}/silabus/{{$vidio->materi_silabuses->silabus_academies->id}}">{{$title2}}</a></li>
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
                    </div>
                </div>
                <hr class="horizontal dark">
                <form class="form-edit" action="/admin/silabus/{{$materi->silabus_academies->id}}/vidio/{{$materi->id}}" method="post">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Judul Materi</label>
                                    <input class="form-control" type="text" name="judul_materi" value="{{$materi->judul_materi}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tipe Pembaca</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_pembaca" id="inlineRadio1" value="Semua Orang" {{ $materi->tipe_pembaca == "Semua Orang" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio1">Semua Orang</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_pembaca" id="inlineRadio2" value="Member" {{ $materi->tipe_pembaca == "Member" ? "checked" : "" }}>
                                        <label class="form-check-label" for="inlineRadio2">Member</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Deskripsi Vidio</label>
                                    <textarea class="form-control" name="deskripsi_vidio">{{$vidio->deskripsi_vidio}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Embed Vidio Youtube</label>
                                    <textarea class="form-control" name="embed_vidio" pattern="<iframe .*" placeholder="<iframe width=''560'' height=''315'' src=''https://www.youtube.com/embed/.*">{{$vidio->embed_vidio}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer pt-0 pb-2">
                        <a href="#" class="btn bg-gradient-primary btn-sm ms-auto btn-save">Simpan</a>
                        <a href="/admin/academy/{{$vidio->materi_silabuses->silabus_academies->academies->id}}/silabus/{{$vidio->materi_silabuses->silabus_academies->id}}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                    </div>
                </form>
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
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
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