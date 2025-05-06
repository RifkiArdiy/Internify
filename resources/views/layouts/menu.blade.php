@if (Auth::user()->level->level_nama == 'Administrator')
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
            <span class="nk-menu-text">Mahasiswa</span>
        </a>
        <!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('dosen.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-users"></em>
            </span>
            <span class="nk-menu-text">Dosen</span>
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
@if (Auth::user()->level->level_nama == 'Dosen')
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
@if (Auth::user()->level->level_nama == 'Mahasiswa')
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
