<section class="section section-service pb-7">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-md-8">
                <div class="section-head">
                    <h2 class="title text-dark">Lowongan Magang</h2>
                    <p>Temukan daftar lengkap lowongan magang terkini yang tersedia di berbagai perusahaan melalui
                        Internify.</p>
                </div><!-- .section-head -->
            </div><!-- .col -->
        </div>
        <div class="section-content">
            <div class="row g-gs">
                @foreach ($lowongans as $lwg)
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
                                                    <span
                                                        class="badge badge-dim bg-primary">{{ $lwg->kategori->name }}</span>
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
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-md-10">
                <div class="text-block is-compact py-3">
                    <ul class="btns-inline justify-center pt-6">
                        <li>
                            <a href="{{ route('list.lowongan') }}" class="btn btn-xl btn-primary btn-round">Lihat
                                lebih banyak</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- .row -->
    </div>
</section>
