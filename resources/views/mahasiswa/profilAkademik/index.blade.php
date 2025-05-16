@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel Data --}}
        <div class="table-responsive" style="max-width: 600px;">
            <table class="table table-bordered table-striped table-hover table-sm">
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
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('profilAkademik.edit') }}" class="btn btn-primary">Edit Profil Akademik</a>
        </div>
    </div>
@endsection
