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
                                        <span>AB</span>
                                    </div>
                                @elseif ($user->level->level_nama == 'Mahasiswa')
                                    <div class="user-avatar bg-teal-dim">
                                        <span>AB</span>
                                    </div>
                                @elseif ($user->level->level_nama == 'Dosen')
                                    <div class="user-avatar bg-orange-dim">
                                        <span>AB</span>
                                    </div>
                                @elseif ($user->level->level_nama == 'Company')
                                    <div class="user-avatar bg-indigo-dim">
                                        <span>AB</span>
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
                            <div class="nk-activity-media user-avatar bg-teal-dim"><img src="./images/avatar/c-sm.jpg" alt="">
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

        <div class="col-md-6 col-xxl-4">
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
        </div><!-- .col -->
    </div>
    {{-- <div class="card card-bordered card-preview">
        <h4>Lamaran yang menunggu review</h4>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Judul Lowongan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unreviewedLamarans as $item)
                <tr>
                    <td>{{ $item->mahasiswas->user->name }}</td>
                    <td>{{ $item->lowongans->title }}</td>
                    <td><button onclick="window.location.href='{{ route('magangApplication.show', $item->magang_id) }}'"
                            class="btn btn-success btn-sm">
                            Lihat Detail
                        </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    {{-- <div class="card card-bordered card-preview">
        <h4>Daftar Perusahaan yang Bermitra</h4>
        @foreach ($mitras as $item)
        <a href={{ route('companies.show', $item->company_id) }}>{{ $item->user->name }}</a>
        @endforeach
    </div> --}}

    {{-- <div class="card card-bordered card-preview">
        <h4>Daftar Lowongan yang tersedia</h4>
        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%;">
            <thead>
                <tr>
                    <th>Nama Perusahaan</th>
                    <th>Judul Magang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongans as $item)
                <tr>
                    <td>{{ $item->company->user->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td><button onclick="window.location.href='{{ route('pengajuan-magang.show', $item->lowongan_id) }}'"
                            class="btn btn-success btn-sm">
                            Lihat Detail
                        </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div> --}}
@endsection