<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/home/images/favicon.png') }}">
    <!-- Page Title  -->
    <title>Login | Internify</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/home/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light"
                                    data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{ route('welcome.index') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ asset('assets/home/images/logo.png') }}"
                                            srcset="{{ asset('assets/home/images/logo2x.png') }}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ asset('assets/home/images/logo-dark.png') }}"
                                            srcset="{{ asset('assets/home/images/logo-dark.png') }}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the DashLite panel using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{ route('postLogin') }}" method="POST" class="form-validate is-alter"
                                    autocomplete="off" id="form-login">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="username">Email or Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text" name="username" id="username"
                                                class="form-control form-control-lg" required
                                                placeholder="Enter your email address or username">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="new-password" type="password" name="password"
                                                id="password" class="form-control form-control-lg" required
                                                placeholder="Enter your passcode">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> New on our App? <a
                                        href="{{ route('register') }}">Create an account</a>
                                </div>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div>
                                    <p>&copy; 2025 Internify. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
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
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
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
    <script src="{{ asset('assets/admin/js/example-sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#form-login').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('postLogin') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Logging in...',
                            allowOutsideClick: false,
                            didOpen: () => Swal.showLoading()
                        });
                    },
                    success: function(res) {
                        Swal.fire({
                            icon: 'success',
                            title: res.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            className: {
                                popup: 'eg-toastr-with-title'
                            }
                        }).then(() => {
                            window.location.href = res.redirect;
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: xhr.responseJSON?.message || 'Something went wrong!',
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
