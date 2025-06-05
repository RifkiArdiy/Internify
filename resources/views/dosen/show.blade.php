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
        <a href="{{ route('dosen.verifikasi') }}" class="btn btn-light">
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
                    <p class="fw-bold">{{ $logs->mahasiswa->user->name ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Dosen Pembimbing</h6>
                    <p class="fw-bold">{{ $logs->dosen->user->name ?? '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Judul Laporan</h6>
                    <p class="fw-bold">{{ $logs->report_title ?? '-' }}</p>
                </div>
                <div class="col-12">
                    <h6 class="mb-1 text-soft">Laporan</h6>
                    <div class="border rounded p-3 bg-light">
                        <div id="quill-report" style="height: 100px;">{!! old('report_text', $logs->report_text) !!}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-1 text-soft">Tanggal Dibuat</h6>
                    <p class="fw-bold">{{ $logs->created_at->format('d M Y') }}</p>
                </div>
                <div class="col-md-6 text-end">
                    <li class="nk-block-tools-opt">
                        <a href="{{ route('evaluasi.verifikasi', $logs->log_id) }}" class="btn btn-sm btn-primary">
                            Evaluasi
                        </a>
                    </li>
                    
                    
                    {{-- @if ($log->verif_dosen === 'Disetujui')
                    <li class="nk-block-tools-opt">
                        <a href="{{ route('evaluasi.create', [
                                'mahasiswa_id' => $logs->mahasiswa_id,
                                'company_id' => $logs->company_id,
                                'log_id' => $logs->log_id
                            ]) }}" class="btn btn-sm btn-primary">
                            Evaluasi
                        </a>                        
                    </li>
                    @elseif ($log->verif_dosen === 'pending')
                        <span class="badge badge-danger">Ditolak</span>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
