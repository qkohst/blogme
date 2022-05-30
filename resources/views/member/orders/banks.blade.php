@extends('member.orders.orders-nav')


@section('pages')

<div class="card">
    <div class="card-header text-lg">
        {{$title}}
    </div>

    <div class="card-body p-3">
        <p><i class="icofont-check-circled text-success"></i> Lakukan pembayanan melalui transfer ke salah satu rekening dibawah</p>
        <p><i class="icofont-check-circled text-success"></i> Unggah bukti transfer melalui menu upload pada <a href="{{ route('orders.index') }}?pages=waiting">pesanan anda</a></p>
        <p><i class="icofont-check-circled text-success"></i> Admin kami akan melakukan verifikasi paling lambat 1 x 24 jam </p>
        <p>Silahkan hubungi <a href="#">tim support kami</a> jika terdapat kendala dalam proses pembayaran</p>
        @if($banks->count() == 0)
        <div class="text-center mb-2">bank belum tersedia</div>
        @else
        @foreach($banks as $bank)
        <div class="row">
            <div class="col-12 my-1">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                    <img class="mr-3 mb-0 d-none d-lg-block" src="/admin-assets/img/rekening_bank/{{$bank->gambar}}" alt="logo" width="100px">

                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-sm font-weight-bold">{{$bank->nama_bank}}</h6>
                        <span class="mb-2 text-xs">Nomor Rekening : <span class="text-dark font-weight-bold ms-sm-2">{{$bank->nomor_rekening}}</span></span>
                        <span class="mb-2 text-xs">Atas Nama : <span class="text-dark ms-sm-2 font-weight-bold">{{$bank->nama_pemilik}}</span></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div>

@endsection

<!-- 
PERBAIKI ACADEMY CONTROLLER INDEX 
& LANJUT DI ORDER  -->