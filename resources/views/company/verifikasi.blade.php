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
                        <th class="nk-tb-col export-col"><span class="sub-text">Mahasiswa</span></th>
                        {{-- <th class="nk-tb-col"><span class="sub-text">Dosen Pembimbing</span></th> --}}
                        <th class="nk-tb-col export-col"><span class="sub-text">Isi Laporan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-teal-dim d-none d-sm-flex">
                                        @if ($log->mahasiswa->user->image)
                                            <img src="{{ Storage::url('images/users/' . $log->mahasiswa->user->image) }}"
                                                alt="{{ $log->mahasiswa->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $log->mahasiswa->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $log->mahasiswa->user->name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>{{ $log->mahasiswa->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->report_title }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="nk-tb-col">
                                @if ($log->verif_company === 'Disetujui')
                                    <span class="tb-status text-success">Verified</span>
                                @elseif ($log->verif_company === 'Ditolak')
                                    <span class="tb-status text-danger">Ditolak</span>
                                @elseif ($log->verif_company === 'Pending')
                                    <span class="tb-status text-warning">Pending</span>
                                @endif
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('company.verifikasi.show', $log->log_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
