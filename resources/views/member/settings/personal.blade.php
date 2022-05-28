@extends('member.settings.settings-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>
    <form class="my-form" action="{{ route('settings.personal') }}" method="post">
        @csrf

        <div class="card-body p-4">
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="nomor_telepon">ID +62</span>
                    </div>
                    <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon" aria-describedby="nomor_telepon" value="{{!empty($data_pribadi) ? $data_pribadi->nomor_telepon:''}}">
                </div>
                @error('nomor_telepon')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="kota_domisili">Kota Domisili</label>
                <input type="text" class="form-control @error('kota_domisili') is-invalid @enderror" name="kota_domisili" id="kota_domisili" value="{{!empty($data_pribadi) ? $data_pribadi->kota_domisili:''}}" />
                <small class="text-secondary">Isi dengan kota/kabupaten tempat Anda tinggal saat ini.</small>

                @error('kota_domisili')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-lg-8 form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" value="{{!empty($data_pribadi) ? $data_pribadi->tempat_lahir:''}}" />
                    @error('tempat_lahir')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-lg-4 form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{!empty($data_pribadi) ? $data_pribadi->tanggal_lahir:''}}" />
                    @error('tanggal_lahir')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label> <br>
                @if(is_null($data_pribadi))
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{ old('jenis_kelamin') == "L" ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" {{ old('jenis_kelamin') == "P" ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio3" value="" {{ old('jenis_kelamin') == "" ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio3">Memilih tidak menyebutkan</label>
                </div>
                @else
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" {{ $data_pribadi->jenis_kelamin == "L" ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" {{ $data_pribadi->jenis_kelamin == "P" ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio3" value="" {{ $data_pribadi->jenis_kelamin == null ? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio3">Memilih tidak menyebutkan</label>
                </div>
                @endif

            </div>
            <div class="form-group">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{!empty($data_pribadi) ? $data_pribadi->pendidikan_terakhir:''}}" />
                @error('pendidikan_terakhir')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan/profesi Saat Ini</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" value="{{!empty($data_pribadi) ? $data_pribadi->pekerjaan:''}}" />
                <small class="text-secondary">Isikan "mahasiswa" atau "pelajar" jika Anda masih menempuh pendidikan.</small>
                @error('pekerjaan')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="institusi_tempat_bekerja">Perusahaan/institusi Saat Ini</label>
                <input type="text" class="form-control @error('institusi_tempat_bekerja') is-invalid @enderror" name="institusi_tempat_bekerja" id="institusi_tempat_bekerja" value="{{!empty($data_pribadi) ? $data_pribadi->institusi_tempat_bekerja:''}}" />
                <small class="text-secondary">Anda bisa menuliskan nama perusahaan atau kampus.</small>
                @error('institusi_tempat_bekerja')
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