@extends('layouts.admin.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('team.index') }}">{{$title2}}</a></li>
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
            <form class="form-edit" action="{{ route('team.update', $team->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Identitas Tim</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                                <input class="form-control @error('nama_lengkap') is-invalid @enderror" type="text" name="nama_lengkap" value="{{$team->nama_lengkap}}" disabled>
                                @error('nama_lengkap')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$team->email}}">
                                @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Posisi</label>
                                <input class="form-control @error('posisi') is-invalid @enderror" type="text" name="posisi" value="{{$team->posisi}}">
                                @error('posisi')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Mulai Bekerja</label>
                                <input class="form-control @error('mulai_bekerja') is-invalid @enderror" type="date" name="mulai_bekerja" value="{{$team->mulai_bekerja}}">
                                @error('mulai_bekerja')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Deskripsi Pekerjaan</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{$team->deskripsi}}</textarea>
                                @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Link Sosial Media</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Twitter</label>
                                <input class="form-control @error('twitter') is-invalid @enderror" type="url" pattern="https://.*" name="twitter" placeholder="https://twitter.com/username" value="{{$team->twitter}}">
                                @error('twitter')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Facebook</label>
                                <input class="form-control @error('facebook') is-invalid @enderror" type="url" pattern="https://.*" name="facebook" placeholder="https://web.facebook.com/username" value="{{$team->facebook}}">
                                @error('facebook')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Instagram</label>
                                <input class="form-control @error('instagram') is-invalid @enderror" type="url" pattern="https://.*" name="instagram" placeholder="https://www.instagram.com/username" value="{{$team->instagram}}">
                                @error('instagram')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">LinkedIn</label>
                                <input class="form-control @error('linkedin') is-invalid @enderror" type="url" pattern="https://.*" name="linkedin" placeholder="https://www.linkedin.com/in/username" value="{{$team->linkedin}}">
                                @error('linkedin')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer pt-0 pb-2">
                    <a href="#" class="btn bg-gradient-primary btn-sm ms-auto btn-save">Simpan</a>
                    <a href="{{ route('team.index') }}" class="btn btn-outline-primary btn-sm ms-auto">Batal</a>
                </div>
            </form>
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