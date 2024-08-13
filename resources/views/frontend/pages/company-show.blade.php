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
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-call-icon btn-apply btn-apply-big"
                            href="page-contact.html">Liên hệ ngay</a></div>
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
                    <div class="box-related-job content-page">
                        <h5 class="mb-30">Latest Jobs</h5>
                        <div class="box-list-jobs display-list">
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-6.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job" href="">Quora
                                                        JSC</a><span class="location-small">New York, US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Senior System Engineer</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time"><span>5</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$800</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-7.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Nintendo</a><span class="location-small">New York,
                                                        US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Products Manager</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time"><span>6</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-8.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Periscope</a><span class="location-small">New York,
                                                        US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Lead Quality Control QA</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time"><span>6</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginations mt-60">
                            <ul class="pager">
                                <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                                <li><a class="pager-number" href="#">1</a></li>
                                <li><a class="pager-number" href="#">2</a></li>
                                <li><a class="pager-number active" href="#">3</a></li>
                                <li><a class="pager-number" href="#">4</a></li>
                                <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li>
                            </ul>
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
