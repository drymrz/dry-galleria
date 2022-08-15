@extends('layouts.main')

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
        <section id="about" class="about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
                        <div class="content">
                            <h3>SMK Negeri 7 Batam Rekayasa Perangkat Lunak 3 Angkatan 2</h3>
                            <p>
                                Rekayasa Perangkat Lunak adalah salah satu jurusan yang
                                mempelajari tentang pengembangan perangkat-perangkat lunak
                                termasuk dalam hal pembuatannya, pemeliharaan hingga manajemen
                                organisasi dan manajemen kualitasnya.
                            </p>

                            <a href="https://www.instagram.com/12.rpltigaa_/">
                                <svg class="text-white me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                    </path>
                                </svg>
                            </a>

                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    style="fill: rgba(255, 255, 255, 1)">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z">
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
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('/img/anggota/adel.jpg') }}" alt="" />
                            <h4 class="title">Adelia Rahma</h4>
                            <p class="description">Cecan Multiverse</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/adeliarhm.a/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/adit.JPG') }}" alt="" />
                            <h4 class="title">Aditya</h4>
                            <p class="description">Gamers Gantenk Idaman</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/adityaputra.me/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/adry.jpg') }}" alt="" />
                            <h4 class="title">Adry Mirza</h4>
                            <p class="description">Nolep Multitalent</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/adry_mirza/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                                <a href="https://adrymirza.xyz">
                                    <div class="icon"><i class="bx bx-globe"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/agif.JPG') }}" alt="" />
                            <h4 class="title">Agif Ganim</h4>
                            <p class="description">Abang Ganteng</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/agifgnim/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/aldo.JPG') }}" alt="" />
                            <h4 class="title">Aldo Fradana</h4>
                            <p class="description">Abang Cerita Sedih</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/aldo_fradana/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/arjun.JPG') }}" alt="" />
                            <h4 class="title">Arjuna Anggara</h4>
                            <p class="description">Ketua Kelas Idola</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/arjunnanggara20/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/asling.jpg') }}" alt="" />
                            <h4 class="title">Asling Dwifandi</h4>
                            <p class="description">Si Paling Bucin</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/aslingdwif_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/aufa.JPG') }}" alt="" />
                            <h4 class="title">Aufa Husna</h4>
                            <p class="description">Kakak Penyanyi</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/aufahsna_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/detra.JPG') }}" alt="" />
                            <h4 class="title">Detra Octa</h4>
                            <p class="description">Kakak Hits</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/dtraoctaa_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/nabilla.JPG') }}" alt="" />
                            <h4 class="title">Eka Nabilla</h4>
                            <p class="description">Jawa Manis</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/ekaanabillaa._/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/ekp.JPG') }}" alt="" />
                            <h4 class="title">Eka Puspaningrum</h4>
                            <p class="description">Coconut Sista</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/asteroid_u/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/erga.JPG') }}" alt="" />
                            <h4 class="title">Erga Sanjaya</h4>
                            <p class="description">Apek Laundry</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/ergasanjaya_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/nana.JPG') }}" alt="" />
                            <h4 class="title">Farhanna Yasmin</h4>
                            <p class="description">Korea Addicted</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/han.na_14/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/farrel.JPG') }}" alt="" />
                            <h4 class="title">Farrel Adelar</h4>
                            <p class="description">Sakamata Farrel?</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/farrelitsuka/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/hapis.JPG') }}" alt="" />
                            <h4 class="title">Hafiz Alnazwa</h4>
                            <p class="description">Bukan Budak Kecik Lagi</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/alnzw.hfz//">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/angga.jpeg') }}" alt="" />
                            <h4 class="title">Herlangga Arianto</h4>
                            <p class="description">Artis Kelas</p>
                            <div class="icon-area">
                                <a href="#">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/jachin.JPG') }}" alt="" />
                            <h4 class="title">Jachinta Rizky</h4>
                            <p class="description">Korea Addicted (2)</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/aei4jchn/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/akbar.JPG') }}" alt="" />
                            <h4 class="title">M Akbar Agusri</h4>
                            <p class="description">Apasih bar..</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/akb.ar_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/praja.JPG') }}" alt="" />
                            <h4 class="title">Mahaprajadwipangga Semby</h4>
                            <p class="description">Si Serba Bisa</p>
                            <div class="icon-area">
                                <a href="#">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/pio.JPG') }}" alt="" />
                            <h4 class="title">Muhammad Alifio</h4>
                            <p class="description">Pio Hotspot</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/yb_nan/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/ejak.JPG') }}" alt="" />
                            <h4 class="title">Muhammad Reza</h4>
                            <p class="description">Hengker Pro vvibu</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/rexza37/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/rizky.JPG') }}" alt="" />
                            <h4 class="title">Muhammad Rizky</h4>
                            <p class="description">Bang Blek</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/mhmmd.riizkyy_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/nurul.JPG') }}" alt="" />
                            <h4 class="title">Nurul Kamilah</h4>
                            <p class="description">Mbak Sekretaris</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/nrlkmlh3_/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/perzi.JPG') }}" alt="" />
                            <h4 class="title">Perzi Zekni</h4>
                            <p class="description">Abang Fakboi</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/putri.JPG') }}" alt="" />
                            <h4 class="title">Putri Ahdarani</h4>
                            <p class="description">Cabe Kelas</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/fahmi.JPG') }}" alt="" />
                            <h4 class="title">Rahmat Fahmi</h4>
                            <p class="description">Jedag Jedug Boys</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/awal.JPG') }}" alt="" />
                            <h4 class="title">Rahmat Putra Awalludin</h4>
                            <p class="description">Preman Nongsa</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/rista.JPG') }}" alt="" />
                            <h4 class="title">Rista Marlina</h4>
                            <p class="description">Kakak Receh</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/saban.JPG') }}" alt="" />
                            <h4 class="title">Saban Bin Mohamad</h4>
                            <p class="description">Kebanyakan Piagam Futsal</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/septi.JPG') }}" alt="" />
                            <h4 class="title">Septian Eka</h4>
                            <p class="description">Juara Karate</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/tapri.JPG') }}" alt="" />
                            <h4 class="title">Taprihadi</h4>
                            <p class="description">Soft Boy</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/widia.JPG') }}" alt="" />
                            <h4 class="title">Widiati Yuli</h4>
                            <p class="description">Kakak Receh</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/yoga.JPG') }}" alt="" />
                            <h4 class="title">Yoga Subakti</h4>
                            <p class="description">Bos iPhone</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/yusi.JPG') }}" alt="" />
                            <h4 class="title">Yusiana Safriyanti</h4>
                            <p class="description">Anak Pulau</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/zidan.JPG') }}" alt="" />
                            <h4 class="title">Zidhan Afrisal</h4>
                            <p class="description">Rada Aneh</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <img src="{{ url('img/anggota/zul.JPG') }}" alt="" />
                            <h4 class="title">Zulfikar Hadi</h4>
                            <p class="description">Paman Fikar</p>
                            <div class="icon-area">
                                <a href="https://www.instagram.com/perzyz/">
                                    <div class="icon"><i class="bx bxl-instagram"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="/js/main.js"></script>
    @endsection
