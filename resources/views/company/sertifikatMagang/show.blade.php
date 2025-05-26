@extends('layouts.app')

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <p><strong>Judul:</strong> {{ $sertifikat->judul }}</p>
        <p><strong>Deskripsi:</strong> {{ $sertifikat->deskripsi }}</p>
        {{-- <p><strong>File:</strong> <a href="{{ Storage::url($sertifikat->path) }}" target="_blank">Lihat PDF</a></p> --}}
    </div>
</div>
@endsection