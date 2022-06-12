@extends('member.profile.profile-nav')


@section('pages')

<div class="tab-pane fade show active" role="tabpanel">
    <p class="lead my-3">{{$title}}</p>
    {{$user->profil_users->tentang_saya}}
</div>

@endsection