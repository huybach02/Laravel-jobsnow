<section class="section-box mt-90">
    <div class="container">
        <h2 class="text-center mb-15 wow animate__animated animate__fadeInUp">Gói dịch vụ đăng tin tuyển dụng</h2>
        <div class="font-lg color-text-paragraph-2 text-center wow animate__animated animate__fadeInUp">Lựa chọn gói dịch
            vụ phù hợp với bạn nhất.</div>
        <div class="max-width-price">
            <div class="block-pricing mt-70">
                <div class="row">

                    @foreach ($plans as $plan)
                        @guest
                            <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp">
                                <div class="box-pricing-item">
                                    @if ($plan->recommended == 1)
                                        <div class="recommend">Đề xuất cho bạn</div>
                                    @endif
                                    <h3>{{ $plan->label }}</h3>
                                    <div class="box-info-price">
                                        <span
                                            class="text-price for-month display-month">{{ formatMoney($plan->price) }}</span>
                                    </div>
                                    <ul class="list-package-feature">
                                        <li>+ {{ $plan->job_count }} tin tuyến dụng</li>
                                        <li>+ {{ $plan->featured_job_count }} tin tuyến dụng nổi bật</li>
                                        <li>{{ $plan->company_featured_show ? 'Hiển thị' : 'Không hiển thị' }} doanh nghiệp
                                            nổi bật</li>
                                        <li>{{ $plan->company_verified_show ? 'Hiển thị' : 'Không hiển thị' }} logo "Đã xác
                                            thực doanh
                                            nghiệp"</li>
                                    </ul>
                                    <div><a class="btn btn-border"
                                            href="{{ $plan->price == 0 ? route('register') : route('login') }}">{{ $plan->price == 0 ? 'Đăng ký để nhận miễn phí' : 'Mua ngay' }}</a>
                                    </div>
                                </div>
                            </div>
                        @endguest

                        @auth
                            @if (isCompanyProfileCompleted())
                                @if ($plan->price > 0)
                                    <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp">
                                        <div class="box-pricing-item">
                                            <h3>{{ $plan->label }}</h3>
                                            <div class="box-info-price">
                                                <span
                                                    class="text-price for-month display-month">{{ formatMoney($plan->price) }}</span>
                                            </div>
                                            <ul class="list-package-feature">
                                                <li>+ {{ $plan->job_count }} tin tuyến dụng</li>
                                                <li>+ {{ $plan->featured_job_count }} tin tuyến dụng nổi bật</li>
                                                <li>{{ $plan->company_featured_show ? 'Hiển thị' : 'Không hiển thị' }}
                                                    doanh nghiệp
                                                    nổi bật</li>
                                                <li>{{ $plan->company_verified_show ? 'Hiển thị' : 'Không hiển thị' }} logo
                                                    "Đã xác
                                                    thực doanh
                                                    nghiệp"</li>
                                            </ul>
                                            <div><a class="btn btn-border"
                                                    href="{{ route('company.checkout', $plan->id) }}">Mua ngay</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp">
                                    <div class="box-pricing-item" style="height: 563px">
                                        <h3>{{ $plan->label }}</h3>
                                        <div class="box-info-price">
                                            <span
                                                class="text-price for-month display-month">{{ formatMoney($plan->price) }}</span>
                                        </div>
                                        <ul class="list-package-feature">
                                            <li>+ {{ $plan->job_count }} tin tuyến dụng</li>
                                            <li>+ {{ $plan->featured_job_count }} tin tuyến dụng nổi bật</li>
                                            <li>{{ $plan->company_featured_show ? 'Hiển thị' : 'Không hiển thị' }}
                                                doanh nghiệp
                                                nổi bật</li>
                                            <li>{{ $plan->company_verified_show ? 'Hiển thị' : 'Không hiển thị' }} logo
                                                "Đã xác
                                                thực doanh
                                                nghiệp"</li>
                                            @if ($plan->price == 0)
                                                <li class="font-bold">Cập nhật đầy đủ thông tin doanh nghiệp để nhận miễn
                                                    phí 1 tin tuyển dụng
                                                </li>
                                            @endif
                                        </ul>
                                        <div><a class="btn btn-border"
                                                href="{{ route('company.checkout', $plan->id) }}">{{ $plan->price == 0 ? 'Nhận miễn phí' : 'Mua ngay' }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    @endforeach

                </div>
            </div>
        </div>


    </div>
</section>
