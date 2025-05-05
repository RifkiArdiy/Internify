<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu">
                <em class="icon ni ni-menu"></em>
            </a>
        </div>
        <div class="nk-sidebar-brand">
            @if (Auth::user()->level->level_nama == 'admin')
            <a href="{{route('admin.dashboard')}}" class="logo-link nk-sidebar-logo">
                <h4 class="text-light">Logo</h4>
            </a>
            @endif
            @if (Auth::user()->level->level_nama == 'dosen')
            <a href="{{route('dosen.dashboard')}}" class="logo-link nk-sidebar-logo">
                <h4 class="text-light">Logo</h4>
            </a>
            @endif
            @if (Auth::user()->level->level_nama == 'mahasiswa')
            <a href="{{route('mahasiswa.dashboard')}}" class="logo-link nk-sidebar-logo">
                <h4 class="text-light">Logo</h4>
            </a>
            @endif
        </div>
    </div>
    <!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @if (Auth::user()->level->level_nama == 'admin')
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dashboards</h6>
                        </li>
                        <!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('admin.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-dashlite"></em>
                                </span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Pages</h6>
                        </li>
                        <!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="{{ route('mahasiswa.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-users"></em>
                                </span>
                                <span class="nk-menu-text">User Manage</span>
                            </a>
                            <!-- .nk-menu-sub -->
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('companies.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-building"></em>
                                </span>
                                <span class="nk-menu-text">Companies</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->level->level_nama == 'dosen')
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dashboards</h6>
                        </li>
                        <!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('dosen.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-dashlite"></em>
                                </span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- .nk-menu-item -->
                    @endif
                    @if (Auth::user()->level->level_nama == 'mahasiswa')
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dashboards</h6>
                        </li>
                        <!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{ route('mahasiswa.dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-dashlite"></em>
                                </span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- .nk-menu-item -->
                    @endif
                    <!-- .nk-menu-item -->
                </ul>
                <!-- .nk-menu -->
            </div>
            <!-- .nk-sidebar-menu -->
        </div>
        <!-- .nk-sidebar-content -->
    </div>
    <!-- .nk-sidebar-element -->
</div>
