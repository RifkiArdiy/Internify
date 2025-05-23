@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center" style="margin-top: -20px;">
        <div class="col-md-8 col-lg-6" style="width: 100%; height: 100%;">
            <div class="card card-bordered card-preview mb-4">
                <div class="card-inner">
                    <h5 class="mb-3">Detail Mahasiswa</h5>
                    <table class="table table-bordered table-striped table-hover table-sm mb-3">
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
                            <td>{{ $magang->mahasiswas->user->alamat }}</td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td>
                                {{ $magang->mahasiswas->user->no_telp }}
                                <span class="float-end">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $magang->mahasiswas->user->no_telp) }}" 
                                       target="_blank" 
                                       class="badge bg-primary text-white text-center" 
                                       style="padding: 3px 10px; display: inline-block; min-width: 70px;">
                                        Hubungi
                                    </a>
                                </span>
                            </td>                            
                        </tr>
                    </table>
                    <br>
                    <h5 class="mb-3">Detail Magang</h5>
                    <table class="table table-bordered table-striped table-hover table-sm mb-3">
                        <tr>
                            <th>ID</th>
                            <td>{{ $magang->lowongans->lowongan_id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <td>{{ $magang->lowongans->company->user->name }}</td>
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
                        <tr>
                            <th>Periode Akhir</th>
                            <td>{{ $magang->lowongans->period->end_date }}</td>
                        </tr>
                        <tr>
                            <th>Kriteria</th>
                            <td>{{ $magang->lowongans->requirements }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $magang->status }}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        {{-- Uncomment jika ingin mengaktifkan tombol persetujuan
                        @if (strtolower($magang->status) === 'pending')
                            <form action="{{ route('magangApplication.update', $magang->magang_id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menyetujui lamaran ini?')">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Disetujui">
                                <button type="submit" class="btn btn-success">Setuju</button>
                            </form>
                            <form action="{{ route('magangApplication.update', $magang->magang_id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin menolak lamaran ini?')">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Ditolak">
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        @endif
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
