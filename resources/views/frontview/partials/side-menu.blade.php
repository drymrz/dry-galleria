@php
use App\Models\Category;
@endphp

<div class="canvas-menu d-flex align-items-end flex-column d-lg-none">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <div class="logo">
        <img src="{{ url('img/logo.png') }}" style="max-width: 90px" alt="logo">
    </div>

    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
            <li class="{{ $active === 'posts' ? 'active' : '' }}">
                <a href="/">Home</a>
            </li>
            <li>
                <a href="#">Kategori Postingan</a>
                <i class="icon-arrow-down switch"></i>
                <ul class="submenu">
                    @foreach(Category::limit(4)->get() as $category)
                    <li><a href="/posts?category={{ $category->slug }}">{{
                            $category->name }}</a></li>
                    @endforeach
                    <li><a href="/categories">Lihat Semua Kategori</a></li>
                </ul>
            </li>
            <li><a href="https://adrymirza.xyz" target="_blank">Tentang Saya</a></li>
            @auth
            <li>
                <a href="#">Manage Postingan</a>
                <i class="icon-arrow-down switch"></i>
                <ul class="submenu">
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" style="padding-left: 0">
                                <a>
                                    Logout
                                </a>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li class="{{ $active === 'login' ? 'active' : '' }}">
                <a href="/login">Login</a>
            </li>
            @endauth
        </ul>
    </nav>

    <!-- social icons -->
    <ul class="text-center social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item"><a href="https://www.instagram.com/adry_mirza/" target="_blank"><i
                    class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="https://www.github.com/drymrz" target="_blank"><i
                    class="fab fa-github"></i></a>
        </li>
        <li class="list-inline-item"><a href="https://www.linkedin.com/in/adry-mirza-b57169248/" target="_blank"><i
                    class="fab fa-linkedin"></i></a></li>
        <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCtnIpuit5ApnEy3QI9by3xg"
                target="_blank"><i class="fab fa-youtube"></i></a></li>
    </ul>
</div>