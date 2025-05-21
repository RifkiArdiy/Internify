@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Judul</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Deskripsi</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Kriteria</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                        {{-- <th class="nk-tb-col export-col"><span class="sub-text">Lokasi</span></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logang as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $item->company->user->name }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $item->title }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($item->description, 50) }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ Str::limit($item->requirements, 50) }}</span>
                            </td>
                            @php
                                $mahasiswaId = Auth::user()->mahasiswa->mahasiswa_id ?? null;
                                $lamaran = \App\Models\MagangApplication::where('mahasiswa_id', $mahasiswaId)
                                    ->where('lowongan_id', $item->lowongan_id)
                                    ->first();
                            @endphp
                            <td class="nk-tb-col">
                                @if ($lamaran)
                                    @if ($lamaran->status === 'Disetujui')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif ($lamaran->status === 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
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
                                                    <li><a href="{{ route('lowongan-magang.show', $item->lowongan_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat Detail</span></a>
                                                    </li>
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
