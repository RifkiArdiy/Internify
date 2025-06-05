@extends('layouts.app')

@section('content')
    <div class="row g-gs">
        <div class="col-md-4">
            <div class="card card-bordered bg-success">
                <div class="card-inner">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-0 text-white">Lowongan dibuka</h6>
                            <h3 class="text-white mt-1">{{ $openJobs }}</h3>
                        </div>
                        <div class="icon icon-lg">
                            <em class="icon ni ni-briefcase-fill"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-bordered bg-warning">
                <div class="card-inner">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-0 text-white">Mahasiswa Magang</h6>
                            <h3 class="text-white mt-1">{{ $savedCandidates }}</h3>
                        </div>
                        <div class="icon icon-lg text-white">
                            <em class="icon ni ni-user-check-fill"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-bordered bg-danger">
                <div class="card-inner">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-0 text-white">Pengajuan Pending</h6>
                            <h3 class="text-white mt-1">{{ $pendingJobs }}</h3>
                        </div>
                        <div class="icon icon-lg text-white">
                            <em class="icon ni ni-briefcase"></em>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-xxl-8">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Lowongan Magang Anda</h6>
                        </div>
                        <div class="card-tools">
                            <a href="{{ route('companys-lowongan-magang.index') }}" class="link">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="nk-tb-list">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col tb-col-sm"><span>Judul</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Pelamar</span></div>
                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Aksi</span></div>
                        <div class="nk-tb-col nk-tb-col-tools text-end"></div>
                    </div>

                    @foreach ($logang as $item)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col tb-col-sm">
                                <div class="align-center">
                                    <div class="user-info">
                                        <span class="tb-lead">{{ $item->title }}</span>
                                        <span class="tb-sub text-soft">{{ $item->period->name }} |
                                            {{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span>
                                    <em class="icon ni ni-users"></em> {{ $item->jumlahPelamar() }} Pelamar
                                </span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span>
                                    <a href="{{ route('companys-lowongan-magang.pelamars', $item->lowongan_id) }}"
                                        class="btn btn-primary">Lihat Daftar Pelamar</a>
                                </span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <div class="nk-tb-actions gx-1">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                            data-bs-toggle="dropdown">
                                            <em class="icon ni ni-more-h"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{ route('show.lowongan', $item->lowongan_id) }}">
                                                        <em class="icon ni ni-eye"></em><span>Lihat Detail</span></a>
                                                </li>
                                                <li><a
                                                        href="{{ route('companys-lowongan-magang.edit', $item->lowongan_id) }}">
                                                        <em class="icon ni ni-edit-alt"></em><span>Edit</span></a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <form
                                                        action="{{ route('companys-lowongan-magang.destroy', $item->lowongan_id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger">
                                                            <em class="icon ni ni-trash"></em><span>Hapus</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-xxl-8">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Lamaran Belum Direview</h6>
                        </div>
                        {{-- <div class="card-tools">
                            <a href="" class="link">Lihat Semua</a>
                        </div> --}}
                    </div>
                </div>
                <div class="nk-tb-list">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col"><span>Mahasiswa</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Judul Lowongan</span></div>
                        <div class="nk-tb-col tb-col-lg"><span>Tanggal</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Aksi</span></div>
                    </div>

                    @forelse ($unreviewedLamarans as $item)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col">
                                <div class="user-card">
                                    <div class="user-avatar user-avatar-xs bg-success-dim">
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $item->mahasiswas->user->name))->map(fn($w) => $w[0])->take(2)->implode('')) }}
                                        </span>
                                    </div>
                                    <div class="user-name">
                                        <span class="tb-lead">{{ $item->mahasiswas->user->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <div class="align-center">
                                    <span>{{ $item->lowongans->title }}</span>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-lg">
                                <span class="tb-sub">{{ $item->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <a href="{{ route('company.magangApplication.show', $item->magang_id) }}"
                                    class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                    @empty
                        <div class="nk-tb-item">
                            <div class="nk-tb-col">
                                <span class="text-muted">Belum ada lamaran baru.</span>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div><!-- .card -->
        </div>
    </div>
@endsection
