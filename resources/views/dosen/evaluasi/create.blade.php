@extends('layouts.app')

@section('content')
    
    <form action="{{ route('evaluasi.store') }}" method="POST"> 
        @csrf     
        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswaId }}">
        <input type="hidden" name="company_id" value="{{ $companyId }}">
        <input type="hidden" name="log_id" value="{{ $logId }}">

        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <input type="text" class="form-control" value="{{ \App\Models\Mahasiswa::find($mahasiswaId)?->user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" value="{{ \App\Models\Company::find($companyId)?->user->name }}" readonly>
        </div>
        
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ old('evaluasi') }}</textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
