
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Detail Mahasiswa</h4>
<table class="table table-bordered table-striped table-hover table-sm" style="width: 30%">
    <tr>
        <th>NIM</th>
    <td>{{ $magang->mahasiswas->nim }}</td>
</tr>
<tr>
    <th>Nama Mahasiswa</th>
    <td>{{ $magang->mahasiswas->user->name }}</td>
</tr>
<tr>
    <th>Prodi</th>
    <td>{{ $magang->mahasiswas->prodi->name }}</td>
</tr>
<tr>
    <th>Alamat</th>
    <td>{{ $magang->mahasiswas->alamat }}</td>
</tr>
<tr>
    <th>No. Telp</th>
    <td>{{ $magang->mahasiswas->no_telp }}</td>
</tr>

</table>

<h4>Detail Magang</h4>
<table class="table table-bordered table-striped table-hover table-sm" style="width: 30%">
    <tr>
        <th>ID</th>
    <td>{{ $magang->lowongan->lowongan_id }}</td>
</tr>
<tr>
    <th>Nama Perusahaan</th>
    <td>{{ $magang->lowongans->company->name }}</td>
</tr>
<tr>
    <th>Judul Magang</th>
    <td>{{ $magang->lowongans->title }}</td>
</tr>
<tr>
    <th>Deskripsi</th>
    <td>{{ $magang->lowongans->description }}</td>
</tr>
<tr>
    <th>Periode Awal</th>
    <td>{{ $magang->lowongans->period->start_date }}</td>
</tr>
    <th>Periode Akhir</th>
    <td>{{ $magang->lowongans->period->end_date }}</td>
</tr>
<tr>
    <th>Kriteria</th>
    <td>{{ $magang->lowongans->requirements }}</td>
</tr>
</table>
@if (Auth::user()->level_id == 1)
    <a href="{{ route('lowonganMagang.index') }}" class="btn btn-secondary">Kembali</a>
@endif

@if (Auth::user()->level_id == 2)
    <a href="{{ route('lowonganMagang.indexMhs') }}" class="btn btn-secondary">Kembali</a>
@endif


</body>
@endsection