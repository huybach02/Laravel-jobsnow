@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">{{ $company->name }}</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Doanh nghiệp</li>
                            <li>{{ $company->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single"><img src="{{ asset($company->banner) }}" alt="joblist"
                    style="height: 400px; object-fit: cover"></div>
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-1 col-md-12 col-3 mb-3"><img src="{{ asset($company->logo) }}" alt="joblist"></div>
                    <div class="col-lg-7 col-md-12">
                        <h5 class="f-18">{{ $company->name }} <span
                                class="card-location font-regular ml-20">{{ $company->companyProvince->name }}</span></h5>
                        <p class="mt-5 font-md color-text-paragraph-2 mb-15">{{ $company->industry->name }}</p>
                        @if ($company->is_profile_verified == 1)
                            <img src="{{ asset('frontend/assets/daxacthuc.png') }}" alt="" width="100px">
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-call-icon btn-apply btn-apply-big"
                            href="mailto:{{ $company->email }}">Liên hệ ngay</a></div>
                </div>
            </div>
            <div class="box-nav-tabs mt-40 mb-5">
                <ul class="nav" role="tablist">
                    <li><a class="btn btn-border  recruitment-icon mr-15 mb-5 active" href="#tab-about" data-bs-toggle="tab"
                            role="tab" aria-controls="tab-about" aria-selected="true">Mô tả doanh nghiệp</a></li>
                    <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="#tab-recruitments" data-bs-toggle="tab"
                            role="tab" aria-controls="tab-recruitments" aria-selected="false">Tầm nhìn, sứ mệnh của
                            doanh nghiệp</a></li>
                </ul>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                aria-labelledby="tab-about">
                                {!! $company->bio !!}
                            </div>
                            <div class="tab-pane fade" id="tab-recruitments" role="tabpanel"
                                aria-labelledby="tab-recruitments">
                                {!! $company->vision !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-related-job content-page mb-120">
                        <h5 class="mb-30">Đang tuyển dụng</h5>
                        <div class="box-list-jobs display-list">

                            @forelse ($jobs as $job)
                                <div class="col-xl-12 col-12">
                                    <div class="card-grid-2 hover-up"><span class="flash"></span>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="card-grid-2-image-left">
                                                    <div class="image-box"><img src="{{ asset($job->company->logo) }}"
                                                            alt="joblist"></div>
                                                    <div class="right-info"><a class="name-job"
                                                            href="{{ route('company-info.show', $job->company->slug) }}">{{ $job->company->name }}</a><span
                                                            class="location-small">{{ $job->jobProvince->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                                <div class="pl-15 mb-15 mt-30">
                                                    @foreach ($job->getJobCategoryNames() as $category)
                                                        <div class="btn btn-grey-small mr-5" href="#"
                                                            style="background-color: #15a0df2b">
                                                            {{ $category }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block-info mt-3">
                                            <h4><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a>
                                            </h4>
                                            <div class="mt-5">
                                                <span class="card-briefcase">{{ $job->getWorkMode()->name }}</span>
                                                <span class="card-time">
                                                    <span>{{ $job->created_at->diffForHumans() }}</span>
                                                </span>
                                            </div>
                                            <div class="mt-20">
                                                <strong>Cấp bậc tuyển dụng:</strong> {{ $job->getEmploymentLevel()->name }}
                                                <br>
                                                <strong>Kinh nghiệm:</strong> {{ $job->getExperience()->name }}
                                                <br>
                                                <strong>Trình độ học vấn:</strong> {{ $job->getAcademicLevel()->name }}
                                            </div>
                                            <div class="card-2-bottom mt-10">
                                                <div class="row">
                                                    <div class="col-lg-7 col-7">
                                                        <span class=""><i class="fas fa-hand-holding-usd"></i> Mức
                                                            lương từ
                                                            <strong>{{ formatMoney($job->salary_min) }}</strong> đến
                                                            <strong>{{ formatMoney($job->salary_max) }}</strong>
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-5 col-5 text-end">
                                                        <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                            data-bs-target="#ModalApplyJobForm"
                                                            style="background-color: transparent; border: 1px solid #15a0df;padding: 8px 0">
                                                            <i class="far fa-bookmark"
                                                                style="font-size: 20px;color: #15a0df"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h6 class="text-center">Không có dữ liệu, vui lòng thử lại!</h6>
                            @endforelse

                            <div class="d-flex justify-content-center mt-70">
                                @if ($jobs->hasPages())
                                    {{ $jobs->links() }}
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <div class="sidebar-info pl-0"><span
                                        class="sidebar-company">{{ $company->name }}</span><span
                                        class="card-location mt-2">{{ $company->companyProvince->name }}</span></div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                {!! $company->map_link !!}
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description font-bold"
                                            style="max-width: 100%">Lĩnh vực hoạt
                                            động</span>
                                        <strong class="small-heading">{{ $company->industry->name }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-map-marker-alt"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description font-bold">Địa chỉ</span>
                                        <p class="small-heading">
                                            <strong>Tỉnh/Thành phố:</strong> {{ $company->companyProvince->name }}
                                            <br>
                                            <strong>Quận/Huyện:</strong> {{ $company->companyDistrict->name }}
                                            <br>
                                            <strong>Phường/Xã:</strong> {{ $company->companyWard->name }}
                                            <br>
                                            <strong>Địa chỉ chi tiết:</strong> {{ $company->address }}
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-sitemap"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Loại hình tổ
                                            chức</span><strong
                                            class="small-heading">{{ $company->organization->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-users"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description"
                                            style="max-width: 100%">Quy mô doanh
                                            nghiệp</span><strong
                                            class="small-heading">{{ $company->teamSize->name }}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-clock"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Ngày thành
                                            lập</span><strong
                                            class="small-heading">{{ date('d/m/Y', strtotime($company->established_date)) }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="far fa-window-maximize"></i></div>
                                    <div class="sidebar-text-info">
                                        <span class="text-description" style="max-width: 100%">Mã số thuế
                                        </span><strong class="small-heading">{{ $company->tax_code }}</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>Điện thoại liên hệ: {{ $company->phone }}</li>
                                <li>Email: {{ $company->email }}</li>
                                @if ($company->website_link)
                                    <li>Website: <a href="{{ $company->website_link }}"
                                            target="_blank">{{ $company->website_link }}</a></li>
                                @endif
                                @if ($company->fb_link)
                                    <li>Facebook: <a href="{{ $company->fb_link }}"
                                            target="_blank">{{ $company->fb_link }}</a></li>
                                @endif
                            </ul>
                            <div class="mt-30"><a class="btn btn-send-message" href="mailto:{{ $company->email }}">Gửi
                                    email liên lạc</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
