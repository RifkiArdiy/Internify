
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('lowonganMagang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Lowongan</span>
        </a>
    </li>
@endsection

    <a href="{{ route('lowonganMagang.create') }}"> Tambah</a>
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
                    <a href="{{ route('lowonganMagang.edit', $item->lowongan_id) }}">Edit</a> |
                    <form action="{{ route('lowonganMagang.destroy', $item->lowongan_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                    <a href="{{ route('lowonganMagang.show', $item->lowongan_id) }}">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
