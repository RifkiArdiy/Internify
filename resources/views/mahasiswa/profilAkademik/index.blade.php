@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
        <a href="{{ route('profil-akademik.edit') }}" class="btn btn-warning">Edit Profil Akademik</a>


        </body>
    @endsection
