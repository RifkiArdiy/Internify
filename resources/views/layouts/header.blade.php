<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('welcome.index') }}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img" src="{{ asset('assets/home/images/logo.png') }}"
                        srcset="{{ asset('assets/home/images/logo2x.png 2x') }}" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('assets/home/images/logo-dark.png') }}"
                        srcset="{{ asset('assets/home/images/logo-dark2x.png 2x') }}" alt="logo-dark">
                </a>
            </div>
            <!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <ul class="breadcrumb breadcrumb-arrow">
                        @if (Auth::user()->level->level_nama == 'Administrator')
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @elseif (Auth::user()->level->level_nama == 'Mahasiswa')
                            <li class="breadcrumb-item"><a href="{{ route('mahasiswa.dashboard') }}">Dashboard</a></li>
                        @elseif (Auth::user()->level->level_nama == 'Dosen')
                            <li class="breadcrumb-item"><a href="{{ route('dosen.dashboard') }}">Dashboard</a></li>
                        @elseif (Auth::user()->level->level_nama == 'Company')
                            <li class="breadcrumb-item"><a href="{{ route('company.dashboard') }}">Dashboard</a></li>
                        @endif
                        @if ($breadcrumb->title !== 'Dashboard')
                            <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <!-- .dropdown -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    @if (auth()->check() && auth()->user()->image)
                                        <img src="{{ Storage::url('images/users/' . auth()->user()->image) }}"
                                            alt="{{ auth()->user()->name }}">
                                    @else
                                        <span>
                                            {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{ Auth::user()->level->level_nama ?? 'Guest' }}</div>
                                    <div class="user-name dropdown-indicator">{{ Auth::user()->name ?? 'Guest' }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>
                                            @if (auth()->check() && auth()->user()->image)
                                                <img src="{{ Storage::url('images/users/' . auth()->user()->image) }}"
                                                    alt="{{ auth()->user()->name }}">
                                            @else
                                                {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name ?? 'Guest' }}</span>
                                        <span class="sub-text">{{ Auth::user()->email ?? 'Guest' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    @if (Auth::user()->level->level_nama == 'Administrator')
                                        <li>
                                            <a href="{{ route('profile') }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>View Profile</span>
                                            </a>
                                        </li>
                                    @elseif (Auth::user()->level->level_nama == 'Mahasiswa')
                                        <li>
                                            <a href="{{ route('profile') }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>View Profile</span>
                                            </a>
                                        </li>
                                    @elseif (Auth::user()->level->level_nama == 'Dosen')
                                        <li>
                                            <a href="{{ route('profile') }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>View Profile</span>
                                            </a>
                                        </li>
                                    @elseif (Auth::user()->level->level_nama == 'Company')
                                        <li>
                                            <a href="{{ route('profile') }}">
                                                <em class="icon ni ni-user-alt"></em>
                                                <span>View Profile</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dark-switch" href="#">
                                            <em class="icon ni ni-moon"></em>
                                            <span>Dark Mode</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
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
                    <!-- .dropdown -->
                    <li class="dropdown notification-dropdown me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                            <div class="icon-status icon-status-info">
                                <em class="icon ni ni-bell"></em>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    @if(Auth::user()->getRole() === 'Mahasiswa')
                                        @if ($notif_magang_list->isEmpty())
                                            <div class="nk-notification-item">
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">
                                                        Belum ada notifikasi terbaru
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach ($notif_magang_list as $notif)
                                                <div class="nk-notification-item d-flex align-items-start mb-2">
                                                    <div class="nk-notification-icon me-3">
                                                        @if ($notif['m_status'] === 'Ditolak')
                                                            <em class="icon icon-circle bg-danger-dim ni ni-cross"></em>
                                                        @elseif ($notif['m_status'] === 'Disetujui')
                                                            <em class="icon icon-circle bg-success-dim ni ni-check"></em>
                                                        @elseif ($notif['m_status'] === 'Pending')
                                                            <em class="icon icon-circle bg-warning-dim ni ni-clock"></em>
                                                        @else
                                                            <em class="icon icon-circle bg-secondary-dim ni ni-info"></em>
                                                        @endif
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">
                                                            Lamaran magang anda di {{ $notif['m_company_name'] }}
                                                            @if ($notif['m_status'] !== 'Pending')
                                                                telah {{ strtolower($notif['m_status']) }}
                                                            @else
                                                                sedang diproses
                                                            @endif
                                                        </div>
                                                        <div class="nk-notification-time">{{ $notif['m_time'] }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @elseif(Auth::user()->getRole() === 'Company')
                                        @if ($notif_pending_list->isEmpty())
                                            <div class="nk-notification-item">
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">
                                                        Belum ada notifikasi terbaru
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @foreach ($notif_pending_list as $item)

                                                <div class="nk-notification-item d-flex align-items-start mb-2">
                                                    <div class="nk-notification-icon me-3">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-clock"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">
                                                            {{ $item['c_mahasiswa_name'] }} menunggu review magang di bagian
                                                            {{ $item['c_lowongan_title'] }}
                                                        </div>
                                                        <div class="nk-notification-time">{{ $item['c_created_at'] }}</div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                <!-- .nk-notification -->
                            </div>
                            <!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="{{ route('notif') }}">View All</a>
                            </div>
                        </div>
                    </li>
                    <!-- .dropdown -->
                </ul>
                <!-- .nk-quick-nav -->
            </div>
            <!-- .nk-header-tools -->
        </div>
        <!-- .nk-header-wrap -->
    </div>
    <!-- .container-fliud -->
</div>