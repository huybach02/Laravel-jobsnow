@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thông tin tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Thông tin tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-image-single mb-20"><img src="{{ asset($job->company->banner) }}" alt="joblist"
                    style="height: 400px; object-fit: cover"></div>
            <div class="row mt-10">
                <div class="col-lg-8 col-md-12">
                    <h3>{{ $job->title }}</h3>
                    <div class="mt-0 mb-15"><span class="card-briefcase">{{ $job->getWorkMode()->name }}</span><span
                            class="card-time">{{ $job->created_at->diffForHumans() }}</span></div>

                    @if ($job->deadline >= date('Y-m-d'))
                        <h6 class="w-50 py-2 px-4 text-white" style="background-color: #ff5a5f">Thời hạn ứng tuyển:
                            {{ date('d-m-Y', strtotime($job->deadline)) }}
                        </h6>
                    @else
                        <h6 class="w-50 py-2 px-4 text-white" style="background-color: #ff5a5f">
                            Đã hết thời gian ứng tuyển
                        </h6>
                    @endif

                </div>

                @if ($job->deadline >= date('Y-m-d'))
                    <div class="col-lg-4 col-md-12 text-lg-end">
                        <div class="btn btn-apply-now hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm"
                            style="background-color: transparent; border: 1px solid #15a0df;padding: 15px 0">
                            <i class="far fa-bookmark" style="font-size: 20px;color: #15a0df"></i>
                        </div>
                        <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                            data-bs-target="#ModalApplyJobForm">Ứng tuyển ngay</div>
                    </div>
                @endif

            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="job-overview">
                        <h5 class="border-bottom pb-15 mb-30">Thông tin chung</h5>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-text-info ml-10"><span class="text-description industry-icon mb-10"><i
                                            class="fas fa-list"></i> <strong>Ngành nghề</strong></span><strong
                                        class="small-heading">
                                        {{ implode(' / ', $job->getJobCategoryNames()) }}
                                    </strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description joblevel-icon mb-10"><strong><i class="fas fa-user-tie"></i>
                                            Chức
                                            vụ</strong></span><strong
                                        class="small-heading">{{ $job->getEmploymentLevel()->name }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span class="text-description salary-icon mb-10">
                                        <i class="fas fa-briefcase"></i><strong> Kinh nghiệm</strong></span><strong
                                        class="small-heading">{{ $job->getExperience()->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="sidebar-text-info ml-10"><span class="text-description experience-icon mb-10"><i
                                            class="fas fa-id-card"></i> <strong>Học vấn</strong></span><strong
                                        class="small-heading">{{ $job->getAcademicLevel()->name }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10"><i
                                            class="fas fa-venus-mars"></i> <strong>Giới tính</strong></span><strong
                                        class="small-heading">{{ $job->gender }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span class="text-description mb-10"><i
                                            class="fas fa-users"></i> <strong>Số lượng</strong></span><strong
                                        class="small-heading">{{ $job->quantity }}</strong></div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description jobtype-icon mb-10 d-flex align-items-start gap-2"><i
                                            class="fas fa-suitcase mt-1"></i> <strong>Hình thức làm
                                            việc</strong></span><strong
                                        class="small-heading">{{ $job->getWorkMode()->name }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span class="text-description mb-10"><i
                                            class="fas fa-map-marker-alt"></i> <strong>Địa điểm</strong></span><strong
                                        class="small-heading">
                                        {{ $job->address }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-25">
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span class="text-description jobtype-icon mb-10"><i
                                            class="fas fa-suitcase"></i> <strong>Mức lương</strong></span><strong
                                        class="small-heading">{{ formatMoney($job->salary_min) }} đến
                                        {{ formatMoney($job->salary_max) }}</strong></div>
                            </div>
                            <div class="col-md-6 d-flex mt-sm-15">
                                <div class="sidebar-text-info ml-10"><span
                                        class="text-description mb-10 d-flex align-items-start gap-2"><i
                                            class="fas fa-map-marker-alt mt-1"></i> <strong>Hình thức <br> trả
                                            lương</strong></span><strong class="small-heading">
                                        {{ $job->salary_structure }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-single">
                        <h4>Mô tả chi tiết công việc</h4>
                        {!! $job->description !!}
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Yêu cầu của công việc</h4>
                        <ul>
                            @foreach (explode(',', $job->requirement) as $requirement)
                                <li>{{ $requirement }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Yêu cầu kỹ năng chuyên môn</h4>
                        <ul>
                            @foreach (explode(',', $job->advanced_skills) as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Yêu cầu kỹ năng mềm</h4>
                        <ul>
                            @foreach (explode(',', $job->soft_skills) as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Ngoại ngữ thành thạo</h4>
                        @if ($job->foreign_languages)
                            <ul>
                                @foreach (explode(',', $job->foreign_languages) as $language)
                                    <li>{{ $language }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Không yêu cầu ngoại ngữ</p>
                        @endif
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Quyền lợi được hưởng</h4>
                        <ul>
                            @foreach (explode(',', $job->benefits) as $benefit)
                                <li>{{ $benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Yêu cầu hồ sơ</h4>
                        <ul>
                            @foreach (explode(',', $job->request_to_apply) as $request)
                                <li>{{ $request }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="content-single">
                        <h4>Thông tin liên hệ</h4>
                        <p><strong>Người liên hệ:</strong> {{ $job->contact_person }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $job->contact_phone }}</p>
                        <p><strong>Email:</strong> {{ $job->contact_email }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $job->address }}</p>
                    </div>
                    <div class="single-apply-jobs">
                        <div class="row align-items-center">
                            <div class="col-md-7 text-lg-end social-share">
                                <h6 class="color-text-paragraph-2 d-inline-block d-baseline mr-10">Chia sẻ qua</h6><a
                                    class="mr-5 d-inline-block d-middle" href="#"><img alt="joblist"
                                        src="{{ asset('frontend/assets/imgs/template/icons/share-fb.svg') }}"></a><a
                                    class="mr-5 d-inline-block d-middle" href="#"><img alt="joblist"
                                        src="{{ asset('frontend/assets/imgs/template/icons/share-tw.svg') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <figure><img alt="joblist" src="{{ asset($job->company->logo) }}"></figure>
                                <div class="sidebar-info"><a href="{{ route('company-info.show', $job->company->slug) }}"
                                        class="sidebar-company">{{ $job->company->name }}</a><span
                                        class="card-location">{{ $job->jobProvince->name }}</span><a
                                        class="link-underline mt-15" href="#">02 Open Jobs</a>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                {!! $job->company->map_link !!}
                            </div>
                            <ul class="ul-disc">
                                <strong>Tỉnh/Thành phố:</strong> {{ $job->company->companyProvince->name }}
                                <br>
                                <strong>Quận/Huyện:</strong> {{ $job->company->companyDistrict->name }}
                                <br>
                                <strong>Phường/Xã:</strong> {{ $job->company->companyWard->name }}
                                <br>
                                <strong>Địa chỉ chi tiết:</strong> {{ $job->company->address }}
                                <br>
                                <strong>Điện thoại:</strong> {{ $job->company->phone }}
                                <br>
                                <strong>Email:</strong> {{ $job->company->email }}
                                <br>
                                <strong>Website:</strong> <a href="{{ $job->company->website_link }}"
                                    target="_blank">{{ $job->company->website_link }}</a>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-border">
                        <h6 class="f-18">Similar jobs</h6>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-1.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">UI / UX
                                                    Designer
                                                    fulltime</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>3</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$250<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">New York,
                                                            US</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-2.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Java
                                                    Software
                                                    Engineer</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>5</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$500<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">Tokyo,
                                                            Japan</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-3.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a
                                                    href="job-details.html">Frontend Developer</a>
                                            </h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>8</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$650<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">Hanoi,
                                                            Vietnam</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-4.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Cloud
                                                    Engineer</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>12</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$380<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">Losangl,
                                                            Au</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-5.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">DevOps
                                                    Engineer</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>34</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$140<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">Paris,
                                                            France</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-6.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Figma
                                                    design UI/UX</a>
                                            </h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>45</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$290<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">New York,
                                                            US</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-7.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">Product
                                                    Manage</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>50</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$650<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">New York,
                                                            US</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                        <div class="image"><a href="job-details.html"><img
                                                    src="assets/imgs/brands/brand-8.png" alt="joblist"></a></div>
                                        <div class="info-text">
                                            <h5 class="font-md font-bold color-brand-1"><a href="job-details.html">UI / UX
                                                    Designer</a></h5>
                                            <div class="mt-0"><span class="card-briefcase">Fulltime</span><span
                                                    class="card-time"><span>58</span><span> mins ago</span></span></div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="card-price">$270<span>/Hour</span></h6>
                                                    </div>
                                                    <div class="col-6 text-end"><span class="card-briefcase">New York,
                                                            US</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
