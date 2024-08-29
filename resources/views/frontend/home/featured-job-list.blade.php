@forelse ($jobs as $job)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card-grid-2 hover-up">
            <div class="card-grid-2-image-left"><span class="flash"></span>
                <div class="image-box"><img src="{{ asset($job->company->logo) }}" alt="joblist">
                </div>

            </div>
            <div class="card-block-info">
                <h6><a href="{{ route('jobs.show', $job->slug) }}"
                        target="_blank">{{ str($job->title)->limit(45, '...') }}</a></h6>
                <div class="mt-5 mb-3"><span class="card-briefcase">{{ $job->getWorkMode()->name }}</span><span
                        class="card-time">
                        <span>{{ $job->created_at->diffForHumans() }}</span>
                    </span></div>
                <strong>Cấp bậc tuyển dụng:</strong> {{ $job->getEmploymentLevel()->name }}
                <br>
                <strong>Kinh nghiệm:</strong> {{ $job->getExperience()->name }}
                <br>
                <strong>Trình độ học vấn:</strong> {{ $job->getAcademicLevel()->name }}
                <br>
                <div class="mt-3">
                    <span><i class="fas fa-hand-holding-usd"></i>
                        <strong>{{ formatMoney($job->salary_min) }}</strong> đến
                        <strong>{{ formatMoney($job->salary_max) }}</strong>
                    </span>
                </div>
            </div>
            <a href="{{ route('jobs.show', $job->slug) }}" target="_blank">
                <div class="btn btn-apply-now btn-detail" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">
                    Xem ngay</div>
            </a>
        </div>
    </div>
@empty
    <p class="text-center font-bold">Danh mục này chưa có tin tuyển dụng nào. Bạn vui lòng quay lại sau nhé!</p>
@endforelse
