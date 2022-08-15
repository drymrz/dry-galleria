{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Belajar Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back , {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"> <i
                                        class="bi bi-layout-text-sidebar-reverse"></i> My
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="../" class="logo"><img src="{{ url('img/logo.png') }}" alt="" class="img-fluid" /></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link scrollto" href="{{ $active === 'home' ? '#hero' : '../' }}">Beranda</a>
                </li>
                <li><a class="nav-link scrollto" href="../#about">Tentang</a></li>
                <li><a class="nav-link scrollto" href="../#team">Anggota Kelas</a></li>
                <li>
                    <a class="nav-link scrollto  {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Postingan</a>
                </li>
                <li>
                    {{-- <a class="nav-link scrollto" href="#portfolio">Hasil Karya</a> --}}
                </li>
                <li><a class="getstarted scrollto" href="/login">Login</a>
                </li>

            </ul>
        </nav>
        <!-- .navbar -->
    </div>
</header>

<nav id="m-nav" class="navbar navbar-expand-lg navbar-light fixed-top shadow-transition"
    data-navbar-on-scroll="data-navbar-on-scroll"
    style="
      background-image: none;
      transition: background-color 0.35s ease 0s;
      background-color: rgba(255, 255, 255, 0);
    ">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.html">
            <img class="me-3" src="{{ url('img/logo.png') }}" height="50" /></a>
        <button id="m-navbtn" class="navbar-toggler mx-2 m-navbtn" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse border-top border-lg-0 mt-4 mt-lg-0 collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto pt-2 pt-lg-0 font-base">
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link fw-medium" aria-current="page"
                        href="{{ $active === 'home' ? '#hero' : '../' }}">Beranda</a>
                </li>
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link" href="../#about">Tentang</a>
                </li>
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link" href="../#team">Anggota Kelas</a>
                </li>
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link" href="/posts">Postingan </a>
                </li>
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link scrollto active" href="/login">Login</a>

                </li>
            </ul>
        </div>
    </div>
</nav>
