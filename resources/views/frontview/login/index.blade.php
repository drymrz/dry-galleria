@extends('frontview.layouts.main')

@section('container')
<div class="container">

    <div class="row vh-100 align-content-center justify-content-center">
        <div style="max-width: 375px">
            <main class="form-signin">
                <p class="h4 mb-3 text-center " style="font-weight:600">Login</p>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('logout'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ session('logout') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session()->has('login'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('login') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <hr class="mb-4">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating mb-4">
                        <input type="username" name="username"
                            class="form-control @error('username') is-invalid @enderror" id="username"
                            placeholder="Username" autofocus required>
                        <label for="username">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" style="height: 53px; font-size: 14px; font-weight:600"
                        type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-5">Belum punya akun? <a href="/register"> Buat akun disini
                        !</a></small>
                <p class="mt-5 mb-3 text-muted text-center"> <small>&copy; Adry Mirza - 2022</small></p>
            </main>
        </div>
    </div>
</div>
@endsection