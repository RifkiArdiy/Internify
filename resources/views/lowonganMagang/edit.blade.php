@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('lowonganMagang.update', $logang->lowongan_id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Perusahaan</label>
                <select name="company" id="company" class="form-control" required>
                    <option >- Pilih Perusahaan -</option>
                    @foreach ($companies as $item)
                        <option value="{{ $item->company_id }}" {{ $logang->company_id == $item->company_id ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Periode Magang</label>
                <select name="period" id="period" class="form-control" required>
                    <option value="">- Pilih Periode Magang -</option>
                    @foreach ($periode as $item)
                        <option value="{{ $item->period_id }}" {{ $logang->period_id == $item->period_id ? 'selected' : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $logang->title }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="description" class="form-control" value="{{ $logang->description }}" required>
            </div>

            <div class="mb-3">
                <label>Kriteria</label>
                <input type="text" name="requirements" class="form-control" value="{{ $logang->requirements }}" required>
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" value="{{ $logang->location }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
            <a href="{{ route('lowonganMagang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
@endsection
