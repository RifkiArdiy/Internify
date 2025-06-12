@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('laporan') }}" class="btn btn-primary">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="row g-gs">
        <!-- Sidebar Mahasiswa -->
        <div class="col-lg-4 col-xl-4 col-xxl-3">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="user-card user-card-s2">
                            <div class="user-avatar lg bg-success-dim">
                                @if ($log->mahasiswa->user->image)
                                    <img src="{{ Storage::url('images/users/' . $log->mahasiswa->user->image) }}"
                                        alt="{{ $log->mahasiswa->user->name }}">
                                @else
                                    <span>
                                        {{ strtoupper(collect(explode(' ', $log->mahasiswa->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="user-info">
                                <div class="badge bg-light rounded-pill ucap">Mahasiswa</div>
                                <h5>{{ $log->mahasiswa->user->name }}</h5>
                                <span class="sub-text">{{ $log->mahasiswa->user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title mb-2">Informasi Mahasiswa</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <span class="sub-text">NIM</span>
                                <span>{{ $log->mahasiswa->nim }}</span>
                            </div>
                            <div class="col-12">
                                <span class="sub-text">Prodi</span>
                                <span>{{ $log->mahasiswa->prodi->name ?? '-' }}</span>
                            </div>
                            <div class="col-12">
                                <span class="sub-text">Telepon</span>
                                <span>{{ $log->mahasiswa->user->no_telp }}</span>
                            </div>
                            <div class="col-12">
                                <span class="sub-text">Alamat</span>
                                <span>{{ $log->mahasiswa->user->alamat }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="col-lg-8 col-xl-8 col-xxl-9">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm mb-4">
                            <h6 class="nk-block-title">Detail Laporan Mahasiswa</h6>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <span class="sub-text">Nama Mahasiswa</span>
                                <p class="lead-text">{{ $log->mahasiswa->user->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Dosen Pembimbing</span>
                                <p class="lead-text">{{ $log->dosen->user->name ?? '-' }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Judul Laporan</span>
                                <p class="lead-text">{{ $log->report_title ?? '-' }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Isi Laporan</span>
                                <div class="bg-light border rounded p-3" style="min-height: 150px;">
                                    <div class="ql-editor">{!! old('report_text', $log->report_text) !!}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Tanggal Dibuat</span>
                                <p class="lead-text">{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .row -->
@endsection
