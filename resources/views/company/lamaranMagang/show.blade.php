@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row g-gs">
        <!-- Sidebar: Info Mahasiswa -->
        <div class="col-lg-4 col-xl-4 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="user-card user-card-s2">
                            <div class="user-avatar lg bg-success-dim">
                                @if ($magang->mahasiswas->user->image)
                                    <img src="{{ Storage::url('images/users/' . $magang->mahasiswas->user->image) }}"
                                        alt="{{ $magang->mahasiswas->user->name }}">
                                @else
                                    <span>{{ strtoupper(collect(explode(' ', $magang->mahasiswas->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}</span>
                                @endif
                            </div>
                            <div class="user-info">
                                <div class="badge bg-light rounded-pill ucap">Mahasiswa</div>
                                <h5>{{ $magang->mahasiswas->user->name }}</h5>
                                <span class="sub-text">{{ $magang->mahasiswas->user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title mb-2">Informasi Mahasiswa</h6>
                        <div class="row g-3">
                            <div class="col-12 col-md-4 col-lg-12">
                                <span class="sub-text">NIM:</span>
                                <span>{{ $magang->mahasiswas->nim }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Prodi:</span>
                                <span>{{ $magang->mahasiswas->prodi->name }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Alamat:</span>
                                <span>{{ $magang->mahasiswas->user->alamat }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">No Telepon:</span>
                                <span>
                                    {{ $magang->mahasiswas->user->no_telp }}
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $magang->mahasiswas->user->no_telp) }}"
                                        target="_blank" class="badge bg-primary text-white">Hubungi</a>
                                </span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Status Magang:</span>
                                @if ($magang->status === 'Disetujui')
                                    <span class="tb-status text-success">{{ $magang->status }}</span>
                                @elseif ($magang->status === 'Ditolak')
                                    <span class="tb-status text-danger">{{ $magang->status }}</span>
                                @else
                                    <span class="tb-status text-warning">{{ $magang->status }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main: Info Magang -->
        <div class="col-lg-8 col-xl-8 col-xxl-9">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm mb-4">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title">Informasi Magang</h6>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <span class="sub-text">Nama Perusahaan</span>
                                <p class="lead-text">{{ $magang->lowongans->company->user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Judul Magang</span>
                                <p class="lead-text">{{ $magang->lowongans->title }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Deskripsi</span>
                                <p class="lead-text">{{ strip_tags($magang->lowongans->description) }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Periode Awal</span>
                                <p class="lead-text">
                                    {{ \Carbon\Carbon::parse($magang->lowongans->period->start_date)->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Periode Akhir</span>
                                <p class="lead-text">
                                    {{ \Carbon\Carbon::parse($magang->lowongans->period->end_date)->format('d/m/Y') }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Kriteria</span>
                                <p class="lead-text">{{ strip_tags($magang->lowongans->requirements) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="divider mt-4 mb-4"></div>

                    @if ($profilAkademik)
                        <div class="nk-block">
                            <h6 class="lead-text mb-3">Profil Akademik</h6>
                            <div class="row g-3">
                                @foreach (['bidang_keahlian', 'sertifikasi', 'pengalaman', 'etika', 'ipk'] as $field)
                                    <div class="col-xl-12 col-xxl-6">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <div class="icon-circle icon-circle-lg">
                                                            <em class="icon ni ni-file-pdf"></em>
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="lead-text text-capitalize">
                                                                {{ str_replace('_', ' ', $field) }}
                                                            </h6>
                                                            <span
                                                                class="sub-text">{{ $profilAkademik->$field ?? 'Belum diunggah' }}</span>
                                                        </div>
                                                    </div>
                                                    <ul class="btn-toolbar justify-center gx-1 me-n1 flex-nowrap">
                                                        <li>
                                                            @if ($profilAkademik->$field)
                                                                <a href="{{ asset("storage/profil-akademik/$field/" . $profilAkademik->$field) }}"
                                                                    class="btn btn-trigger btn-icon">
                                                                    <em class="icon ni ni-download"></em>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
