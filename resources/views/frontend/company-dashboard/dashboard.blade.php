@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thống Kê</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Thống kê</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row mb-120">

                @include('frontend.company-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-120">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Thống kê tuyển dụng</h3>
                        @if (!isCompanyProfileCompleted())
                            <div class="row">
                                <div class="col-12 mt-30">
                                    <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                                        <span class="">
                                            <img src="https://cdn-icons-png.flaticon.com/256/3756/3756712.png"
                                                alt="alert" width="100px">
                                        </span>
                                        <div class="text">
                                            <h4>Thông báo: Cập Nhật Đầy Đủ Thông Tin Doanh Nghiệp </h4>
                                            <p>Vui lòng cập nhật thông tin doanh nghiệp của bạn để tiếp tục sử dụng dịch
                                                vụ. <br> Thông tin doanh nghiệp cần thiết cho việc cung cấp thông tin
                                                tuyển
                                                dụng chính xác và hiệu quả. <br> Nếu không cập nhật thông tin đầy đủ,
                                                doanh nghiệp của bạn không thể đăng tải tin tuyển dụng.</p>
                                            <h6 class="text-white font-bold mt-3">Hướng dẫn</h6>
                                            <p><i class="fas fa-hand-point-right"></i> Bấm vào nút "Cập nhật ngay".</p>
                                            <p><i class="fas fa-hand-point-right"></i> Điền đầy đủ thông tin ở 2 mục lớn là
                                                "Thông tin chung" và "Thông tin liên
                                                hệ".
                                            </p>
                                            <p><i class="fas fa-hand-point-right"></i> Hoàn thành cập nhật.</p>
                                        </div>
                                        <a href="{{ route('company.profile.index') }}" class="btn btn-default rounded-1">Cập
                                            nhật ngay</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="dashboard_overview">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-info-subtle">
                                        <h2>{{ $companyInfo->limit_post }} <span>Tin tuyển dụng tối đa</span></h2>
                                        <span class="icon"><i class="fas fa-newspaper"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-info-subtle">
                                        <h2>{{ $companyInfo->used_post }} <span>Tin tuyển dụng đã dùng</span></h2>
                                        <span class="icon"><i class="fas fa-newspaper"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6"></div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>{{ $companyInfo->limit_featured_post }} <span>Tin tuyển dụng nổi bật tối
                                                đa</span></h2>
                                        <span class="icon"><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>{{ $companyInfo->used_featured_post }} <span>Tin tuyển dụng nổi bật đã
                                                dùng</span></h2>
                                        <span class="icon"><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <span class="icon">
                                            @if ($companyInfo->profile_completed == 1)
                                                <i class="fas fa-check-circle"
                                                    style="color: rgb(20, 174, 20); font-size: 30px"></i>
                                            @else
                                                <i class="fas fa-times-circle"
                                                    style="color: rgb(246, 27, 27); font-size: 30px"></i>
                                            @endif
                                        </span>
                                        <h2>
                                            <h6
                                                style="color: {{ $companyInfo->profile_completed == 1 ? 'rgb(20, 174, 20)' : 'rgb(246, 27, 27)' }}; margin-top: 10px">
                                                {{ $companyInfo->profile_completed == 1 ? 'Đã' : 'Chưa' }} hoàn thành
                                                thông tin
                                                doanh nghiệp</h6>
                                        </h2>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <span class="icon">
                                            @if ($companyInfo->is_profile_verified == 1)
                                                <i class="fas fa-check-circle"
                                                    style="color: rgb(20, 174, 20); font-size: 30px"></i>
                                            @else
                                                <i class="fas fa-times-circle"
                                                    style="color: rgb(246, 27, 27); font-size: 30px"></i>
                                            @endif
                                        </span>
                                        <h2>
                                            <h6
                                                style="color: {{ $companyInfo->is_profile_verified == 1 ? 'rgb(20, 174, 20)' : 'rgb(246, 27, 27)' }}; margin-top: 10px">
                                                {{ $companyInfo->is_profile_verified == 1 ? 'Hiển thị' : 'Không hiển thị' }}
                                                Logo hồ sơ đã xác thực trong phần hồ sơ</h6>
                                        </h2>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <span class="icon">
                                            @if ($companyInfo->visibility == 1)
                                                <i class="fas fa-check-circle"
                                                    style="color: rgb(20, 174, 20); font-size: 30px"></i>
                                            @else
                                                <i class="fas fa-times-circle"
                                                    style="color: rgb(246, 27, 27); font-size: 30px"></i>
                                            @endif
                                        </span>
                                        <h2>
                                            <h6
                                                style="color: {{ $companyInfo->visibility == 1 ? 'rgb(20, 174, 20)' : 'rgb(246, 27, 27)' }}; margin-top: 10px">
                                                {{ $companyInfo->visibility == 1 ? 'Hiển thị' : 'Không hiển thị' }}
                                                trong mục doanh nghiệp nổi bật</h6>
                                        </h2>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
