@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
            <em class="icon ni ni-edit"></em>
            <span>Edit Profile</span>
        </a>
    </li>
@section('content')

<div class="card">
    
    <div class="card-body">
        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row" style="align-items: center; display:flex; justify-content: center;">
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/profile_images/' . ($user->image ?? 'anonymous.png')) }}"
                     class="img-circle elevation-2"
                     alt="User Image"
                     style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd; border-radius: 50%;">
                <p style="margin-top: 20px;"><strong class="text-dark">ID Level:</strong> {{ $user->level_id }}</p>
                <p><strong class="text-dark">Username:</strong> {{ $user->username }}</p>
                <p><strong class="text-dark">Nama:</strong> {{ $user->name }}</p>
                <p><strong class="text-dark">Role:</strong> {{ $user->level->level_nama ?? 'Tidak diketahui' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection