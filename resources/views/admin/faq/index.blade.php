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
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah {{$title}}</h5>
                                </div>
                                <form action="{{ route('faq.store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <p class="text-uppercase text-sm">Pertanyaan Yang Sering Ditanyakan</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Pertanyaan</label>
                                                    <input class="form-control" type="text" name="pertanyaan" value="{{old('pertanyaan')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Jawaban</label>
                                                    <textarea class="form-control" rows="4" name="jawaban">{{old('jawaban')}}</textarea>
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
                @if($faqs->count() == 0)
                <div class="text-center mb-2">Data faq belum tersedia</div>
                @else
                <ul class="list-group">
                    @foreach($faqs as $faq)
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">{{$faq->pertanyaan}}</h6>
                            <p class="text-sm">{{$faq->jawaban}}</p>

                            <div class="ms-auto">
                                <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modalEdit{{$faq->id}}"><i class="icofont-pencil-alt-2 text-dark me-2" aria-hidden="true"></i>Edit</a>

                                <a href="#" class="btn btn-link text-danger text-gradient px-3 mb-0 btn-delete" data-id="{{$faq->id}}">
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="post" id="delete{{$faq->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="icofont-ui-delete me-2"></i>Hapus
                                </a>
                            </div>
                        </div>
                    </li>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{$faq->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$title}}</h5>
                                </div>
                                <form id="formEdit{{$faq->id}}" action="{{ route('faq.update', $faq->id) }}" method="post">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Pertanyaan</label>
                                            <input class="form-control" type="text" name="pertanyaan" value="{{$faq->pertanyaan}}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jawaban</label>
                                            <textarea class="form-control" rows="4" name="jawaban">{{$faq->jawaban}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="#" class="btn btn-primary btn-save" data-id="{{$faq->id}}">Simpan</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </ul>
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
</script>
@endsection