@extends('layouts.app')
@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('bimbingan.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Ajukan Bimbingan</span>
        </a>
    </li>
@endsection
@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Dosen</span></th>
                        <th class="nk-tb-col tb-col-sm export-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Dokumen Bimbingan</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Dokumen Perusahaan</span></th>
                        <th class="nk-tb-col tb-col-sm export-col"><span class="sub-text">Tanggal Disetujui</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bimbingans as $b)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-success-dim d-none d-sm-flex">
                                        @if ($b->dosen->image)
                                            <img src="{{ Storage::url('images/users/' . $b->dosen->image) }}"
                                                alt="{{ $b->dosen->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $b->dosen->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">
                                            {{ $b->dosen->name ?? 'N/A' }}
                                            <span class="dot dot-succes d-md-none ms-1"></span>
                                        </span>
                                        <span>
                                            {{ $b->dosen->email ?? 'N/A' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-sm">
                                @if ($b->status === 'Pending')
                                    <span class="text-warning">Pending</span>
                                @elseif ($b->status === 'Disetujui')
                                    <span class="text-success">Disetujui</span>
                                @else
                                    <span class="text-danger">Ditolak</span>
                                @endif
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                @if ($b->dokumen_bimbingan)
                                    <a href="{{ asset('storage/dokumen_bimbingan/' . $b->dokumen_bimbingan) }}"
                                        target="_blank">Lihat Dokumen</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                @if ($b->dokumen_perusahaan)
                                    <a href="{{ asset('storage/dokumen_perusahaan/' . $b->dokumen_perusahaan) }}"
                                        target="_blank">Lihat Dokumen</a>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td class="nk-tb-col tb-col-sm">
                                <span class="tb-amount">{{ $b->tanggal_disetujui ?? 'N/A' }}</span>
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
