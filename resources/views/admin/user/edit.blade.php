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

            <form method="POST" action="{{ route('user.update', $user->user_id ?? $user->id) }}">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"
                        value="{{ old('username', $user->username ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label>Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control"
                        value="{{ old('no_telp', $user->no_telp ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                        value="{{ old('alamat', $user->alamat ?? '') }}" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
