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
                        <th class="nk-tb-col export-col"><span class="sub-text">Judul Lowongan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Periode Awal</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Periode akhir</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magangs as $magang)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span class="tb-amount">{{ $magang->lowongans->title }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $magang->lowongans->period->start_date }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $magang->lowongans->period->end_date }}</span>
                            </td>
                            <td class="nk-tb-col">
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
                                                        <a href="{{ route('lihatLamaran', $magang->magang_id) }}">
                                                            <em class="icon ni ni-eye"></em><span>Lihat Detail</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    @if (auth()->user()->hasRole('Mahasiswa'))
                                                        <li>
                                                            <form action="{{ route('hapusLamaran', $magang->magang_id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
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
            {{-- <table border="1">

                <tbody>
                    @foreach ($magangs as $magang)
                        <tr>
                            <td>{{ $item->magang_id }}</td>
                            <td>{{ $item->lowongans->title }}</td>
                            <td>{{ $item->lowongans->period->start_date }}</td>
                            <td>{{ $item->lowongans->period->end_date }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->lowongans->description }}</td>
                            <td>
                                <form action="{{ route('hapusLamaran', $item->magang_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
    </body>
@endsection
