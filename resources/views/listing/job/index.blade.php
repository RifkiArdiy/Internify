@extends('listing.main')

@section('header')
    <h1 class="header-title">Cari Lowongan Pekerjaan</h1>
    <p class="lead-text">Temukan lowongan kerja yang sesuai dengan keahlian dan minatmu.</p>
    <form action="{{ route('lowongan.search') }}" method="GET" class="mt-4">
        <div class="form-group">
            <div class="form-control-wrap d-flex flex-wrap justify-content-center">
                <input type="text" name="q" class="form-control form-control-lg w-75 me-2"
                    placeholder="Cari berdasarkan jabatan, perusahaan, atau lokasi..." required>
                <button type="submit" class="btn btn-primary btn-lg">
                    <em class="icon ni ni-search"></em> Cari
                </button>
            </div>
        </div>
    </form>
    <div class="mt-3">
        <span class="text-light small">Contoh: Programmer, Admin, Jakarta</span>
    </div>
@endsection

@section('main')
    @if ($lowongan->count())
        <div class="row g-gs">
            @foreach ($lowongan as $lwg)
                <div class="col-sm-6 col-lg-4">
                    <a href="{{ route('show.lowongan', $lwg->lowongan_id) }}" class="card-link-wrapper">
                        <div class="card card-bordered service service-s4 h-100">
                            <div class="card-inner">
                                <div class="job">
                                    <div class="job-head">
                                        <div class="job-title">
                                            @if ($lwg->company->user->image)
                                                <div class="user-avatar">
                                                    <img src="{{ Storage::url('images/users/' . $lwg->company->user->image) }}"
                                                        alt="{{ $lwg->company->user->name }}">
                                                </div>
                                            @else
                                                <div class="user-avatar sq">
                                                    <span>
                                                        {{ strtoupper(collect(explode(' ', $lwg->company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="job-info">
                                                <h6 class="title">{{ Str::limit(strip_tags($lwg->title), 30) }}</h6>
                                                <span class="sub-text">{{ $lwg->period->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="job-details">
                                        <p>{{ Str::limit(strip_tags($lwg->description), 100) }}</p>
                                    </div>
                                    <div class="job-meta">
                                        <ul class="job-users g-1">
                                            <li>
                                                <span class="badge badge-dim bg-primary">{{ $lwg->kategori->name }}</span>
                                            </li>
                                        </ul>
                                        <span class="badge badge-dim bg-warning">
                                            <em class="icon ni ni-clock"></em>
                                            <span>{{ $lwg->created_at->diffForHumans() }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="nk-block nk-block-middle wide-md mx-auto">
            <div class="nk-block-content nk-error-ld text-center">
                <img class="nk-error-gfx" src="{{ asset('assets/home/images/gfx/error-404.svg') }}" alt="">
                <div class="wide-xs mx-auto">
                    <h3 class="nk-error-title">Oops! Tidak ada lowongan ditemukan</h3>
                    <p class="nk-error-text">Kami tidak menemukan lowongan yang sesuai dengan pencarian Anda. Coba kata
                        kunci lain atau kembali ke halaman awal.</p>
                    <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-lg btn-primary mt-2">Kembali ke
                        Dashboard</a>
                </div>
            </div>
        </div>
    @endif
@endsection
