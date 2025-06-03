@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Matriks Awal (Nilai Alternatif)</h4>
            <table class="datatable-init-export table table-bordered">
                <thead>
                    <tr>
                        <th>Lowongan</th>
                        @foreach ($kriterias as $k)
                            <th>{{ $k->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $k)
                                <td>{{ $matrix[$alt->alternatif_id][$k->kriteria_id] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Normalisasi</h4>
            <table class="datatable-init-export table table-bordered">
                <thead>
                    <tr>
                        <th>Lowongan</th>
                        @foreach ($kriterias as $k)
                            <th>{{ $k->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $k)
                                <td>{{ number_format($normalized[$alt->alternatif_id][$k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Delta (|x* - x|)</h4>
            <table class="datatable-init-export table table-bordered">
                <thead>
                    <tr>
                        <th>Lowongan</th>
                        @foreach ($kriterias as $k)
                            <th>{{ $k->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $k)
                                <td>{{ number_format($deltas[$alt->alternatif_id][$k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Grey Relational Coefficient (GRC)</h4>
            <table class="datatable-init-export table table-bordered">
                <thead>
                    <tr>
                        <th>Lowongan</th>
                        @foreach ($kriterias as $k)
                            <th>{{ $k->nama }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alt)
                        <tr>
                            <td>{{ $alt->lowongan->title }}</td>
                            @foreach ($kriterias as $k)
                                <td>{{ number_format($grc[$alt->alternatif_id][$k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h4 class="mb-3">Grey Relational Grade (GRG)</h4>
            <table class="datatable-init-export table table-bordered">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Lowongan</th>
                        <th>Skor Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grg as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $row['alternatif']->lowongan->title }}</td>
                            <td>{{ number_format($row['total'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
