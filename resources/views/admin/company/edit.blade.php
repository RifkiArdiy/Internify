@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <form action="{{ route('companies.update', $company->company_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Method spoofing untuk mengirimkan method PUT --}}
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nama Lengkap:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $company->user->name ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="username">Username:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $company->user->username ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $company->user->email ?? '' }}">
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
                            <label class="form-label" for="no_telp">No Telepon:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    value="{{ $company->user->no_telp ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Industri:</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" data-search="on" name="industry" id="industry">
                                    <option value="default_option"
                                        {{ $company->industry == 'default_option' ? 'selected' : '' }}>Default Option
                                    </option>
                                    <option value="Sales" {{ $company->industry == 'Sales' ? 'selected' : '' }}>Sales
                                    </option>
                                    <option value="Marketing" {{ $company->industry == 'Marketing' ? 'selected' : '' }}>
                                        Marketing</option>
                                    <option value="Teknologi" {{ $company->industry == 'Teknologi' ? 'selected' : '' }}>
                                        Teknologi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="alamat">Alamat:</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $company->user->alamat ?? '' }}">
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
                                yang didukung: jpeg, png, jpg, gif. Maksimal 2MB .</small>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
