<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/icon.png') }}">
    <!-- Page Title  -->
    <title>Home | Internify</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/dashlite.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/dashlite.css') }}"> --}}
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/home/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-landing ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @include('home.header')
            <!-- .header -->
            @include('home.joblist')
            <!-- .section -->
            <section class="section section-cta is-dark" id="cta">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-9 col-md-10">
                            <div class="text-block is-compact py-3">
                                <h2 class="title">Siap Kelola Magang Lebih Efisien? </h2>
                                <p>Daftar sekarang dan rasakan kemudahan manajemen magang digital bersama Internify.</p>
                                <ul class="btns-inline justify-center pt-2">
                                    <li>
                                        <a href="{{ route('login') }}" class="btn btn-xl btn-primary btn-round">Coba
                                            Gratis
                                            Sekarang</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
                <div class="bg-image bg-overlay after-bg-dark after-opacity-90">
                    <img src="{{ asset('assets/home/images/bg/b.jpg') }}" alt="">
                </div>
            </section>
            <!-- .section -->
            @include('home.companylist')
            <!-- .section -->
            <section class="section section-team pb-0" id="team">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-7 col-lg-9">
                            <div class="section-head">
                                <h2 class="title text-dark px-1">Hubungkan dengan Tujuan Proyek</h2>
                                <p>
                                    Internify adalah buah dari kerja keras dan kolaborasi tim kami. Setiap anggota
                                    membawa keahlian unik yang berkontribusi pada terciptanya sistem manajemen magang
                                    yang efektif dan efisien.
                                </p>
                            </div>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                    <div class="row g-gs justify-content-center">
                        <div class="col-lg-3 col-sm-6 col-mb-6">
                            <div class="team team-s1">
                                <div class="team-portrait">
                                    <img src="{{ asset('assets/home/images/team/farrel.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-name">Muhammad Farrel Caesarian</h6>
                                    <div class="team-role">Project Manager</div>
                                    <ul class="social social-primary">
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-twitter"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-facebook-f"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-instagram"></em>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--.social link-->
                                </div>
                                <!--team info=-->
                            </div>
                            <!--team-->
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-sm-6 col-mb-6">
                            <div class="team team-s1">
                                <div class="team-portrait">
                                    <img src="{{ asset('assets/home/images/team/rifki.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-name">Ashrul Rifki Ardiyhasa</h6>
                                    <div class="team-role">Web Developer</div>
                                    <ul class="social social-primary">
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-twitter"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-facebook-f"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-instagram"></em>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--.social link-->
                                </div>
                                <!--=team info=-->
                            </div>
                            <!--team-->
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-sm-6 col-mb-6">
                            <div class="team team-s1">
                                <div class="team-portrait">
                                    <img src="{{ asset('assets/home/images/team/rocky.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-name">Rocky Alessandro</h6>
                                    <div class="team-role">Web Developer</div>
                                    <ul class="social social-primary">
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-twitter"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-facebook-f"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-instagram"></em>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--.social link-->
                                </div>
                                <!--=team info=-->
                            </div>
                            <!--team-->
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-sm-6 col-mb-6">
                            <div class="team team-s1">
                                <div class="team-portrait">
                                    <img src="{{ asset('assets/home/images/team/firman.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-name">Mochammad Firmandika Jati Kusuma</h6>
                                    <div class="team-role">Web Developer</div>
                                    <ul class="social social-primary">
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-twitter"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-facebook-f"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-instagram"></em>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--.social link-->
                                </div>
                                <!--=team info=-->
                            </div>
                            <!--team-->
                        </div>
                        <!--col-->
                        <div class="col-lg-3 col-sm-6 col-mb-6">
                            <div class="team team-s1">
                                <div class="team-portrait">
                                    <img src="{{ asset('assets/home/images/team/alvin.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-name">Alvin Aditiya</h6>
                                    <div class="team-role">Web Developer</div>
                                    <ul class="social social-primary">
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-twitter"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-facebook-f"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <em class="icon ni ni-instagram"></em>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--.social link-->
                                </div>
                                <!--=team info=-->
                            </div>
                            <!--team-->
                        </div>
                        <!--col-->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </section>
            <section class="section section-reviews" id="reviews">
                <div class="container">
                    <div class="row justify-content-lg-center text-lg-center">
                        <div class="col-lg-6 col-md-10">
                            <div class="section-head">
                                <h2 class="title">What Our Customers Say</h2>
                                <p class="fs-15px">Continually network virtual strategic theme areas vis-a-vis
                                    ubiquitous potentialities. Holisticly negotiate focused e-tailers without premium
                                    solutions.</p>
                            </div>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                    <div class="row g-gs">
                        <div class="col-md-6">
                            <div class="card card-shadow">
                                <div class="card-inner card-inner-lg">
                                    <div class="review review-s4">
                                        <div class="review-user user user-s1">
                                            <div class="img">
                                                <img class="img-circle sm"
                                                    src="{{ asset('assets/home/images/client/sq-a.jpg') }}"
                                                    alt="">
                                            </div>
                                            <!-- img-->
                                            <div class="info">
                                                <h6 class="name">Michael Afonso</h6>
                                                <div class="role">UI/UX Designer </div>
                                            </div>
                                        </div>
                                        <!-- user -->
                                        <div class="review-text">
                                            <p>I must explain to you how all this mistakeng idea of pleasure and
                                                praising pain was born and I will give you a complete account of the
                                                system, and expound the actual teachings.</p>
                                        </div>
                                    </div>
                                    <!-- review-->
                                </div>
                                <!-- card-inner -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col -->
                        <div class="col-md-6">
                            <div class="card card-shadow">
                                <div class="card-inner card-inner-lg">
                                    <div class="review review-s4">
                                        <div class="review-user user user-s1">
                                            <div class="img">
                                                <img class="img-circle sm"
                                                    src="{{ asset('assets/home/images/client/sq-b.jpg') }}"
                                                    alt="">
                                            </div>
                                            <!-- img-->
                                            <div class="info">
                                                <h6 class="name">Samuel Mishin</h6>
                                                <div class="role">Web Developer</div>
                                            </div>
                                        </div>
                                        <!-- user -->
                                        <div class="review-text">
                                            <p>I must explain to you how all this mistakeng idea of pleasure and
                                                praising pain was born and I will give you a complete account of the
                                                system, and expound the actual teachings.</p>
                                        </div>
                                    </div>
                                    <!-- review-->
                                </div>
                                <!-- card-inner -->
                            </div>
                            <!-- card -->
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->
                </div>
                <!-- .container -->
            </section>
            <!-- .section -->
            <footer class="footer bg-dark is-dark">
                <div class="container">
                    <div class="row g-gs justify-content-between py-4 py-md-6">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget widget-about mt-n2">

                                <img class="logo-light logo-img" src="{{ asset('assets/home/images/logo.png') }}"
                                    srcset="{{ asset('assets/home/images/logo2x.png 2x') }}" alt="logo">
                                <img class="logo-dark logo-img" src="{{ asset('assets/home/images/logo-dark.png') }}"
                                    srcset="{{ asset('assets/home/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                </a>
                                <p>Solusi manajemen magang digital untuk mahasiswa, institusi, dan mitra industri.</p>
                            </div>
                        </div>
                        <!-- .col -->
                        <div class="col-lg-6 col-12">
                            <div class="widget">
                                <h6 class="widget-title">Ressources</h6>
                                <ul class="widget-link link-inline link-inline-2col link-inline-md-3col g-2 py-1">
                                    <li>
                                        <a href="#">Learning</a>
                                    </li>
                                    <li>
                                        <a href="#">Support center</a>
                                    </li>
                                    <li>
                                        <a href="#">Frequent questions</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms of Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy policy</a>
                                    </li>
                                    <li>
                                        <a href="#">SaaS services</a>
                                    </li>
                                    <li>
                                        <a href="#">Knowledge Center</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                    <hr class="hr border-light mb-0 mt-n1">
                    <div class="row g-3 align-items-center justify-content-md-between py-4">
                        <div class="col-md-8">
                            <div>
                                Copyright &copy;2025 Internify. All rights reserved <a class="text-base fw-bold"
                                    href="#">Kelompok 3</a>
                            </div>
                        </div>
                        <!-- .col -->
                        <div class="col-md-4 d-flex justify-content-md-end">
                            <ul class="social">
                                <li>
                                    <a href="#">
                                        <em class="icon ni ni-twitter"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em class="icon ni ni-facebook-f"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em class="icon ni ni-instagram"></em>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em class="icon ni ni-pinterest"></em>
                                    </a>
                                </li>
                            </ul>
                            <!-- .footer-icon -->
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </footer>
            <!-- .footer -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/home/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/home/js/scripts.js') }}"></script>
</body>

</html>
