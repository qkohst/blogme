@extends('member.settings.settings-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>
    <form class="my-form" action="{{ route('change_password') }}" method="post">
        @csrf
        <div class="card-body p-4">

            <div class="form-group">
                <label for="password_lama">Password Lama</label>
                <input type="password" class="form-control @error('password_lama') is-invalid @enderror" name="password_lama" id="password_lama" />
                @error('password_lama')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_baru">Password Baru</label>
                <input type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" id="password_baru" />
                @error('password_baru')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="konfirmasi_password">Konfirmasi Password Baru</label>
                <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" name="konfirmasi_password" id="konfirmasi_password" />
                @error('konfirmasi_password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <a href="#" class="btn btn-dark btn-save">Simpan Password</a>

        </div>
    </form>
</div>

@endsection

@section('page_scripts')
<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script>
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-save').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Simpan perubahan password !",
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