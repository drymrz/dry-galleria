<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Laravel | Dashboard</title>
    <link rel="stylesheet" href="/adminview/assets/css/main/app.css">
    <link rel="stylesheet" href="/adminview/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="/adminview/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/adminview/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="/adminview/assets/css/shared/iconly.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    {{-- filepond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/adminview/css/trix.css">
    <style>
        .filepond--warning {
            position: absolute;
            background: #f7bdbd;
            color: #000;
            border-radius: 999em;
            font-size: .875em;
            margin-top: 1em;
            display: inline-block;
            padding: .25em 1em;
            opacity: 0;
            white-space: nowrap;
            transform: translateY(1em) translateX(-50%);
            transition: opacity .15s ease-out, transform .5s ease-out
        }

        .filepond--warning[data-state=visible] {
            opacity: 1;
            transform: translateY(0) translateX(-50%)
        }
    </style>
</head>

<body>

    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div class="page-heading">
            <h3>{{$active}}</h3>
        </div>
        @yield('container')
        @include('dashboard.layouts.footer')
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="/adminview/assets/js/bootstrap.js"></script>
    <script src="/adminview/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->

    {{-- trix --}}
    <script type="text/javascript" src="/adminview/js/trix.js"></script>
    @yield('scripts')
</body>

</html>