@extends('layouts.app')

@section('action')
    <li class="nk-block-tools-opt">
        <a href="{{ url()->previous() }}" class="btn btn-light">
            <em class="icon ni ni-arrow-left"></em>
            <span>Kembali</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Users / <strong
                                class="text-primary small">{{ $comp->user->name ?? 'N/A' }}</strong></h3>
                        <div class="nk-block-des text-soft">
                            <ul class="list-inline">
                                <li>User ID: <span class="text-base">{{ $comp->user_id ?? 'N/A' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-aside-wrap">
                        <div class="card-content">
                            <ul class="nav nav-tabs nav-tabs-mb-icon">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><em
                                            class="icon ni ni-user-circle"></em><span>Personal</span></a>
                                </li>
                                <li class="nav-item nav-item-trigger d-xxl-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em
                                            class="icon ni ni-user-list-fill"></em></a>
                                </li>
                            </ul><!-- .nav-tabs -->
                            <div class="card-inner">
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <h5 class="title">Personal Information</h5>
                                        <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                                    </div><!-- .nk-block-head -->
                                    <div class="profile-ud-list">
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Full Name</span>
                                                <span class="profile-ud-value">{{ $comp->user->name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Username</span>
                                                <span class="profile-ud-value">{{ $comp->user->username ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Email Address</span>
                                                <span class="profile-ud-value">{{ $comp->user->email ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Mobile Number</span>
                                                <span class="profile-ud-value">{{ $comp->user->no_telp ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Alamat</span>
                                                <span class="profile-ud-value">{{ $comp->user->alamat ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Joining Date</span>
                                                <span
                                                    class="profile-ud-value">{{ \Carbon\Carbon::parse($comp->created_at)->format('d/m/Y') }}</span>
                                            </div>
                                        </div>
                                    </div><!-- .profile-ud-list -->
                                </div><!-- .nk-block -->
                                <div class="nk-block">
                                    <div class="nk-block-head nk-block-head-line">
                                        <h6 class="title overline-title text-base">Additional Information</h6>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block-head">
                                        <div class="profile-ud-label mb-1">Tentang Perusahaan</div>
                                        <p class="profile-ud-value">{!! $comp->about_company !!}</p>
                                    </div>
                                </div><!-- .nk-block -->
                                <div class="nk-divider divider md"></div>
                            </div><!-- .card-inner -->
                        </div><!-- .card-content -->
                        <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                            data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                            data-toggle-body="true">
                            <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                    <div class="user-card user-card-s2">
                                        <div class="user-avatar lg bg-primary">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <div class="badge bg-outline-light rounded-pill ucap">
                                                {{ $comp->user->level->level_nama }}</div>
                                            <h5>{{ $comp->user->name ?? 'N/A' }}</h5>
                                            <span class="sub-text">{{ $comp->user->email ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner card-inner-sm">
                                    <ul class="btn-toolbar justify-center gx-1">
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-shield-off"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-mail"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-download-cloud"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                    class="icon ni ni-bookmark"></em></a></li>
                                        <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em
                                                    class="icon ni ni-na"></em></a></li>
                                    </ul>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="overline-title-alt mb-2">In Account</div>
                                    <div class="profile-balance">
                                        <div class="profile-balance-group gx-4">
                                            <div class="profile-balance-sub">
                                                <div class="profile-balance-amount">
                                                    <div class="number">2,500.00 <small
                                                            class="currency currency-usd">USD</small></div>
                                                </div>
                                                <div class="profile-balance-subtitle">Invested Amount</div>
                                            </div>
                                            <div class="profile-balance-sub">
                                                <span class="profile-balance-plus text-soft"><em
                                                        class="icon ni ni-plus"></em></span>
                                                <div class="profile-balance-amount">
                                                    <div class="number">1,643.76</div>
                                                </div>
                                                <div class="profile-balance-subtitle">Profit Earned</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="profile-stats">
                                                <span class="amount">23</span>
                                                <span class="sub-text">Total Order</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="profile-stats">
                                                <span class="amount">20</span>
                                                <span class="sub-text">Complete</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="profile-stats">
                                                <span class="amount">3</span>
                                                <span class="sub-text">Progress</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h6 class="overline-title-alt mb-2">Additional</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <span class="sub-text">User ID:</span>
                                            <span>UD003054</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Last Login:</span>
                                            <span>15 Feb, 2019 01:02 PM</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">KYC Status:</span>
                                            <span class="lead-text text-success">Approved</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="sub-text">Register At:</span>
                                            <span>Nov 24, 2019</span>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    <h6 class="overline-title-alt mb-3">Groups</h6>
                                    <ul class="g-1">
                                        <li class="btn-group">
                                            <a class="btn btn-xs btn-light btn-dim" href="#">investor</a>
                                            <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                        <li class="btn-group">
                                            <a class="btn btn-xs btn-light btn-dim" href="#">support</a>
                                            <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                        <li class="btn-group">
                                            <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>
                                            <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                    class="icon ni ni-cross"></em></a>
                                        </li>
                                    </ul>
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div>
        </div>
    </div>
@endsection
