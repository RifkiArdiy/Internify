@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Evaluasi Magang</h2>
        <a href="{{ route('dosen.evaluasi.create') }}" class="btn btn-primary">Tambah Evaluasi</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mahasiswa</th>
                <th>Perusahaan</th>
                <th>Evaluasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($evaluasi as $e)
            <tr>
                <td>{{ $e->evaluasi_id }}</td>
                <td>{{ $e->mahasiswa->user->name ?? '-' }}</td>
                <td>{{ $e->company->name ?? '-' }}</td>
                <td>{{ $e->evaluasi }}</td>
                <td>
                    <a href="{{ route('dosen.evaluasi.edit', $e) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('dosen.evaluasi.destroy', $e) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin hapus evaluasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
