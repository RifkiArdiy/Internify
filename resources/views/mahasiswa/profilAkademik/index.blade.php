
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
        <th>Bidang Keahlian</th>
    <td>{{ $profilAkademik->bidang_keahlian }}</td>
</tr>
<tr>
    <th>Sertifikasi</th>
    <td>{{ $profilAkademik->sertifikasi }}</td>
</tr>
<tr>
    <th>Lokasi</th>
    <td>{{ $profilAkademik->lokasi }}</td>
</tr>
<tr>
    <th>Pengalaman</th>
    <td>{{ $profilAkademik->pengalaman }}</td>
</tr>
<tr>
    <th>Etika</th>
    <td>{{ $profilAkademik->etika }}</td>
</tr>
<tr>
    <th>IPK</th>
    <td>{{ $profilAkademik->ipk }}</td>
</tr>

</table>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
<a href="{{ route('profilAkademik.edit') }}" class="btn btn-warning">Edit Profil Akademik</a>


</body>
@endsection
