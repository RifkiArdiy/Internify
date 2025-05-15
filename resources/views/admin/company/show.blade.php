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
            <h5 class="title mb-3">Detail Perusahaan</h5>
            <div class="row gy-4">
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">ID Perusahaan</h6>
                    <p class="fw-bold">{{ $comp->company_id }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Nama Perusahaan</h6>
                    <p class="fw-bold">{{ $comp->user->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6 class="text-soft mb-1">Industri</h6>
                    <p class="fw-bold">{{ $comp->industry }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
