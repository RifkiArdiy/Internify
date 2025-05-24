@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form method="POST" action="{{ route('periode-magang.update', $pegang->period_id) }}">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Nama Periode Magang</label>
                            <input type="text" name="name" value="{{ $pegang->name }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Masa Awal</label>
                            <input type="date" name="start_date" value="{{ $pegang->start_date }}" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Masa Akhir</label>
                            <input type="date" name="end_date" value="{{ $pegang->end_date }}" class="form-control"
                                required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <a href="{{ route('periode-magang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
