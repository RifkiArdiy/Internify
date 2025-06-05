@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Dosen</span>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb export-col"><span class="sub-text">NIP</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg export-col"><span class="sub-text">Alamat</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosens as $dosen)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-orange-dim d-none d-sm-flex">
                                        @if ($dosen->user->image)
                                            <img src="{{ Storage::url('images/users/' . $dosen->user->image) }}"
                                                alt="{{ $dosen->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $dosen->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $dosen->user->name }}<span
                                                class="dot dot-warning d-md-none ms-1"></span></span>
                                        <span>{{ $dosen->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span>{{ $dosen->nip }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $dosen->user->no_telp }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg" data-order="Email Submited - Kyc More Info">
                                <span>{{ $dosen->user->alamat }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('dosen.show', $dosen->dosen_id) }}"><em class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a></li>
                                                    <li><a href="{{ route('dosen.edit', $dosen->dosen_id) }}"><em
                                                                class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{ route('dosen.destroy', $dosen->dosen_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                Dosen</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr><!-- .nk-tb-item  -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
