<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 active d-flex align-items-center gap-2"
                    href="candidate-profile-dashboard.html"><i class="fas fa-chart-line " style="font-size: 16px"></i>
                    Thống
                    Kê</a>
            <li><a class="btn btn-border mb-20 d-flex align-items-center gap-2"
                    href="{{ route('company.profile.index') }}"><i class="fas fa-address-card"
                        style="font-size: 16px"></i> Thông Tin Doanh Nghiệp</a></li>
            <li><a class="btn btn-border mb-20 d-flex align-items-center gap-2" href="candidate-profile-jobs.html"><i
                        class="fas fa-check-square" style="font-size: 16px"></i> Công việc đã ứng
                    tuyển</a></li>
            <li><a class="btn btn-border mb-20 d-flex align-items-center gap-2"
                    href="candidate-profile-save-jobs.html"><i class="fas fa-bookmark" style="font-size: 16px"></i> Công
                    việc đã lưu</a>
            </li>
            </li>
        </ul>
        <div class="mt-20">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="link-red d-flex align-items-center gap-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt" style="font-size: 16px"></i> Đăng
                    xuất</a>
            </form>

        </div>
    </div>
</div>
