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
            <a href="{{ route('companys-lowongan-magang.edit', $logang->lowongan_id) }}" class="btn btn-primary">Edit Lowongan</a>
        </div>

        <h4>Daftar Pelamar</h4>
        @foreach ($mahasiswas as $item)
            <a href="">{{$item->user->name}}</a>
        @endforeach
    </div>
@endsection
