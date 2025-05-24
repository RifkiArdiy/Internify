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
            <section class="section section-cta is-dark">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-9 col-md-10">
                            <div class="text-block is-compact py-3">
                                <h2 class="title">Siap Kelola Magang Lebih Efisien? </h2>
                                <p>Daftar sekarang dan rasakan kemudahan manajemen magang digital bersama Internify.</p>
                                <ul class="btns-inline justify-center pt-2">
                                    <li>
                                        @guest {{-- Ini akan merender konten di dalamnya HANYA jika pengguna BELUM login --}}
                                            <a href="{{ route('login') }}" class="btn btn-xl btn-primary btn-round">
                                                Coba Gratis Sekarang
                                            </a>
                                        @endguest
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
            <!-- .section -->
            @include('home.footer')
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
