<section class="section-box recruiters mt-60">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Công Ty/Doanh Nghiệp Tuyển Dụng Nổi
                Bật</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Danh sách công ty/doanh
                nghiệp tuyển dụng nổi bật trên hệ thống, có nhu cầu tuyển dụng thường xuyên.</p>
        </div>
    </div>
    <div class="container">
        <div class="box-swiper mt-50">
            <div class="swiper-container swiper-group-1 swiper-style-2 swiper">
                <div class="swiper-wrapper pt-5">
                    <div class="swiper-slide">

                        @foreach ($featuredCompanies as $company)
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a
                                    href="{{ route('company-info.show', $company->slug) }}">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="joblist" src="{{ asset($company->logo) }}">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>{{ $company->name }}</h4><img alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><img
                                                alt="joblist"
                                                src="{{ asset('frontend/assets/imgs/template/icons/star.svg') }}"><span
                                                class="font-xs color-text-mutted ml-10"><span></span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">{{ $company->companyProvince->name }}</span><span
                                                class="font-xs color-text-mutted float-end mt-5">{{ $company->jobs_count }}<span>
                                                    Tin tuyển dụng</span></span></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="swiper-button-next swiper-button-next-1"></div>
            <div class="swiper-button-prev swiper-button-prev-1"></div>
        </div>
    </div>
</section>
