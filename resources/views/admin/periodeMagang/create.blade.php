@extends('layouts.app')


@section('content')
    <div class="container">

        <form method="POST" action="{{ route('periodeMagang.store') }}">
            @csrf

            <div class="mb-3">
                <label>Nama Periode Magang</label>
                <input type="text" name="name" required>
            </div>

            <div class="mb-3">
                <label>Masa Awal</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Masa Akhir</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
            <a href="{{ route('periodeMagang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
