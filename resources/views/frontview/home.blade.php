@extends('frontview.layouts.main')

@section('container')
<section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
        <h1>Selamat Datang !</h1>
        <h2>Kelas Bertalenta, Penuh Drama dan juga Cerita</h2>
        <a href="#about" class="btn-get-started scrollto">Tentang Kami</a>
        <img src="{{ url('/img/hero-img.png') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in"
            data-aos-delay="150" />
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about bg-stisla">
        <div class="container">
            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                        <h3>Rekayasa Perangkat Lunak 3 Angkatan 2 <br> SMKN 7 Batam</h3>
                        <p>
                            Rekayasa Perangkat Lunak adalah salah satu jurusan yang
                            mempelajari tentang pengembangan perangkat-perangkat lunak
                            termasuk dalam hal pembuatannya, pemeliharaan hingga manajemen
                            organisasi dan manajemen kualitasnya.
                        </p>

                        <a href="https://www.instagram.com/12rpltigaaa_/" target="_blank" style="color: #fff">
                            Ikuti kami di Instagram →
                            <svg class="text-white me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a>

                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Pendeklarasian</h4>
                                <p>Resmi Dibentuk pada 17 Juli 2019</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bxs-user-pin"></i>
                                <h4>Wali Kelas</h4>
                                <p>Baginda Tercinta Bapak Hendri Bayu Setiawan S.Pd</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-male-female"></i>
                                <h4>Penduduk Kelas</h4>
                                <p>
                                    Berisikan 24 Pangeran Berkuda dan <br />
                                    12 Bidadari Cantik
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class='bx bxs-graduation'></i>
                                <h4>Pembubaran</h4>
                                <p>
                                    Resmi melakukan Perpisahan pada 16 Juni 2022
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="team" class="services">
        <div class="container" data-aos="fade-up">
            <div class="section-title pt-4">
                <h2>Anggota Kelas</h2>
            </div>

            <div class="row">
                @foreach ($members as $member)
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="icon-box">
                        @if ($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" alt="" />
                        @else
                        <img src="{{ url('img/team/team-1.jpg') }}" alt="" />
                        @endif
                        <h4 class="title">{{ $member->fullName }}</h4>
                        <p class="description">{{ $member->words }}</p>
                        <div class="icon-area">
                            @if ($member->ig_link)
                            <a href="https://www.instagram.com/{{ $member->ig_link }}/" target="_blank">
                                <div class="icon"><i class="bx bxl-instagram"></i></div>
                            </a>
                            @endif
                            @if ($member->web_link)
                            <a href="https://{{ $member->web_link }}" target="_blank">
                                <div class="icon"><i class="bx bx-globe"></i></div>
                            </a>
                            @endif
                            @if ($member->li_link)
                            <a href="{{ $member->li_link }}" target="_blank">
                                <div class="icon"><i class='bx bxl-linkedin-square'></i></i></div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <script src="frontview/js/main.js"></script>
    @endsection