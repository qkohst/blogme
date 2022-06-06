@extends('academy.materi.silabus-nav')
@section('materi')
<div class="card">
    <div class="card-body p-4">
        {!!$submission->isi_materi!!}
        <div class="card cta bg-gradient-secondary py-4">
            <div class="text-center">
                <h3>Kirim Submission</h3>
                <p>Kirim Submission untuk menyelesaikan Tutorial ini</p>
                <a class="cta-btn btn-dark" href="#" data-bs-toggle="modal" data-bs-target="#modalSubmission"><i class="icofont-code-alt"></i> Kirim Submission</a>
            </div>
        </div>

        <!-- Modal Submission -->
        <div class="modal fade" id="modalSubmission" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        Kirim Submission
                    </div>
                    <form action="#" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="link_submission">Link Submission</label>
                                <input type="url" pattern="https://.*" placeholder="https://.*" class="form-control" name="link_submission" id="link_submission" value="" />
                                <small class="form-text text-dark">Silahkan paste link <i>(google drive/github/gitlab/youtube/lainnya)</i> dari submission anda, kemudian klik tombol kirim.</small>
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

    </div>
    <div class="card-footer">
        @if($previous != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$previous}}" class="btn btn-outline-dark"><i class="icofont-simple-left"></i> Sebelumnya</a>
        @endif
        @if($next != null)
        <a href="{{ route('modul.index', $academy->id) }}?materi={{$next}}&from={{$materi->id}}" class="btn btn-dark float-right">Selanjutnya <i class="icofont-simple-right"></i></a>
        @else
        <a href="{{ route('courses.show', $academy->id) }}" class="btn btn-dark float-right"><i class="icofont-home"></i> Kembali Ke Beranda Kelas</a>
        @endif
    </div>
</div>

@endsection

@section('page_scripts')
<!-- bootstrap -->
<script src="/admin-assets/js/core/bootstrap.min.js"></script>
@endsection