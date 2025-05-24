@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Laporan</span>
        </a>
    </li>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Dosen Pembimbing</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Isi Laporan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Tanggal</span></th>
                        <th class="nk-tb-col export-col d-none"><span class="sub-text">Verif Perusahaan</span></th>
                        <th class="nk-tb-col export-col d-none"><span class="sub-text">Verif Dosen</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $log->companies->user->name ?? '-' }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->dosen->user->name ?? '-' }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($log->report_text, 50) }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $log->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="nk-tb-col d-none">
                                <span>{{ $log->verif_company }}</span>
                            </td>
                            <td class="nk-tb-col d-none">
                                <span>{{ $log->verif_dosen }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="{{ route('laporan.show', $log->log_id) }}">
                                                            <em class="icon ni ni-eye"></em><span>Lihat Detail</span>
                                                        </a>
                                                    </li>
                                                    @if (auth()->user()->hasRole('Mahasiswa'))
                                                        <li>
                                                            <a href="{{ route('laporan.edit', $log->log_id) }}">
                                                                <em class="icon ni ni-edit"></em><span>Edit</span>
                                                            </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <form action="{{ route('laporan.destroy', $log->log_id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link text-danger">
                                                                    <em class="icon ni ni-trash"></em><span>Hapus</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
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
