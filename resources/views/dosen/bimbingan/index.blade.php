@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Mahasiswa Bimbingan</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Status</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
            <tr>
                <td>{{ $mhs->user->name }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->status }}</td>
                <td>{{ $mhs->manajemenBimbingan->company ?? '-' }}</td>
                <td>{{ $mhs->manajemenBimbingan->position ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
