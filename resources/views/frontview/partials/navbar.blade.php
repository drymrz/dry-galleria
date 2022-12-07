@php
use App\Models\Category;
@endphp

<header class="header-default">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <a class="navbar-brand" style="max-width: 90px" href="/"><img src="{{ url('img/logo.png') }}"
                    alt="logo"></a>

            <div class="collapse navbar-collapse">
                <!-- menus -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ $active === 'posts' ? 'active' : '' }}">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="##">Kategori Postingan</a>
                        <ul class="dropdown-menu">
                            @foreach(Category::limit(4)->get() as $category)
                            <li><a class="dropdown-item" href="/posts?category={{ $category->slug }}">{{
                                    $category->name }}</a></li>
                            @endforeach
                            <li><a href="/categories" class="dropdown-item">Lihat Semua Kategori</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://adrymirza.xyz" target="_blank">Tentang Saya</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="##">Halo, {{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <a>
                                            Logout
                                        </a>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item {{ $active === 'login' ? 'active' : '' }}">
                        <a class="nav-link " href="/login">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>

            <!-- header right section -->
            <div class="header-right">
                <!-- social icons -->
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item"><a href="https://www.instagram.com/adry_mirza/" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.github.com/drymrz" target="_blank"><i
                                class="fab fa-github"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/adry-mirza-b57169248/"
                            target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCtnIpuit5ApnEy3QI9by3xg"
                            target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
                <!-- header buttons -->
                <div class="header-buttons">
                    <button class="search icon-button">
                        <i class="icon-magnifier"></i>
                    </button>
                    <button class="burger-menu icon-button d-lg-none">
                        <span class="burger-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>