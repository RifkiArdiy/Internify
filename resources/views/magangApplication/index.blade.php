
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <a href="{{ route('magangApplication.create') }}"> Tambah</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mahasiswa</th>
                <th>Judul Lowongan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($magangs as $item)
            <tr>
                <td>{{ $item->magang_id }}</td>
                <td>{{ $item->student->user->name }}</td>
                <td>{{ $item->lowongan->title }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('magangApplication.edit', $item->magang_id) }}">Edit</a> |
                    <form action="{{ route('magangApplication.destroy', $item->magang_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
