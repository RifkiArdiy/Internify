@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center" style="margin-top: -20px;">
        <div class="col-md-8 col-lg-6" style="width: 80%; height: 100%;">
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <table class="table table-bordered table-striped table-hover table-sm mb-3">
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

                    <div class="d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                        <a href="{{ route('profil-akademik.edit') }}" class="btn btn-warning">Edit Profil Akademik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
