@extends('member.settings.settings-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>
    <form class="my-form" action="{{ route('settings.profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body p-4">
            <div class="form-group">
                <label for="foto">Foto Diri</label>
                <div class="row">
                    <div id="divImageMediaPreview" class="col-lg-2">
                        <img src="/avatar/{{$user->avatar}}" class="rounded" alt="Images" height="120">
                    </div>
                    <div class="col-lg-10 align-text-bottom">
                        <div class="file-drop-area">
                            <span class="choose-file-button">Pilih Foto</span>
                            <span class="file-message">atau seret dan lepas file di sini</span>
                            <input type="file" class="file-input @error('foto_profil') is-invalid @enderror" name="foto_profil" accept="image/png, image/jpeg">
                        </div>
                        <small>Gambar Profile Anda sebaiknya memiliki rasio 1:1</small>
                        @error('foto_profil')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label> <small>(akan digunakan pada nama sertifikat)</small>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" value="{{!empty($profile) ? $profile->nama_lengkap:''}}" />
                @error('nama_lengkap')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{$user->username}}" />
                @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled />

            </div>
            <div class="form-group">
                <label for="headline">Headline</label>
                <input type="text" class="form-control @error('headline') is-invalid @enderror" name="headline" id="headline" value="{{!empty($profile) ? $profile->headline:''}}" />
                <small class="text-secondary">Dapat diisi dengan titel atau jabatan utama Anda.</small>
                @error('headline')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="tentang_saya">Tentang Saya</label>
                <textarea class="form-control @error('tentang_saya') is-invalid @enderror" name="tentang_saya" id="tentang_saya" rows="4">{{!empty($profile) ? $profile->tentang_saya:''}}</textarea>
                <small class="text-secondary">Tulis cerita singkat tentang diri Anda.</small>
                @error('tentang_saya')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-dark btn-save">Simpan Perubahan</a>
        </div>
    </form>
</div>

@endsection

@section('page_scripts')

<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>


<script>
    $(document).on('change', '.file-input', function() {


        var filesCount = $(this)[0].files.length;

        var textbox = $(this).prev();

        if (filesCount === 1) {
            var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
        } else {
            textbox.text(filesCount + ' files selected');
        }

        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function() {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $("<img />");
                    img.attr("style", "width: 120px; height:120px; border-radius: 0.25rem;");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }


    });

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
                            className: 'btn btn-dark'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-outline-dark'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $('.my-form').submit();
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