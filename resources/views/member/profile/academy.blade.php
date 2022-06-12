@extends('member.profile.profile-nav')


@section('pages')

<div class="tab-pane fade show active" role="tabpanel">
    <p class="lead my-3">Kelas yang saya pelajari</p>

    <div class="row">
        @if($data_peserta->count()==0)
        <div class="col-12 text-center pt-3">
            <p class="font-weight-bold text-secondary">
                Anda belum terdaftar dalam kelas
            </p>
        </div>
        @else
        @foreach($data_peserta as $peserta)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <a href="{{ route('courses.show', $peserta->academies->id) }}">
                <div class="member">
                    <img src="/admin-assets/img/academies/{{$peserta->academies->gambar}}" alt="Img" width="100%">
                    <h4 class="text-left" title="{{$peserta->academies->nama_kelas}}">{!! substr(strip_tags($peserta->academies->nama_kelas), 0, 30) !!}</h4>

                    @if($peserta->status == 'finish')
                    <small class="float-left text-dark mr-2"><i class="icofont-check-circled"></i> Selesai</small>
                    @else
                    <small class="float-left text-dark mr-2"><i class="icofont-spinner"></i> Dipelajari</small>
                    @endif

                    <small class="float-left text-dark mr-2"><i class="icofont-chart-histogram"></i> {{$peserta->academies->level}}</small>
                    <small class="float-left text-dark mr-2"><i class="icofont-layers"></i> {{$peserta->academies->kategories->nama_kategori}}</small>
                    <p class="text-left pt-4">
                        {!! substr(strip_tags($peserta->academies->deskripsi), 0, 150) !!}...
                    </p>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>

</div>

@endsection