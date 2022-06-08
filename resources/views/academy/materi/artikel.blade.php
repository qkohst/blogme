@extends('academy.materi.silabus-nav')
@section('materi')
<div class="card">
    <div class="card-body p-4">
        {!!$artikel->isi_materi!!}
    </div>
    <div class="card-footer">
        @if($previous != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$previous}}" class="btn btn-outline-dark"><i class="icofont-simple-left"></i> Sebelumnya</a>
        @endif
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
    </div>
</div>
@endsection