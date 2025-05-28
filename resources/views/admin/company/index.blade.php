@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('companies.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Mitra</span>
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
                        <th class="nk-tb-col export-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Alamat</span></th>
                        <th class="nk-tb-col tb-col-md export-col"><span class="sub-text">Kontak</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-indigo-dim d-none d-sm-flex">
                                        @if ($company->user->image)
                                            <img src="{{ Storage::url('images/users/' . $company->user->image) }}"
                                                alt="{{ $company->user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $company->user->name }}<span
                                                class="dot dot-secondary d-md-none ms-1"></span></span>
                                        <span>{{ $company->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $company->user->alamat ?? 'N/A' }}</span>
                            </td>
                            <td class="nk-tb-col tb-col-md">
                                <span>{{ $company->user->no_telp ?? 'N/A' }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('companies.show', $company->company_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat
                                                                Detail</span></a></li>
                                                    <li><a href="{{ route('companies.edit', $company->company_id) }}"><em
                                                                class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                    </li>

                                                    <li class="divider"></li>

                                                    <li><a href="{{ route('companies.destroy', $company->company_id) }}"><em
                                                                class="icon ni ni-trash"></em><span>Hapus
                                                                Company</span></a></li>
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