@extends('layouts.admin.master')

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
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="/admin-assets/img/academies/{{$silabus->academies->gambar}}" alt="academy img" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$silabus->academies->nama_kelas}}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{$silabus->judul_silabus}}
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
                        <div class="col-6 align-items-center">
                            <h6 class="mb-0">Materi</h6>
                            <p class="text-sm mb-1">Data materi pembelajaran pada {{$silabus->judul_silabus}}</p>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modalTambah{{$silabus->id}}">
                                <i class="icofont-plus me-2"></i>Tambah
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalTambah{{$silabus->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Belum -->
                                    <form action="/admin/academy/{{$silabus->academies->id}}/{{$silabus->id}}/materi">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Pilih Jenis Materi</label> <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_materi" id="inlineRadio1" value="Artikel" {{ old('jenis_materi') == "Artikel" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="inlineRadio1">Artikel</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_materi" id="inlineRadio2" value="Vidio Interaktif" {{ old('jenis_materi') == "Vidio Interaktif" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="inlineRadio2">Vidio Interaktif</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_materi" id="inlineRadio3" value="Kuis" {{ old('jenis_materi') == "Kuis" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="inlineRadio3">Kuis</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_materi" id="inlineRadio4" value="Submission" {{ old('jenis_materi') == "Submission" ? "checked" : "" }}>
                                                    <label class="form-check-label" for="inlineRadio4">Submission</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @if($materi_silabuses->count() == 0)
                        <hr class="horizontal dark">
                        <div class="text-center mb-2">Data materi belum tersedia</div>
                        @else
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul Materi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tipe Materi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembaca</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materi_silabuses as $materi)
                                <tr>
                                    <td>
                                        <p class="text-sm px-3 mb-0">{{$materi->judul_materi}}</p>
                                    </td>
                                    <td class="text-center">
                                        @if($materi->tipe_materi == 1)
                                        <span class="badge badge-sm bg-gradient-info"> Artikel</span>
                                        @elseif($materi->tipe_materi == 2)
                                        <span class="badge badge-sm bg-gradient-primary"> Vidio</span>
                                        @elseif($materi->tipe_materi == 3)
                                        <span class="badge badge-sm bg-gradient-warning"> Kuis</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-success"> Submission</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-sm mb-0">{{$materi->tipe_pembaca}}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="btn btn-link text-secondary mb-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-options"></i>
                                        </a>
                                        <!-- LANJUT FUNGSIKAN MENU INI -->
                                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                @if($materi->tipe_materi == 1)
                                                <a class="dropdown-item border-radius-md" href="/admin/silabus/{{$silabus->id}}/artikel/{{$materi->id}}">
                                                    <i class="icofont-eye-alt mx-2"></i> Detail Materi
                                                </a>
                                                <a class="dropdown-item border-radius-md" href="/admin/silabus/{{$silabus->id}}/artikel/{{$materi->id}}/edit">
                                                    <i class="icofont-ui-edit mx-2"></i> Edit Materi
                                                </a>
                                                @elseif($materi->tipe_materi == 2)
                                                <!-- Vidio -->
                                                @elseif($materi->tipe_materi == 3)
                                                <!-- Kuis -->
                                                @else
                                                <!-- Submission -->
                                                @endif
                                                <a href="#" class="dropdown-item border-radius-md btn-delete" data-id="materi{{$materi->id}}">
                                                    <form action="/admin/materi/{{$materi->id}}" method="post" id="deletemateri{{$materi->id}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <i class="icofont-ui-delete mx-2"></i> Hapus Materi
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
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