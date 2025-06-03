@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('action')
    <a href="{{ route('company.sertifikatMagang.create') }}" class="btn btn-primary mb-3">Buat Sertifikat</a>
@endsection

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sertifikats as $index => $sertifikat)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sertifikat->judul }}</td>
                            <td>{{ Str::limit(strip_tags($sertifikat->deskripsi), 50) }}</td>
                            <td>
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-icon btn-trigger dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li>
                                                        <a href="{{ route('company.sertifikatMagang.edit', $sertifikat->sertifikat_id) }}">
                                                            <em class="icon ni ni-edit-alt"></em><span>Edit</span>
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                        <a href="{{ route('company.sertifikatMagang.show', $sertifikat->sertifikat_id) }}">
                                                            <em class="icon ni ni-eye"></em><span>Detail</span>
                                                        </a>
                                                    </li> --}}
                                                    <li class="divider"></li>
                                                    <li>
                                                        <form action="{{ route('company.sertifikatMagang.destroy', $sertifikat->sertifikat_id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link text-danger"
                                                                onclick="return confirm('Yakin ingin menghapus laporan ini?')">
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
