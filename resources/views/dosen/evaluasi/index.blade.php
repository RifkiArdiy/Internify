@extends('layouts.app')

{{-- @section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('evaluasi.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Evaluasi</span>
        </a>
    </li>
@endsection --}}
@php use Illuminate\Support\Str; @endphp
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col export-col"><span class="sub-text">ID</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Mahasiswa</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col export-col"><span class="sub-text">Evaluasi</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"><span class="sub-text">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluasi as $e)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $loop->iteration }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-info">
                                    <span>{{ $e->mahasiswa->user->name ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $e->company->user->name ?? '-' }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{!! Str::limit(strip_tags($e->evaluasi), 50) !!}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                    <li><a href="{{ route('evaluasi.edit', $e->evaluasi_id) }}">
                                            <em class="icon ni ni-edit"></em>
                                            <span>Edit</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <form action="{{ route('evaluasi.destroy', $e) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger"><em
                                                    class="icon ni ni-trash"></em><span>Hapus</span></button>
                                        </form>
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
