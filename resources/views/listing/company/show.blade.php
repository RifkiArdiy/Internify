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
                        <!-- Company and Action Buttons -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                @if ($company->user->image)
                                    <div class="user-avatar lg me-3">
                                        <img src="{{ Storage::url('images/users/' . $company->user->image) }}"
                                            alt="{{ $company->user->name }}">
                                    </div>
                                @else
                                    <div class="user-avatar sq lg bg-primary me-3">
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    </div>
                                @endif
                                <div>
                                    <h4 class="mb-1">{{ $company->user->name }}</h4>
                                    {{-- @for ($i = 0; $i < $averageRating; $i++)
                                        <i class="icon ni ni-star-fill" style="font-size: 24px; color: gold;"></i>
                                    @endfor --}}

                                    <ul class="list-inline list-split fs-14px text-soft">
                                        <li><em class="icon ni ni-briefcase"></em> Technology</li>
                                        <li><em class="icon ni ni-map-pin"></em>
                                            {{ $company->user->alamat ?? 'N/A' }}</li>
                                        <li><em class="icon ni ni-call"></em>
                                            {{ $company->user->no_telp ?? '-' }}</li>
                                        <li><em class="icon ni ni-mail"></em> {{ $company->user->email }}</li>
                                    </ul>
                                </div>
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
                        <div class="row g-4">
                            <div class="col-md-8">
                                <h5 class="title mb-3">Tentang Perusahaan</h5>
                                <div class="text-soft">
                                    {!! $company->about_company !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <ul class="gy-2">
                                            <li class="d-flex justify-content-between"><span
                                                    class="fw-bold">Ownership:</span> <span
                                                    class="text-soft">Private</span></li>
                                            <li class="d-flex justify-content-between"><span class="fw-bold">Company
                                                    size:</span> <span class="text-soft">11-20</span></li>
                                            <li class="d-flex justify-content-between"><span class="fw-bold">Founded
                                                    in:</span> <span
                                                    class="text-soft">{{ $company->user->created_at->format('Y') }}</span>
                                            </li>
                                            <li class="d-flex justify-content-between"><span
                                                    class="fw-bold">Email:</span> <span
                                                    class="text-soft">{{ $company->user->email }}</span></li>
                                            <li class="d-flex justify-content-between"><span
                                                    class="fw-bold">Location:</span> <span
                                                    class="text-soft">{{ $company->user->alamat ?? '-' }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Latest Jobs --}}
                        <div class="mt-5">
                            <h5 class="mb-3">Lowongan Terakhir</h5>
                            @if ($company->lowongans->count())
                                <div class="row g-4">
                                    @foreach ($company->lowongans->take(3) as $job)
                                        <div class="col-md-6 col-lg-4">
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
                                                                        <span
                                                                            class="sub-text">{{ $job->period->name }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="job-details">
                                                                <p>{{ Str::limit(strip_tags($job->description), 80) }}
                                                                </p>
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
                                    @endforeach
                                </div>
                            @else
                                <p class="text-danger">The Latest Job not available.</p>
                            @endif
                        </div>
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
</body>

</html>
