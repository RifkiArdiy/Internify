@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Perusahaan</h2>
    <form action="{{ route('companies.update', $company->company_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ $company->nama_perusahaan }}" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label>Kontak</label>
            <input type="text" name="kontak" value="{{ $company->kontak }}" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label>Bidang Industri</label>
            <input type="text" name="bidang_industri" value="{{ $company->bidang_industri }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
