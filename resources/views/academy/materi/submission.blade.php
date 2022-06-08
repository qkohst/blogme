@extends('academy.materi.silabus-nav')
@section('materi')
<div class="card">
    <div class="card-body p-4">
        {!!$submission->isi_materi!!}
        <div class="card cta bg-gradient-secondary py-4">
            @if(is_null($jawab_submission))
            <div class="text-center">
                <h3>Kirim Submission</h3>
                <p>Kirim Submission untuk menyelesaikan Tutorial ini</p>
                <a class="cta-btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalSubmission">Kirim Submission</a>
            </div>
            @elseif($jawab_submission->status == 'waiting')
            <div class="text-center">
                <h3>Kirim Submission</h3>
                <p>Submission anda sedang dalam antrian verifikasi oleh tim kami, tim kami akan melakukan verifikasi maksimal 2x24 Jam.</p>
                <a class="cta-btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalDetail">Detail Submission</a>
            </div>
            @elseif($jawab_submission->status == 'rejected')
            <div class="text-center">
                <h3>Kirim Submission</h3>
                <p>{{$jawab_submission->catatan_verifikasi}}</p>
                <a class="cta-btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalKirimUlang">Kirim Ulang Submission</a>
            </div>
            @elseif($jawab_submission->status == 'approved')
            <div class="text-center">
                <h3>Selamat !</h3>
                <p>Submission anda telah disetujui. Klik tombol dibawah untuk melihat nilai anda.</p>
                <a class="cta-btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalApproved">Lihat Detail</a>
            </div>
            @endif
        </div>

        @if(is_null($jawab_submission))
        <!-- Modal Submission -->
        <div class="modal fade" id="modalSubmission" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Kirim Submission
                    </div>
                    <form action="{{ route('modul.kirim_submission') }}" method="post">
                        @csrf
                        <input type="hidden" name="peserta_academy_id" value="{{$peserta->id}}">
                        <input type="hidden" name="submission_materi_id" value="{{$submission->id}}">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="link_jawaban">Link Submission</label>
                                <input type="url" pattern="https://.*" placeholder="https://.*" class="form-control" id="link_jawaban" name="link_jawaban" required />
                                <small class="form-text text-dark">Silahkan paste link <i>(google drive/github/gitlab/youtube/lainnya)</i> dari submission anda, kemudian klik tombol kirim.</small>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Submission <small>(Opsional)</small></label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"></textarea>
                                <small class="text-secondary">Deskripsi tambahan tentang submission anda, jika diperlukan.</small>
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
        @elseif($jawab_submission->status == 'waiting')
        <!-- Modal Detail -->
        <div class="modal fade" id="modalDetail" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Detail Submission
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Link Submission</label>
                            <p><a href="{{$jawab_submission->link_jawaban}}" target="_black">{{$jawab_submission->link_jawaban}}</a></p>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <p>{{$jawab_submission->updated_at}}</p>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Submission</label>
                            <p>{{!empty($jawab_submission->deskripsi) ? $jawab_submission->deskripsi:'-'}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @elseif($jawab_submission->status == 'rejected')
        <!-- Modal KirimUlang -->
        <div class="modal fade" id="modalKirimUlang" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Kirim Ulang Submission
                    </div>
                    <form action="{{ route('modul.kirim_ulang_submission') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$jawab_submission->id}}">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="link_jawaban">Link Submission</label>
                                <input type="url" pattern="https://.*" placeholder="https://.*" class="form-control" id="link_jawaban" name="link_jawaban" value="{{$jawab_submission->link_jawaban}}" required />
                                <small class="form-text text-dark">Silahkan paste link <i>(google drive/github/gitlab/youtube/lainnya)</i> dari submission anda, kemudian klik tombol kirim.</small>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Submission <small>(Opsional)</small></label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4">{{$jawab_submission->deskripsi}}</textarea>
                                <small class="text-secondary">Deskripsi tambahan tentang submission anda, jika diperlukan.</small>
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
        @elseif($jawab_submission->status == 'approved')
        <!-- Modal Approved -->
        <div class="modal fade" id="modalApproved" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Detail Nilai Submission
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Link Submission</label>
                            <p><a href="{{$jawab_submission->link_jawaban}}" target="_black">{{$jawab_submission->link_jawaban}}</a></p>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Submission</label>
                            <p>{{!empty($jawab_submission->deskripsi) ? $jawab_submission->deskripsi:'-'}}</p>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label>Diverifikasi Pada</label>
                            <p>{{$jawab_submission->updated_at}}</p>
                        </div>
                        <div class="form-group">
                            <label>Nilai Anda</label>
                            <p><b>{{$jawab_submission->poin}}</b></p>
                        </div>
                        <div class="form-group">
                            <label>Catatan Verifikasi</label>
                            <p>{{$jawab_submission->catatan_verifikasi}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
    <div class="card-footer">
        @if($previous != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$previous}}" class="btn btn-outline-dark"><i class="icofont-simple-left"></i> Sebelumnya</a>
        @endif

        @if($jawab_submission != null && $jawab_submission->status == 'approved')

        @if($next != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$next}}&from={{$materi->id}}" class="btn btn-dark float-right">Selanjutnya <i class="icofont-simple-right"></i></a>
        @else
        <a href="{{ route('courses.show', $academy->id) }}" class="btn btn-dark float-right"><i class="icofont-home"></i> Ke Beranda Kelas</a>
        @endif

        @endif
    </div>
</div>

@endsection

@section('page_scripts')
<!-- bootstrap -->
<script src="/admin-assets/js/core/bootstrap.min.js"></script>
@endsection