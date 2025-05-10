@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            <em class="icon ni ni-edit"></em>
            <span>Edit Profile</span>
        </a>
    </li>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="row align-items-center">
                {{-- Foto Profil --}}
                <div class="col-md-3 text-center">
                    <img src="{{ asset('storage/profile_images/' . ($user->image ?? 'anonymous.png')) }}"
                         alt="Foto Profil"
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #ccc;">
                </div>

                {{-- Bio Pengguna --}}
                <div class="col-md-9">
                    <h5 class="mb-2">{{ $user->name }}</h5>
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>ID Level:</strong> {{ $user->level_id }}</p>
                    <p><strong>Role:</strong> {{ $user->level->level_nama ?? 'Tidak diketahui' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
