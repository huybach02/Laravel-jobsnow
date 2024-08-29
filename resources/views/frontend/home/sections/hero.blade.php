<section class="section-box mt-100 mb-100 banner_section">
    <div class="container">
        <div class="banner-hero hero-1">
            <div class="banner-inner">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-12 d-none d-xl-block col-md-6">
                        <div class="banner-imgs mt-40">
                            <div class="block-1"><img class="img-responsive" alt="joblist"
                                    src="{{ asset($hero->image) }}"></div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="block-banner">
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero->title }}</h1>
                            <div class="banner-description mt-20 wow animate__animated animate__fadeInUp"
                                data-wow-delay=".1s">
                                {{ $hero->subtitle }}
                            </div>
                            <div class="mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                <a href="{{ $hero->button_link }}">
                                    <button class="btn btn-primary">
                                        {{ $hero->button_name }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
