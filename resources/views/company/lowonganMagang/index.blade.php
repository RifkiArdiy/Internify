@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('companys-lowongan-magang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Lowongan</span>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">Judul</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Jumlah Pelamar</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Aksi</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logang as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $item->title }}</span>
                                    <span>{{ $item->period->name }} | {{ $item->created_at->diffForHumans() }} </span>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span><em class="icon ni ni-users"></em>
                                    {{ $item->jumlahPelamar() }} Pelamar
                                </span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>
                                    <a href="{{ route('companys-lowongan-magang.pelamars', $item->lowongan_id) }}"
                                        class="btn btn-primary">Lihat Daftar Pelamar</a>
                                </span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('show.lowongan', $item->lowongan_id) }}">
                                                            <em class="icon ni ni-eye"></em><span>Lihat Detail</span></a>
                                                    </li>
                                                    <li><a
                                                            href="{{ route('companys-lowongan-magang.edit', $item->lowongan_id) }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <form
                                                            action="{{ route('companys-lowongan-magang.destroy', $item->lowongan_id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger">
                                                                <em class="icon ni ni-trash"></em><span>Hapus</span>
                                                            </button>
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
