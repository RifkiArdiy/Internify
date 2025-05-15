<header class="header has-header-main-s1 bg-white" id="home">
    <div class="header-main header-main-s1 is-sticky is-transparent on-white">
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
                        <li class="menu-item">
                            <a href="#home" class="menu-link nav-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#joblist" class="menu-link nav-link">Lowongan</a>
                        </li>
                        <li class="menu-item">
                            <a href="#companylist" class="menu-link nav-link">Company</a>
                        </li>
                        {{-- <li class="menu-item">
                            <a href="#team" class="menu-link nav-link">Team</a>
                        </li> --}}
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
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
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
                                                        <a href="{{ route('admin.profile') }}">
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
                                                        <a href="{{ route('mahasiswa.profile') }}">
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
                                                        <a href="{{ route('dosen.profile') }}">
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
                                                        <a href="{{ route('company.profile') }}">
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
        </div>
        <!-- .container-->
    </div>
    <!-- .header-main-->
    <!-- .header-content -->
    {{-- <div class="bg-image bg-overlay after-bg-dark after-opacity-95">
        <img src="{{ asset('assets/home/images/bg/a.jpg') }}" alt="">
    </div> --}}
</header>
