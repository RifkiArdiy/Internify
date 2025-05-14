
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Detail Mahasiswa</h4>
<table class="table table-bordered table-striped table-hover table-sm" style="width: 30%">
    <tr>
        <th>NIM</th>
    <td>{{ $magang->student->nim }}</td>
</tr>
<tr>
    <th>Nama Mahasiswa</th>
    <td>{{ $magang->student->user->name }}</td>
</tr>
<tr>
    <th>Prodi</th>
    <td>{{ $magang->student->prodi->name }}</td>
</tr>
<tr>
    <th>Alamat</th>
    <td>{{ $magang->student->alamat }}</td>
</tr>
<tr>
    <th>No. Telp</th>
    <td>{{ $magang->student->no_telp }}</td>
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
    <td>{{ $magang->lowongan->company->name }}</td>
</tr>
<tr>
    <th>Judul Magang</th>
    <td>{{ $magang->lowongan->title }}</td>
</tr>
<tr>
    <th>Deskripsi</th>
    <td>{{ $magang->lowongan->description }}</td>
</tr>
<tr>
    <th>Periode Awal</th>
    <td>{{ $magang->lowongan->period->start_date }}</td>
</tr>
    <th>Periode Akhir</th>
    <td>{{ $magang->lowongan->period->end_date }}</td>
</tr>
<tr>
    <th>Kriteria</th>
    <td>{{ $magang->lowongan->requirements }}</td>
</tr>
<tr>
    <th>Status</th>
    <td>{{ $magang->status }}</td>
</tr>
</table>

@if (Auth::user()->level_id == 1)
<form action="{{ route('magangApplication.update', $magang->magang_id) }}"
    method="POST" style="display: inline;"
    onsubmit="return confirm('Apakah anda yakin menyetujui lamaran ini?')">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="Disetujui">
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
        style="background: rgb(32, 155, 32)">
        <span style="padding:5px;">Setuju</span></button>
</form>

<form action="{{ route('magangApplication.update', $magang->magang_id) }}"
    method="POST" style="display: inline;"
    onsubmit="return confirm('Apakah anda yakin menolak lamaran ini?')">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="Ditolak">
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-light"
        style="background: red;">
        <span style="padding: 5px;">Tolak</span>
    </button>
</form>

    <a href="{{ route('lowonganMagang.index') }}" class="btn btn-secondary">Kembali</a>
@endif

@if (Auth::user()->level_id == 2)
    <a href="{{ route('lowonganMagang.indexMhs') }}" class="btn btn-secondary">Kembali</a>
@endif


</body>
@endsection
