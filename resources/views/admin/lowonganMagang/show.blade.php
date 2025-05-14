
@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

{{-- @section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('lowonganMagang.create') }}" class="btn btn-primary">
            <em class="icon ni ni-plus"></em>
            <span>Tambah Lowongan</span>
        </a>
    </li>
@endsection --}}
<table class="table table-bordered table-striped table-hover table-sm" style="width: 30%">
    <tr>
        <th>ID</th>
    <td>{{ $logang->lowongan_id }}</td>
</tr>
<tr>
    <th>Nama Perusahaan</th>
    <td>{{ $logang->company->name }}</td>
</tr>
<tr>
    <th>Judul Magang</th>
    <td>{{ $logang->title }}</td>
</tr>
<tr>
    <th>Deskripsi</th>
    <td>{{ $logang->description }}</td>
</tr>
<tr>
    <th>Periode Awal</th>
    <td>{{ $logang->period->start_date }}</td>
</tr>
    <th>Periode Akhir</th>
    <td>{{ $logang->period->end_date }}</td>
</tr>
<tr>
    <th>Kriteria</th>
    <td>{{ $logang->requirements }}</td>
</tr>

</table>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>


</body>
@endsection
