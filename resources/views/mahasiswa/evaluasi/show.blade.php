@extends('layouts.app')

@section('content')
<div class="nk-block nk-block-lg">
    <div class="card card-bordered">
        <div class="card-inner">

            <div class="row g-gs">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Dosen Pembimbing</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" value="{{ $evaluation->logs->dosen->user->name ?? '-' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Perusahaan</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" value="{{ $evaluation->company->user->name ?? '-' }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Laporan Saya</label>
                        <div class="form-control-wrap">
                            <textarea type="text" class="form-control"readonly> {{ strip_tags($evaluation->logs->report_text) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label">Isi Evaluasi</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" rows="5" readonly>{{ strip_tags($evaluation->evaluasi) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <a href="{{ route('evaluasi-index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
