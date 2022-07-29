@extends('layouts.member.master')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="/admin-assets/plugins/summernote/summernote-bs4.css">
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
            <!-- Diskusi  -->
            <h4>Diskusi Akademi</h4>
            <hr>
            <div class="row">

                <!-- Questiont List  -->
                <div class="col-lg-9 col-md-12">
                    <div class="post py-2">
                        <a href="#">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="/member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                <span class="pl-2">
                                    {{$diskusi->pertanyaan}}
                                </span>
                                <p class="description">

                                    <a href="#" class="link-black text-sm mr-2">
                                        {{$diskusi->users->profil_users->nama_lengkap}} | {{$diskusi->created_at->diffForHumans()}}|
                                    </a>
                                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$diskusi->materi_silabus_id}}" class="link-black text-sm mr-2">
                                        <i class="icofont-book-alt"></i> {{ substr($diskusi->materi_silabuses->judul_materi, 0, 20) }} ...
                                    </a>
                                </p>
                            </div>
                        </a>
                        <!-- /.user-block -->

                        <p class="text-dark">
                            {!! $diskusi->uraian_pertanyaan !!}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('discussions.index', $academy->id) }}?materi={{$diskusi->materi_silabus_id}}" class="btn btn-sm btn-outline-secondary bg-light"><i class="icofont-undo"></i> Kembali</a>
                    </div>
                </div>

                <!-- Right Nav  -->
                <div class="col-lg-3 col-md-12">
                    <!-- Diskusi  -->
                    <div class="my-2">
                        <b>Diskusi</b>
                    </div>
                    <div class="mb-2">
                        <i class="icofont-speech-comments"></i> 2 Pembahasan
                    </div>

                    @if($diskusi->status == 0)
                    <div class="text-primary">
                        <i class="icofont-check-circled"></i> Selesai
                    </div>
                    @endif

                    <!-- Keyword  -->
                    <div class="my-2">
                        <b>Keyword</b>
                    </div>

                    @foreach($diskusi->kata_kunci_diskusis as $key)
                    <button type="button" class="btn btn-sm btn-secondary badge">
                        #{{$key->kata_kuncis->key}}
                    </button>
                    @endforeach

                    <!-- Action -->
                    <div class="my-2">
                        <b>Action</b>
                    </div>

                    @if($diskusi->status == 1 && Auth::user()->id == $diskusi->user_id)
                    <a href="#" class="btn btn-outline-dark bg-secondary btn-block"><i class="icofont-check-circled"></i> Tandai Dikkusi Selesai</a>
                    @endif

                    <a href="#comment" class="btn btn-outline-secondary bg-light btn-block"><i class="icofont-speech-comments"></i> Replay</a>
                    <button class="btn btn-outline-secondary bg-light btn-block" onclick="copyLink()"><i class="icofont-share"></i> Share</button>
                    <a href="{{ route('discussions.index', $academy->id) }}?materi={{$diskusi->materi_silabus_id}}" class="btn btn-outline-secondary bg-light btn-block"><i class="icofont-undo"></i> Kembali</a>
                    <input type="hidden" id="urlCopy" value="{{ Request::url() }}">
                </div>

            </div>

            <!-- Pembahasan -->
            <div class="row">

                <div class="col-12 mt-4" id="comment">
                    <div class="alert alert-light" role="alert">
                        <h6 class="alert-heading">Aturan Membuat dan Menjawab Pertanyaan di Forum Diskusi Kelas</h6>
                        <p class="text-sm">Mohon untuk menggunakan bahasa yang sopan & mudah dipahami serta berikan komentar yang konstruktif. Pastikan juga untuk menyertakan informasi detail seperti:
                            <b>Log, Screenshot, Kode, Pesan Error, dsb.</b>
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#pembahasan" data-toggle="tab"><i class="icofont-speech-comments"></i> 2 Pembahasan</a></li>
                    </ul>

                    <div class="tab-content pt-4">
                        <!-- Pembahasan -->
                        <div class="active tab-pane" id="pembahasan">

                            <form action="#" method="post" class="mb-4">
                                <div class="mb-3">
                                    <img src="/avatar/{{Auth::user()->avatar}}" alt="avatar" class="user-avatar"> {{Auth::user()->profil_users->nama_lengkap}}
                                </div>
                                <textarea class="form-control summernote" name="uraian_pertanyaan" id="uraian_pertanyaan"></textarea>

                                <button type="submit" class="btn btn-sm btn-dark ">Kirim Komentar</button>

                            </form>

                            <hr class="my-4">
                            <div class="card">
                                <div class="post px-3 py-3">
                                    <a href="#">
                                        <div class="user-block">
                                            <div class="row">
                                                <div class="col-10">
                                                    <img class="img-circle img-bordered-sm" src="/member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-3">
                                                        Jonathan Burke Jr.
                                                    </span>
                                                    <span class="description pl-1">
                                                        <i class="icofont-clock-time"></i> 7:30 PM today
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="badge badge-info float-right"><i class="icofont-check-circled"></i> Jawaban Terilih</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- /.user-block -->

                                    <p class="text-dark">
                                        Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                    </p>

                                    <p class="mb-2">
                                        <a href="#" class="link-black text-sm mr-2"><i class="icofont-like"></i> 0 Suka</a>
                                        <a href="#" class="link-black text-sm"><i class="icofont-check-circled"></i> Tandai Sebagai Jawaban Terpilih</a>
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="post px-3 py-3">
                                    <a href="#">
                                        <div class="user-block">
                                            <div class="row">
                                                <div class="col-10">
                                                    <img class="img-circle img-bordered-sm" src="/member-assets/img/testimonials/testimonials-1.jpg" alt="user image">
                                                    <span class="pl-3">
                                                        Jonathan Burke Jr.
                                                    </span>
                                                    <span class="description pl-1">
                                                        <i class="icofont-clock-time"></i> 7:30 PM today
                                                    </span>
                                                </div>
                                                <div class="col-2">
                                                    <span class="badge badge-info float-right"><i class="icofont-check-circled"></i> Jawaban Terilih</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- /.user-block -->

                                    <p class="text-dark">
                                        Saya sedang membuat tugas untuk membauat web sederhana menggunakan laravel tetapi ketika di akses mengalamai error serperti ini.
                                    </p>

                                    <p class="mb-2">
                                        <a href="#" class="link-black text-sm mr-2"><i class="icofont-like"></i> 0 Suka</a>
                                        <a href="#" class="link-black text-sm"><i class="icofont-check-circled"></i> Tandai Sebagai Jawaban Terpilih</a>
                                    </p>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="#">Read More <i class="icofont-rounded-down"></i></a>
                            </div>
                        </div>
                        <!-- End Pembahasan -->
                    </div>
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
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })

    function copyLink() {
        /* Save value of myText to input variable */
        var input = document.getElementById("urlCopy").value;

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(input);

        alert("URL telah disalin !! ");
    }
</script>

@yield('page_scripts')

@endsection