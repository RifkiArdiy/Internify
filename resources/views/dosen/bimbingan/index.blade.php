@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-review">
        <div class="card-inner">
            <table class="datatable-init-export nowrap table nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">Nama Mahasiswa</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">NIM</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Lowongan Magang</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Catatan</span></th>
                        {{-- <th class="nk-tb-col export-col"><span class="sub-text">Status</span></th> --}}
                        <th class="nk-tb-col export-col"><span class="sub-text">Tanggal Pengajuan</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bimbingans as $bimbingan)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-success-dim d-none d-sm-flex">
                                        @if ($bimbingan->magang->mahasiswas->user->image)
                                            <img src="{{ Storage::url('images/users/' . $bimbingan->magang->mahasiswas->user->image) }}"
                                                alt="{{ $bimbingan->magang->mahasiswas->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $bimbingan->magang->mahasiswas->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">
                                            {{ $bimbingan->magang->mahasiswas->user->name ?? 'N/A' }}
                                            <span class="dot dot-succes d-md-none ms-1"></span>
                                        </span>
                                        <span>
                                            {{ $bimbingan->magang->mahasiswas->user->email ?? 'N/A' }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col"><span>{{ $bimbingan->magang->mahasiswas->nim ?? 'N/A' }}</span></td>
                            <td class="nk-tb-col"><span>{{ $bimbingan->magang->lowongans->title ?? 'N/A' }}</span></td>
                            <td class="nk-tb-col">
                                <span>{{ $bimbingan->magang->lowongans->company->user->name ?? 'N/A' }}</span>
                            </td>
                            <td class="nk-tb-col">
                                @if ($bimbingan->status === 'Pending')
                                    <span class="text-warning">Pending</span>
                                @elseif ($bimbingan->status === 'Disetujui')
                                    <span class="text-success">Disetujui</span>
                                @else
                                    <span class="text-danger">Ditolak</span>
                                @endif
                            </td>
                            <td class="nk-tb-col"><span>{{ $bimbingan->created_at->format('d M Y') }}</span></td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="{{ route('bimbingan.show', $bimbingan->bimbingan_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada pengajuan bimbingan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
