@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @section('action')
        <li class="nk-block-tools-opt">
            <a href="{{ route('lowonganMagang.create') }}" class="btn btn-primary">
                <em class="icon ni ni-plus"></em>
                <span>Tambah Lowongan</span>
            </a>
        </li>
    @endsection

    <a href="{{ route('lowonganMagang.create') }}">Tambah</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Perusahaan</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logang as $item)
            <tr>
                <td>{{ $item->lowongan_id }}</td>
                <td>{{ $item->company->name }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    <form action="{{ route('buatLamaran') }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin melamar?')">
                        @csrf
                        <input type="hidden" name="lowongan_id" value="{{ $item->lowongan_id }}">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Buat Lamaran</button>
                    </form>
                    <a href="{{ route('lowongan.show', $item->lowongan_id) }}">Detail</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
