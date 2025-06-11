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
                            <label class="form-label">Tanggal Mulai</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" name="start_date" class="form-control date-picker"
                                    value="{{ \Carbon\Carbon::parse($pegang->start_date)->format('d/m/Y') }}"
                                    placeholder="dd/mm/yyyy" required>
                            </div>
                            <div class="form-note">Date format <code>dd/mm/yyyy</code></div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal Berakhir</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" name="end_date" class="form-control date-picker"
                                    value="{{ \Carbon\Carbon::parse($pegang->end_date)->format('d/m/Y') }}"
                                    placeholder="dd/mm/yyyy" required>
                            </div>
                            <div class="form-note">Date format <code>dd/mm/yyyy</code></div>
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
