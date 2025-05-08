@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="POST" action="{{route('periodeMagang.update', $pegang->period_id) }}">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label>Nama Periode Magang</label>
                <input type="text" name="name" value="{{ $pegang->name }}" required>
            </div>

            <div class="mb-3">
                <label>Masa Awal</label>
                <input type="date" name="masaAwal" value="{{ $pegang->start_date }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Masa Akhir</label>
                <input type="date" name="masaAkhir" value="{{ $pegang->end_date }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Simpan</button>
            <a href="{{ route('periodeMagang.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
