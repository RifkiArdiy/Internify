@extends('layouts.app')

@section('content')
    
    <form action="{{ route('dosen.evaluasi.store') }}" method="POST">
        <h2>Tambah Evaluasi Magang</h2>
       
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" value="{{ \App\Models\Mahasiswa::find($mahasiswaId)?->user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" value="{{ \App\Models\Company::find($companyId)?->user->name }}" readonly>
        </div>
        
        @php
            $log = \App\Models\Log::find($logId);
        @endphp

        <div class="mb-3">
            <label for="report_text" class="form-label">Laporan Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $log->report_text ?? '-' }}" readonly>
        </div>
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ old('evaluasi') }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection