@extends('layouts.app')

@section('content')
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
                                <a href="{{ route('company.magangApplication.show', $item->magang_id) }}" class="btn btn-success btn-sm">
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
