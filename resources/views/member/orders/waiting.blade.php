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
                    <td>
                        <div class="row">
                            <div class="col-lg-2 d-none d-lg-block">
                                <img src="/admin-assets/img/academies/{{$pesanan->academies->gambar}}" class="rounded" alt="Images" height="105px">
                            </div>
                            <div class="col-lg-10">
                                <p class="my-1"><a href="{{ route('courses.show', $pesanan->academies_id) }}" title="Lihat detail kelas">{{$pesanan->academies->nama_kelas}}</a></p>
                                <p class="mt-1">{!! substr(strip_tags($pesanan->academies->deskripsi), 0, 60) !!} ...</p>

                                <a href="#" class="btn btn-dark btn-sm mr-1" title="Upload Bukti Pembayaran"><i class="icofont-upload-alt"></i> Upload</a>
                                <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus Pesanan"><i class="icofont-ui-delete"></i> Hapus</a>
                            </div>
                        </div>
                    </td>
                    <td data-title="Price"><span>Rp.{{$pesanan->academies->biaya}} </span></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @endif
    </div>

</div>

@endsection

<!-- 
PERBAIKI ACADEMY CONTROLLER INDEX 
& LANJUT DI ORDER  -->