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
                        <th class="nk-tb-col export-col"><span class="sub-text">Aksi</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
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
                                @else
                                    <form action="{{ route('magangApplication.storeMhs', $item->lowongan_id) }}"
                                        method="POST" onsubmit="return confirm('Yakin ingin melamar lowongan ini?')">
                                        @csrf
                                        <input type="hidden" name="lowongan_id" value="{{ $item->lowongan_id }}">
                                        <input type="hidden" name="status" value="Pending">
                                        <button type="submit" class="btn btn-success btn-sm">Lamar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
