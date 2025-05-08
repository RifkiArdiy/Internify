
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                    <form action="{{ route('magangApplication.update', $item->magang_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah anda yakin menyetujui lamaran ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Disetujui">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Setuju</button>
                    </form>
                    
                    <form action="{{ route('magangApplication.update', $item->magang_id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah anda yakin menolak lamaran ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak">
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Tolak</button>
                    </form>
                    <a href="{{ route('magangApplication.show', $item->magang_id) }}">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection
