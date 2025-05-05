@extends('layouts.app')

@section('content')
    {{-- <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a> --}}
    {{-- @livewire('mahasiswa') --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid">
                                <label class="custom-control-label" for="uid"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Nim</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Jurusan</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Last Login</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mhs)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid13">
                                    <label class="custom-control-label" for="uid13"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-dark d-none d-sm-flex">
                                        <img src="{{ asset('assets/home/images/team/a.jpg') }}" alt="">
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $mhs->user->name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                        <span>{{ $mhs->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-mb">
                                <span class="tb-amount">{{ $mhs->nim }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $mhs->no_telp }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg" data-order="Email Submited - Kyc More Info">
                                <span class="tb-amount">{{ $mhs->prodi->name }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>18 Jan 2020</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span class="tb-status text-info">Inactive</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li class="nk-tb-action-hidden">
                                        <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Wallet">
                                            <em class="icon ni ni-wallet-fill"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Send Email">
                                            <em class="icon ni ni-mail-fill"></em>
                                        </a>
                                    </li>
                                    <li class="nk-tb-action-hidden">
                                        <a href="#" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Suspend">
                                            <em class="icon ni ni-user-cross-fill"></em>
                                        </a>
                                    </li>
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
                                                    <li><a href="{{ route('mahasiswa.edit', $mhs->mahasiswa_id) }}"><em
                                                                class="icon ni ni-repeat"></em><span>Edit</span></a>
                                                    </li>
                                                    <li><a href="#"><em
                                                                class="icon ni ni-activity-round"></em><span>Activities</span></a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><em
                                                                class="icon ni ni-shield-star"></em><span>Reset
                                                                Pass</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset
                                                                2FA</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend
                                                                User</span></a></li>
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
{{-- <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->user->name }}</td>
                    <td>{{ $mahasiswa->user->username }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->prodi->name }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}
