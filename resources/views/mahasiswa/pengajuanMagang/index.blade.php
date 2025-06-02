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
                            <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Lowongan</span></th>
                            <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Perusahaan</span></th>
                            <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">Status</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-end"><span class="sub-text">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($magangs as $magang)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col tb-col-mb">
                                    <span class="tb-amount">{{ $magang->lowongans->title }}</span>
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    <span class="tb-amount"><em class="icon ni ni-building"></em>
                                        {{ $magang->lowongans->company->user->name }}
                                    </span>
                                </td>
                                <td class="nk-tb-col tb-col-mb">
                                    {{-- <span>{{ $magang->status }}</span> --}}
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
                                                        <li>
                                                            <form action="{{ route('hapusLamaran', $magang->magang_id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn text-danger d-flex align-items-center px-0">
                                                                    <em class="icon ni ni-trash"></em>
                                                                    <span>Hapus Pengajuan</span>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                    {{-- @if ($magang->status === 'Disetujui' || $magang->status === 'Ditolak')
                                        <span>Reviewed</span>
                                    @else
                                        <form action="{{ route('magangApplication.update', $magang->magang_id) }}"
                                            method="POST" style="display: inline;"
                                            onsubmit="return confirm('Apakah anda yakin menyetujui lamaran ini?')">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Disetujui">
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
                                                style="background: rgb(32, 155, 32)">
                                                <span style="padding:5px;">Setuju</span></button>
                                        </form>

                                        <form action="{{ route('magangApplication.update', $magang->magang_id) }}"
                                            method="POST" style="display: inline;"
                                            onsubmit="return confirm('Apakah anda yakin menolak lamaran ini?')">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Ditolak">
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
                                                style="background: red;">
                                                <span style="padding: 5px;">Tolak</span>
                                            </button>
                                        </form>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
