 <!-- Navbar -->
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
     <div class="container-fluid py-1 px-3">
         <!-- breadcrumb -->
         @yield('breadcrumb')
         <!-- end breadcrumb -->

         <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
             <div class="ms-md-auto pe-md-3 d-flex align-items-center">

             </div>
             <ul class="navbar-nav  justify-content-end">
                 <li class="nav-item d-xl-none pe-3 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                         <div class="sidenav-toggler-inner">
                             <i class="sidenav-toggler-line bg-white"></i>
                             <i class="sidenav-toggler-line bg-white"></i>
                             <i class="sidenav-toggler-line bg-white"></i>
                         </div>
                     </a>
                 </li>

                 <li class="nav-item dropdown pe-3 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="icofont-user me-sm-1"></i>
                         <span class="d-sm-inline d-none">{{Auth::user()->username}}</span>
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                         <li>
                             <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                 Profile
                             </a>
                             <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                 Change Password
                             </a>
                             <a class="dropdown-item border-radius-md" href="{{ route('logout') }}">
                                 Logout
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item dropdown pe-3 me-1 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="icofont-alarm cursor-pointer"></i><span class="total-count">{{$data_notifikasi->count()}}</span>
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                         @if($data_notifikasi->count() == 0)
                         <div class="text-center">Belum ada data</div>
                         @else
                         @foreach($data_notifikasi as $notifikasi)
                         <li>
                             <a class="dropdown-item border-radius-md" href="{{$notifikasi->url}}">
                                 <div class="d-flex py-1">
                                     <div class="my-auto">
                                         <img src="/avatar/{{$notifikasi->users->avatar}}" class="avatar avatar-sm  me-3 ">
                                     </div>
                                     <div class="d-flex flex-column justify-content-center">
                                         <h6 class="text-sm font-weight-normal mb-1">
                                             <span class="font-weight-bold">{{$notifikasi->judul}}</span> dari {{$notifikasi->users->username}}
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
             </ul>
         </div>
     </div>
 </nav>
 <!-- End Navbar -->