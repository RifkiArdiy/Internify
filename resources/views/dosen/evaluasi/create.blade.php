@extends('layouts.app')

@section('content')
    
    <form action="{{ route('evaluasi.store') }}" method="POST"> 
        @csrf     
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->mahasiswa_id }}">{{ $mhs->user->name ?? '-' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <select name="company_id" class="form-control" required>
                <option value="">-- Pilih Perusahaan --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->company_id }}">{{ $company->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ old('evaluasi') }}</textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
