<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- google font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    {{-- bootstrap --}}
    <link href="/frontview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/frontview/css/style.css">
    <link rel="stylesheet" href="/frontview/css/custom.css">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="/frontview/vendor/boxicons-2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <title>Halaman {{ $title }} | RPL Blog </title>
    <style>
        * {
            font-family: "Poppins"
        }
    </style>
</head>

<body>

    @include('frontview.partials.navbar')
    <div class="{{ $active != 'posts' ? '' : 'container mt-5 pt-5 px-0' }}">
        <div class="{{ $active != 'posts'? '' : 'pt-5' }}">
            @yield('container')
        </div>
    </div>

    <script src="/frontview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>