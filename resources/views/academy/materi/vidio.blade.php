@extends('academy.materi.silabus-nav')
@section('materi')
<div class="card">
    <div class="card-body p-4">
        <p>{{$vidio->deskripsi_vidio}}</p>
        {!!$vidio->embed_vidio!!}
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