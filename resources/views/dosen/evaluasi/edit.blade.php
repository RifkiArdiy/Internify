@extends('layouts.app')

@section('content')
    
    <form action="{{ route('evaluasi.update', $evaluation->evaluasi_id) }}" method="POST"> 
        @csrf     
        @method('PUT')

        <input type="hidden" name="mahasiswa_id" value="{{ $evaluation->mahasiswa_id }}">
        <input type="hidden" name="company_id" value="{{ $evaluation->company_id }}">
        <input type="hidden" name="log_id" value="{{ $evaluation->log_id }}">

        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $evaluation->mahasiswa->user->name }}" readonly>        
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" value="{{ $evaluation->company->user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="report_text" class="form-label">Laporan Mahasiswa</label>
            <input type="text" class="form-control" value="{{ $evaluation->logs->report_text ?? '-' }}" readonly>
        </div>

        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ old('evaluasi', $evaluation->evaluasi) }}</textarea>
        </div>
        
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

@endsection
