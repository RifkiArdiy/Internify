@extends('layouts.app')

@section('content')
<div class="card card-bordered">
    <div class="card-inner">
        <form method="POST" action="{{ route('company.sertifikatMagang.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="text" name="company_id" value="{{ Auth::user()->company->company_id }}" hidden>

            {{-- <div class="form-group">
                <label for="judul">Judul Sertifikat</label>
                <input type="text" name="judul" class="form-control" required>
            </div> --}}

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Judul Sertifikat</label>
                    <select name="judul" id="judul" class="form-control" data-search="on" required>
                        <option value="">- Pilih Lowongan -</option>
                        @foreach ($lowongans as $lowongan)
                            <option value="{{ $lowongan->title}}">{{ $lowongan->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            {{-- <div class="form-group">
                <label for="sertifikat">Upload PDF Sertifikat</label>
                <input type="file" name="sertifikat" class="form-control" accept="application/pdf" required>
            </div> --}}

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection