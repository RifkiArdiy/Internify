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
            @if (Auth::user()->level->level_nama == 'Administrator')
                <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                    <h4 class="text-light">Logo</h4>
                </a>
            @endif
            @if (Auth::user()->level->level_nama == 'Dosen')
                <a href="{{ route('dosen.dashboard') }}" class="logo-link nk-sidebar-logo">
                    <h4 class="text-light">Logo</h4>
                </a>
            @endif
            @if (Auth::user()->level->level_nama == 'Mahasiswa')
                <a href="{{ route('mahasiswa.dashboard') }}" class="logo-link nk-sidebar-logo">
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
                    @include('layouts.menu')
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
