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
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="title mb-3">Detail Lowongan Magang</h5>
            <div class="row gy-4">
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">ID Lowongan</h6>
                    <p class="fw-bold">{{ $logang->lowongan_id }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Nama Perusahaan</h6>
                    <p class="fw-bold">{{ $logang->company->user->name }}</p>
                </div>
                <div class="col-md-12">
                    <h6 class="text-soft mb-1">Judul Magang</h6>
                    <p class="fw-bold">{{ $logang->title }}</p>
                </div>
                <div class="col-md-12">
                    <h6 class="text-soft mb-1">Deskripsi</h6>
                    <div class="border rounded p-3 bg-light">
                        {!! nl2br(e($logang->description)) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Periode Awal</h6>
                    <p class="fw-bold">{{ $logang->period->start_date }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Periode Akhir</h6>
                    <p class="fw-bold">{{ $logang->period->end_date }}</p>
                </div>
                <div class="col-12">
                    <h6 class="text-soft mb-1">Kriteria</h6>
                    <div class="border rounded p-3 bg-light">
                        {!! nl2br(e($logang->requirements)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
