@forelse ($jobs as $job)
    <div class="col-xl-12 col-12">
        <div class="card-grid-2 hover-up"><span class="flash"></span>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <div class="card-grid-2-image-left">
                        <div class="image-box"><img src="{{ asset($job->company->logo) }}" alt="joblist"></div>
                        <div class="right-info"><a class="name-job"
                                href="{{ route('company-info.show', $job->company->slug) }}">{{ $job->company->name }}</a><span
                                class="location-small">{{ $job->jobProvince->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                    <div class="pl-15 mb-15 mt-30">
                        @foreach ($job->getJobCategoryNames() as $category)
                            <div class="btn btn-grey-small mr-5" href="#" style="background-color: #15a0df2b">
                                {{ $category }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-block-info mt-3">
                <h4><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a></h4>
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
                            <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm"
                                style="background-color: transparent; border: 1px solid #15a0df;padding: 8px 0">
                                <i class="far fa-bookmark" style="font-size: 20px;color: #15a0df"></i>
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
