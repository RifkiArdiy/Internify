@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <p>Halaman ini menampilkan rekap dari semua data seperti lowangan magang, user, aktivitas, dll</h3>
            <div class="example-alert">
                <div class="alert alert-warning alert-icon">
                    <em class="icon ni ni-alert-circle"></em> Halaman ini masih dalam tahap pengembanagan.
                    Fitur Dashboard akan segera tersedia.
                </div>
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <h4>Lamaran yang menunggu review</h4>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
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
                        <td><button onclick="window.location.href='{{ route('magangApplication.show', $item->magang_id) }}'"
                                class="btn btn-success btn-sm">
                                Lihat Detail
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card card-bordered card-preview">
        <h4>Daftar Perusahaan yang Bermitra</h4>
        @foreach ($mitras as $item)
            <a href={{ route('companies.show', $item->company_id) }}>{{ $item->user->name }}</a>
        @endforeach
    </div>

    <div class="card card-bordered card-preview">
        <h4>Daftar Lowongan yang tersedia</h4>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
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
                        <td><button onclick="window.location.href='{{ route('lowonganMagang.show', $item->lowongan_id) }}'"
                                class="btn btn-success btn-sm">
                                Lihat Detail
                            </button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
