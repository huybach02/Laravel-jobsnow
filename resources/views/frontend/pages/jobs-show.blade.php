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

                    <div class="col-12">
                        @if ($job->deadline >= date('Y-m-d'))
                            <h6 class="col-md-6 py-2 px-4 text-white" style="background-color: #ff5a5f">Thời hạn ứng
                                tuyển:
                                {{ date('d-m-Y', strtotime($job->deadline)) }}
                            </h6>
                        @else
                            <h6 class="col-md-6 py-2 px-4 text-white" style="background-color: #ff5a5f">
                                Đã hết thời gian ứng tuyển
                            </h6>
                        @endif
                    </div>

                </div>

                @if ($job->deadline >= date('Y-m-d'))
                    <div class="col-lg-4 col-md-12 text-lg-end mt-10">
                        <div class="btn btn-apply-now hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm"
                            style="background-color: transparent; border: 1px solid #15a0df;padding: 15px 0">
                            <i class="far fa-bookmark" style="font-size: 20px;color: #15a0df"></i>
                        </div>
                        @if (isApplied($job->id))
                            <div class="btn btn-success font-bold" style="padding: 18px 30px"><i
                                    class="fas fa-check-circle mr-5"></i>
                                Đã
                                ứng tuyển</div>
                        @else
                            @if (auth()->check() && auth()->user()->role == 'company')
                            @else
                                <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Ứng tuyển ngay</div>
                            @endif
                        @endif

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
                                        class="link-underline mt-15"
                                        href="{{ route('company-info.show', $job->company->slug) }}">{{ $countJobByCompany }}
                                        công việc
                                        đang tuyển dụng</a>
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

                                @foreach ($similarJobs as $similarJob)
                                    <li>
                                        <div class="card-list-4 wow animate__animated animate__fadeIn hover-up">
                                            <div class="image"><a href="job-details.html"><img
                                                        src="{{ asset($similarJob->company->logo) }}" alt="joblist"
                                                        width="120px"></a>
                                            </div>
                                            <div class="info-text">
                                                <h5 class="font-md font-bold color-brand-1"><a
                                                        href="{{ route('jobs.show', $similarJob->slug) }}">
                                                        {{ limitText($similarJob->title, 55) }}</a></h5>
                                                <div class="mt-0"><span
                                                        class="card-briefcase">{{ $similarJob->getWorkMode()->name }}</span><span
                                                        class="card-time"><span>{{ $similarJob->created_at->diffForHumans() }}</span></span>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-6">
                                                            <p>Từ
                                                                <strong>{{ formatMoney($job->salary_min) }}</strong> đến
                                                                <strong>{{ formatMoney($job->salary_max) }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="col-6 text-end"><span
                                                                class="card-briefcase">{{ $similarJob->jobProvince->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            @if (auth()->check() && isCandidateProfileCompleted())
                                Thông tin ứng tuyển
                            @endif
                            @if (!auth()->check())
                                Đăng nhập để ứng tuyển
                            @endif
                            @if (!isCandidateProfileCompleted())
                                Vui lòng cập nhật hồ sơ của bạn
                            @endif
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (!auth()->check())
                            <p>Bạn vui lòng <strong>Đăng nhập</strong> hoặc <strong>Đăng ký</strong> nếu chưa có tài khoản
                                để có thể ứng tuyển vào công việc
                                này</p>
                        @endif
                        @if (auth()->check() && isCandidateProfileCompleted())
                            <div>
                                <h6>Ảnh đại diện của bạn</h6>
                                <div class="image-profile mb-20"><img
                                        src="{{ @$candidate ? asset($candidate?->image) : 'https://cdn.viettablet.com/images/news/30/image-1536378713-nokia-9-penta-lens-render-by-benjamin-geskin_1200x800-800-resize.jpg' }}"
                                        alt="joblist">
                                </div>
                            </div>
                            <div class="d-flex gap-2 align-items-end mb-5">
                                <h6 for="" class="font-bold">Họ và tên:</h6>
                                <p style="font-size: 15px">{{ $candidate?->full_name }}</p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Ngày sinh:</h6>
                                        <p style="font-size: 15px">
                                            {{ date('d-m-Y', strtotime($candidate?->birthday)) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Giới tính:</h6>
                                        <p style="font-size: 15px">{{ $candidate?->gender == 'male' ? 'Nam' : 'Nữ' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Lĩnh vực nghề ngiệp:</h6>
                                        <p style="font-size: 15px">{{ $candidate?->profession->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Kinh nghiệm làm việc:</h6>
                                        <p style="font-size: 15px">{{ $candidate?->experience->name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">CV của bạn:</h6>
                                        <a href="{{ asset($candidate?->cv_link) }}" target="_blank" class="text-primary"
                                            style="font-size: 15px">Nhấn vào đây để xem CV</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Email liên hệ:</h6>
                                        <p style="font-size: 15px">{{ $candidate?->email }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 align-items-end mb-5">
                                        <h6 for="" class="font-bold">Số điện thoại liên hệ:</h6>
                                        <p style="font-size: 15px">{{ $candidate?->phone }}</p>
                                    </div>
                                </div>
                                <form id="applyForm" action="{{ route('candidate.apply-job', $job->id) }}"
                                    method="POST">
                                    @csrf

                                    <div class="form-group select-style">
                                        <h6 for="" class="font-bold mb-10">Nội dung tự giới thiệu bản thân với nhà
                                            tuyển
                                            dụng (Tuỳ chọn):</h6>
                                        <textarea name="message" id="" cols="30" rows="5">{{ old('message') }}</textarea>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if (auth()->check() && !isCandidateProfileCompleted())
                            <p>Bạn vui lòng hoàn thành đầy đủ 2 mục <strong>"Thông tin chung"</strong> và <strong>"Thông tin
                                    liên hệ"</strong> trong phần
                                <strong>"Thông tin tài khoản"</strong> để có thể ứng tuyển vào công việc này cũng như các
                                công việc khác.
                            </p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        @if (!auth()->check())
                            <a href="{{ route('register') }}" class="btn btn-secondary">Đăng ký</a>
                            <a href="{{ route('login') }}" class="btn btn-primary">Đăng nhập</a>
                        @endif
                        @if (auth()->check() && isCandidateProfileCompleted())
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary btn-submit">Xác nhận</button>
                        @endif
                        @if (auth()->check() && !isCandidateProfileCompleted())
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <a href="{{ route('candidate.profile.index') }}" class="btn btn-primary">Cập nhật ngay</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.btn-submit').on('click', function() {
            $('#applyForm').submit();
        })
    </script>
@endpush
