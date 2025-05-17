@extends('layouts.app')

@section('content')

    {{-- Flash success message jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h6>Jumlah Mahasiswa Magang : {{$jumlahMahasiswaMagang}}</h6>
    <br>
    <h6>Jumlah Dosen Pembimbing : {{$jumlahDosenPembimbing}}</h6>
    <br>
    <h6>Rasio Dosen Pembimbing dibanding Mahasiswa : {{$rasio}}</h6>

@endsection