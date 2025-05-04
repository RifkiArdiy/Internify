@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Perusahaan Mitra</h2>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3" style="float:right;">Tambah Perusahaan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="background: rgb(76, 76, 210); color:white">Nama Perusahaan</th>
                <th>Bidang Industri</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->industry }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->contact }}</td>
                    <td>
                        <a href="{{ route('companies.show', $company->company_id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('companies.edit', $company->company_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('companies.destroy', $company->company_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus perusahaan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
