@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp
@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <h5>Sertifikat Magang Tersedia</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Unduh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sertifikats as $index => $sertifikat)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $sertifikat->judul }}</td>
                    <td>{{ Str::limit(strip_tags($sertifikat->deskripsi), 50) }}</td>
                    <td><a href="{{ route('sertifikat.downloadMhs', $sertifikat->sertifikat_id) }}" class="btn btn-sm btn-primary">Unduh PDF</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection