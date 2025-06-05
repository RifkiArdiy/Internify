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
            <form method="POST" action="{{ route('user.update', $user->user_id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Lengkap: <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username" class="form-label">Username: <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username', $user->username) }}" placeholder="Buat Username Unik"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" placeholder="Masukkan Alamat Email Aktif"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password:</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kosongkan jika tidak ingin diubah">
                                <small class="form-text text-muted">Kosongkan field ini jika Anda tidak ingin mengubah
                                    password.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="no_telp" class="form-label">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ old('no_telp', $user->no_telp) }}"
                                    placeholder="Masukkan Nomor Telepon (Contoh: 08123456789)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ old('alamat', $user->alamat) }}" placeholder="Masukkan Alamat Lengkap">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Ubah Foto Profil:</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                            <small class="form-text text-muted">Pilih file gambar baru untuk mengubah foto profil. Format
                                yang didukung: jpeg, png, jpg, gif.<br> Maksimal 2MB</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
