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
                                @if ($bimbingan->magang->mahasiswas->user->image)
                                    <img src="{{ Storage::url('images/users/' . $bimbingan->magang->mahasiswas->user->image) }}"
                                        alt="{{ $bimbingan->magang->mahasiswas->user->name }}">
                                @else
                                    <span>
                                        {{ strtoupper(collect(explode(' ', $bimbingan->magang->mahasiswas->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="user-info">
                                <div class="badge bg-light rounded-pill ucap">Mahasiswa</div>
                                <h5>{{ $bimbingan->magang->mahasiswas->user->name }}</h5>
                                <span class="sub-text">{{ $bimbingan->magang->mahasiswas->user->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner">
                        <h6 class="overline-title mb-2">Informasi Mahasiswa</h6>
                        <div class="row g-3">
                            <div class="col-12 col-md-4 col-lg-12">
                                <span class="sub-text">NIM:</span>
                                <span>{{ $bimbingan->magang->mahasiswas->nim }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Email:</span>
                                <span>{{ $bimbingan->magang->mahasiswas->user->email }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Prodi</span>
                                <span>{{ $bimbingan->magang->mahasiswas->prodi->name }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Alamat</span>
                                <span>{{ $bimbingan->magang->mahasiswas->user->alamat }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">No Telepon</span>
                                <span>{{ $bimbingan->magang->mahasiswas->user->no_telp }}</span>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-12">
                                <span class="sub-text">Status Magang:</span>
                                <span class="lead-text text-success">{{ $bimbingan->magang->status }}</span>
                                {{-- @if ($bimbingan->magang->status === 'Disetujui')
                                    <span class="tb-status text-success">{{ $bimbingan->magang->status }}</span>
                                @elseif ($bimbingan->magang->status === 'Ditolak')
                                    <span class="tb-status text-danger">{{ $bimbingan->magang->status }}</span>
                                @else
                                    <span class="tb-status text-warning">{{ $bimbingan->magang->status }}</span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main: Informasi Magang -->
        <div class="col-lg-8 col-xl-8 col-xxl-9">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-block">
                        <div class="nk-block-head nk-block-head-sm mb-4">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title">Informasi Magang Diterima</h6>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <span class="sub-text">Nama Perusahaan</span>
                                <p class="lead-text">
                                    {{ $bimbingan->magang->lowongans->company->user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <span class="sub-text">Judul Lowongan</span>
                                <p class="lead-text">{{ $bimbingan->magang->lowongans->title }}</p>
                            </div>
                            <div class="col-md-12">
                                <span class="sub-text">Judul Lowongan</span>
                                <p class="lead-text">{{ $bimbingan->magang->lowongans->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="nk-block">
                        <h6 class="lead-text mb-3">Bukti Dokumen</h6>
                        <div class="row g-3">
                            <div class="col-xl-12 col-xxl-6">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-circle icon-circle-lg">
                                                    <em class="icon ni ni-file-pdf"></em>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="lead-text">Dokumen Bimbingan</h6>
                                                    <span class="sub-text">{{ $bimbingan->dokumen_bimbingan }}</span>
                                                </div>
                                            </div>
                                            <ul class="btn-toolbar justify-center gx-1 me-n1 flex-nowrap">
                                                <li>
                                                    <a href="{{ asset('storage/dokumen_bimbingan/' . $bimbingan->dokumen_bimbingan) }}"
                                                        class="btn btn-trigger btn-icon">
                                                        <em class="icon ni ni-download"></em>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-xxl-6">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-circle icon-circle-lg">
                                                    <em class="icon ni ni-file-pdf"></em>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="lead-text">Dokumen Perusahaan</h6>
                                                    <span class="sub-text">{{ $bimbingan->dokumen_perusahaan }}</span>

                                                </div>
                                            </div>
                                            <ul class="btn-toolbar justify-center gx-1 me-n1 flex-nowrap">
                                                <li>
                                                    <a href="{{ asset('storage/dokumen_perusahaan/' . $bimbingan->dokumen_perusahaan) }}"
                                                        class="btn btn-trigger btn-icon">
                                                        <em class="icon ni ni-download"></em>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    @if ($bimbingan->status === 'Pending')
                        <div class="nk-block mt-4">
                            <h6 class="lead-text mb-3">Tindakan</h6>
                            <form action="{{ route('bimbingan.updateStatus', $bimbingan->bimbingan_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">Pilih Status</label>
                                    <div class="form-control-wrap">
                                        <select name="status" class="form-control" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Disetujui">Setujui</option>
                                            <option value="Ditolak">Tolak</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-info mt-4">
                            Status telah diperbarui: <strong>{{ $bimbingan->status }}</strong>
                        </div>
                    @endif

                </div>
            </div>
        </div> <!-- .col -->
    </div>
@endsection
