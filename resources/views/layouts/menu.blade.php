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
        <h6 class="overline-title text-primary-alt">User Management</h6>
    </li>
    <!-- .nk-menu-heading -->
    <li class="nk-menu-item has-sub">
        <a href="{{ route('user.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-users"></em>
            </span>
            <span class="nk-menu-text">Admins</span>
        </a>
        <!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('mahasiswa.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-users"></em>
            </span>
            <span class="nk-menu-text">Mahasiswas</span>
        </a>
        <!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('dosen.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-users"></em>
            </span>
            <span class="nk-menu-text">Dosens</span>
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
    <li class="nk-menu-item">
        <a href="{{ route('periodeMagang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-calendar"></em>
            </span>
            <span class="nk-menu-text">Periode Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('lowonganMagang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-briefcase"></em>
            </span>
            <span class="nk-menu-text">Lowongan Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('magangApplication.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-file-text"></em>
            </span>
            <span class="nk-menu-text">Lamaran Magang</span>
        </a>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('prodi.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-comments"></em>
            </span>
            <span class="nk-menu-text">Prodi</span>
        </a>
        <!-- .nk-menu-sub -->
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
    <li class="nk-menu-item">
        <a href="{{ route('lowonganMagang.indexMhs') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-briefcase"></em>
            </span>
            <span class="nk-menu-text">Lowongan Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('lamaran') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-file-text"></em>
            </span>
            <span class="nk-menu-text">Lamaran Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('laporan') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-report"></em>
            </span>
            <span class="nk-menu-text">Laporan Harian</span>
        </a>
    </li>
@endif
@if (Auth::user()->level->level_nama == 'Company')
    <li class="nk-menu-item">
        <a href="{{ route('company.dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-dashlite"></em>
            </span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('company.verifikasi') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-check"></em>
            </span>
            <span class="nk-menu-text">Verifikasi</span>
        </a>
    </li>
@endif
