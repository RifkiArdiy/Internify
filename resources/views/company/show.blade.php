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
                <div class="col-md-6 text-end">
                    <form action="{{ route('company.verifikasi.update', $log->log_id) }}"
                        method="POST" style="display: inline;"
                        onsubmit="return confirm('Apakah anda yakin menyetujui laporan ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="verif_company" value="Disetujui">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
                            style="background: rgb(32, 155, 32)">
                            <span style="padding:5px;">Setuju</span></button>
                    </form>

                    <form action="{{ route('company.verifikasi.update', $log->log_id) }}"
                        method="POST" style="display: inline;"
                        onsubmit="return confirm('Apakah anda yakin menolak laporan ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="verif_company" value="Ditolak">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
                            style="background: red;">
                            <span style="padding: 5px;">Tolak</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
