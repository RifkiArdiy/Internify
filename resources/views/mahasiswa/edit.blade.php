@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Edit Mahasiswa</h4>

        <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->mahasiswa_id ?? $mahasiswa->id) }}">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $mahasiswa->user->name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control"
                    value="{{ old('username', $mahasiswa->user->username ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control"
                    value="{{ old('email', $mahasiswa->user->email ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control"
                    value="{{ old('alamat', $mahasiswa->alamat ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <select name="prodi_id" class="form-control" required>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->prodi_id }}"
                            {{ old('prodi_id') == $prodi->prodi_id || $prodi->prodi_id == $mahasiswa->prodi_id ? 'selected' : '' }}>
                            {{ $prodi->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
