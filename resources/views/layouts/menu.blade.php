@php
    use Carbon\Carbon;
@endphp
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
        <h6 class="overline-title text-primary-alt">Manajemen User</h6>
    </li>
    <!-- .nk-menu-heading -->
    <li class="nk-menu-item has-sub">
        <a href="{{ route('user.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-users"></em>
            </span>
            <span class="nk-menu-text">Admin</span>
        </a>
        <!-- .nk-menu-sub -->
    </li>
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
            <span class="nk-menu-text">Perusahaan</span>
        </a>
    </li>
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Manajemen Sistem</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('periode-magang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-calendar"></em>
            </span>
            <span class="nk-menu-text">Periode Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('lowongan-magang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-briefcase"></em>
            </span>
            <span class="nk-menu-text">Lowongan Magang</span>
        </a>
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('prodi.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-comments"></em>
            </span>
            <span class="nk-menu-text">Program Studi</span>
        </a>
        <!-- .nk-menu-sub -->
    </li>
    <li class="nk-menu-item has-sub">
        <a href="{{ route('monitoring.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-report"></em>
            </span>
            <span class="nk-menu-text">Monitoring & Statistik</span>
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
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">User Management</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('evaluasi.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-file-text"></em>
            </span>
            <span class="nk-menu-text">Evaluasi Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('dosen.verifikasi') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-check"></em>
            </span>
            <span class="nk-menu-text">Verifikasi Laporan</span>
        </a>
    </li>
@endif

@if (Auth::user()->level->level_nama == 'Mahasiswa')
    @php
        $mahasiswa = Auth::user()->mahasiswa;

        // Ambil aplikasi magang yang disetujui
        $magangDisetujui = $mahasiswa->applications()->where('status', 'Disetujui')->latest()->first();

        $hasApprovedMagang = $magangDisetujui !== null;
    @endphp

    {{-- Menu Heading --}}
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Dashboards</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('mahasiswa.dashboard') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
            <span class="nk-menu-text">Dashboard</span>
        </a>
    </li>

    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">User Management</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('profil-akademik.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
            <span class="nk-menu-text">Profil Akademik</span>
        </a>
    </li>

    {{-- Jika belum ada magang disetujui --}}
    @unless ($hasApprovedMagang)
        <li class="nk-menu-item">
            <a href="{{ url('mahasiswa/alternatif') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-briefcase"></em></span>
                <span class="nk-menu-text">Rekomendasi Lowongan</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('lamaran') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                <span class="nk-menu-text">Pengajuan Magang</span>
            </a>
        </li>
    @endunless

    {{-- Jika sudah disetujui magangnya --}}
    @if ($hasApprovedMagang)
        <li class="nk-menu-item">
            <a href="{{ route('laporan') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-report"></em></span>
                <span class="nk-menu-text">Laporan Harian</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('evaluasi-index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-file-text"></em></span>
                <span class="nk-menu-text">Evaluasi Magang</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('feedback-index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-comments"></em></span>
                <span class="nk-menu-text">Feedback Magang</span>
            </a>
        </li>
        <li class="nk-menu-item">
            <a href="{{ route('sertifikatMagang.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-notes-alt"></em></span>
                <span class="nk-menu-text">Sertifikat Magang</span>
            </a>
        </li>
    @endif
@endif


@if (Auth::user()->level->level_nama == 'Company')
    <li class="nk-menu-heading">
        <h6 class="overline-title text-primary-alt">Dashboards</h6>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('company.dashboard') }}" class="nk-menu-link">
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
    <li class="nk-menu-item">
        <a href="{{ route('company.verifikasi') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-check"></em>
            </span>
            <span class="nk-menu-text">Verifikasi Laporan</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('companys-lowongan-magang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-briefcase"></em>
            </span>
            <span class="nk-menu-text">Lowongan Magang</span>
        </a>
    </li>
    <li class="nk-menu-item">
        <a href="{{ route('company.sertifikatMagang.index') }}" class="nk-menu-link">
            <span class="nk-menu-icon">
                <em class="icon ni ni-notes-alt"></em>
            </span>
            <span class="nk-menu-text">Sertifikat Magang</span>
        </a>
    </li>
@endif
