@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thanh toán</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="container">

            <div class="max-width-price">
                <div class="block-pricing mt-70 mb-120">
                    <div class="row">
                        <div class="col-md-8 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <h5 class="">Chọn phương thức thanh toán</h5>
                            <div class="row pt-40">
                                <div class="col-md-3">
                                    <form action="{{ route('company.vnpay.payment') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                                        <button class="btn" type="submit" name="redirect"><img class=""
                                                style="width: 200px;border-radius: 5px;border: 3px solid #15a0df;"
                                                src="https://play-lh.googleusercontent.com/2WHgcuwhtbmfrDEF-D-lYQ4sAk0TlI-aFtqx7lJXK5KV7f8smnofaedP_Opcd3edR2c"
                                                alt=""></button>
                                    </form>

                                </div>

                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-6 wow animate__animated animate__fadeInUp">
                            <div class="box-pricing-item">
                                <h3>{{ $plan->label }}</h3>
                                <div class="box-info-price">
                                    <span class="text-price for-month display-month">{{ formatMoney($plan->price) }}</span>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
