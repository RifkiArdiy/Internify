{{-- @extends('layouts.app')

@section('content')
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6" style="width: 80%; height: 100%;">
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="table table-bordered table-striped table-hover table-sm mb-3">
                                <tr>
                                    <th>Bidang Keahlian</th>
                                    <td>{{ $profilAkademik->bidang_keahlian }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $profilAkademik->bidang_keahlian) }}"
                                            download>Download
                                            Bidang Keahlian</a>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Sertifikasi</th>
                                    <td>{{ $profilAkademik->sertifikasi }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $profilAkademik->sertifikasi) }}" download>Download
                                            Sertifikasi</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Pengalaman</th>
                                    <td>{{ $profilAkademik->pengalaman }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $profilAkademik->pengalaman) }}" download>Download
                                            Bukti Pengalaman</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Etika</th>
                                    <td>{{ $profilAkademik->etika }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $profilAkademik->etika) }}" download>Download
                                            Bukti Etika</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>IPK</th>
                                    <td>{{ $profilAkademik->ipk }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $profilAkademik->ipk) }}" download>Download
                                            Bukti Ipk</a>
                                    </td>
                                </tr>
                            </table>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profil-akademik.edit') }}" class="btn btn-warning">Edit Profil
                                    Akademik</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
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
                            <h6 class="overline-title">Profil Akademik</h6>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Bidang Keahlian</span>
                                <span class="data-value">{{ $profilAkademik->bidang_keahlian }}</span>
                            </div>
                            <div class="data-col data-col-end">
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ asset('storage/profil-akademik/bidang_keahlian/' . $profilAkademik->bidang_keahlian) }}"
                                    download>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Sertifikasi</span>
                                <span class="data-value">{{ $profilAkademik->sertifikasi }}</span>
                            </div>
                            <div class="data-col data-col-end">
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ asset('storage/profil-akademik/' . $profilAkademik->sertifikasi) }}" download>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Pengalaman</span>
                                <span class="data-value">{{ $profilAkademik->pengalaman }}</span>
                            </div>
                            <div class="data-col data-col-end">
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ asset('storage/profil-akademik/pengalaman/' . $profilAkademik->pengalaman) }}"
                                    download>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">Etika</span>
                                <span class="data-value">{{ $profilAkademik->etika }}</span>
                            </div>
                            <div class="data-col data-col-end">
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ asset('storage/profil-akademik/etika/' . $profilAkademik->etika) }}" download>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                <span class="data-label">IPK</span>
                                <span class="data-value">{{ $profilAkademik->ipk }}</span>
                            </div>
                            <div class="data-col data-col-end">
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ asset('storage/profil-akademik/ipk/' . $profilAkademik->ipk) }}" download>
                                    Download
                                </a>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="data-col">
                                {{-- // --}}
                            </div>
                            <div class="data-col data-col-end">
                                <a href="{{ route('profil-akademik.edit') }}" class="btn btn-secondary">Edit Profil
                                    Akademik</a>
                            </div>
                        </div>
                    </div><!-- .data-list -->
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
                                            class="icon ni ni-user-list-fill"></em><span>Profile Akademik</span></a>
                                </li>
                            @endif
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div>
@endsection
