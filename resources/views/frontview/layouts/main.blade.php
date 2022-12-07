<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/frontview/katen/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/frontview/katen/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/frontview/katen/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="/frontview/katen/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="/frontview/katen/style.css" type="text/css" media="all">

    <title>Halaman {{ $title }} | RPL Blog </title>
</head>

<body>

    @include('frontview.partials.navbar')
    @if ($active == "posts" && $title != 'Semua Postingan' && $title !='Post')
    <section class="page-header mb-4">
        <div class="container-xl">
            <div class="text-center">
                @if (request('search'))
                <h1 class="mt-0 mb-2 " style="font-size: 26px">Menampilkan hasil pencarian "{{ request('search') }}"
                </h1>
                @else
                <h1 class="mt-0 mb-2" style="font-size: 26px">{{ $title }}</h1>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item d-none d-lg-block"><a href="/">Beranda</a></li>
                        @if (request('search'))
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Search
                        </li>
                        @endif
                        @if (request('category'))
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ request('category') }}
                        </li>
                        @endif
                        @if (request('author'))
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ ltrim($title,"Semua
                            Postingan oleh"); }}
                        </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    @endif

    @if($active == "categories")
    <section class="page-header mb-4">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2" style="font-size: 26px">Semua Kategori</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item d-none d-lg-block"><a href="/">Beranda</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Kategori
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    @endif

    <div class="{{ $active != 'posts' ? '' : 'container px-0' }}">
        <div class="{{ $active != 'posts'? '' : 'pt-3' }}">
            @yield('container')
        </div>
    </div>
    @include('frontview.partials.search')
    @include('frontview.partials.side-menu')
    @include('frontview.partials.footer')
    <script>
        function returnTop(){
            document.body.scrollTop = 0; 
            document.documentElement.scrollTop = 0; 
        }
    </script>

    <script src="/frontview/katen/jquery.min.js"></script>
    <script src="/frontview/katen/popper.min.js"></script>
    <script src="/frontview/katen/bootstrap.min.js"></script>
    <script src="/frontview/katen/slick.min.js"></script>
    <script src="/frontview/katen/jquery.sticky-sidebar.min.js"></script>
    <script src="/frontview/katen/custom.js"></script>
</body>

</html>