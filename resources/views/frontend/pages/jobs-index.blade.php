@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Danh sách tuyển dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Danh sách tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120 mb-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8"></div>
                                <div class="col-xl-4 col-lg-4 text-lg-end mt-sm-15">
                                    <div class="row mb-20" style="margin-top: -40px">
                                        <div class="col-6">
                                            <span class="d-flex justify-content-start mb-1 font-bold">Hiển thị</span>
                                            <select class="form-select" name="limit" id="">
                                                <option value="10">10 tin</option>
                                                <option value="15">15 tin</option>
                                                <option value="20">20 tin</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <span class="d-flex justify-content-start mb-1 font-bold">Sắp xếp</span>
                                            <select class="form-select" name="sort" id="">
                                                <option value="latest">Mới nhất</option>
                                                <option value="oldest">Cũ nhất</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row display-list">


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30">
                        <div class="sidebar-filters">
                            <div class="filter-block head-border mb-30">
                                <h5>BỘ LỌC NÂNG CAO <a class="link-reset" href="{{ route('jobs.index') }}">Xoá bộ lọc</a>
                                </h5>
                            </div>
                            <form>
                                <div class="filter-block mb-20">
                                    <div class="form-group select-style">
                                        <label for="" class="font-bold">Tìm kiếm</label>
                                        <input type="text" class="form-control" placeholder="Tìm kiếm công việc..."
                                            name="search" value="{{ request('search') ?? '' }}">
                                    </div>
                                </div>
                                <div class="filter-block mb-20">
                                    <div class="form-group select-style">
                                        <label for="" class="font-bold">Tỉnh/Thành phố</label>
                                        <select class="form-control form-icons select-active" name="province">
                                            <option @selected(request('province') == '00') value="00">Tất cả</option>

                                            @foreach ($provinces as $province)
                                                <option @selected(request('province') == $province?->code) value="{{ $province?->code }}">
                                                    {{ $province?->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="filter-block mb-30">
                                    <div class="form-group select-style">
                                        <label for="" class="font-bold">Danh mục nghề nghiệp</label>
                                        <select class="form-control form-icons select-active" name="category">
                                            <option @selected(request('category') == 'all') value="all">Tất cả</option>

                                            @foreach ($jobCategories as $jobCategory)
                                                <option @selected(request('category') == $jobCategory?->id) value="{{ $jobCategory?->id }}">
                                                    {{ $jobCategory?->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                {{-- <button class="submit btn btn-default rounded-1 w-100 mb-30" type="submit">Tìm
                                    kiếm</button> --}}
                            </form>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-10">Cấp bậc/chức vụ</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        {{-- <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input class="filter-checkbox" type="checkbox" value="all"
                                                    checked="checked" name="employment_level" style="margin-top: 10px">
                                                <span class="text-small">Tất cả</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <span class="number-item">{{ count($jobs) }}</span>
                                        </li> --}}

                                        @foreach ($employmentLevels as $employmentLevel)
                                            <li>
                                                <label class="cb-container">
                                                    <input class="filter-checkbox" type="checkbox"
                                                        value="{{ $employmentLevel->slug }}" name="employment_level"><span
                                                        class="text-small">{{ $employmentLevel->name }}</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">{{ $employmentLevel->jobs_count }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="filter-block mb-20">
                                <h5 class="medium-heading mb-25">Mức lương tối thiểu (VNĐ)</h5>
                                {{-- <div class="list-checkbox pb-20">
                                    <div class="row position-relative mt-10 mb-20">
                                        <div class="col-sm-12 box-slider-range">
                                            <div id="slider-range"></div>
                                        </div>
                                        <div class="box-input-money">
                                            <input class="input-disabled form-control min-value-money" type="text"
                                                name="min-value-money" disabled="disabled" value="">
                                            <input class="form-control min-value d-none" type="text" name="min-salary"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="box-number-money">
                                        <div class="row mt-30">
                                            <div class="col-sm-6 col-6"><span class="font-sm color-brand-1">$0</span>
                                            </div>
                                            <div class="col-sm-6 col-6 text-end"><span
                                                    class="font-sm color-brand-1">$500</span></div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="list-checkbox pb-20">
                                    <input id="rangeSlider" type="text">
                                </div>
                            </div>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-20">Hình thức làm việc</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        {{-- <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input class="filter-checkbox" type="checkbox" value="all"
                                                    checked="checked" name="work_mode" style="margin-top: 10px">
                                                <span class="text-small">Tất cả</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <span class="number-item">{{ count($jobs) }}</span>
                                        </li> --}}

                                        @foreach ($workModes as $workMode)
                                            <li>
                                                <label class="cb-container">
                                                    <input class="filter-checkbox" type="checkbox"
                                                        value="{{ $workMode->slug }}" name="work_mode"><span
                                                        class="text-small">{{ $workMode->name }}</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">{{ $workMode->jobs_count }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-20">Kinh nghiệm làm việc</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        {{-- <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input class="filter-checkbox" type="checkbox" value="all"
                                                    checked="checked" name="experience" style="margin-top: 10px">
                                                <span class="text-small">Tất cả</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <span class="number-item">{{ count($jobs) }}</span>
                                        </li> --}}

                                        @foreach ($experiences as $experience)
                                            <li>
                                                <label class="cb-container">
                                                    <input class="filter-checkbox" type="checkbox"
                                                        value="{{ $experience->slug }}" name="experience"><span
                                                        class="text-small">{{ $experience->name }}</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">{{ $experience->jobs_count }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-20">Trình độ học vấn</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        {{-- <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input class="filter-checkbox" type="checkbox" value="all"
                                                    checked="checked" name="academic_level" style="margin-top: 10px">
                                                <span class="text-small">Tất cả</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <span class="number-item">{{ count($jobs) }}</span>
                                        </li> --}}

                                        @foreach ($academicLevels as $academicLevel)
                                            <li>
                                                <label class="cb-container">
                                                    <input class="filter-checkbox" type="checkbox"
                                                        value="{{ $academicLevel->slug }}" name="academic_level"><span
                                                        class="text-small">{{ $academicLevel->name }}</span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">{{ $academicLevel->jobs_count }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-20">Lọc theo thời gian</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input type="checkbox" value="all" name="employmem_level"
                                                    style="margin-top: 10px">
                                                <span class="text-small">24 giờ trước</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input type="checkbox" value="all" name="employmem_level"
                                                    style="margin-top: 10px">
                                                <span class="text-small">7 ngày trước</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input type="checkbox" value="all" name="employmem_level"
                                                    style="margin-top: 10px">
                                                <span class="text-small">14 ngày trước</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="cb-container d-flex align-items-center">
                                                <input type="checkbox" value="all" name="employmem_level"
                                                    style="margin-top: 10px">
                                                <span class="text-small">30 ngày trước</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // Hàm debounce để tránh thực hiện quá nhiều yêu cầu liên tiếp
            function debounce(func, delay) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), delay);
                };
            }

            // Hàm để xây dựng URL với các tham số truy vấn
            function buildQueryString(params) {
                return $.param(params); // Sử dụng jQuery để xây dựng chuỗi truy vấn từ đối tượng
            }

            // Hàm xử lý khi thay đổi các điều kiện lọc
            function handleFilterChange() {
                var employmentLevels = [];
                var workModes = [];
                var experiences = [];
                var academicLevels = [];
                var search = $("input[name='search']").val();
                var province = $("select[name='province']").val();
                var category = $("select[name='category']").val();
                var limit = $("select[name='limit']").val();
                var sort = $("select[name='sort']").val();
                var minValue = $("#rangeSlider").val();

                $('input[name="employment_level"]:checked').each(function() {
                    employmentLevels.push($(this).val());
                });

                $('input[name="work_mode"]:checked').each(function() {
                    workModes.push($(this).val());
                });

                $('input[name="experience"]:checked').each(function() {
                    experiences.push($(this).val());
                });

                $('input[name="academic_level"]:checked').each(function() {
                    academicLevels.push($(this).val());
                });

                // Đặt page thành 1 khi thay đổi filter
                var queryParams = {
                    employment_levels: employmentLevels,
                    work_modes: workModes,
                    experiences: experiences,
                    academic_levels: academicLevels,
                    search: search,
                    province: province,
                    category: category,
                    min_value: minValue,
                    limit: limit,
                    sort: sort,
                    page: 1 // Đặt page thành 1 để quay lại trang đầu
                };

                // Tạo chuỗi truy vấn từ các tham số đã cập nhật
                var queryString = buildQueryString(queryParams);

                // Cập nhật URL trình duyệt với tham số mới
                history.pushState(null, '', '?' + queryString);

                // Thực hiện yêu cầu AJAX với các tham số đã cập nhật
                $.ajax({
                    url: "{{ route('jobs.index') }}",
                    method: 'GET',
                    data: queryParams,
                    beforeSend: function() {
                        showPreloader();
                    },
                    success: function(response) {
                        $('.display-list').html(response);
                        $('html, body').animate({
                            scrollTop: 0
                        }, 200);
                    },
                    error: function(xhr) {
                        console.error("Đã xảy ra lỗi khi lọc công việc");
                    },
                    complete: function() {
                        hidePreloader();
                    }
                });
            }

            // Tạo phiên bản debounce của handleFilterChange
            var debounceHandleFilterChange = debounce(handleFilterChange, 200);

            // Gán sự kiện cho các phần tử lọc và gọi debounceHandleFilterChange
            $('.filter-checkbox, select[name="province"], select[name="category"], #rangeSlider, select[name="limit"], select[name="sort"]')
                .on('change', debounceHandleFilterChange);

            $('input[name="search"]')
                .on('keyup', debounceHandleFilterChange);

            // Xử lý khi tải trang với các tham số truy vấn từ URL
            $(window).on('popstate', function() {
                var params = new URLSearchParams(window.location.search);

                var employmentLevels = params.getAll('employment_levels[]');
                var workModes = params.getAll('work_modes[]');
                var experiences = params.getAll('experiences[]');
                var academicLevels = params.getAll('academic_levels[]');
                var search = params.get('search') || '';
                var province = params.get('province') || '00';
                var category = params.get('category') || 'all';

                $('input[name="search"]').val(search);
                $('select[name="province"]').val(province);
                $('select[name="category"]').val(category);

                // Đánh dấu các checkbox đã chọn
                $('input[name="employment_level"]').each(function() {
                    $(this).prop('checked', employmentLevels.includes($(this).val()));
                });

                $('input[name="work_mode"]').each(function() {
                    $(this).prop('checked', workModes.includes($(this).val()));
                });

                $('input[name="experience"]').each(function() {
                    $(this).prop('checked', experiences.includes($(this).val()));
                });

                $('input[name="academic_level"]').each(function() {
                    $(this).prop('checked', academicLevels.includes($(this).val()));
                });

                // Gọi API với các tham số truy vấn từ URL
                handleFilterChange();
            });

            // Xử lý khi tải trang lần đầu tiên
            if (window.location.search) {
                $(window).trigger('popstate');
            } else {
                $.ajax({
                    url: "{{ route('jobs.index') }}", // URL API của bạn
                    method: 'GET',
                    data: {},
                    beforeSend: function() {
                        showPreloader();
                    },
                    success: function(response) {
                        $('.display-list').html(response);
                    },
                    error: function(xhr) {
                        console.error("Đã xảy ra lỗi khi tải công việc");
                    },
                    complete: function() {
                        hidePreloader();
                    }
                });
            }
        });
    </script>


    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();

            // Lấy số trang từ liên kết được nhấn
            var page = $(this).attr('href').split('page=')[1];

            // Lấy các tham số lọc hiện tại từ URL
            var queryParams = new URLSearchParams(window.location.search);

            // Cập nhật tham số trang
            queryParams.set('page', page);

            // Xây dựng chuỗi truy vấn từ các tham số đã cập nhật
            var queryString = queryParams.toString();

            // Cập nhật URL trình duyệt với tham số trang mới
            history.pushState(null, '', '?' + queryString);

            // Thực hiện yêu cầu AJAX với trang được cập nhật và các bộ lọc hiện tại
            $.ajax({
                url: "{{ route('jobs.index') }}",
                method: 'GET',
                data: queryString,
                beforeSend: function() {
                    showPreloader(); // Hiển thị preloader trong khi chờ phản hồi
                },
                success: function(response) {
                    $('.display-list').html(response); // Thay thế nội dung của danh sách công việc
                    $('html, body').animate({
                        scrollTop: 0 // Cuộn lên đầu trang
                    }, 200);
                },
                error: function(xhr) {
                    console.error("Đã xảy ra lỗi khi tải công việc trang mới."); // Xử lý lỗi nếu có
                },
                complete: function() {
                    hidePreloader(); // Ẩn preloader sau khi hoàn tất yêu cầu
                }
            });
        });
    </script>
@endpush
