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

        <form method="POST" action="{{ route('profilAkademik.update', $profilAkademik->profile_id) }}" enctype="multipart/form-data" class="form-validate is-alter">
            @csrf
            @method('PUT')
            <div class="row g-4">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="bidang_keahlian">Bidang Keahlian: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <select class="form-control" id="bidang_keahlian" name="bidang_keahlian" required>
                                    <option value="">-- Pilih bidang keahlian --</option>
                                    @foreach ($kriteria as $requirement)
                                        <option value="{{ $requirement }}" {{ old('bidang_keahlian') == $requirement ? 'selected' : '' }}>
                                            {{ $requirement }}
                                        </option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="sertifikasi">Sertifikasi: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="sertifikasi" name="sertifikasi" value="{{ $profilAkademik->sertifikasi }}" placeholder="Masukkan sertifikasi anda" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="lokasi">Lokasi: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $profilAkademik->lokasi }}" placeholder="Masukkan lokasi anda" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="pengalaman">Pengalaman: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ $profilAkademik->pengalaman }}" placeholder="Masukkan pengalaman anda" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="etika">Etika: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="etika" name="etika" value="{{ $profilAkademik->etika }}" placeholder="Masukkan etika anda" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label" for="ipk">IPK: <span class="text-danger">*</span></label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{ $profilAkademik->ipk }}" placeholder="Masukkan Nilai IPK" required>
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
