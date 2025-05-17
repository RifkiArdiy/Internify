@extends('layouts.app')

@section('content')

    {{-- Flash success message jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h6 class="sub-title">Jumlah Mahasiswa Sudah Diterima Magang : {{$mahasiswaMagang->lulus}}</h6>
    {{-- Lamaran yang menunggu review --}}
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h5 class="title mb-3">Lamaran yang Menunggu Review</h5>       
            <table class="datatable-init table nowrap">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <th>Judul Lowongan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unreviewedLamarans as $item)
                        <tr>
                            <td>{{ $item->mahasiswas->user->name }}</td>
                            <td>{{ $item->lowongans->title }}</td>
                            <td>
                                <a href="{{ route('admin.magangApplication.show', $item->magang_id) }}" class="btn btn-success btn-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Daftar Perusahaan Mitra --}}
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h5 class="title mb-3">Daftar Perusahaan yang Bermitra</h5>
            <ul class="list list-sm">
                @foreach ($mitras as $item)
                    <li>
                        <a href="{{ route('companies.show', $item->company_id) }}">{{ $item->user->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Daftar Lowongan --}}
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <h5 class="title mb-3">Daftar Lowongan yang Tersedia</h5>
            <table class="datatable-init table nowrap">
                <thead>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <th>Judul Magang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowongans as $item)
                        <tr>
                            <td>{{ $item->company->user->name }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ route('admin.lowonganMagang.show', $item->lowongan_id) }}" class="btn btn-success btn-sm">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
