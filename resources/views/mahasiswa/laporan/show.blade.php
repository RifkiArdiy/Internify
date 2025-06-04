@extends('layouts.app')

@section('action')
<style>
    #quill-editor{
        overflow-x: auto;
        word-wrap: break-word;
    }
    .ql-editor {
        word-break: break-word;
    }
</style>

    <li class="nk-block-tools-opt">
        <a href="{{ route('laporan') }}" class="btn btn-light">
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
                        <div id="quill-report" style="height: 150px;">{!! old('report_text', $log->report_text) !!}</div>
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
