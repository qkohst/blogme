@extends('layouts.member.master')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Jadilah Bagian dari Komunitas IT Terbesar di Indonesia</h1>
        <h2>Ikutan diskusi forum tanya jawab, tulis blog dan Membangun portofolio semua di Qkoh St</h2>
        <div class="d-flex">
          <a href="#about" class="btn-get-started scrollto">Daftar Akun</a>
          <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Mulai Belajar <i class="icofont-readernaut"></i></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="member-assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">232</span>
          <p>Member</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">521</span>
          <p>Blog Ditulis</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">1,463</span>
          <p>Job</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-toggle="counter-up">15</span>
          <p>Event</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <img src="member-assets/img/about.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h3>Tentang Kami</h3>
          <p>
            Kotakode merupakan platform komunitas bagi para pegiat IT di Indonesia dimana programmer dapat belajar dan berbagi wawasan seputar dunia IT terkini untuk mendukung memberikan pertumbuhan perekonomian di Indonesia.
          </p>
          <ul>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda</li>
          </ul>
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container">

      <div class="text-center">
        <h3>Gabung Komunitas Telegram Kami</h3>
        <p>Qkoh St berkolaborasi dengan berbagai pioneer yang inovatif untuk bersama mencapai tujuan yang besar</p>
        <a class="cta-btn" href="{{session()->get('link_telegram')}}" target="_black"><i class="bx bxl-telegram"></i> Gabung Telegram</a>
      </div>

    </div>
  </section><!-- End Cta Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <span>Tim Kami</span>
        <h2>Tim Kami</h2>
        <p>Didukung oleh tim yang profesional di bidangnya.</p>
      </div>

      <div class="row">
        @foreach($teams as $team)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="/admin-assets/img/teams/{{$team->foto_profil}}" alt="team image">
            <h4>{{$team->nama_lengkap}}</h4>
            <span>{{$team->posisi}}</span>
            <p>
              {{$team->deskripsi}}
            </p>
            <div class="social">
              <a href="{{$team->twitter}}" target="_black"><i class="icofont-twitter"></i></a>
              <a href="{{$team->facebook}}" target="_black"><i class="icofont-facebook"></i></a>
              <a href="{{$team->instagram}}" target="_black"><i class="icofont-instagram"></i></a>
              <a href="{{$team->linkedin}}" target="_black"><i class="icofont-linkedin"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq section-bg">
    <div class="container">

      <div class="section-title">
        <span>Frequently Asked Questions</span>
        <h2>Frequently Asked Questions</h2>
      </div>

      <ul class="faq-list">

        <?php $no = 0; ?>
        @foreach($faqs as $faq)
        <?php $no++; ?>
        @if($no == 1)
        <li data-aos="fade-up">
          <a data-toggle="collapse" class="" href="#faq{{$no}}">{{$faq->pertanyaan}} <i class="icofont-simple-up"></i></a>
          <div id="faq{{$no}}" class="collapse show" data-parent=".faq-list">
            <p>
              {{$faq->jawaban}}
            </p>
          </div>
        </li>
        @else
        <li data-aos="fade-up" data-aos-delay="{{$no}}">
          <a data-toggle="collapse" href="#faq{{$no}}" class="collapsed">{{$faq->pertanyaan}} <i class="icofont-simple-up"></i></a>
          <div id="faq{{$no}}" class="collapse" data-parent=".faq-list">
            <p>
              {{$faq->jawaban}}
            </p>
          </div>
        </li>
        @endif
        @endforeach

      </ul>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <span>Contact</span>
        <h2>Contact</h2>
        <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
      </div>

      <div class="row">

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Alamat:</h4>
              <p>{{$contact->alamat}}</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>{{$contact->email}}</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Telpon:</h4>
              <p>{{$contact->nomor_telpon}}</p>
            </div>
            {!!$contact->embed_google_maps!!}
          </div>

        </div>

        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="name">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection