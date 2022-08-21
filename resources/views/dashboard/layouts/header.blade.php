<header class="navbar sticky-top flex-md-nowrap p-0 bg-primary justify-content-lg-end" id="main" style="height: 75px">
    {{-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard/">Belajar Laravel</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">
                    <span data-feather="log-out"></span>
                    Logout
                </button>
            </form>
        </div>
    </div> --}}
    <a href="#" class="burger-btn d-block d-xl-none ms-4" style="color: #fff">
        <i class="bi bi-justify fs-3"></i>
    </a>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Primary
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Option 1</a>
            <a class="dropdown-item" href="#">Option 2</a>
            <a class="dropdown-item" href="#">Option 3</a>
        </div>
    </div>
    {{-- <div class="dropdown mx-5">
        <a class="nav-link nav-link-lg dropdown-toggle" data-bs-toggle="dropdown" style="color: #fff">
            <div class="avatar avatar">
                <img src="/adminview/assets/images/faces/1.jpg" alt="Face 1">
            </div>
            <div class="d-md-inline-block d-none">
                Halo, {{ auth()->user()->username }}
            </div>
        </a>
        <div class="dropdown-menu">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div> --}}
</header>