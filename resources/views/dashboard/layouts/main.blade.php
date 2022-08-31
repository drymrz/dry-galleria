<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Belajar Laravel | Dashboard</title>

    {{-- Core CSS --}}
    <link rel="stylesheet" href="/adminview/assets/css/main/app.css">
    <link rel="stylesheet" href="/adminview/assets/css/main/app-dark.css">
    <link rel="stylesheet" href="/adminview/css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    {{-- Icon --}}
    <link rel="shortcut icon" href="/adminview/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/adminview/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="/adminview/assets/css/shared/iconly.css">

    {{-- Filepond Styles --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/adminview/css/trix.css">
    <style>
        * {
            font-family: 'Nunito' !important
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        @include('dashboard.layouts.sidebar')
        @include('dashboard.layouts.header')
        <div id="main-content">
            <div class="page-title mb-4">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ $active }}</h3>
                    </div>
                    @php
                    $fullUrl = request()->path();
                    $url = explode('/', $fullUrl);
                    @endphp
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb text-capitalize">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">{{ $url[0] }}</a>
                                </li>
                                @php
                                unset($url[0]);
                                if (sizeof($url) > 1) {
                                if (str_contains($url[2], '-')) {
                                unset($url[2]);
                                }
                                }
                                @endphp
                                @foreach ($url as $u)
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $u }}
                                </li>
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @yield('container')
            @include('dashboard.layouts.footer')
        </div>
    </div>
    </div>
    {{--Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    {{-- Filepond JS --}}
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js">
    </script>
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    {{-- Core JS --}}
    <script src="/adminview/assets/js/bootstrap.js"></script>
    <script src="/adminview/assets/js/app.js"></script>

    {{-- Trix JS --}}
    <script type="text/javascript" src="/adminview/js/trix.js"></script>

    {{-- PageJs --}}
    @yield('scripts')
</body>

</html>