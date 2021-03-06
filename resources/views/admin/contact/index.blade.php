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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase">{{$title}}</h6>
            </div>
            <form class="form-edit" action="{{ route('contact.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body pt-2">
                    <p class="text-uppercase text-sm">Update Data Contact</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Alamat</label>
                                <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" value="{{$contact->alamat}}">
                                @error('alamat')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$contact->email}}">
                                @error('email')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nomor Telpon</label>
                                <input class="form-control @error('nomor_telpon') is-invalid @enderror" type="number" name="nomor_telpon" value="{{$contact->nomor_telpon}}">
                                @error('nomor_telpon')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Embed Google Maps</label>
                                <input class="form-control @error('embed_google_maps') is-invalid @enderror" type="text" pattern="<iframe src=.*" name="embed_google_maps" placeholder="<iframe src=''https://www.google.com/maps/embed?.*" value="{{$contact->embed_google_maps}}">
                                @error('embed_google_maps')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Telegram</label>
                                <input class="form-control @error('link_telegram') is-invalid @enderror" type="url" pattern="https://.*" name="link_telegram" placeholder="https://t.me/username" value="{{$contact->link_telegram}}">
                                @error('link_telegram')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Twitter</label>
                                <input class="form-control @error('link_twitter') is-invalid @enderror" type="url" pattern="https://.*" name="link_twitter" placeholder="https://twitter.com/username" value="{{$contact->link_twitter}}">
                                @error('link_twitter')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Facebook</label>
                                <input class="form-control @error('link_facebook') is-invalid @enderror" type="url" pattern="https://.*" name="link_facebook" placeholder="https://web.facebook.com/username" value="{{$contact->link_facebook}}">
                                @error('link_facebook')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Instagram</label>
                                <input class="form-control @error('link_instagram') is-invalid @enderror" type="url" pattern="https://.*" name="link_instagram" placeholder="https://www.instagram.com/username" value="{{$contact->link_instagram}}">
                                @error('link_instagram')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Youtube</label>
                                <input class="form-control @error('link_youtube') is-invalid @enderror" type="url" pattern="https://.*" name="link_youtube" placeholder="https://www.youtube.com/channel" value="{{$contact->link_youtube}}">
                                @error('link_youtube')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer pt-0 pb-2">
                    <a href="#" class="btn bg-gradient-primary btn-sm ms-auto btn-save">Simpan</a>
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