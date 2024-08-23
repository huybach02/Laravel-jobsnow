@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Quản Lý Tin Tuyển Dụng</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Quản lý tin tuyển dụng</li>
                            <li>Chỉnh sửa tin tuyến dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row mb-120">

                @include('frontend.company-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-120">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Chỉnh sửa tin tuyển dụng</h3>

                        <a href="{{ route('company.jobs.index') }}" class="btn btn-secondary mt-20">
                            <i class="fas fa-caret-left"></i> Quay lại</a>

                        <div class="mt-40">
                            <form id="jobForm" action="{{ route('company.jobs.update', $job->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Tiêu đề tin tuyển dụng
                                            *</label>
                                        <input class="form-control" type="text" value="{{ old('title', $job->title) }}"
                                            name="title">
                                        @if ($errors->has('title'))
                                            <small class="text-danger">{{ $errors->first('title') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Công ty/doanh nghiệp
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ auth()->user()->company->name }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Danh mục tuyển dụng
                                            *</label>
                                        <select class="form-control select-multiple-1" id="multiple" multiple
                                            name="job_category[]">
                                            @foreach ($jobCategories as $jobCategory)
                                                <option
                                                    {{ in_array($jobCategory?->id, old('job_category', explode(',', $job->job_category)) ?? []) ? 'selected' : '' }}
                                                    value="{{ $jobCategory?->id }}">
                                                    {{ $jobCategory?->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('job_category'))
                                            <small class="text-danger">{{ $errors->first('job_category') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Cấp bậc việc làm cần tuyển
                                            dụng
                                            *</label>
                                        <select class="form-select select-active" name="employment_level">
                                            <option value="">-- Chọn cấp bậc mong muốn --</option>

                                            @foreach ($employmentLevels as $employmentLevel)
                                                <option
                                                    {{ old('employment_level', $job->employment_level) == $employmentLevel->slug ? 'selected' : '' }}
                                                    value="{{ $employmentLevel->slug }}">
                                                    {{ $employmentLevel->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('employment_level'))
                                            <small class="text-danger">{{ $errors->first('employment_level') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Hình thức trả lương
                                            *</label>
                                        <select class="form-select select-active" name="salary_structure">
                                            <option value="">-- Chọn hình thức trả lương mong muốn --</option>

                                            @foreach ($salaryStructures as $salaryStructure)
                                                <option
                                                    {{ old('salary_structure', $job->salary_structure) == $salaryStructure->name ? 'selected' : '' }}
                                                    value="{{ $salaryStructure->name }}">
                                                    {{ $salaryStructure->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('salary_structure'))
                                            <small class="text-danger">{{ $errors->first('salary_structure') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Mức lương tối thiểu
                                                (VNĐ)
                                                *</label>
                                            <input class="form-control" type="number"
                                                value="{{ old('salary_min', $job->salary_min) }}" name="salary_min">
                                            @if ($errors->has('salary_min'))
                                                <small class="text-danger">{{ $errors->first('salary_min') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Mức lương tối đa (VNĐ)
                                                *</label>
                                            <input class="form-control" type="number"
                                                value="{{ old('salary_max', $job->salary_max) }}" name="salary_max">
                                            @if ($errors->has('salary_max'))
                                                <small class="text-danger">{{ $errors->first('salary_max') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Thời gian hết hạn tuyển
                                            dụng
                                            *</label>
                                        <input class="form-control" type="date"
                                            value="{{ old('deadline', $job->deadline) }}" name="deadline">
                                        @if ($errors->has('deadline'))
                                            <small class="text-danger">{{ $errors->first('deadline') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Kinh nghiệm làm việc mong
                                            muốn
                                            *</label>
                                        <select class="form-select select-active" name="experience">
                                            <option value="">-- Chọn kinh nghiệm làm việc mong muốn --</option>

                                            @foreach ($experiences as $experience)
                                                <option
                                                    {{ old('experience', $job->experience) == $experience->slug ? 'selected' : '' }}
                                                    value="{{ $experience->slug }}">
                                                    {{ $experience->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('experience'))
                                            <small class="text-danger">{{ $errors->first('experience') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Trình độ học vấn mong muốn
                                            *</label>
                                        <select class="form-select select-active" name="academic_level">
                                            <option value="">-- Chọn trình độ học vấn mong muốn --</option>

                                            @foreach ($academicLevels as $academicLevel)
                                                <option
                                                    {{ old('academic_level', $job->academic_level) == $academicLevel->slug ? 'selected' : '' }}
                                                    value="{{ $academicLevel->slug }}">
                                                    {{ $academicLevel->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('academic_level'))
                                            <small class="text-danger">{{ $errors->first('academic_level') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Giới tính
                                            *</label>
                                        <select class="form-select select-active" name="gender">
                                            <option value="">-- Chọn giới tính mong muốn --</option>
                                            <option {{ old('gender', $job->gender) == 'Nam' ? 'selected' : '' }}
                                                value="Nam">Nam
                                            </option>
                                            <option {{ old('gender', $job->gender) == 'Nữ' ? 'selected' : '' }}
                                                value="Nữ">Nữ
                                            </option>
                                            <option {{ old('gender', $job->gender) == 'Nam và nữ' ? 'selected' : '' }}
                                                value="Nam và nữ">Nam và nữ</option>
                                            <option {{ old('gender') == 'Khác' ? 'selected' : '' }} value="Khác">Khác
                                            </option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <small class="text-danger">{{ $errors->first('gender') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Số lượng cần tuyển
                                            *</label>
                                        <input class="form-control" type="number"
                                            value="{{ old('quantity', $job->quantity) }}" name="quantity">
                                        @if ($errors->has('quantity'))
                                            <small class="text-danger">{{ $errors->first('quantity') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Hình thức làm việc
                                            *</label>
                                        <select class="form-select select-active" name="work_mode">
                                            <option value="">-- Chọn hình thức làm việc mong muốn --</option>

                                            @foreach ($workModes as $workMode)
                                                <option
                                                    {{ old('work_mode', $job->work_mode) == $workMode->slug ? 'selected' : '' }}
                                                    value="{{ $workMode->slug }}">
                                                    {{ $workMode->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('work_mode'))
                                            <small class="text-danger">{{ $errors->first('work_mode') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Tỉnh/Thành phố
                                                *</label>
                                            <select class="form-select select-active province" name="province">
                                                <option value="">-- Chọn tỉnh/thành phố --</option>

                                                @foreach ($provinces as $province)
                                                    <option
                                                        {{ old('province', $job->province) == $province?->code ? 'selected' : '' }}
                                                        value="{{ $province?->code }}">{{ $province?->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('province'))
                                                <small class="text-danger">{{ $errors->first('province') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Quận/Huyện
                                                *</label>
                                            <select class="form-select select-active district" name="district">
                                                <option value="">-- Chọn quận/huyện --</option>

                                                @foreach ($districts as $district)
                                                    <option
                                                        {{ old('district', $job?->district) == $district?->code ? 'selected' : '' }}
                                                        value="{{ $district?->code }}">{{ $district?->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('district'))
                                                <small class="text-danger">{{ $errors->first('district') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Xã/Phường
                                                *</label>
                                            <select class="form-select select-active ward" name="ward">
                                                <option value="">-- Chọn xã/phường --</option>

                                                @foreach ($wards as $ward)
                                                    <option
                                                        {{ old('ward', $job?->ward) == $ward?->code ? 'selected' : '' }}
                                                        value="{{ $ward?->code }}">{{ $ward?->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('ward'))
                                                <small class="text-danger">{{ $errors->first('ward') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Địa chỉ làm việc cụ thể
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('address', $job->address) }}" name="address">
                                        @if ($errors->has('address'))
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Mô tả về công việc
                                            *</label>
                                        <textarea name="description" class="w-100 editor">{{ old('description', $job->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100 d-flex flex-column">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Yêu cầu của công việc
                                            *</label>
                                        <input id="tags-input" class="form-control col-12 py-3" name="requirement"
                                            type="text" value="{{ old('requirement', $job->requirement) ?? '' }}"
                                            data-role="tagsinput" placeholder="Nhập thêm yêu cầu...">
                                        @if ($errors->has('requirement'))
                                            <small class="text-danger">{{ $errors->first('requirement') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100 d-flex flex-column">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Yêu cầu kiến thức chuyên
                                            môn
                                            *</label>
                                        <input class="form-control col-12 py-3" name="advanced_skills" type="text"
                                            value="{{ old('advanced_skills', $job->advanced_skills) ?? '' }}"
                                            data-role="tagsinput" placeholder="Nhập thêm yêu cầu...">
                                        @if ($errors->has('advanced_skills'))
                                            <small class="text-danger">{{ $errors->first('advanced_skills') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Yêu cầu kỹ năng mềm
                                            *</label>
                                        <select class="form-control select-multiple-2" id="multiple" multiple
                                            name="soft_skills[]">
                                            @foreach ($softSkills as $softSkill)
                                                <option
                                                    {{ in_array($softSkill?->name, old('soft_skills', explode(',', $job?->soft_skills)) ?? []) ? 'selected' : '' }}
                                                    value="{{ $softSkill?->name }}">
                                                    {{ $softSkill?->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('soft_skills'))
                                            <small class="text-danger">{{ $errors->first('soft_skills') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Yêu cầu kỹ năng ngoại ngữ
                                            *</label>
                                        <select class="form-control select-multiple-3" id="multiple" multiple
                                            name="foreign_languages[]">
                                            <option
                                                {{ old('foreign_languages') == 'Không yêu cầu ngoại ngữ' || old('foreign_languages', $job->foreign_languages) == 'Không yêu cầu ngoại ngữ' ? 'selected' : '' }}
                                                value="Không yêu cầu ngoại ngữ">Không yêu cầu ngoại ngữ</option>
                                            @foreach ($languages as $language)
                                                <option
                                                    {{ in_array($language?->name, old('foreign_languages', explode(',', $job?->foreign_languages)) ?? []) ? 'selected' : '' }}
                                                    value="{{ $language?->id }}">
                                                    {{ $language?->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('foreign_languages'))
                                            <small class="text-danger">{{ $errors->first('foreign_languages') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100 d-flex flex-column">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Quyền lợi của công việc
                                            *</label>
                                        <input class="form-control col-12 py-3" name="benefits" type="text"
                                            value="{{ old('benefits', $job->benefits) ?? 'Chế độ bảo hiểm,Nghỉ phép năm,Đồng phục,Tăng lương,Chế độ thưởng' }}"
                                            data-role="tagsinput" placeholder="Nhập thêm kỹ năng của bạn...">
                                        @if ($errors->has('benefits'))
                                            <small class="text-danger">{{ $errors->first('benefits') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100 d-flex flex-column">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Yêu cầu hồ sơ
                                            *</label>
                                        <input class="form-control col-12 py-3" name="request_to_apply" type="text"
                                            value="{{ old('request_to_apply', $job->request_to_apply) ?? '' }}"
                                            data-role="tagsinput" placeholder="Nhập thêm yêu cầu...">
                                        @if ($errors->has('request_to_apply'))
                                            <small class="text-danger">{{ $errors->first('request_to_apply') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Người liên hệ
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('contact_person', $job->contact_person) }}"
                                            name="contact_person">
                                        @if ($errors->has('contact_person'))
                                            <small class="text-danger">{{ $errors->first('contact_person') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Email liên hệ
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('contact_email', $job->contact_email) }}" name="contact_email">
                                        @if ($errors->has('contact_email'))
                                            <small class="text-danger">{{ $errors->first('contact_email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Số điện thoại liên hệ
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('contact_phone', $job->contact_phone) }}" name="contact_phone">
                                        @if ($errors->has('contact_phone'))
                                            <small class="text-danger">{{ $errors->first('contact_phone') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <div class="box-button mt-40">
                                <button id="submitButton" class="btn btn-apply-big font-md font-bold">Lưu thay
                                    đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        new SlimSelect({
            select: '.select-multiple-1',
            settings: {
                placeholderText: '-- Chọn một hoặc nhiều danh mục tuyển dụng --',
            }
        })
        new SlimSelect({
            select: '.select-multiple-2',
            settings: {
                placeholderText: '-- Chọn những kỹ năng mềm mà công việc yêu cầu --',
            }
        })
        new SlimSelect({
            select: '.select-multiple-3',
            settings: {
                placeholderText: '-- Chọn những kỹ năng ngoại ngữ mà công việc yêu cầu --',
            }
        })

        $(document).ready(function() {
            $('#submitButton').click(function() {
                $('#jobForm').submit();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tags-input').tagsinput({
                delimiter: [] // Xóa bỏ các ký tự phân tách mặc định
            });

            $('#tags-input').on('keypress', function(event) {
                if (event.which === 44) { // Phím phẩy
                    event.preventDefault(); // Ngăn chặn phân tách bằng phím phẩy
                }
            });

            $('#tags-input').on('keydown', function(event) {
                if (event.which === 13) { // Phím Enter
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của phím Enter
                    var value = $(this).val().trim();
                    if (value) {
                        $(this).tagsinput('add', value);
                        $(this).val('');
                    }
                }
            });
        });
    </script>
@endpush
