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
                                                                Hi..!! {{ Auth::user()->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div
                                                    class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                        <div class="user-card">
                                                            <div class="user-avatar">
                                                                <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
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
                                                            <li>
                                                                <a href="html/user-profile-setting.html">
                                                                    <em class="icon ni ni-setting-alt"></em>
                                                                    <span>Account Setting</span>
                                                                </a>
                                                            </li>
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
                        <div class="user-card">
                            <div class="user-avatar md sq">
                                <span>AB</span>
                            </div>
                            <div class="user-info m-gs">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <div>
                                        <h4 class="mb-1">{{ $lowongan->title }}</h4>
                                        <ul class="list-inline fs-13px text-soft">
                                            <li class="list-inline-item"><em class="icon ni ni-hash"></em> Programming
                                            </li>
                                            <li class="list-inline-item">{{ $lowongan->created_at->diffForHumans() }}
                                            </li>
                                            {{-- <li class="list-inline-item">• ₹40K - ₹60K</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap g-2 mt-3 mt-md-0">
                            <a href="#" class="btn btn-outline-primary">Register to Apply</a>
                            <a href="#" class="btn btn-primary">Apply For Job</a>
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

                                <!-- Responsibilities -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h5 class="title mb-3">Key Responsibilities</h5>
                                        <div class="content-html">
                                            {!! $lowongan->requirements !!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Skills -->
                                <div class="card card-bordered mb-4">
                                    <div class="card-inner">
                                        <h5 class="title mb-3">Skill & Experience</h5>
                                        <ul class="list list-sm text-soft">
                                            <li>Computer Skill</li>
                                            <li>Communication Skill</li>
                                            <li>Leadership Skill</li>
                                            <li>Management Skill</li>
                                            <li>Problem-solving Skill</li>
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
                                        <ul class="gy-2">
                                            <li><strong>Date Posted:</strong> 30th Apr, 2025</li>
                                            <li><strong>Expiration Date:</strong> 1st May, 2026</li>
                                            <li><strong>Location:</strong> Gandhinagar, Gujarat, India</li>
                                            <li><strong>Job Type:</strong> IT</li>
                                            <li><strong>Functional Areas:</strong> IT Support</li>
                                            <li><strong>Positions:</strong> 5</li>
                                            <li><strong>Job Experience:</strong> 3 Year</li>
                                            <li><strong>Salary Period:</strong> Monthly Pay</li>
                                            <li><strong>Is Freelance:</strong> No</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Company Info -->
                                <div class="card card-bordered">
                                    <div class="card-inner text-center">
                                        <div class="d-flex justify-content-center mb-3">
                                            <div class="user-avatar sq lg bg-indigo-dim">
                                                <span>👤</span>
                                            </div>
                                        </div>
                                        <h6 class="title mb-1">{{ $lowongan->company->user->name }}</h6>
                                        <a href="#" class="text-primary small">View company profile</a>
                                        <ul class="list list-sm text-soft mt-3">
                                            <li><strong>Founded:</strong>{{ $lowongan->company->created_at }}</li>
                                            <li><strong>Phone:</strong> {{ $lowongan->company->user->no_telp }}</li>
                                            <li><strong>Location:</strong> {{ $lowongan->company->user->alamat }}</li>
                                        </ul>
                                        <a href="#" class="btn btn-outline-primary btn-block mt-3">Open Jobs
                                            :
                                            1</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Related Jobs -->
                        <div class="mt-5">
                            <h5 class="title mb-4">Related Jobs</h5>
                            <div class="row g-gs">
                                @foreach ([['Laravel & MySQL Expert', 'andrew moonga'], ['Node.js & MongoDB Specialist', 'FutureWave IT'], ['MERN STACK Developer', 'ABISHek']] as [$title, $company])
                                    <div class="col-md-4">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <h6 class="title">{{ $title }}</h6>
                                                <span class="small text-soft">{{ $company }}</span>
                                                <ul class="list-inline mt-2 fs-12px text-soft">
                                                    <li class="list-inline-item">💻 Programming</li>
                                                    <li class="list-inline-item">Gandhinagar, Gujarat</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-primary">Show All</a>
                            </div>
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
