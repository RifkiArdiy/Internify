@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Tambah Lowongan Magang</h4>

        <form method="POST" action="{{ route('lowonganMagang.store') }}">
            @csrf

            <div class="mb-3">
                <label>Perusahaan</label>
                <select name="company" id="company" required>
                    <option value="">- Pilih Perusahaan -</option>
                    @foreach ($companies as $item)
                        <option value="{{ $item->company_id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Periode Magang</label>
                <select name="period" id="period" required>
                    <option value="">- Pilih Periode Magang -</option>
                    @foreach ($periode as $item)
                        <option value="{{ $item->period_id }}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <input type="text" name="description" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kriteria</label>
                <input type="text" name="requirements" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
            <a href="{{ route('lowonganMagang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
