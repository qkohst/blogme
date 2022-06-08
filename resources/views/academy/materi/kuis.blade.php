@extends('academy.materi.silabus-nav')

@section('materi')

<div class="card">
    <div class="card-body p-4">
        <p>Selesaikan semua soal {{$title}} dibawah ini untuk melanjutkan ke modul pembelajaran selanjutnya.</p>

        <form class="my-form" action="{{ route('modul.kirim_jawaban') }}" method="post">
            @csrf
            <input type="hidden" name="peserta_academy_id" value="{{$peserta->id}}">
            @foreach($data_kuis as $kuis)
            <div class="card">
                <input type="hidden" name="kuis_materi_id[]" value="{{$kuis->id}}">
                <div class="card-body">
                    {!!$kuis->soal!!}
                    <div class="form-check mb-2 mr-sm-2">
                        <input class="form-check-input" type="radio" id="inlineFormCheck1{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="A" required {{!empty($kuis->jawaban) ? $kuis->jawaban->jawaban == "A" ? "checked" : "disabled" : ""}}>
                        <label class="form-check-label" for="inlineFormCheck1{{$kuis->id}}">
                            {!!$kuis->jawaban_a!!}
                        </label>
                    </div>
                    <div class="form-check mb-2 mr-sm-2">
                        <input class="form-check-input" type="radio" id="inlineFormCheck2{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="B" {{!empty($kuis->jawaban) ? $kuis->jawaban->jawaban == "B" ? "checked" : "disabled": ""}}>
                        <label class="form-check-label" for="inlineFormCheck2{{$kuis->id}}">
                            {!!$kuis->jawaban_b!!}
                        </label>
                    </div>
                    <div class="form-check mb-2 mr-sm-2">
                        <input class="form-check-input" type="radio" id="inlineFormCheck3{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="C" {{!empty($kuis->jawaban) ? $kuis->jawaban->jawaban == "C" ? "checked" : "disabled" : "" }}>
                        <label class="form-check-label" for="inlineFormCheck3{{$kuis->id}}">
                            {!!$kuis->jawaban_c!!}
                        </label>
                    </div>
                    <div class="form-check mr-sm-2">
                        <input class="form-check-input" type="radio" id="inlineFormCheck4{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="D" {{!empty($kuis->jawaban) ? $kuis->jawaban->jawaban == "D" ? "checked" : "disabled" : ""}}>
                        <label class="form-check-label" for="inlineFormCheck4{{$kuis->id}}">
                            {!!$kuis->jawaban_d!!}
                        </label>
                    </div>
                </div>
                @if(!is_null($kuis->jawaban))
                <div class="card-footer">
                    <span class="badge badge-sm bg-gradient-dark">Poin : {{$kuis->jawaban->poin}}</span>
                </div>
                @endif
            </div>
            @endforeach

            @if($jumlah_jawab != $data_kuis->count())
            <div>
                <button type="submit" id="btnKirim" class="d-none"></button>
            </div>
            @endif
        </form>
    </div>
    <div class="card-footer">
        @if($previous != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$previous}}" class="btn btn-outline-dark"><i class="icofont-simple-left"></i> Sebelumnya</a>
        @endif
        @if($jumlah_jawab == $data_kuis->count())
        @if($next != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$next}}&from={{$materi->id}}" class="btn btn-dark float-right">Selanjutnya <i class="icofont-simple-right"></i></a>
        @else


        @if($peserta->status == 'finish')
        <a href="{{ route('courses.show', $academy->id) }}" class="btn btn-dark float-right"><i class="icofont-home"></i> Ke Beranda Kelas</a>
        @else
        <a href="#" class="btn btn-dark float-right" data-bs-toggle="modal" data-bs-target="#modalFinish">Selesaikan Kelas</a>
        <!-- Modal Finish -->
        <div class="modal fade" id="modalFinish" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Selesaikan Kelas
                    </div>
                    <form action="{{ route('modul.selesai_kelas') }}" method="post">
                        @csrf
                        <input type="hidden" name="academy_id" value="{{$academy->id}}">

                        <div class="modal-body">
                            <div class="form-group">
                                <p class="form-text text-dark mb-1">
                                    <i class="icofont-check-circled text-success"></i> Berikan pengalaman belajar anda pada kelas ini.
                                </p>
                                <p class="form-text text-dark mb-1">
                                    <i class="icofont-check-circled text-success"></i> Klik tombol kirim untuk pengajuan penerbitan sertifikat.
                                </p>
                                <p class="form-text text-dark mb-1">
                                    Catatan :
                                </p>
                                <p class="form-text text-dark mb-1">
                                    <small class="text-secondary">Hanya peserta yang dinyatakan lulus, yang akan diterbitkan sertifikat.</small>
                                </p>
                                <p class="form-text text-dark mb-1">
                                    <small class="text-secondary">Proses verifikasi pengajuan sertifikat akan kami proses paling lama 2x24 jam.</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="testimoni">Testimoni Peserta</label>
                                <textarea class="form-control" name="testimoni" id="testimoni" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-dark">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        
        @endif
        @else
        <a href="#" class="btn btn-dark btn-kirim float-right">Kirim Jawaban</a>
        @endif
    </div>
</div>

@endsection

@section('page_scripts')

<!-- Sweet Alert -->
<script src="/admin-assets/js/plugins/sweetalert/sweetalert.min.js"></script>


<script>
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-kirim').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Kirim jawaban ?',
                    text: "Jawaban yang sudah anda kirim tidak dapat diganti !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Kirim',
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
                        $('#btnKirim').click();
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