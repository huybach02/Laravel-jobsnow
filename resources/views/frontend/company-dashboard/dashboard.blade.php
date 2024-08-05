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
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-danger-subtle">
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="dash_overview_item bg-warning-subtle">
                                        <h2>12 <span>job applied</span></h2>
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
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
