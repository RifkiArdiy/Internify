@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                                target="_blank" class="badge bg-primary text-white text-center"
                                style="padding: 3px 10px; display: inline-block; min-width: 70px;">
                                Hubungi
                            </a>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
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
        </div>
    </div>
    <div class="card card-bordered card-preview mb-4">
        <div class="card-inner">
            <h5 class="mb-3">Profil Akademik</h5>
            <table class="table table-bordered table-striped table-hover table-sm mb-3">
                <tr>
                    <th>Bidang Keahlian</th>
                    <td>{{ $profilAkademik->bidang_keahlian ?? '-' }}</td>
                    <td>
                        @if ($profilAkademik?->bidang_keahlian)
                            <a href="{{ asset('storage/profil-akademik/bidang_keahlian/' . $profilAkademik->bidang_keahlian) }}"
                                download class="btn btn-sm btn-outline-primary">Download</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Sertifikasi</th>
                    <td>{{ $profilAkademik->sertifikasi ?? '-' }}</td>
                    <td>
                        @if ($profilAkademik?->sertifikasi)
                            <a href="{{ asset('storage/profil-akademik/sertifikasi/' . $profilAkademik->sertifikasi) }}"
                                download class="btn btn-sm btn-outline-primary">Download</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Pengalaman</th>
                    <td>{{ $profilAkademik->pengalaman ?? '-' }}</td>
                    <td>
                        @if ($profilAkademik?->pengalaman)
                            <a href="{{ asset('storage/profil-akademik/pengalaman/' . $profilAkademik->pengalaman) }}"
                                download class="btn btn-sm btn-outline-primary">Download</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Etika</th>
                    <td>{{ $profilAkademik->etika ?? '-' }}</td>
                    <td>
                        @if ($profilAkademik?->etika)
                            <a href="{{ asset('storage/profil-akademik/etika/' . $profilAkademik->etika) }}" download
                                class="btn btn-sm btn-outline-primary">Download</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>IPK</th>
                    <td>{{ $profilAkademik->ipk ?? '-' }}</td>
                    <td>
                        @if ($profilAkademik?->ipk)
                            <a href="{{ asset('storage/profil-akademik/ipk/' . $profilAkademik->ipk) }}" download
                                class="btn btn-sm btn-outline-primary">Download</a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 text-end">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
