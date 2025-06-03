@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('prodi.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Prodi</span>
        </a>
    </li>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">Program Studi</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Jumlah</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-dark d-none d-sm-flex">
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $item->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    </div>
                                    <div class="user-info">
                                        <span>{{ $item->name }}<span
                                                class="dot dot-dark d-md-none ms-1"></span></span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span><em class="icon ni ni-users"></em> {{ $item->mahasiswas->count() }}
                                    Mahasiswa</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools text-end">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('prodi.edit', $item->prodi_id) }}"><em
                                                                class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>

                                                    <li class="divider"></li>

                                                    <li><a href="{{ route('prodi.destroy', $item->prodi_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                User</span></a></li>
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
