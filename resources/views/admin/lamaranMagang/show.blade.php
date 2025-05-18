@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ url()->previous() }}" class="btn btn-light">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="title mb-3">Detail Mahasiswa</h5>
            <div class="row gy-3">
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">NIM</h6>
                    <p class="fw-bold">{{ $magang->mahasiswas->nim }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Nama Mahasiswa</h6>
                    <p class="fw-bold">{{ $magang->mahasiswas->user->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Program Studi</h6>
                    <p class="fw-bold">{{ $magang->mahasiswas->prodi->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Alamat</h6>
                    <p class="fw-bold">{{ $magang->mahasiswas->alamat }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">No. Telp</h6>
                    <p class="fw-bold">{{ $magang->mahasiswas->no_telp }}</p>
                </div>
            </div>

            <hr class="my-4">

            <h5 class="title mb-3">Detail Magang</h5>
            <div class="row gy-3">
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">ID Lowongan</h6>
                    <p class="fw-bold">{{ $magang->lowongans->lowongan_id }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Nama Perusahaan</h6>
                    <p class="fw-bold">{{ $magang->lowongans->company->user->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Judul Magang</h6>
                    <p class="fw-bold">{{ $magang->lowongans->title }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Kriteria</h6>
                    <p class="fw-bold">{{ $magang->lowongans->requirements }}</p>
                </div>
                <div class="col-md-12">
                    <h6 class="text-soft mb-1">Deskripsi</h6>
                    <p class="fw-bold">{{ $magang->lowongans->description }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Periode Awal</h6>
                    <p class="fw-bold">{{ $magang->lowongans->period->start_date }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Periode Akhir</h6>
                    <p class="fw-bold">{{ $magang->lowongans->period->end_date }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Status Lamaran</h6>
                    <p class="fw-bold">{{ ucfirst($magang->status) }}</p>
                </div>
            </div>

            @if (strtolower($magang->status) === 'pending')
                <div class="mt-4">
                    <form action="{{ route('admin.magangApplication.update', $magang->magang_id) }}"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah Anda yakin menyetujui lamaran ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Disetujui">
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>

                    <form action="{{ route('admin.magangApplication.update', $magang->magang_id) }}"
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah Anda yakin menolak lamaran ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Ditolak">
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
