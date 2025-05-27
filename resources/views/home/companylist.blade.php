<section class="section section-service pb-7">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-7 col-md-8">
                <div class="section-head">
                    <h2 class="title text-dark">Daftar Perusahaan Magang</h2>
                    <p>Temukan daftar lengkap perusahaan yang membuka lowongan magang di Internify. Klik pada profil
                        perusahaan untuk melihat detail dan lowongan magang yang tersedia.</p>
                </div><!-- .section-head -->
            </div><!-- .col -->
        </div>
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
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-md-10">
                <div class="text-block is-compact py-3">
                    <ul class="btns-inline justify-center pt-6">
                        <li>
                            <a href="{{ route('list.perusahaan') }}" class="btn btn-xl btn-primary btn-round">Lihat
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
