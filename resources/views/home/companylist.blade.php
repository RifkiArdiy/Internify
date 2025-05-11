<section class="section section-service pb-6" id="companylist">
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
            <div class="slider-init"
                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": false, "arrows": true, "responsive": [ {"breakpoint": 1200,"settings":{"slidesToShow": 3}}, {"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>
                @foreach ($companies as $company)
                    <div class="col px-2">
                        <a href="#" class="card-link-wrapper">
                            <div class="card service service-s4 card-bordered h-100">
                                <div class="py-2">
                                    <div class="card-inner">
                                        <div class="service-icon styled-icon styled-icon-s4 styled-icon-5x text-danger">
                                            <span>{{ Str::limit(strtoupper($company->name), 2, '') }}</span>
                                        </div>
                                        <div class="service-text">
                                            <h5 class="title">{{ $company->name }}</h5>
                                            <p>{{ $company->lowongans_count }} lowongan tersedia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
