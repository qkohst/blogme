@extends('academy.materi.silabus-nav')
@section('materi')

<p>{{$vidio->deskripsi_vidio}}</p>
{!!$vidio->embed_vidio!!}

@endsection