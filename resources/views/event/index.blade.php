@extends('layouts.member.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$title}}</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{$title}}</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="/member-assets/img/about.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>Kembangkan Jaringan
                        dan Belajar dari Developer Terbaik</h3>
                    <p>
                        Tingkatkan kemampuan teknis sekaligus membuka jaringan dengan
                        developer terbaik melalui seminar atau workshop yang diselenggarakan
                        oleh partner Dicoding.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Academy Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <span>Daftar Events</span>
                <h2>Daftar Events</h2>
                <p>Simak Event mana saja yang sukses diselenggarakan. Acara-acara ini punya reputasi networking yang luas, follow-up action yang positif, dan tentunya sesak dihadiri lebih dari 100 persen target peserta. Penasaran?</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">QA Tester</h4>
                            <small class="float-left badge bg-light ">Seminar</small><br>

                            <small class="float-left text-secondary">oleh: PT. Aditya Inovasi Makmur</small>
                            <span class="float-right">2 hari lagi</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">Devops Engineer</h4>
                            <small class="float-left badge bg-light ">Workshop</small><br>

                            <small class="float-left text-secondary">oleh: NBS (PT Kode Aplikasi Indonesia)</small>
                            <span class="float-right">Selesai</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <a href="">
                        <div class="member">
                            <img src="member-assets/img/about.png" alt="">
                            <h4 class="text-left">Junior Backend Developer</h4>
                            <small class="float-left badge bg-light ">Seminar</small><br>

                            <small class="float-left text-secondary">oleh: PT. Aditya Inovasi Makmur</small>
                            <span class="float-right">2 hari lagi</span>

                            <p class="text-left pt-4">
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>

                        </div>
                    </a>
                </div>

            </div>

            <div class="text-center pt-2">
                <a href="#">Lihat Event Lainnya <i class="icofont-rounded-down"></i></a>
            </div>
        </div>
    </section>
    <!-- End Academy Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="section-title">
                <span>Testimoni</span>
                <h2>Testimoni</h2>
                <p>Berikut adalah testimoni yang telah hadir di beberapa Dicoding Event.</p>
            </div>

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/member-assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/member-assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/member-assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/member-assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                </div>

                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="/member-assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
@endsection