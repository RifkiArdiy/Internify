@extends('layouts.app')

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <form method="POST" action="{{ route('company.sertifikatMagang.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Kirim ID perusahaan --}}
                <input type="hidden" name="company_id" value="{{ Auth::user()->company->company_id }}">

                {{-- Pilih lowongan --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Lowongan</label>
                        <select name="lowongan_id" id="lowongan_id" class="form-control" data-search="on" required>
                            <option value="">- Pilih Lowongan -</option>
                            @foreach ($lowongans as $lowongan)
                                <option value="{{ $lowongan->lowongan_id }}">{{ $lowongan->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                {{-- Deskripsi --}}
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>

                {{-- Tombol --}}
                <div class="col-12 text-end">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <a href="{{ route('company.sertifikatMagang.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
