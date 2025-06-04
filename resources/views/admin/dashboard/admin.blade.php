@extends('layouts.app')

@section('content')
    <div class="row g-4">
        <div class="col-12">
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                    <p>Halaman ini menampilkan rekap dari semua data seperti lowangan magang, user, aktivitas, dll</h3>
                    <div class="example-alert">
                        <div class="alert alert-warning alert-icon">
                            <em class="icon ni ni-alert-circle"></em> Halaman ini masih dalam tahap pengembanagan.
                            Fitur Dashboard akan segera tersedia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Pengguna Baru</h6>
                            </div>
                            <div class="card-tools">
                                <a href="html/user-list-regular.html" class="link">View All</a>
                            </div>
                        </div>
                    </div>
                    @foreach ($users as $user)
                        <div class="card-inner card-inner-md">
                            <div class="user-card">
                                @if ($user->level->level_nama == 'Administrator')
                                    <div class="user-avatar bg-primary-dim">
                                        @if ($user->image)
                                            <img src="{{ Storage::url('images/users/' . $user->image) }}"
                                                alt="{{ $user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                @elseif ($user->level->level_nama == 'Mahasiswa')
                                    <div class="user-avatar bg-teal-dim">
                                        @if ($user->image)
                                            <img src="{{ Storage::url('images/users/' . $user->image) }}"
                                                alt="{{ $user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                @elseif ($user->level->level_nama == 'Dosen')
                                    <div class="user-avatar bg-orange-dim">
                                        @if ($user->image)
                                            <img src="{{ Storage::url('images/users/' . $user->image) }}"
                                                alt="{{ $user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                @elseif ($user->level->level_nama == 'Company')
                                    <div class="user-avatar bg-indigo-dim">
                                        @if ($user->image)
                                            <img src="{{ Storage::url('images/users/' . $user->image) }}"
                                                alt="{{ $user->name }}">
                                        @else
                                            <span>
                                                {{ strtoupper(collect(explode(' ', $user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                                <div class="user-info">
                                    <span class="lead-text">{{ $user->name }}</span>
                                    <span class="sub-text">{{ $user->email }}</span>
                                </div>
                                <div class="user-action">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1"
                                            data-bs-toggle="dropdown" aria-expanded="false"><em
                                                class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action
                                                            Settings</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push
                                                            Notification</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Menunggu Review</h6>
                        </div>
                        <div class="card-tools">
                            <ul class="card-tools-nav">
                                <li><a href="#"><span>Cancel</span></a></li>
                                <li class="active"><a href="#"><span>All</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach ($unreviewedLamarans as $item)
                    <ul class="nk-activity">
                        <li class="nk-activity-item">
                            <div class="nk-activity-media user-avatar bg-teal-dim">
                                @if ($item->mahasiswas->user->image)
                                    <img src="{{ Storage::url('images/users/' . $item->mahasiswas->user->image) }}"
                                        alt="{{ $item->mahasiswas->user->name }}">
                                @else
                                    <span>
                                        {{ strtoupper(collect(explode(' ', $item->mahasiswas->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                    </span>
                                @endif
                            </div>
                            <div class="nk-activity-data">
                                <div class="label"><span>{{ $item->mahasiswas->user->name }}</span> menunggu di review
                                </div>
                                <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div><!-- .card -->
        </div><!-- .col -->
        <div class="col-12">
            <div class="card card-bordered card-preview">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th class="tb-tnx-info">
                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                    <span>Lowongan</span>
                                </span>
                                <span class="tb-tnx-date d-md-inline-block d-none">
                                    <span class="d-none d-md-block">
                                        <span>Perusahaan</span>
                                        <span>Create at</span>
                                    </span>
                                </span>
                            </th>
                            <th class="tb-tnx-amount">
                                <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                            </th>
                            <th class="tb-odr-action">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowongans as $lowongan)
                            <tr class="tb-tnx-item">
                                <td class="tb-tnx-info">
                                    <div class="tb-tnx-desc"><em class="icon ni ni-briefcase"></em>
                                        <span class="title">{{ $lowongan->title }}</span>
                                    </div>
                                    <div class="tb-tnx-date">
                                        <span class="date"><em class="icon ni ni-building-fill"></em>
                                            {{ $lowongan->company->user->name }}
                                        </span>
                                        <span class="date">{{ $lowongan->created_at->diffForHumans() }}</span>
                                    </div>
                                </td>
                                <td class="tb-tnx-amount">
                                    <div class="tb-tnx-total">
                                        <span>{{ $lowongan->kategori->name }}</span>
                                    </div>
                                </td>
                                <td class="tb-odr-action">
                                    <div class="tb-odr-btns d-none d-md-inline">
                                        <a href="{{ route('show.lowongan', $lowongan->lowongan_id) }}"
                                            class="btn btn-sm btn-primary">View</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-6 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Perusahaan dengan rating</h6>
                        </div>
                    </div>
                </div>
                @foreach ($mitras as $mitra)
                    @if ($mitra->getRating($mitra->company_id) != '0.0')

                        <ul class="nk-activity">
                            <li class="nk-activity-item">
                                <div class="nk-activity-media user-avatar bg-teal-dim"><img src="./images/avatar/c-sm.jpg" alt="">
                                    @if ($mitra->user->image)
                                        <img src="{{ Storage::url('images/users/' . $mitra->user->image) }}"
                                            alt="{{ $mitra->user->name }}">
                                    @else
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $mitra->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{ $mitra->user->name }}</span>
                                    <span>
                                        @for ($i = 0; $i < $mitra->getRating($mitra->company_id); $i++)
                                            <i class="icon ni ni-star-fill" style="font-size: 24px; color: gold;"></i>
                                        @endfor
                                    </span>
                                </div>

                            </li>
                        </ul>
                    @endif
                @endforeach
            </div><!-- .card -->
        </div><!-- .col --> --}}
    </div>
@endsection
