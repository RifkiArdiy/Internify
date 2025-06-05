@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('mahasiswa.update', $mahasiswa->mahasiswa_id ?? $mahasiswa->id) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $mahasiswa->user->name }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $mahasiswa->user->username }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $mahasiswa->user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Password:</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kosongkan jika tidak ingin diubah">
                                <small class="form-note">Kosongkan field ini jika Anda tidak ingin mengubah
                                    password.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="nim">NIM:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="nim" name="nim"
                                    value="{{ $mahasiswa->nim }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="no_telp">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $mahasiswa->user->no_telp }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $mahasiswa->user->alamat }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Jurusan:<span class="text-danger">*</span></label>
                            <div class="form-control-wrap">
                                <select class="form-select" name="prodi_id" id="prodi_id" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach ($prodis as $prodi)
                                        <option value="{{ $prodi->prodi_id }}"
                                            {{ $mahasiswa->prodi_id == $prodi->prodi_id ? 'selected' : '' }}>
                                            {{ $prodi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label" for="image">Ubah Foto Profil:</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="image" name="image"
                                    accept="image/*">
                            </div>
                            <small class="form-text text-muted">Pilih file gambar baru untuk mengubah foto profil. Format
                                yang didukung: jpeg, png, jpg, gif. Maksimal 2MB .</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
