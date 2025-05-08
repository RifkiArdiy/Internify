@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="POST" action="{{ route('dosen.update', $dosen->dosen_id ?? $dosen->id) }}">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $dosen->user->name ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="{{ old('username', $dosen->user->username ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control"
                    value="{{ old('email', $dosen->user->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="no_telp" class="form-control"
                    value="{{ old('no_telp', $dosen->user->no_telp ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control"
                    value="{{ old('alamat', $dosen->user->alamat ?? '') }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
