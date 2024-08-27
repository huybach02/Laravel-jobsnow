<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu mt-5">
        <ul class="list">
            <li>
                <!-- User Info -->
                @auth
                    <div class="user-info d-md-none">
                        <div class="admin-image"> <img src="{{ asset(auth()->user()->image) }}" alt="profile img"> </div>
                        <div class="admin-action-info"> <span>Xin chào</span>
                            <h3>{{ auth()->user()->name }}</h3>
                            <ul>
                                <li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i
                                            class="zmdi zmdi-account"></i></a></li>
                                <li><a data-placement="bottom" title="Full Screen" href="sign-in.html"><i
                                            class="zmdi zmdi-sign-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @endauth
                <!-- #User Info -->
            </li>
            <li class="{{ setActive(['admin.dashboard']) }}"> <a href="{{ route('admin.dashboard') }}"><i
                        class="zmdi zmdi-view-dashboard"></i><span class="font-bold">Thống
                        Kê</span> </a>
            <li class="{{ setActive(['admin.industry-types.*', 'admin.organization-types.*', 'admin.team-sizes.*']) }}">
                <a href="javascript:void(0);" class="menu-toggle d-flex align-items-center">
                    <i class="zmdi zmdi-layers"></i>
                    <span class="font-bold">QL Thông Tin Tổ Chức</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ setSubActive(['admin.industry-types.*']) }}"> <a
                            href="{{ route('admin.industry-types.index') }}">Lĩnh vực hoạt động</a></li>
                    <li class="{{ setSubActive(['admin.organization-types.*']) }}"> <a
                            href="{{ route('admin.organization-types.index') }}">Loại hình tổ chức</a></li>
                    <li class="{{ setSubActive(['admin.team-sizes.*']) }}"> <a
                            href="{{ route('admin.team-sizes.index') }}">Quy mô tổ chức</a></li>
                </ul>
            </li>
            <li class="{{ setActive(['admin.province-cities.*', 'admin.districts.*', 'admin.commune-wards.*']) }}"> <a
                    href="javascript:void(0);" class="menu-toggle d-flex align-items-center">
                    <i class="zmdi zmdi-pin"></i>
                    <span class="font-bold">QL Địa Điểm</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ setSubActive(['admin.province-cities.*']) }}"> <a
                            href="{{ route('admin.province-cities.index') }}">Tỉnh/Thành phố</a></li>
                    <li class="{{ setSubActive(['admin.districts.*']) }}"> <a
                            href="{{ route('admin.districts.index') }}">Quận/Huyện</a></li>
                    <li class="{{ setSubActive(['admin.commune-wards.*']) }}"> <a
                            href="{{ route('admin.commune-wards.index') }}">Phường/Xã</a></li>
                </ul>
            </li>
            <li
                class="{{ setActive(['admin.languages.*', 'admin.professions.*', 'admin.commune-wards.*', 'admin.employment-levels.*', 'admin.desired-salaries.*', 'admin.soft-skills.*', 'admin.experiences.*', 'admin.academic-levels.*']) }}">
                <a href="javascript:void(0);" class="menu-toggle d-flex align-items-center">
                    <i class="zmdi zmdi-library"></i>
                    <span class="font-bold">QL TT Ứng Viên</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ setSubActive(['admin.academic-levels.*']) }}"> <a
                            href="{{ route('admin.academic-levels.index') }}">Trình độ học vấn</a></li>
                    <li class="{{ setSubActive(['admin.languages.*']) }}"> <a
                            href="{{ route('admin.languages.index') }}">Ngoại ngữ thành thạo</a></li>
                    <li class="{{ setSubActive(['admin.professions.*']) }}"> <a
                            href="{{ route('admin.professions.index') }}">Lĩnh vực nghề nghiệp</a></li>
                    <li class="{{ setSubActive(['admin.employment-levels.*']) }}"> <a
                            href="{{ route('admin.employment-levels.index') }}">Cấp bậc việc làm</a></li>
                    <li class="{{ setSubActive(['admin.desired-salaries.*']) }}"> <a
                            href="{{ route('admin.desired-salaries.index') }}">Mức lương mong muốn</a></li>
                    <li class="{{ setSubActive(['admin.soft-skills.*']) }}"> <a
                            href="{{ route('admin.soft-skills.index') }}">Kỹ năng mềm</a></li>
                    <li class="{{ setSubActive(['admin.experiences.*']) }}"> <a
                            href="{{ route('admin.experiences.index') }}">Kinh nghiệm làm việc</a></li>
                </ul>
            </li>
            <li class="{{ setActive(['admin.plans.*']) }}"> <a href="{{ route('admin.plans.index') }}"
                    class="d-flex align-items-center"><i class="zmdi zmdi-view-carousel"></i><span class="font-bold">QL
                        Gói Dịch Vụ</span> </a>
            <li class="{{ setActive(['admin.orders.*']) }}"> <a href="{{ route('admin.orders.index') }}"
                    class="d-flex align-items-center"><i class="zmdi zmdi-collection-text"></i><span
                        class="font-bold">QL
                        Đơn Hàng</span> </a>
            </li>
            <li
                class="{{ setActive(['admin.job-categories.*', 'admin.academic-levels-list.*', 'admin.employment-levels-list.*', 'admin.experiences-list.*', 'admin.soft-skills-list.*', 'admin.languages-list.*', 'admin.salary-structures.*', 'admin.work-modes.*']) }}">
                <a href="javascript:void(0);" class="menu-toggle d-flex align-items-center">
                    <i class="zmdi zmdi-assignment"></i>
                    <span class="font-bold">QL TT Tuyến Dụng</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ setSubActive(['admin.job-categories.*']) }}"> <a
                            href="{{ route('admin.job-categories.index') }}">Danh mục tuyến dụng</a></li>
                    <li class="{{ setSubActive(['admin.academic-levels-list.*']) }}"> <a
                            href="{{ route('admin.academic-levels-list.index') }}">Trình độ học vấn</a></li>
                    <li class="{{ setSubActive(['admin.employment-levels-list.*']) }}"> <a
                            href="{{ route('admin.employment-levels-list.index') }}">Cấp bậc việc làm</a></li>
                    <li class="{{ setSubActive(['admin.experiences-list.*']) }}"> <a
                            href="{{ route('admin.experiences-list.index') }}">Kinh nghiệm làm việc</a></li>
                    <li class="{{ setSubActive(['admin.soft-skills-list.*']) }}"> <a
                            href="{{ route('admin.soft-skills-list.index') }}">Kỹ năng mềm</a></li>
                    <li class="{{ setSubActive(['admin.languages-list.*']) }}"> <a
                            href="{{ route('admin.languages-list.index') }}">Ngoại ngữ thành thạo</a></li>
                    <li class="{{ setSubActive(['admin.salary-structures.*']) }}"> <a
                            href="{{ route('admin.salary-structures.index') }}">Hình thức trả lương</a></li>
                    <li class="{{ setSubActive(['admin.work-modes.*']) }}"> <a
                            href="{{ route('admin.work-modes.index') }}">Hình thức làm việc</a></li>
                </ul>
            </li>
            <li class="{{ setActive(['admin.blogs.*']) }}"> <a href="{{ route('admin.blogs.index') }}"
                    class="d-flex align-items-center"><i class="zmdi zmdi-collection-plus"></i><span
                        class="font-bold">QL
                        Tin Tức</span> </a>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
