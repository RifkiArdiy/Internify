@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Detail Lowongan --}}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Detail Lowongan Magang</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th style="width: 200px;">ID</th>
                        <td>{{ $logang->lowongan_id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>{{ $logang->company->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Judul Magang</th>
                        <td>{{ $logang->title }}</td>
                    </tr>
                    @if ($logang->benefits->count())
                        <tr class="list list-sm">
                            @foreach ($logang->benefits as $benefit)
                                <th>BENEFIT</th>
                                <TD>{{ $benefit->name }}</TD>
                            @endforeach
                        </tr>
                    @else
                        <p class="text-soft">Tidak ada benefit terdaftar.</p>
                    @endif
                    <tr>
                        <th>Deskripsi</th>
                        <td>{!! $logang->description !!}</td>
                    </tr>
                    <tr>
                        <th>Periode Awal</th>
                        <td>{{ $logang->period->start_date }}</td>
                    </tr>
                    <tr>
                        <th>Periode Akhir</th>
                        <td>{{ $logang->period->end_date }}</td>
                    </tr>
                    <tr>
                        <th>Kriteria</th>
                        <td>{!! $logang->requirements !!}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-3 d-flex">
            @if (Auth::user()->level_id == 1)
                <a href="{{ route('lowongan-magang.index') }}" class="btn btn-secondary">Kembali</a>
            @elseif (Auth::user()->level_id == 2)
                <a href="{{ route('lowongan-magang.indexMhs') }}" class="btn btn-secondary">Kembali</a>
            @endif

            @if (Auth::user()->level_id == 2)
                @php
                    $lamaran = Auth::user()
                        ->mahasiswa->applications->where('lowongan_id', $logang->lowongan_id)
                        ->first(); // Ambil lamaran mahasiswa untuk lowongan ini
                @endphp

                @if (!$lamaran)
                    <form action="{{ route('pengajuan-magang.storeMhs') }}" method="POST" class="ms-2"
                        onsubmit="return confirm('Yakin ingin melamar lowongan ini?')">
                        @csrf
                        <input type="hidden" name="lowongan_id" value="{{ $logang->lowongan_id }}">
                        <input type="hidden" name="status" value="Pending">
                        <button type="submit" class="btn btn-primary">Lamar</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
@endsection
