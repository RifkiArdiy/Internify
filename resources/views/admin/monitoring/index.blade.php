@extends('layouts.app')

@section('content')

    {{-- Flash success message jika ada --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">

        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Mahasiswa Magang</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahMahasiswaMagang }}</h5>
                    <p class="card-text">Total mahasiswa yang sedang menjalani magang.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Dosen Pembimbing</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jumlahDosenPembimbing }}</h5>
                    <p class="card-text">Jumlah dosen pembimbing yang terdaftar.</p>
                </div>
            </div>
        </div>

        <h6 class="mb-2">Rasio Mahasiswa Magang : Dosen</h6>
            <div class="progress mb-3" style="height: 30px; " >
                <div class="progress-bar bg-primary" role="progressbar"
                    style="width: {{ ($jumlahMahasiswaMagang / ($jumlahMahasiswaMagang + $jumlahDosenPembimbing)) * 100 }}%;"
                    aria-valuenow="{{ $jumlahMahasiswaMagang }}" aria-valuemin="0" aria-valuemax="{{ $jumlahMahasiswaMagang + $jumlahDosenPembimbing }}">
                    Mahasiswa ({{ $jumlahMahasiswaMagang }})
                </div>
                <div class="progress-bar bg-success" role="progressbar"
                    style="width: {{ ($jumlahDosenPembimbing / ($jumlahMahasiswaMagang + $jumlahDosenPembimbing)) * 100 }}%;"
                    aria-valuenow="{{ $jumlahDosenPembimbing }}" aria-valuemin="0" aria-valuemax="{{ $jumlahMahasiswaMagang + $jumlahDosenPembimbing }}">
                    Dosen ({{ $jumlahDosenPembimbing }})
                </div>
            </div>
    
    </div>
    

@endsection