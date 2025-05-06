
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <a href="{{ route('lowonganMagang.create') }}"> Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Perusahaan</th>
                <th>Masa Awal</th>
                <th>Masa Akhir</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kriteria</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logang as $item)
            <tr>
                <td>{{ $item->lowongan_id }}</td>
                <td>{{ $item->company->name }}</td>
                <td>{{ $item->period->start_date }}</td>
                <td>{{ $item->period->end_date }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->requirements }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    <a href="{{ route('lowonganMagang.edit', $item->lowongan_id) }}">Edit</a> |
                    <form action="{{ route('lowonganMagang.destroy', $item->lowongan_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                    <a href="{{ route('magangApplication.create', $item->company->company_id) }}">Buat Lamaran</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
