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
                    <span class="font-bold">QL Thông Tin Ứng Viên</span>
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
                {{-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span
                        class="font-bold">Widgets</span> </a>
                <ul class="ml-menu">
                    <li> <a href="basic.html">Basic</a></li>
                    <li> <a href="more-widgets.html">More Widgets</a></li>
                </ul>
            </li> --}}
                {{-- <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-trending-down"></i><span>Multi
                        Level Menu</span> </a>
                <ul class="ml-menu">
                    <li> <a href="javascript:void(0);"> <span>Menu Item</span> </a> </li>
                    <li> <a href="javascript:void(0);"> <span>Menu Item - 2</span> </a> </li>
                    <li> <a href="javascript:void(0);" class="menu-toggle"> <span>Level - 2</span> </a>
                        <ul class="ml-menu">
                            <li> <a href="javascript:void(0);"> <span>Menu Item</span> </a> </li>
                            <li> <a href="javascript:void(0);" class="menu-toggle"> <span>Level - 3</span> </a>
                                <ul class="ml-menu">
                                    <li> <a href="javascript:void(0);"> <span>Level - 4</span> </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
