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
                        <th class="nk-tb-col"><span class="sub-text">No</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Mahasiswa</span></th>
                        {{-- <th class="nk-tb-col"><span class="sub-text">Dosen Pembimbing</span></th> --}}
                        <th class="nk-tb-col"><span class="sub-text">Isi Laporan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{$loop->iteration}}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->mahasiswa->user->name ?? '-' }}</span>
                            </td>
                            {{-- <td class="nk-tb-col">
                                <span>{{ $log->dosen->user->name ?? '-' }}</span>
                            </td> --}}
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($log->report_text, 50) }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                @if ($log->verif_company === 'Disetujui')
                                    <span>Verified</span>
                                @elseif ($log->verif_company === 'Ditolak')
                                    <span>Ditolak</span>
                                @else
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('company.verifikasi.show', $log->log_id)}}"><em class="icon ni ni-eye"></em><span>Lihat Detail</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
