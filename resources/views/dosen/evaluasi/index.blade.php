@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('dosen.evaluasi.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Evaluasi</span>
        </a>
    </li>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Mahasiswa</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Evaluasi</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"><span class="sub-text">Aksi</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluasi as $e)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $e->evaluasi_id }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-info">
                                    <span class="tb-lead">{{ $e->mahasiswa->user->name ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $e->company->name ?? '-' }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $e->evaluasi }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools text-end">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <a href="{{ route('dosen.evaluasi.edit', $e) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" title="Edit">
                                            <em class="icon ni ni-edit-alt"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('dosen.evaluasi.destroy', $e) }}" method="POST" onsubmit="return confirm('Yakin hapus evaluasi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-trigger btn-icon text-danger" data-bs-toggle="tooltip" title="Hapus">
                                                <em class="icon ni ni-trash-alt"></em>
                                            </button>
                                        </form>
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
