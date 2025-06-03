@extends('layouts.app')

@section('content')
    <!-- Matriks Awal -->
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Matriks Awal (Nilai Alternatif)</h4>
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr>      
                        <th>Lowongan</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>{{ $matrix[$alt->alternatif_id][$kriteria->kriteria_id] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Normalisasi -->
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Tabel Normalisasi</h4>
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr> 
                        <th>Lowongan</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>{{ number_format($normal[$alt->alternatif_id][$kriteria->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Hasil Akhir -->
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <h4 class="mb-3">Hasil Perhitungan SPK (Metode SAW)</h4>
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Lowongan</th>
                        <th>Total Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result['alternatif']->lowongan->title }}</td>
                            <td>{{ number_format($result['total'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
