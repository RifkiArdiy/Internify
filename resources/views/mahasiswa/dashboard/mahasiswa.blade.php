@extends('layouts.app')

@section('content')
    <div class="nk-block">
        <div class="data-head">
            <h6 class="overline-title">Progress Pengajuan</h6>
        </div>
        <div class="row g-gs">
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <div class="project-info">
                                    <h6 class="title">{{ $status }}</h6>
                                    <span class="sub-text">Internify</span>
                                </div>
                            </div>
                            <hr>
                            @if ($magang)
                                <p class="mb-1 text-muted">Tempat Magang:</p>
                                <p class="fw-semibold">{{ $magang->lowongans->company->user->name }}</p>

                                <p class="mb-1 text-muted">Judul Magang:</p>
                                <p class="fw-semibold">{{ $magang->lowongans->title }}</p>

                                <p class="mb-1 text-muted">Periode:</p>
                                <p>
                                    <span class="fw-semibold">
                                        {{ \Carbon\Carbon::parse($magang->lowongans->period->start_date)->translatedFormat('d M Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($magang->lowongans->period->end_date)->translatedFormat('d M Y') }}
                                    </span>
                                </p>
                            @else
                                <p class="project-details">Anda belum memiliki magang aktif.</p>
                                <p class="project-details">Silakan buka menu Lowongan Magang untuk melamar.</p>
                                <div class="text-end">
                                    <a href="{{ route('list.lowongan') }}" class="btn btn-md btn-primary">Cari Lowongan</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="html/apps-kanban.html" class="project-title">
                                    <div class="user-avatar sq bg-purple">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">Progress Magang</h6>
                                        <span class="sub-text">Softnio</span>
                                    </div>
                                </a>
                            </div>
                            <div class="project-progress">
                                <div class="project-progress-details">
                                    <div class="project-progress-task"><em class="icon ni ni-check-round-cut"></em><span>4
                                            Tasks</span></div>
                                    <div class="project-progress-percent">{{ $progressPercent }}%</div>
                                </div>
                                <div class="progress progress-pill progress-md bg-light">
                                    <div class="progress-bar" data-progress="{{ $progressPercent }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-block">
        <div class="data-head">
            <h6 class="overline-title">Formulir</h6>
        </div>
        <div class="row g-gs">
            <!-- Pendataan -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    <div class="user-avatar sq bg-purple">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">Pendataan</h6>
                                        <span class="sub-text">Profil Akademik</span>
                                    </div>
                                </a>
                            </div>
                            <div class="project-details">
                                <p>Pada tahap ini Mahasiswa diwajibkan mengunggah dan melengkapi data profil akademik
                                    mahasiswa untuk
                                    keperluan administrasi
                                    magang.</p>
                            </div>
                            <div class="divider"></div>
                            <div class="project-meta">
                                <a href="{{ route('profil-akademik.index') }}" class="btn btn-md btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengajuan -->
            {{-- <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    <div
                                        class="user-avatar sq bg-purple {{ !$isProfilLengkap ? 'disabled opacity-50 pointer-events-none' : '' }}">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">Pengajuan</h6>
                                        <span class="sub-text">Bimbingan</span>
                                    </div>
                                </a>
                            </div>
                            <div class="project-details">
                                <p>Pada tahap ini Mahasiswa diwajibkan untuk mengunggah pengajuan dan persetujuan pembimbing
                                    magang
                                    dari dosen
                                    atau pihak kampus.</p>
                            </div>
                            <div class="divider"></div>
                            <div class="project-meta">
                                <a href="{{ route('bimbingan.create') }}"
                                    class="btn btn-md btn-primary {{ !$isProfilLengkap ? 'disabled opacity-50 pointer-events-none' : '' }}">
                                    Lihat
                                </a>
                                @if (!$isProfilLengkap)
                                    <small class="text-danger">Selesaikan Pendataan terlebih dahulu</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @php
                // Tombol disabled jika profil tidak lengkap atau magang sudah disetujui
                $btnDisabled = !$isProfilLengkap || $magangDisetujui;
            @endphp

            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    <div
                                        class="user-avatar sq bg-purple {{ $btnDisabled ? 'disabled opacity-50 pointer-events-none' : '' }}">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">Pengajuan</h6>
                                        <span class="sub-text">Bimbingan</span>
                                    </div>
                                </a>
                            </div>
                            <div class="project-details">
                                <p>Pada tahap ini Mahasiswa diwajibkan untuk mengunggah pengajuan dan persetujuan pembimbing
                                    magang dari dosen atau pihak kampus.</p>
                            </div>
                            <div class="divider"></div>
                            <div class="project-meta">
                                <a href="{{ route('bimbingan.create') }}"
                                    class="btn btn-md btn-primary {{ $btnDisabled ? 'disabled opacity-50 pointer-events-none' : '' }}">
                                    Lihat
                                </a>
                                @if (!$isProfilLengkap)
                                    <small class="text-danger">Selesaikan Pendataan terlebih dahulu</small>
                                @elseif ($magangDisetujui)
                                    <small class="text-success">Magang sudah disetujui perusahaan.</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pelaksanaan -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    <div
                                        class="user-avatar sq bg-purple {{ !$bimbinganDisetujui ? 'opacity-50 pointer-events-none' : '' }}">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <h6 class="title mb-0">Pelaksanaan</h6>
                                            @if ($periodeMagang)
                                                <span class="badge bg-light text-dark small ms-2">Sisa:
                                                    {{ $sisaWaktuMagang }}</span>
                                            @else
                                                <span class="badge bg-light text-muted small ms-2">Periode tidak
                                                    tersedia</span>
                                            @endif
                                        </div>
                                        <span class="sub-text">Magang</span>
                                    </div>
                                </a>
                            </div>

                            <div class="project-details">
                                <p>
                                    Pada tahap ini Mahasiswa diwajibkan untuk mengunggah dokumen, seperti laporan untuk
                                    monitoring kegiatan magang mahasiswa selama masa penempatan di perusahaan.
                                </p>
                            </div>

                            <div class="divider"></div>
                            <div class="project-meta">
                                <a href="{{ route('laporan') }}"
                                    class="btn btn-md btn-primary {{ !$bimbinganDisetujui ? 'disabled opacity-50 pointer-events-none' : '' }}">
                                    Lihat
                                </a>
                                @if (!$bimbinganDisetujui)
                                    <small class="text-danger d-block mt-1">Ajukan bimbingan terlebih dahulu.</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tahap Akhir -->
            <div class="col-sm-6 col-lg-4 col-xxl-3">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="project">
                            <div class="project-head">
                                <a href="#" class="project-title">
                                    {{-- AVATAR DISABLED --}}
                                    <div
                                        class="user-avatar sq bg-purple {{ !$isAkhirPeriode ? 'opacity-50 pointer-events-none' : '' }}">
                                        <em class="ni ni-file-check-fill"></em>
                                    </div>
                                    <div class="project-info">
                                        <h6 class="title">Tahap Akhir</h6>
                                        <span class="sub-text">Magang</span>
                                    </div>
                                </a>
                            </div>

                            <div class="project-details">
                                <p>
                                    Pada tahap ini Mahasiswa diwajibkan untuk mengunggah dokumen laporan akhir magang dan
                                    proses evaluasi dari dosen pembimbing.
                                </p>
                            </div>

                            <div class="divider"></div>
                            <div class="project-meta">
                                {{-- BUTTON DISABLED --}}
                                <a href="#"
                                    class="btn btn-md btn-primary {{ !$isAkhirPeriode ? 'disabled opacity-50 pointer-events-none' : '' }}"
                                    {{ !$isAkhirPeriode ? 'onclick=event.preventDefault();' : '' }}>
                                    Lihat
                                </a>
                                @if (!$isAkhirPeriode)
                                    <small class="text-danger d-block mt-1">Tersedia setelah periode magang
                                        selesai.</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
