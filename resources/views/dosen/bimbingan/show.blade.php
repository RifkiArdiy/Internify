{{-- @if ($bimbingan->status === 'Pending')
    <form action="{{ route('bimbingan.updateStatus', $bimbingan->bimbingan_id) }}" method="POST" class="d-flex gap-1">
        @csrf
        @method('PATCH')
        <input type="hidden" name="action" value="approve">
        <button type="submit" class="btn btn-success btn-sm">Setujui</button>
    </form>
    <form action="{{ route('bimbingan.updateStatus', $bimbingan->bimbingan_id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <input type="hidden" name="action" value="reject">
        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
    </form>
@else
    <em>Tidak ada aksi</em>
@endif --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Detail Pengajuan Bimbingan</h4>

        <div class="card card-bordered mb-4">
            <div class="card-inner">
                <h6 class="mb-2">Informasi Mahasiswa</h6>
                <p><strong>Nama:</strong> {{ $bimbingan->magang->mahasiswas->user->name }}</p>
                <p><strong>Email:</strong> {{ $bimbingan->magang->mahasiswas->user->email }}</p>
                <p><strong>NIM:</strong> {{ $bimbingan->magang->mahasiswas->nim }}</p>
            </div>
        </div>

        <div class="card card-bordered mb-4">
            <div class="card-inner">
                <h6 class="mb-2">Informasi Magang</h6>
                <p><strong>Perusahaan:</strong> {{ $bimbingan->magang->lowongans->company->user->name }}</p>
                <p><strong>Judul Lowongan:</strong> {{ $bimbingan->magang->lowongans->title }}</p>
            </div>
        </div>

        <div class="card card-bordered mb-4">
            <div class="card-inner">
                <h6 class="mb-2">Catatan Pengajuan</h6>
                <p>{{ $bimbingan->pengajuan_catatan ?? '-' }}</p>
                <p><strong>Status Saat Ini:</strong>
                    @if ($bimbingan->status === 'Pending')
                        <span class="text-warning">Pending</span>
                    @elseif ($bimbingan->status === 'Disetujui')
                        <span class="text-success">Disetujui</span>
                    @else
                        <span class="text-danger">Ditolak</span>
                    @endif
                </p>
            </div>
        </div>

        @if ($bimbingan->status === 'Pending')
            <form action="{{ route('bimbingan.updateStatus', $bimbingan->bimbingan_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Tindakan</label>
                    <select name="status" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Disetujui">Setujui</option>
                        <option value="Ditolak">Tolak</option>
                    </select>
                </div>
                <button class="btn btn-primary">Kirim</button>
            </form>
        @else
            <div class="alert alert-info">Status telah diperbarui: <strong>{{ $bimbingan->status }}</strong></div>
        @endif
    </div>
@endsection
