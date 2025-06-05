@extends('layouts.app')

{{-- @section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('evaluasi.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Evaluasi</span>
        </a>
    </li>
@endsection --}}
@php
    use Illuminate\Support\Str;
@endphp
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <table class="datatable-init-export nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">
                <thead>
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col"><span class="sub-text">No</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Dosen Pembimbing</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Perusahaan</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Evaluasi</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluations as $e)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">
                                <span>{{ $loop->iteration }}</span>
                            </td>
                            <td class="nk-tb-col">
                                <div class="user-info">
                                    <span>{{ $e->logs->dosen->user->name ?? '-' }}</span>
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
                                            <a href="" class="dropdown-toggle btn btn-icon btn-trigger"
                                                data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('evaluasi-show', $e->evaluasi_id) }}"><em
                                                                class="icon ni ni-eye"></em><span>Lihat Detail</span></a>
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
