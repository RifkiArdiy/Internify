@extends('layouts.app')

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form method="POST" action="{{ route('company.sertifikatMagang.update', $sertifikat->sertifikat_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul Sertifikat</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $sertifikat->judul) }}" required>
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $sertifikat->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="form-group mt-3">
                <label for="sertifikat">Upload PDF Sertifikat (Kosongkan jika tidak ingin mengubah)</label>
                <input type="file" name="sertifikat" class="form-control" accept="application/pdf">
                @error('sertifikat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @if ($sertifikat->path)
                <div class="mt-2">
                    <a href="{{ Storage::url($sertifikat->path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        Lihat Sertifikat Saat Ini
                    </a>
                </div>
            @endif --}}

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Sertifikat</button>
                <a href="{{ route('company.sertifikatMagang.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection