<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="/vendor/boxicons-2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <title>Belajar Laravel | Halaman {{ $title }} </title>
    <style>
        * {
            font-family: "Poppins"
        }
    </style>
</head>

<body>

    @include('partials.navbar')
    <div class="{{ $active === 'home' ? '' : 'container mt-5' }}">
        <div class="{{ $active === 'home' ? '' : 'pt-5' }}">
            @yield('container')
        </div>
    </div>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
</body>

</html>
