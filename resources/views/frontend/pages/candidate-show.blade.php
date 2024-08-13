@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Ứng viên {{ $candidate->full_name }}</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Ứng viên</li>
                            <li>{{ $candidate->full_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2">
        <div class="container">
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-1 col-md-4 col-4">
                        <img src="{{ asset($candidate->image) }}" alt="joblist">
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <h5 class="f-18">{{ $candidate->full_name }} <span
                                class="card-location font-regular ml-20">{{ $candidate->candidateProvince->name }}</span>
                        </h5>
                        <p class="mt-0 font-md color-text-paragraph-2 mb-15">{{ $candidate->profession->name }}</p>
                        <div class="mt-0 mb-15 d-flex flex-wrap align-items-center gap-1">
                            <img class=""
                                src="{{ asset('https://cdn3d.iconscout.com/3d/premium/thumb/verified-8770129-7096947.png') }}"
                                alt="joblist" width="25px">
                            <span class="badge py-1 px-3 font-xs" style="background-color: #33d667">Đã xác thực ứng
                                viên</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-apply font-bold btn-apply-big"
                            href="{{ asset($candidate->cv_link) }}" target="_blank">Xem CV Ứng Viên</a></div>
                </div>
            </div>
            <div class="box-nav-tabs mt-40 mb-5">
                <ul class="nav" role="tablist">
                    <li><a class="btn btn-border recruitment-icon mr-15 mb-5 active" href="#tab-short-bio"
                            data-bs-toggle="tab" role="tab" aria-controls="tab-short-bio" aria-selected="true">Thông tin
                            chung</a></li>
                    <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="#tab-skills" data-bs-toggle="tab"
                            role="tab" aria-controls="tab-skills" aria-selected="false">Trình độ học vấn và kỹ năng bản
                            thân </a></li>
                    <li><a class="btn btn-border recruitment-icon mb-5" href="#tab-work-experience" data-bs-toggle="tab"
                            role="tab" aria-controls="tab-work-experience" aria-selected="false">Học vấn/bằng cấp và quá
                            trình làm việc</a>
                    </li>
                </ul>
            </div>
            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="content-single mb-120">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-short-bio" role="tabpanel"
                                aria-labelledby="tab-short-bio">
                                <div>
                                    <h6 class="color-text-paragraph-2">Lĩnh vực nghề nghiệp:</h6>
                                    <p>{{ $candidate->profession->name }}</p>
                                </div>
                                <div>
                                    <h6 class="color-text-paragraph-2">Kinh nghiệm làm việc:</h6>
                                    <p>{{ $candidate->experience->name }}</p>
                                </div>
                                <div>
                                    <h6 class="color-text-paragraph-2">Cấp bậc làm việc mong muốn:</h6>
                                    <p>{{ $candidate->employmentLevel->name }}</p>
                                </div>
                                <div>
                                    <h6 class="color-text-paragraph-2">Mức lương mong muốn:</h6>
                                    <p>{{ $candidate->desiredSalary->name }}</p>
                                </div>
                                <div>
                                    <h6 class="color-text-paragraph-2">Nơi làm việc mong muốn:</h6>
                                    <p>{{ $candidate->workplace_desired }}</p>
                                </div>
                                <hr>
                                <div>
                                    <h6 class="color-text-paragraph-2">Giới thiệu bản thân:</h6>
                                    <p>{!! $candidate->bio !!}</p>
                                </div>
                                <hr>
                                <div>
                                    <h6 class="color-text-paragraph-2 mb-3">Mục tiêu nghề nghiệp:</h6>

                                    @foreach (explode(',', $candidate->career_goals) as $goal)
                                        <p><i class="fas fa-hand-point-right"></i> {{ $goal }}</p>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-skills" role="tabpanel" aria-labelledby="tab-skills">
                                <div>
                                    <h6 class="color-text-paragraph-2">Trình độ học vấn:</h6>
                                    <p>{{ $candidate->academicLevel->name }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6 class="color-text-paragraph-2 mb-2">Kỹ năng chuyên môn:</h6>
                                            <ul>
                                                @foreach (explode(',', $candidate->advanced_skills) as $advancedSkill)
                                                    <li> {{ $advancedSkill }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6 class="color-text-paragraph-2 mb-2">Kỹ năng mềm:</h6>
                                            <ul>
                                                @foreach (explode(',', $candidate->soft_skills) as $softSkill)
                                                    <li> {{ $softSkill }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h6 class="color-text-paragraph-2 mb-2">Ngôn ngữ thành thạo:</h6>
                                            <ul>
                                                @foreach (explode(',', $candidate->foreign_languages) as $language)
                                                    <li> {{ $language }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h6 class="color-text-paragraph-2 mb-2">Kỹ năng về tin học:</h6>
                                            <ul>
                                                @foreach (explode(',', $candidate->computer_skills) as $computerSkill)
                                                    <li> {{ $computerSkill }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-work-experience" role="tabpanel"
                                aria-labelledby="tab-work-experience">
                                <h5 class="color-text-paragraph-2 mb-2">Học vấn/bằng cấp:</h5>
                                <ul class="timeline">

                                    @foreach ($educations as $education)
                                        <li>
                                            <span class="font-bold">{{ $education->name_education }}</span>
                                            <p class="float-right">{{ date('d/m/Y', strtotime($education->start_date)) }}
                                                - {{ date('d/m/Y', strtotime($education->end_date)) }}</p>
                                            <p class="mt-5 mb-0"><strong>Đơn vị đào tạo:</strong>
                                                {{ $education->training_unit }}</p>
                                            <p class="mt-0"><strong>Xếp loại:</strong>
                                                {{ $education->rating }}</p>
                                        </li>
                                    @endforeach

                                </ul>
                                <hr>
                                <h5 class="color-text-paragraph-2 mb-2">Quá trình làm việc:</h5>
                                <ul class="timeline">

                                    @foreach ($works as $work)
                                        <li>
                                            <span class="font-bold">Công ty/doanh nghiệp: {{ $work->name_company }}</span>
                                            <p class="float-right">{{ date('d/m/Y', strtotime($work->start_date)) }}
                                                -
                                                {{ $work->current_working ? 'Hiện tại' : date('d/m/Y', strtotime($work->end_date)) }}
                                            </p>
                                            <p class="mt-5 mb-0"><strong>Vị trí việc làm/chức vụ:</strong>
                                                {{ $work->position }}</p>
                                            <p class="mt-0"><strong>Mô tả công việc:</strong>
                                                {{ $work->description }}</p>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="box-related-job content-page   cadidate_details_list">
                        <h3 class="mb-30">Work History</h3>
                        <div class="box-list-jobs display-list">
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
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
                                                class="card-time"><span>5</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
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
                                                class="card-time"><span>6</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"><span
                                        class="flash"></span>
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
                                                class="card-time"><span>6</span><span> days ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">Status:<span
                                                            class="text-success">Done</span></span></div>
                                                <div class="col-lg-5 col-5 text-end"><a class="btn btn-apply-now"
                                                        href="job-details.html">View
                                                        Details</a></div>
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
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <h5 class="f-18">Thông tin cá nhân</h5>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fas fa-calendar-alt"></i></div>
                                    <div class="sidebar-text-info font-bold"><span class="text-description">Ngày
                                            sinh</span><strong
                                            class="small-heading">{{ date('d/m/Y', strtotime($candidate->birthday)) }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fas fa-user"></i></i></div>
                                    <div class="sidebar-text-info font-bold"><span class="text-description">Giới
                                            tính</span><strong
                                            class="small-heading">{{ $candidate->gender == 'male' ? 'Nam' : 'Nữ' }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fas fa-hand-holding-heart"></i></div>
                                    <div class="sidebar-text-info font-bold"><span class="text-description"
                                            style="min-width: 100%">Tình
                                            trạng hôn
                                            nhân</span><strong
                                            class="small-heading">{{ $candidate->marital_status == 'single' ? 'Độc thân' : 'Đã kết hôn' }}</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description font-bold">Địa chỉ</span>
                                        <p class="small-heading">
                                            <strong>Tỉnh/Thành phố:</strong> {{ $candidate->candidateProvince->name }}
                                            <br>
                                            <strong>Quận/Huyện:</strong> {{ $candidate->candidateDistrict->name }}
                                            <br>
                                            <strong>Phường/Xã:</strong> {{ $candidate->candidateWard->name }}
                                            <br>
                                            <strong>Địa chỉ chi tiết:</strong> {{ $candidate->address }}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>Email: {{ $candidate->email }}</li>
                                <li>Điện thoại: {{ $candidate->phone }}</li>
                                @if ($candidate->fb_link)
                                    <li><a href="{{ $candidate->fb_link }}" target="_blank">Facebook:
                                            {{ $candidate->fb_link }}</a></li>
                                @endif
                            </ul>
                            <div class="mt-30"><a class="btn btn-send-message" href="page-contact.html">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
