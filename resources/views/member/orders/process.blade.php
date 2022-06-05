@extends('member.orders.orders-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>

    <div class="card-body p-3">
        @if($pesanan_kelas->count() == 0)
        <div class="text-center mb-2">Pesanan belum tersedia</div>
        @else
        <table class="table">
            <thead>
                <tr class="main-hading">
                    <th>DETAIL PESANAN</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan_kelas as $pesanan)
                <tr>
                    <td class="me-1">
                        <div class="row">
                            <div class="col-lg-2 d-none d-lg-block">
                                <img src="/admin-assets/img/academies/{{$pesanan->academies->gambar}}" class="rounded" alt="Images" height="90px">
                            </div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-1"><a href="{{ route('courses.show', $pesanan->academy_id) }}" title="Lihat detail kelas">{{$pesanan->academies->nama_kelas}}</a></p>
                                        <small class="float-left text-dark mr-2"><i class="icofont-clock-time"></i> {{round($pesanan->academies->silabus_academies->sum('waktu_belajar')/60)}} Jam Belajar</small>
                                        <small class="float-left text-dark mr-2"><i class="icofont-chart-histogram"></i> {{$pesanan->academies->level}}</small>
                                        <small class="float-left text-dark mr-2"><i class="icofont-layers"></i> {{$pesanan->academies->kategories->nama_kategori}}</small>
                                        <small class="float-left text-dark mr-2"> Diupload : {{$pesanan->updated_at->diffForHumans()}}</small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-2">
                                        <p class="text-sm text-dark">Admin kami akan melakukan verifikasi paling lambat 1 x 24 jam</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>
                    <td data-title="Price"><span>Rp.{{$pesanan->academies->biaya}} </span>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @endif
    </div>

</div>

@endsection