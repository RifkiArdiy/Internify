@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('periode-magang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Periode</span>
        </a>
    </li>
@endsection

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
                        <th class="nk-tb-col export-col"><span class="sub-text">Program Magang</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Tanggal Mulai</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Tanggal Berakhir</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegang as $pegangs)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $pegangs->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $pegangs->start_date }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $pegangs->end_date }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick
                                                                View</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View
                                                                Details</span></a></li>
                                                    <li><a href="{{ route('periode-magang.edit', $pegangs->period_id) }}"><em
                                                                class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>

                                                    <li class="divider"></li>

                                                    <li><a
                                                            href="{{ route('periode-magang.destroy', $pegangs->period_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                Data</span></a></li>
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
