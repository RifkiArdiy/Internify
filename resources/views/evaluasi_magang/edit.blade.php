@extends('layouts.app')

@section('content')
    <h2>Edit Evaluasi Magang</h2>
    <form action="{{ route('dosen.evaluasi.update', $evaluasi_magang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->mahasiswa_id }}" {{ $mhs->mahasiswa_id == $evaluasi_magang->mahasiswa_id ? 'selected' : '' }}>
                        {{ $mhs->user->name ?? '-' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <select name="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->company_id }}" {{ $company->company_id == $evaluasi_magang->company_id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ $evaluasi_magang->evaluasi }}</textarea>
        </div>
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('evaluasi_magang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
