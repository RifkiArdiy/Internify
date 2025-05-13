@extends('layouts.app')

@section('content')
    <form action="{{ route('evaluasi.update', $evaluation) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" class="form-control" required>
                @foreach($mahasiswas as $mhs)
                    <option value="{{ $mhs->mahasiswa_id }}" {{ $mhs->mahasiswa_id == $evaluation->mahasiswa_id ? 'selected' : '' }}>
                        {{ $mhs->user->name ?? '-' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <select name="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->company_id }}" {{ $company->company_id == $evaluation->company_id ? 'selected' : '' }}>
                        {{ $company->user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="evaluasi" class="form-label">Evaluasi</label>
            <textarea name="evaluasi" class="form-control" rows="4" required>{{ $evaluation->evaluasi }}</textarea>
        </div>
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('evaluasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
