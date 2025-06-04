@extends('layouts.app')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner table-responsive">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col">
                            <span class="sub-text">No</span>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Mahasiswa</span></th>
                        {{-- <th class="nk-tb-col"><span class="sub-text">Dosen Pembimbing</span></th> --}}
                        <th class="nk-tb-col"><span class="sub-text">Judul Laporan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $loop->iteration }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->mahasiswa->user->name ?? '-' }}</span>
                            </td>
                            {{-- <td class="nk-tb-col">
                                <span>{{ $log->dosen->user->name ?? '-' }}</span>
                            </td> --}}
                            <td class="nk-tb-col">
                                <span>{{ Str::limit(Strip_tags($log->report_title, 50)) }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools" style="white-space: nowrap; max-width: 150px; word-wrap: break-word;">
                                @php
                                    $sudahDievaluasi = \App\Models\EvaluasiMagang::where('mahasiswa_id', $log->mahasiswa_id)
                                                        ->where('log_id', $log->log_id)
                                                        ->exists();
                                @endphp
                                @if ($sudahDievaluasi)
                                    <span>Sudah dievaluasi</span>

                                @elseif ($log->verif_company === 'Disetujui')
                                    
                                    <a href="{{ route('dosen.verifikasi.show', $log->log_id) }}" class="btn btn-sm btn-primary">
                                        Detail
                                    </a>
                               
                                @elseif ($log->verif_company === 'Ditolak')
                                    <span>Ditolak</span>
                                
                                @else
                                    <span>Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
