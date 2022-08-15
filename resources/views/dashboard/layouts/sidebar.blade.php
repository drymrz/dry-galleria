<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/members*') ? 'active' : '' }}" href="/dashboard/members">
                    <span data-feather="user"></span>
                    Members
                </a>
            </li>
            @if (auth()->user()->isRole == '2')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/su/posts*') ? 'active' : '' }}"
                        href="/dashboard/su/posts">
                        <span data-feather="file-text"></span>
                        All Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/su/users*') ? 'active' : '' }}"
                        href="/dashboard/su/users">
                        <span data-feather="user"></span>
                        All Users
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
