@extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">

            <form method="POST" action="{{ route('mahasiswa.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>alamat</label>
                    <input type="text" name="alamat" class="form-control" value="" required>
                </div>

                <div class="mb-3">
                    <label>Jurusan</label>
                    <select name="prodi_id" class="form-control" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->prodi_id }}">{{ $prodi->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
