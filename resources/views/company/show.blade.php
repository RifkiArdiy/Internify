@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('company.verifikasi') }}" class="btn btn-light">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row gy-4">
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Nama Mahasiswa</h6>
                    <p class="fw-bold">{{ $log->mahasiswa->user->name ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Dosen Pembimbing</h6>
                    <p class="fw-bold">{{ $log->dosen->user->name ?? '-' }}</p>
                </div>
                <div class="col-12">
                    <h6 class="mb-1 text-soft">Laporan</h6>
                    <div class="border rounded p-3 bg-light">
                        {!! nl2br(e($log->report_text)) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Tanggal Dibuat</h6>
                    <p class="fw-bold">{{ $log->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
