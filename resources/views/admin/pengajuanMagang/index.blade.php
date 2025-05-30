@extends('layouts.app')

@section('action')
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
                        <th class="nk-tb-col export-col"><span class="sub-text">Mahasiswa</span></th>
                        <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Lowongan</span></th>
                        <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magangs as $magang)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-teal-dim d-none d-sm-flex">
                                        @if ($magang->mahasiswas->user->image)
                                            <img src="{{ Storage::url('images/users/' . $magang->mahasiswas->user->image) }}"
                                                alt="{{ $magang->mahasiswas->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $magang->mahasiswas->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $magang->mahasiswas->user->name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>{{ $magang->mahasiswas->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span><em class="icon ni ni-briefcase"></em> {{ $magang->lowongans->title }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span><em class="icon ni ni-building"></em>
                                    {{ $magang->lowongans->company->user->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                @if ($magang->status === 'Disetujui')
                                    <span class="tb-status text-success">{{ $magang->status }}</span>
                                @elseif ($magang->status === 'Ditolak')
                                    <span class="tb-status text-danger">{{ $magang->status }}</span>
                                @else
                                    <span class="tb-status text-warning">{{ $magang->status }}</span>
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
                                                    <li><a href="{{ route('pengajuan-magang.show', $magang->magang_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a></li>

                                                    <li class="divider"></li>

                                                    <li><a
                                                            href="{{ route('pengajuan-magang.destroy', $magang->magang_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                Lamaran</span></a></li>
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
