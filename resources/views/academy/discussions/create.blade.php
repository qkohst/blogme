@extends('layouts.member.master')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
<!-- Select2 -->
<link rel="stylesheet" href="/admin-assets/plugins/select2/css/select2.css">
<!-- bootstrap-tagsinput -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.css"/>
<style type="text/css">
    .bootstrap-tagsinput {
        width: 100%;
    }
</style>
@endsection

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('courses.index') }}">Academy</a></li>
                    <li><a href="{{ route('courses.show', $academy->id) }}">{{$title3}}</a></li>
                    <li><a href="{{ route('discussions.index', $academy->id) }}">{{$title2}}</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Form Section ======= -->
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Header  -->
                    <div class="text-xl">
                        Buat Diskusi Akademi
                    </div>
                    <p>Anda dapat membuat diskusi Akademi Kelas {{$title3}} di sini.</p>

                    <div class="alert alert-warning" role="alert">
                        <h5 class="alert-heading">Aturan Membuat dan Menjawab Pertanyaan di Forum Diskusi Kelas</h5>
                        <p>Untuk mempermudah kami dalam membantu permasalahan Anda dan untuk menghindari duplikasi diskusi, mohon pastikan Anda telah menelusuri diskusi dengan topik yang sama yang sudah pernah dibuat sebelumnya. Pastikan juga untuk menyertakan informasi detail seperti: <b>Log, Screenshot, Kode, Pesan Error, dsb.</b></p>
                    </div>
                    <!-- End Header  -->

                    <!-- Form  -->
                    <form class="my-form" action="{{ route('discussions.store', $academy->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan</label>
                            <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan" id="pertanyaan" value="{{old('pertanyaan')}}" />
                            <small class="text-secondary">Tuliskan pertanyaan singkat Anda di sini.</small>

                            @error('pertanyaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="uraian_pertanyaan">Uraian Pertanyaan</label>
                            <textarea class="form-control summernote" name="uraian_pertanyaan" id="uraian_pertanyaan"></textarea>

                            <small class="text-secondary">Uraikan pertanyaan Anda lebih panjang dan jelas pada bagian ini. Anda dapat menambahkan potongan kode, gambar atau video untuk memperjelas pertanyaan.</small>

                            @error('uraian_pertanyaan')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="modul">Modul</label>
                            <select class="select2 form-control @error('modul') is-invalid @enderror" aria-label="Default select example" name="modul" id="modul">
                                <option value="" selected class="mb-2">-- Pilih Modul --</option>
                                @foreach($materi_silabuses as $materi)
                                <option value="{{$materi->id}}" {{ old('kategori') == $materi->id ? "selected" : "" }}>{{$materi->judul_materi}}</option>
                                @endforeach
                            </select>

                            <small class="text-secondary">Pilih modul yang sesuai dengan pertanyaan yang Anda ajukan.</small>

                            @error('modul')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="kata_kunci">Kata kunci</label>
                            <input type="text" class="form-control @error('kata_kunci') is-invalid @enderror" name="kata_kunci" data-role="tagsinput" value="{{old('kata_kunci')}}" />
                            <small class="text-secondary">Tuliskan beberapa kata kunci pertanyaan Anda di sini dengan tanda koma sebagai pemisah. Maksimal 6 kata kunci yang bisa ditambahkan.</small><br>
                            <small class="text-secondary">Contoh: <b>android, intents, material design</b></small>

                            @error('kata_kunci')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- <a href="#" class="btn btn-dark text-white btn-save">Buat Diskusi</a> -->
                        <button type="submit" class="btn btn-dark text-white btn-save">Buat Diskusi</button>

                        <a href="{{ route('discussions.index', $academy->id) }}" class="btn btn-secondary text-white">Batal</a>

                    </form>
                    <!-- End Form  -->

                </div>
            </div>

        </div>
    </section><!-- End Form Section -->

</main><!-- End #main -->
@endsection

@section('scripts')
<!-- jQuery -->
<script src="/admin-assets/js/core/bootstrap.min.js"></script>
<!-- Summernote -->
<script src="/admin-assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="/admin-assets/plugins/select2/js/select2.full.js"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
<!-- bootstrap-tagsinput -->
<script src="/member-assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

@yield('page_scripts')

@endsection