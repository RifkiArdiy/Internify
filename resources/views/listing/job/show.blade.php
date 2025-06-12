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
    {{--
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashlite.css') }}"> --}}
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/home/css/theme.css') }}">
</head>

<body class="nk-body bg-white npc-landing ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- .header-main-->
            <header class="header header-33 has-header-main-s1 bg-dark">
                <div class="header-main header-main-s1 is-sticky is-transparent on-dark">
                    <div class="container header-container">
                        <div class="header-wrap">
                            <div class="header-logo">
                                <a href="{{ route('welcome.index') }}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('assets/home/images/logo.png') }}"
                                        srcset="{{ asset('assets/home/images/logo2x.png 2x') }}" alt="logo">
                                    <img class="logo-dark logo-img"
                                        src="{{ asset('assets/home/images/logo-dark.png') }}"
                                        srcset="{{ asset('assets/home/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                                </a>
                            </div>
                            <div class="header-toggle">
                                <button class="menu-toggler" data-target="mainNav">
                                    <em class="menu-on icon ni ni-menu"></em>
                                    <em class="menu-off icon ni ni-cross"></em>
                                </button>
                            </div>
                            <!-- .header-nav-toggle -->
                            <nav class="header-menu" data-content="mainNav">
                                <ul class="menu-list ms-lg-auto">
                                    <li class="menu-item">
                                        <a href="{{ route('welcome.index') }}" class="menu-link nav-link ">Home</a>
                                    </li>
                                    <li class="menu-item {{ request()->routeIs('list.lowongan') ? 'active' : '' }}">
                                        <a href="{{ route('list.lowongan') }}" class="menu-link nav-link">Lowongan</a>
                                    </li>
                                    <li class="menu-item ">
                                        <a href="{{ route('list.perusahaan') }}" class="menu-link nav-link">Company</a>
                                    </li>
                                </ul>
                                @auth
                                    <div class="nk-header-tools">
                                        <ul class="nk-quick-nav">
                                            <li class="dropdown user-dropdown menu-item">
                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                                    <div class="user-toggle">
                                                        <div class="user-info d-none d-md-block">
                                                            <div class="menu-link nav-link">
                                                                Hello, {{ Auth::user()->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div
                                                    class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <span>
                                                                    {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                                </span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span
                                                                    class="lead-text">{{ Auth::user()->name ?? 'Guest' }}</span>
                                                                <span
                                                                    class="sub-text">{{ Auth::user()->email ?? 'Guest' }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-inner py-3">
                                                        <ul class="link-list ">
                                                            @if (Auth::user()->level->level_nama == 'Administrator')
                                                                <li>
                                                                    <a href="{{ route('admin.dashboard') }}">
                                                                        <em class="icon ni ni-dashlite"></em>
                                                                        <span>Dashboard</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('profile') }}">
                                                                        <em class="icon ni ni-user-alt"></em>
                                                                        <span>View Profile</span>
                                                                    </a>
                                                                </li>
                                                            @elseif (Auth::user()->level->level_nama == 'Mahasiswa')
                                                                <li>
                                                                    <a href="{{ route('mahasiswa.dashboard') }}">
                                                                        <em class="icon ni ni-dashlite"></em>
                                                                        <span>Dashboard</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('profile') }}">
                                                                        <em class="icon ni ni-user-alt"></em>
                                                                        <span>View Profile</span>
                                                                    </a>
                                                                </li>
                                                            @elseif (Auth::user()->level->level_nama == 'Dosen')
                                                                <li>
                                                                    <a href="{{ route('dosen.dashboard') }}">
                                                                        <em class="icon ni ni-dashlite"></em>
                                                                        <span>Dashboard</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('profile') }}">
                                                                        <em class="icon ni ni-user-alt"></em>
                                                                        <span>View Profile</span>
                                                                    </a>
                                                                </li>
                                                            @elseif (Auth::user()->level->level_nama == 'Company')
                                                                <li>
                                                                    <a href="{{ route('company.dashboard') }}">
                                                                        <em class="icon ni ni-dashlite"></em>
                                                                        <span>Dashboard</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('profile') }}">
                                                                        <em class="icon ni ni-user-alt"></em>
                                                                        <span>View Profile</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            {{-- <li>
                                                                <a href="html/user-profile-setting.html">
                                                                    <em class="icon ni ni-setting-alt"></em>
                                                                    <span>Account Setting</span>
                                                                </a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="dropdown-inner py-3">
                                                        <ul class="link-list">
                                                            <li>
                                                                <a href="{{ route('logout') }}">
                                                                    <em class="icon ni ni-signout"></em>
                                                                    <span>Sign out</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="nk-header-tools">
                                        <ul class="nk-quick-nav">
                                            <li>
                                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Masuk</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth
                            </nav>
                            <!-- .nk-nav-menu -->
                        </div>
                        <!-- .header-warp-->
                    </div><!-- .container-->
                </div>
                <div class="header-content py-6 is-dark mt-lg-n1 mt-n3">
                    <div class="container">
                        <!-- Job Title and Action Buttons -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                @if ($lowongan->company->user->image)
                                    <div class="user-avatar lg me-3">
                                        <img src="{{ Storage::url('images/users/' . $lowongan->company->user->image) }}"
                                            alt="{{ $lowongan->company->user->name }}">
                                    </div>
                                @else
                                    <div class="user-avatar sq lg bg-primary me-3">
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $lowongan->company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    </div>
                                @endif
                                <div>
                                    <h4 class="mb-1">{{ $lowongan->title }}</h4>
                                    <ul class="list-inline list-split fs-14px text-soft">
                                        <li><em class="icon ni ni-hash"></em> {{ $lowongan->kategori->name }}</li>
                                        <li><em class="icon ni ni-clock"></em>
                                            {{ $lowongan->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex g-2 mt-3 mt-md-0">
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-primary">Lamar Cepat</a>
                                @endguest

                                @auth
                                    @if (Auth::user()->level && Auth::user()->level->level_nama === 'Mahasiswa')
                                        @if ($hasProfilAkademik)
                                            @if ($sudahMelamar)
                                                <button class="btn btn-secondary" disabled>Sudah Melamar</button>
                                            @else
                                                <form id="form-lamaran"
                                                    data-action="{{ route('buatLamaran', $lowongan->lowongan_id) }}">
                                                    @csrf
                                                    <button type="button" class="btn btn-primary btn-lamar">Lamar
                                                        Cepat</button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('profil-akademik.index') }}" class="btn btn-primary">
                                                Lengkapi Profil Akademik
                                            </a>
                                        @endif
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    <!-- .container -->
                </div>
                <!-- .header-main-->
            </header>
            <!-- .header-content -->
            <!-- .header -->


            <!-- .section -->
            <section class="section section-detail pb-7">
                <div class="container">
                    <div class="section-content">
                        <!-- Grid Layout -->
                        <div class="row g-gs">
                            <!-- Left Content -->
                            <div class="col-lg-8">
                                <!-- Job Description -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h5 class="title mb-3">Deskripsi Lowongan</h5>
                                        <div class="text-base">
                                            {!! $lowongan->description !!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Syarat & Ketentuan -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h5 class="title mb-3">Syarat & Ketentuan</h5>
                                        <div class="content-html">
                                            {!! $lowongan->requirements !!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Benefits -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h5 class="title mb-3">Benefit</h5>
                                        <ul class="list list-sm text-soft">
                                            @foreach ($lowongan->benefits as $benefit)
                                                {{-- <span class="badge badge-outline-primary">{{ $benefit->name }}</span>
                                                --}}
                                                <li>{{ $benefit->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Sidebar -->
                            <div class="col-lg-4">
                                <!-- Job Overview -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h6 class="title">Job Overview</h6>
                                        <ul class="gy-2 mt-3">
                                            <li class="d-flex justify-content-between"><strong>Date Posted:</strong>
                                                {{ $lowongan->created_at->diffForHumans() }}</li>
                                            <li class="d-flex justify-content-between"><strong>Expiration
                                                    Date:</strong>
                                                {{ \Carbon\Carbon::parse($lowongan->period->end_date)->format('d/m/Y') }}
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Lokasi:</strong>{{ $lowongan->regency->name }}
                                                ({{ $lowongan->province->name }})

                                            </li>
                                            <li class="d-flex justify-content-between"><strong>Job Type:</strong>
                                                {{ $lowongan->kategori->name }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Company Info -->
                                <div class="card card-bordered">
                                    <div class="card-inner text-center">
                                        <div class="d-flex justify-content-center mb-3">
                                            @if ($lowongan->company->user->image)
                                                <div class="user-avatar lg">
                                                    <img src="{{ Storage::url('images/users/' . $lowongan->company->user->image) }}"
                                                        alt="{{ $lowongan->company->user->name }}">
                                                </div>
                                            @else
                                                <div class="user-avatar lg bg-indigo">
                                                    <span>
                                                        {{ strtoupper(collect(explode(' ', $lowongan->company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <h6 class="title mb-1">{{ $lowongan->company->user->name }}</h6>
                                        {{-- @for ($i = 0; $i < $averageRating; $i++)
                                            <i class="icon ni ni-star-fill"></i>
                                        @endfor
                                        <br> --}}
                                        {{-- <div class="mb-1"></div> --}}
                                        @php
                                            $fullStars = floor($averageRating);
                                            $halfStar = $averageRating - $fullStars >= 0.5;
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                        @endphp

                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <i class="icon ni ni-star-fill" style="color: gold; font-size: 20px;"></i>
                                        @endfor

                                        @if ($halfStar)
                                            <i class="icon ni ni-star-half" style="color: gold; font-size: 20px;"></i>
                                        @endif

                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="icon ni ni-star" style="color: gold; font-size: 20px;"></i>
                                        @endfor

                                        <span class="ms-2 text-soft fs-13px">({{ $averageRating }})</span>
                                        <br>

                                        <a href="{{ route('show.perusahaan', $lowongan->company->company_id) }}"
                                            class="text-primary small">View company profile</a>
                                        {{-- <ul class="list list-sm text-soft mt-3"> --}}
                                        <ul class="gy-2 mt-3">
                                            <li class="d-flex justify-content-between">
                                                <strong>Founded:</strong>{{ \Carbon\Carbon::parse($lowongan->company->created_at)->format('d/m/Y') }}
                                            </li>
                                            <li class="d-flex justify-content-between"><strong>Phone:</strong>
                                                {{ $lowongan->company->user->no_telp }}</li>
                                            <li class="d-flex justify-content-between"><strong>Lokasi:</strong>
                                                {{ $lowongan->company->user->alamat }}</li>
                                        </ul>
                                        <a href="{{ route('show.perusahaan', $lowongan->company->company_id) }}"
                                            class="btn btn-outline-primary btn-block mt-3">Membuka
                                            Lowongan
                                            : {{ $jobcount }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Related Jobs -->
                        @foreach ($recent as $job)
                            @if ($job->period && \Carbon\Carbon::parse($job->period->end_date)->isFuture())
                                <div class="col-sm-6 col-lg-4">
                                    <a href="{{ route('show.lowongan', $job->lowongan_id) }}"
                                        class="card-link-wrapper">
                                        <div class="card card-bordered service service-s4 h-100">
                                            <div class="card-inner">
                                                <div class="job">
                                                    <div class="job-head">
                                                        <div class="job-title">
                                                            @if ($job->company->user->image)
                                                                <div class="user-avatar">
                                                                    <img src="{{ Storage::url('images/users/' . $job->company->user->image) }}"
                                                                        alt="{{ $job->company->user->name }}">
                                                                </div>
                                                            @else
                                                                <div class="user-avatar sq">
                                                                    <span>
                                                                        {{ strtoupper(collect(explode(' ', $job->company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                            <div class="job-info">
                                                                <h6 class="title">{{ $job->title }}</h6>
                                                                <span class="sub-text">{{ $job->period->name }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="job-details">
                                                        <p>{{ Str::limit(strip_tags($job->description), 80) }}</p>
                                                    </div>
                                                    <div class="job-meta">
                                                        <ul class="job-users g-1">
                                                            <li>
                                                                <span
                                                                    class="badge badge-dim bg-primary">{{ $job->kategori->name }}</span>
                                                            </li>
                                                        </ul>
                                                        <span class="badge badge-dim bg-warning">
                                                            <em class="icon ni ni-clock"></em>
                                                            <span>{{ $job->created_at->diffForHumans() }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <!-- .section -->
            @include('listing.footer')
            <!-- .footer -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/home/js/bundle.js') }}"></script>
    <script src="{{ asset('assets/home/js/scripts.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#btn-lamar').on('click', function() {
                const form = $('#form-lamaran');
                const actionUrl = form.data('action');

                Swal.fire({
                    title: 'Yakin ingin melamar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lamar!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: actionUrl,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Lamaran Berhasil!',
                                    text: 'Lamaran Anda telah dikirim.',
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('lamaran') }}";
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('.btn-lamar').click(function() {
                const form = $('#form-lamaran');
                const url = form.data('action');

                Swal.fire({
                    title: 'Yakin ingin melamar?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lamar!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: res.message,
                                    timer: 2000,
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('lamaran') }}";
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: xhr.responseJSON?.message ||
                                        'Terjadi kesalahan saat mengirim lamaran.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
