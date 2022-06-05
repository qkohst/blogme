<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="/"><img src="/member-assets/img/logo.png" alt="" class="img-fluid"> qkohst</a></h1>

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

                @if (Auth::check())

                <li class="drop-down"><a href=""><span class="total-count d-none d-lg-block">{{$data_notifikasi->count()}}</span><i class="icofont-alarm"></i> Notifikasi</a>
                    <ul>
                        @if($data_notifikasi->count() == 0)
                        <li>
                            <div class="text-center text-sm">Belum ada data</div>
                        </li>
                        @else
                        @foreach($data_notifikasi as $notifikasi)
                        <li>
                            <a href="{{$notifikasi->url}}">
                                <div class="d-flex py-1">
                                    @if(!is_null($notifikasi->from_user_id))
                                    <div class="my-auto">
                                        <img src="/avatar/{{$notifikasi->from_users->avatar}}" class="notiv-avatar avatar-sm  mr-3 ">
                                    </div>
                                    @endif
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{$notifikasi->judul}}</span>
                                            @if(!is_null($notifikasi->from_user_id))
                                            dari {{$notifikasi->from_users->username}}
                                            @endif
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="icofont-clock-time me-1"></i>
                                            {{$notifikasi->created_at->diffForHumans()}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </li>

                <li class="drop-down"><a href=""><i class="icofont-user"></i> {{Auth::user()->username}}</a>
                    <ul>
                        <li>
                            <a href="{{ route('profile.index') }}">
                                <img src="/avatar/{{Auth::user()->avatar}}" alt="avatar" class="user-avatar"> {{Auth::user()->email}}
                            </a>
                        </li>

                        <hr class="mt-1 mb-0">
                        <li><a href="{{ route('profile.index') }}"><i class="icofont-user"></i> Profil Saya</a></li>
                        <li class="drop-down"><a href="#"><i class="icofont-external"></i> Program Saya</a>
                            <ul>
                                <li><a href="#"><i class="icofont-learn"></i> Academy</a></li>
                                <li><a href="#"><i class="icofont-workers-group"></i> Forum Q&A</a></li>
                                <li><a href="#"><i class="icofont-world"></i> Blog</a></li>
                                <li><a href="#"><i class="icofont-search-job"></i> Job</a></li>
                                <li><a href="#"><i class="icofont-license"></i> Event</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('orders.index') }}?pages=waiting"><i class="icofont-shopping-cart"></i> Pesanan Saya</a></li>
                        <li><a href="{{ route('settings.index') }}?pages=profile"><i class="icofont-ui-settings"></i> Pengaturan</a></li>

                        <hr class="mt-1 mb-1">
                        <li><a href="{{ route('logout') }}" class="text-danger"><i class="icofont-logout"></i> Keluar</a></li>
                    </ul>
                </li>

                @else
                <li><a href="{{ route('login') }}">Masuk</a></li>
                @endif
            </ul>
        </nav>
        <!-- .nav-menu -->

        @if (is_null(Auth::user()))
        <a href="{{ route('register') }}" class="get-started-btn scrollto">Daftar</a>
        @endif
    </div>
</header>
<!-- End Header -->