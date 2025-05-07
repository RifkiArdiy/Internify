
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('periodeMagang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Periode Magang</span>
        </a>
    </li>
@endsection

<table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Periode Magang</th>
                <th>Masa Awal</th>
                <th>Masa Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegang as $item)
            <tr>
                <td>{{ $item->period_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>
                    <a href="{{ route('periodeMagang.edit', $item->period_id) }}">Edit</a> |
                    <form action="{{ route('periodeMagang.destroy', $item->period_id) }}" method="POST" style="display:inline;">
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
