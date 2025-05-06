@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('companies.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Industri</span>
        </a>
    </li>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">+ Tambah Perusahaan</a>

            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="uid">
                                <label class="custom-control-label" for="uid"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Bidang Industri</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Alamat</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Kontak</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid{{ $company->company_id }}">
                                    <label class="custom-control-label" for="uid{{ $company->company_id }}"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar bg-dark d-none d-sm-flex">
                                        <img src="{{ asset('assets/home/images/team/a.jpg') }}" alt="company-logo">
                                    </div>
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $company->name }}<span
                                                class="dot dot-success d-md-none ms-1"></span></span>
                                    </div>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $company->industry }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $company->address }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <span>{{ $company->contact }}</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <a href="{{ route('companies.show', $company->company_id) }}"
                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Detail">
                                            <em class="icon ni ni-eye"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('companies.edit', $company->company_id) }}"
                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit">
                                            <em class="icon ni ni-repeat"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('companies.destroy', $company->company_id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus perusahaan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-trigger btn-icon btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Hapus">
                                                <em class="icon ni ni-trash"></em>
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
