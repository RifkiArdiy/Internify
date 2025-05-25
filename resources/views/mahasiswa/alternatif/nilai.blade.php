@extends('layouts.app')

@section('content')
    <h2>Input Nilai Alternatif</h2>
    <p>Alternatif: {{ $alternatif->mahasiswa->nama }} - {{ $alternatif->lowongan->nama }}</p>

    <form action="{{ route('nilai.update', $alternatif->alternatif_id) }}" method="POST">
        @csrf
        @foreach ($kriterias as $kriteria)
            <div>
                <label>{{ $kriteria->nama }} ({{ $kriteria->kode }})</label>
                <input type="number" step="0.01" name="nilai[{{ $kriteria->kriteria_id }}]"
                    value="{{ $skor_kriteria[$kriteria->kriteria_id] ?? '' }}" required>
            </div>
        @endforeach

        <button type="submit">Simpan Nilai</button>
    </form>
@endsection
