<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="/"><img src="/member-assets/img/logo.png" alt="" class="img-fluid"> qkohst</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="member-assets/img/logo.png" alt="" class="img-fluid"></a> -->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ Route::is('home') ? 'active' : '' }}"><a href="/#hero">Home</a></li>
                <li class="drop-down"><a href="">Tentang</a>
                    <ul>
                        <li><a href="/#about">Tentang Kami</a></li>
                        <li><a href="/#team">Tim Kami</a></li>
                        <li><a href="/#faq">FAQ</a></li>
                        <li><a href="/#contact">Contact</a></li>
                    </ul>
                </li>
                <li class="drop-down"><a href="">Program</a>
                    <ul>
                        <li class="{{ Route::is('academy') ? 'active' : '' }}"><a href="{{ route('academy') }}">Academy</a></li>
                        <li class="{{ Route::is('forum-qa') ? 'active' : '' }}"><a href="{{ route('forum-qa') }}">Forum Q&A</a></li>
                        <li class="{{ Route::is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="{{ Route::is('job') ? 'active' : '' }}"><a href="{{ route('job') }}">Job</a></li>
                    </ul>
                </li>
                <li class="{{ Route::is('event') ? 'active' : '' }}"><a href="{{ route('event') }}">Event</a></li>
                <li class="{{ Route::is('partnership') ? 'active' : '' }}"><a href="{{ route('partnership') }}">Partnership</a></li>

                <li><a href="{{ route('login') }}">Masuk</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        <a href="{{ route('register') }}" class="get-started-btn scrollto">Daftar</a>

    </div>
</header>
<!-- End Header -->