@extends('academy.materi.silabus-nav')

@section('materi')

<p>Selesaikan semua soal {{$title}} dibawah ini untuk melanjutkan ke modul pembelajaran selanjutnya.</p>

@foreach($data_kuis as $kuis)
<div class="card p-4">
    {!!$kuis->soal!!}
    <div class="form-check mb-2 mr-sm-2">
        <input class="form-check-input" type="radio" id="inlineFormCheck1{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="A">
        <label class="form-check-label" for="inlineFormCheck1{{$kuis->id}}">
            {!!$kuis->jawaban_a!!}
        </label>
    </div>
    <div class="form-check mb-2 mr-sm-2">
        <input class="form-check-input" type="radio" id="inlineFormCheck2{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="B">
        <label class="form-check-label" for="inlineFormCheck2{{$kuis->id}}">
            {!!$kuis->jawaban_b!!}
        </label>
    </div>
    <div class="form-check mb-2 mr-sm-2">
        <input class="form-check-input" type="radio" id="inlineFormCheck3{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="C">
        <label class="form-check-label" for="inlineFormCheck3{{$kuis->id}}">
            {!!$kuis->jawaban_c!!}
        </label>
    </div>
    <div class="form-check mb-2 mr-sm-2">
        <input class="form-check-input" type="radio" id="inlineFormCheck4{{$kuis->id}}" name="jawaban[{{$kuis->id}}]" value="D">
        <label class="form-check-label" for="inlineFormCheck4{{$kuis->id}}">
            {!!$kuis->jawaban_d!!}
        </label>
    </div>
</div>
@endforeach

@endsection