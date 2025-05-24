@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('periode-magang.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Nama Periode Magang:<span class="text-danger">*</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal Mulai</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" class="form-control date-picker" name="start_date">
                            </div>
                            <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal Berakhir</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" class="form-control date-picker" name="end_date">
                            </div>
                            <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
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
