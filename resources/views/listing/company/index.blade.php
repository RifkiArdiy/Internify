@extends('listing.main')
@section('header')
    <form action="{{ route('perusahaan.search') }}" method="GET" class="mt-4">
        <div class="form-group">
            <div class="form-control-wrap d-flex flex-wrap justify-content-center">
                <input type="text" name="q" class="form-control form-control-lg w-75 me-2"
                    placeholder="Cari berdasarkan nama perusahaan atau deskripsi..." required>
                <button type="submit" class="btn btn-primary btn-lg">
                    <em class="icon ni ni-search"></em> Cari
                </button>
            </div>
        </div>
    </form>
@endsection
@section('main')
    <div class="row g-gs justify-content-center text-center">
        @foreach ($companies as $company)
            <div class="col-sm-6 col-lg-3">
                <a href="{{ route('show.perusahaan', $company->company_id) }}" class="card-link-wrapper">
                    <div class="card service service-s4 card-bordered h-100">
                        <div class="py-2">
                            <div class="card-inner">
                                @if ($company->user->image)
                                    <div class="service-icon styled-icon styled-icon-6x">
                                        <img src="{{ Storage::url('images/users/' . $company->user->image) }}"
                                            alt="{{ $company->user->name }}">
                                    </div>
                                @else
                                    <div class="service-icon styled-icon styled-icon-s5 styled-icon-6x text-indigo">
                                        <span>
                                            {{ strtoupper(collect(explode(' ', $company->user->name))->map(fn($word) => $word[0])->take(2)->implode('')) }}
                                        </span>
                                    </div>
                                @endif
                                <div class="service-text">
                                    <h5 class="title">{{ $company->user->name }}</h5>
                                    <p class="text-indigo">Membuka Lowongan : {{ $company->lowongans_count }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
