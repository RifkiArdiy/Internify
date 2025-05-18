@extends('listing.main')

@section('main')
    <div class="row g-gs">
        @foreach ($lowongans as $lwg)
            <div class="col-sm-6 col-lg-4">
                <a href="#" class="card-link-wrapper">
                    <div class="card card-bordered h-100">
                        <div class="card-inner">
                            <div class="job">
                                <div class="job-head">
                                    <div class="job-title">
                                        <div class="user-avatar sq bg-purple"><span>DD</span></div>
                                        <div class="job-info">
                                            <h6 class="title">{{ $lwg->title }}</h6>
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
                                            {{-- <span
                                                        class="badge rounded-pill bg-outline-secondary">{{ $lwg->requirements }}</span> --}}
                                        </li>
                                    </ul>
                                    <span class="badge badge-dim bg-warning"><em
                                            class="icon ni ni-clock"></em><span>{{ $lwg->created_at->diffForHumans() }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
