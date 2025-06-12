<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/home/images/favicon.png') }}">
    <!-- Page Title  -->
    <title>Registration | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/home/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div
                            class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light"
                                    data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ route('welcome.index') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ asset('assets/home/images/logo.png') }}"
                                            srcset="{{ asset('assets/home/images/logo.png') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ asset('assets/home/images/logo-dark.png') }}"
                                            srcset="{{ asset('assets/home/images/logo-dark.png') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Register</h5>
                                        <div class="nk-block-des">
                                            <p>Buat Akun Baru untuk Internify</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{ route('postRegister') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="name" class="form-control form-control-lg"
                                                id="name" placeholder="Enter your full name" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="username">Username</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="username" class="form-control form-control-lg"
                                                id="username" placeholder="Choose a username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="form-control-wrap">
                                            <input type="email" name="email" class="form-control form-control-lg"
                                                id="email" placeholder="Enter your email address" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" name="password" class="form-control form-control-lg"
                                                id="password" placeholder="Enter a password (min. 6 characters)"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="nim">NIM</label>
                                        <div class="form-control-wrap">
                                            <input type="text" name="nim" class="form-control form-control-lg"
                                                id="nim" placeholder="Enter your NIM" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="prodi_id">Program Studi</label>
                                        <div class="form-control-wrap">
                                            <select name="prodi_id" id="prodi_id"
                                                class="form-control form-control-lg" required>
                                                <option value="" disabled selected>Select your program</option>
                                                @foreach ($prodis as $prodi)
                                                    <option value="{{ $prodi->prodi_id }}">{{ $prodi->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-block">Register</button>
                                    </div>
                                </form>

                                <div class="form-note-s2 pt-4"> Already have an account ? <a
                                        href="{{ route('login') }}"><strong>Sign in instead</strong></a>
                                </div>
                                {{-- <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div> --}}
                                {{-- <ul class="nav justify-center gx-8">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul> --}}
                            </div><!-- .nk-block -->
                            {{-- <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Privacy Policy</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Help</a>
                                        </li>
                                        <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link text-base"
                                                data-bs-toggle="dropdown"
                                                data-offset="0,10"><small>English</small></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/home/images/flags/english.png') }}"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/home/images/flags/spanish.png') }}"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Español</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/home/images/flags/french.png') }}"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Français</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="{{ asset('assets/home/images/flags/turkey.png') }}"
                                                                alt="" class="language-flag">
                                                            <span class="language-name">Türkçe</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul><!-- nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; 2023 DashLite. All Rights Reserved.</p>
                                </div>
                            </div><!-- nk-block --> --}}
                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg"
                            data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                {{-- <div class="slider-init" data-slick='{"dots":true, "arrows":false}'> --}}
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" style="width: 100%; height: auto;"
                                                    src="{{ asset('storage/images/dashboard/image.png') }}"
                                                    srcset="{{ asset('storage/images/dashboard/image.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>Internify</h4>
                                                <p>Sistem Manajemen Magang modern untuk institusi, mahasiswa, dan mitra industri.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    {{-- </div><!-- .slider-item --> --}}
                                </div><!-- .slider-init -->
                        </div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/home/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/home/js/scripts.js') }}"></script>
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
</body>

</html>
