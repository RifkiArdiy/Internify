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

            <form method="POST" action="{{ route('dosen.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Masukkan nama lengkap dosen" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username') }}" placeholder="Contoh: johndoe123" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" placeholder="Contoh: johndoe@example.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password:</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Minimal 6 karakter">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="nip">NIP:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="nip" name="nip"
                                    placeholder="Masukkan Nomor Induk Pegawai (NIP)" required>{{ old('nip') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="no_telp">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ old('no_telp') }}" placeholder="Masukkan dengan awalan +62 (Contoh: 628123456789)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ old('alamat') }}" placeholder="Masukkan Alamat (Minimal 10 Karakter)">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Foto Profil:</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <small class="form-text text-muted">Pilih file gambar baru. Format: jpeg, png, jpg, gif. Maks:
                                2MB.</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
