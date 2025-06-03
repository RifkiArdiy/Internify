<header class="header has-header-main-s1 bg-dark" id="home">
    <div class="header-main header-main-s1 is-sticky is-transparent on-dark">
        <div class="container header-container">
            <div class="header-wrap">
                <div class="header-logo">
                    <a href="{{ route('welcome.index') }}" class="logo-link">
                        <img class="logo-light logo-img" src="{{ asset('assets/home/images/logo.png') }}"
                            srcset="{{ asset('assets/home/images/logo2x.png 2x') }}" alt="logo">
                        <img class="logo-dark logo-img" src="{{ asset('assets/home/images/logo-dark.png') }}"
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
                        <li class="menu-item {{ request()->routeIs('welcome.index') ? 'active' : '' }}">
                            <a href="{{ route('welcome.index') }}" class="menu-link nav-link">Home</a>
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
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>
                                                        {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                    </span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ Auth::user()->name ?? 'Guest' }}</span>
                                                    <span class="sub-text">{{ Auth::user()->email ?? 'Guest' }}</span>
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
        </div>
        <!-- .container-->
    </div>
    <!-- .header-main-->
    <div class="header-content my-auto py-6 is-dark">
        <div class="container mt-n4 mt-lg-0">
            <div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
                <div class="col-lg-6 mb-lg-0">
                    {{-- <div class="header-play text-lg-center">
                        <a class="play popup-video" href="{{ url('https://www.youtube.com/watch?v=SSo_EIwHSd4') }}">
                            <div class="styled-icon styled-icon-6x styled-icon-s5 text-warning">
                                <svg x="0px" y="0px" viewBox="0 0 512 512" style="fill:currentColor"
                                    xml:space="preserve">
                                    <path d="M436.2,178.3c-7.5-4.7-17.4-2.4-22.1,5.1c-4.7,7.5-2.4,17.4,5.1,22.1c17.5,10.9,28,29.8,28,50.4s-10.5,39.5-28,50.4
L155.7,470.7c-18.6,11.6-41.1,12.2-60.3,1.5c-19.2-10.6-30.6-30.1-30.6-52V91.7c0-21.9,11.4-41.3,30.6-52
c19.1-10.6,41.7-10.1,60.3,1.5l153.4,95.6c7.5,4.7,17.4,2.4,22.1-5.1c4.7-7.5,2.4-17.4-5.1-22.1L172.7,14
c-28.6-17.9-63.3-18.7-92.9-2.4C50.3,28.1,32.7,58,32.7,91.7v328.6c0,33.7,17.6,63.7,47.1,80c14.1,7.8,29.3,11.7,44.5,11.7
c16.7,0,33.4-4.7,48.4-14l263.5-164.3c27-16.8,43.1-45.9,43.1-77.7S463.2,195.2,436.2,178.3z" />
                                </svg>
                            </div>
                            <div class="play-text">2:58 minutes</div>
                        </a>
                    </div> --}}
                </div>
                <!-- .col- -->
                <div class="col-lg-6 col-md-10">
                    <div class="header-caption">
                        <div class="header-rating rating">
                            <ul class="rating-stars">
                                <li>
                                    <em class="icon ni ni-star-fill"></em>
                                </li>
                                <li>
                                    <em class="icon ni ni-star-fill"></em>
                                </li>
                                <li>
                                    <em class="icon ni ni-star-fill"></em>
                                </li>
                                <li>
                                    <em class="icon ni ni-star-fill"></em>
                                </li>
                                <li>
                                    <em class="icon ni ni-star-fill"></em>
                                </li>
                            </ul>
                            {{-- <div class="rating-text">14,252 reviews</div> --}}
                        </div>
                        <h1 class="header-title fw-medium">Kelola Magang Lebih Mudah, Terstruktur, dan
                            Terintegrasi</h1>
                        <div class="header-text">
                            <p>Sistem Manajemen Magang modern untuk institusi, mahasiswa, dan mitra
                                industri.
                            </p>
                        </div>
                        <ul class="header-action btns-inline">
                            <li>
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-round">
                                        Ayo Mulai!
                                    </a>
                                @endguest
                            </li>
                        </ul>
                    </div>
                    <!-- .header-caption -->
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .header-content -->
    <div class="bg-image bg-overlay after-bg-dark after-opacity-95">
        <img src="{{ asset('assets/home/images/bg/gedungjti.png') }}" alt="">
    </div>
</header>