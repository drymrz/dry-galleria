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
                @auth
                <li class="dropdown"><a style="cursor: pointer"><span>Halo , {{ auth()->user()->name }}</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/dashboard">Dashboard</a>
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item" style="padding-left:0">
                                    <a>
                                        Logout
                                    </a>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li>
                    <a class="getstarted scrollto" href="/login">Login</a>
                </li>
                @endauth

            </ul>
        </nav>
        <!-- .navbar -->
    </div>
</header>

<nav id="m-nav" class="navbar navbar-expand-lg navbar-light fixed-top shadow-transition"
    data-navbar-on-scroll="data-navbar-on-scroll" style="
      background-image: none;
      transition: background-color 0.35s ease 0s;
      border-radius: 0px 0px 10px 10px;
    ">
    <div class="container py-3">
        <a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="../">
            <img class="me-3" src="{{ url('img/logo.png') }}" height="50" /></a>
        <button id="m-navbtn" class="navbar-toggler mx-2 m-navbtn border-0" type="button" data-bs-toggle="collapse"
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
                @auth
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link scrollto active" href="/dashboard">Dashboard</a>

                </li>
                @else
                <li class="nav-item px-2 scrollto" data-anchor="data-anchor">
                    <a class="nav-link scrollto active" href="/login">Login</a>

                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>