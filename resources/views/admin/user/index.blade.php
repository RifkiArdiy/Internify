@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('user.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Admin</span>
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
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Alamat</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $admin)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-dark d-none d-sm-flex">
                                        @if ($admin->image)
                                            <img src="{{ Storage::url('images/users/' . $admin->image) }}"
                                                alt="{{ $admin->name }}">
                                        @else
                                            <span>{{ strtoupper(substr($admin->name, 0, 2)) }}</span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">
                                            {{ $admin->name }}
                                            <span class="dot dot-success d-md-none ms-1"></span>
                                        </span>
                                        <span>{{ $admin->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $admin->alamat }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $admin->no_telp }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg" data-order="Email Submited - Kyc More Info">
                                <span >{{ $admin->level->level_nama }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span class="tb-status text-success">Active</span>
                            </td>
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
                                                        <a href="#"><em class="icon ni ni-focus"></em><span>Quick
                                                                View</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><em class="icon ni ni-eye"></em><span>View
                                                                Details</span></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user.edit', $admin->user_id) }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="{{ route('user.destroy', $admin->user_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                Admin</span></a>
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
