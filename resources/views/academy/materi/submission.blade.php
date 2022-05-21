@extends('academy.materi.silabus-nav')
@section('materi')

{!!$submission->isi_materi!!}
<div class="card cta py-4">
    <div class="text-center">
        <h3>Kirim Submission</h3>
        <p>Kirim Submission untuk menyelesaikan Tutorial ini</p>
        <a class="cta-btn" href="#"><i class="icofont-code-alt"></i> Kirim Submission</a>
    </div>
</div>

@endsection