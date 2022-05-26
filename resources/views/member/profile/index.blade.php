@extends('layouts.member.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('profile.index') }}">Member</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-2">
                    <img src="/avatar/{{$user->avatar}}" class="rounded" alt="Images" height="250">
                </div>
                <div class="col-lg-9 pt-lg-0 content">
                    <h3>{{$user->username}}</h3>
                    <p><i class="icofont-email"></i> {{$user->email}}</p>
                    <p><i class="icofont-location-pin"></i> {{$data_pribadi->kota_domisili}}</p>
                    <p>Bergabung sejak : {{date('d M Y', strtotime($user->created_at))}}</p>

                    <div class="d-flex">
                        <a href="{{ route('settings.index') }}?pages=profile" class="btn-get-started scrollto"><i class="icofont-ui-settings"></i> Pengaturan</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts mb-0">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1</span>
                    <p>Kelas Dipelajari</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p>Blog Ditulis</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Job Dicari</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">15</span>
                    <p>Event Dihadiri</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <section id="program" class="mt-0 pt-0">
        <div class="container">
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-tentang-saya-tab" data-toggle="pill" href="#custom-content-above-tentang-saya" role="tab" aria-controls="custom-content-above-tentang-saya" aria-selected="true">Tentang Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-academy-tab" data-toggle="pill" href="#custom-content-above-academy" role="tab" aria-controls="custom-content-above-academy" aria-selected="false">Academy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-blog-tab" data-toggle="pill" href="#custom-content-above-blog" role="tab" aria-controls="custom-content-above-blog" aria-selected="false">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-job-tab" data-toggle="pill" href="#custom-content-above-job" role="tab" aria-controls="custom-content-above-job" aria-selected="false">Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-event-tab" data-toggle="pill" href="#custom-content-above-event" role="tab" aria-controls="custom-content-above-event" aria-selected="false">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-forum-qa-tab" data-toggle="pill" href="#custom-content-above-forum-qa" role="tab" aria-controls="custom-content-above-forum-qa" aria-selected="false">Forum Q&A</a>
                </li>
            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">

                <div class="tab-pane fade show active" id="custom-content-above-tentang-saya" role="tabpanel" aria-labelledby="custom-content-above-tentang-saya-tab">
                    <p class="lead my-3">Tentang Saya</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

                <div class="tab-pane fade" id="custom-content-above-academy" role="tabpanel" aria-labelledby="custom-content-above-academy-tab">
                    <p class="lead my-3">Kelas Yang Dipelajari</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

                <div class="tab-pane fade" id="custom-content-above-blog" role="tabpanel" aria-labelledby="custom-content-above-blog-tab">
                    <p class="lead my-3">Blog Ditulis</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

                <div class="tab-pane fade" id="custom-content-above-job" role="tabpanel" aria-labelledby="custom-content-above-job-tab">
                    <p class="lead my-3">Job Yang Sesuai</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

                <div class="tab-pane fade" id="custom-content-above-event" role="tabpanel" aria-labelledby="custom-content-above-event-tab">
                    <p class="lead my-3">Event Yang Diikuti</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

                <div class="tab-pane fade" id="custom-content-above-forum-qa" role="tabpanel" aria-labelledby="custom-content-above-forum-qa-tab">
                    <p class="lead my-3">Forum Q&A</p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection