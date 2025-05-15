@extends('layouts.app')

@section('content')
<div class="card card-bordered card-preview">
    <div class="card-inner">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profilAkademik.store') }}" enctype="multipart/form-data" class="form-validate is-alter">
            @csrf
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="bidang_keahlian">Bidang Keahlian: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" value="{{ old('bidang_keahlian') }}" placeholder="Masukkan bidang keahlian anda" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="sertifikasi">Sertifikasi: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="sertifikasi" name="sertifikasi" value="{{ old('sertifikasi') }}" placeholder="Masukkan sertifikasi anda" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="lokasi">Lokasi: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Masukkan lokasi anda" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="pengalaman">Pengalaman: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ old('pengalaman') }}" placeholder="Masukkan pengalaman anda" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="etika">Etika: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="etika" name="etika" value="{{ old('etika') }}" placeholder="Masukkan etika anda" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="ipk">IPK: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{ old('ipk') }}" placeholder="Masukkan Nilai IPK" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('profilAkademik.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
