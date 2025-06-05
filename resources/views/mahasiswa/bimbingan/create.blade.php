@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($magang)
        <div class="card card-bordered card-preview mb-4">
            <div class="card-inner">
                <h5 class="card-title mb-3">Informasi Magang</h5>
                <p><strong>Judul Lowongan:</strong> {{ $magang->lowongans->title }}</p>
                <p><strong>Perusahaan:</strong> {{ $magang->lowongans->company->user->name }}</p>
                <p><strong>Alamat:</strong> {{ $magang->lowongans->province->name }},
                    {{ $magang->lowongans->regency->name }}</p>
                <p><strong>Status Magang:</strong>
                    <span class="badge bg-{{ $magang->status === 'Disetujui' ? 'success' : 'warning' }}">
                        {{ $magang->status }}
                    </span>
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Anda belum memiliki magang yang disetujui.
        </div>
    @endif


    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('bimbingan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <input type="hidden" name="magang_id" value="{{ $magang->magang_id }}">
                    {{-- Pilih Dosen --}}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="dosen_id" class="form-label">Pilih Dosen Pembimbing</label>
                            <select name="dosen_id" id="dosen_id" class="form-select" required>
                                <option value="">-- Pilih Dosen --</option>
                                @foreach (App\Models\User::whereHas('level', fn($q) => $q->where('level_nama', 'Dosen'))->get() as $dosen)
                                    <option value="{{ $dosen->user_id }}">{{ $dosen->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Dokumen Bimbingan --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dokumen_bimbingan" class="form-label">Upload Dokumen Bimbingan</label>
                            <input type="file" name="dokumen_bimbingan" id="dokumen_bimbingan" class="form-control"
                                required>
                            <small class="text-muted">File dalam format PDF, maksimal 2MB.</small>
                        </div>
                    </div>

                    {{-- Dokumen Perusahaan --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dokumen_perusahaan" class="form-label">Upload Dokumen Perusahaan</label>
                            <input type="file" name="dokumen_perusahaan" id="dokumen_perusahaan" class="form-control"
                                required>
                            <small class="text-muted">File dalam format PDF, maksimal 2MB.</small>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Ajukan Bimbingan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
