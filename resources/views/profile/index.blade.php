@extends('layouts.app')

{{-- @section('action')
    @if (Auth::user()->level->level_nama == 'Administrator')
        <li>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <em class="icon ni ni-edit"></em>
                <span>Edit Profile</span>
            </a>
        </li>
    @elseif (Auth::user()->level->level_nama == 'Dosen')
        <li class="nk-block-tools-opt">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <em class="icon ni ni-edit"></em>
                <span>Edit Profile</span>
            </a>
        </li>
    @elseif (Auth::user()->level->level_nama == 'Mahasiswa')
        <li class="nk-block-tools-opt">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <em class="icon ni ni-edit"></em>
                <span>Edit Profile</span>
            </a>
        </li>
    @else
        <li class="nk-block-tools-opt">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <em class="icon ni ni-edit"></em>
                <span>Edit Profile</span>
            </a>
        </li>
    @endif
@endsection --}}

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card card-bordered">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Biodata</h4>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-data data-list row gy-3 gx-4">
                        <div class="data-head">
                            <h6 class="overline-title"></h6>
                        </div>
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Full Name</span>
                                <span class="data-value">{{ $user->name }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Username</span>
                                <span class="data-value">{{ $user->username }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Email</span>
                                <span class="data-value">{{ $user->email }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more disable"><em
                                        class="icon ni ni-lock-alt"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Telepon</span>
                                <span class="data-value text-soft">{{ $user->no_telp }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                            <div class="data-col">
                                <span class="data-label">Role</span>
                                <span class="data-value">{{ $user->level->level_nama }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->
                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                            data-tab-target="#address">
                            <div class="data-col">
                                <span class="data-label">Alamat</span>
                                <span class="data-value">{{ $user->alamat }}</span>
                            </div>
                            <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                        </div><!-- data-item -->
                    </div><!-- data-list -->
                </div><!-- .nk-block -->
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                @if (auth()->check() && auth()->user()->image)
                                    <img src="{{ Storage::url('images/users/' . auth()->user()->image) }}"
                                        alt="{{ auth()->user()->name }}">
                                @else
                                    <span>
                                        {{ strtoupper(collect(explode(' ', Auth::user()->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{ $user->name }}</span>
                                <span class="sub-text">{{ $user->email }}</span>
                            </div>
                            <div class="user-action">
                                <div class="dropdown">
                                    <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em
                                            class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <a href="#">
                                                    <em class="icon ni ni-camera-fill"></em>
                                                    <span>Change Photo</span>
                                                </a>
                                            </li>
                                            @if (Auth::user()->level->level_nama == 'Administrator')
                                                <li>
                                                    <a href="{{ route('profile.edit') }}">
                                                        <em class="icon ni ni-edit-fill"></em>
                                                        <span>Edit Profile</span>
                                                    </a>
                                                </li>
                                            @elseif (Auth::user()->level->level_nama == 'Dosen')
                                                <li>
                                                    <a href="{{ route('profile.edit') }}">
                                                        <em class="icon ni ni-edit-fill"></em>
                                                        <span>Edit Profile</span>
                                                    </a>
                                                </li>
                                            @elseif (Auth::user()->level->level_nama == 'Mahasiswa')
                                                <li>
                                                    <a href="{{ route('profile.edit') }}">
                                                        <em class="icon ni ni-edit-fill"></em>
                                                        <span>Edit Profile</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('profile.edit') }}">
                                                        <em class="icon ni ni-edit-fill"></em>
                                                        <span>Edit Profile</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .user-card -->
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <ul class="link-list-menu">
                            <li class="nk-menu-item">
                                <a class="nk-menu-link" href="{{ route('profile') }}"><em
                                        class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a>
                            </li>
                            @if (Auth::user()->level->level_nama == 'Mahasiswa')
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="{{ route('profil-akademik.index') }}"><em
                                            class="icon ni ni-user-fill-c"></em><span>Profile Akademik</span></a>
                                </li>
                            @endif
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div>
@endsection
