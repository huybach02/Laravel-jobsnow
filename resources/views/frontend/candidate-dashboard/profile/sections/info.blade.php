<div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'info' ? 'show active' : '') : 'show active' }}"
    id="home" role="tabpanel" aria-labelledby="home-tab">
    <form action="{{ route('candidate.profile.update-info') }}" method="POST" enctype="multipart/form-data"
        id="profileForm">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class=" box-info-profie mt-15">

                    <div class="form-group mt-10">
                        <label class="font-sm color-text-mutted font-bold mb-10">Ảnh đại diện của
                            người ứng tuyển
                            *</label>
                        <br>
                        <div class="image-profile mb-20"><img
                                src="{{ @$candidate ? asset($candidate?->image) : 'https://cdn.viettablet.com/images/news/30/image-1536378713-nokia-9-penta-lens-render-by-benjamin-geskin_1200x800-800-resize.jpg' }}"
                                alt="joblist">
                        </div>
                        <input class="form-control" type="file" name="image">
                        @if ($errors->has('image'))
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Họ và tên người ứng tuyển
                    *</label>
                <input class="form-control" type="text" value="{{ old('full_name', auth()->user()->name) }}"
                    name="full_name">
                @if ($errors->has('full_name'))
                    <small class="text-danger">{{ $errors->first('full_name') }}</small>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Ngày sinh
                        *</label>
                    <input class="form-control" type="date" value="{{ old('birthday', $candidate?->birthday) }}"
                        name="birthday">
                    @if ($errors->has('birthday'))
                        <small class="text-danger">{{ $errors->first('birthday') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Giới tính
                        *</label>
                    <select class="form-control" name="gender">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="male" {{ old('gender', $candidate?->gender) == 'male' ? 'selected' : '' }}>Nam
                        </option>
                        <option value="female" {{ old('gender', $candidate?->gender) == 'female' ? 'selected' : '' }}>Nữ
                        </option>
                    </select>
                    @if ($errors->has('gender'))
                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Tình trạng hôn nhân
                        *</label>
                    <select class="form-control" name="marital_status">
                        <option value="">-- Chọn tình trạng hôn nhân --</option>
                        <option value="single"
                            {{ old('marital_status', $candidate?->marital_status) == 'single' ? 'selected' : '' }}>Độc
                            thân
                        </option>
                        <option value="married"
                            {{ old('marital_status', $candidate?->marital_status) == 'married' ? 'selected' : '' }}>Đã
                            kết hôn
                        </option>
                    </select>
                    @if ($errors->has('marital_status'))
                        <small class="text-danger">{{ $errors->first('marital_status') }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted font-bold mb-10">Lĩnh vực nghề nghiệp
                    *</label>
                <select class="form-select select-active" name="profession_id">
                    <option value="">-- Chọn lĩnh vực nghề nghiệp --</option>

                    @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}"
                            {{ old('profession_id', $candidate?->profession_id) == $profession->id ? 'selected' : '' }}>
                            {{ $profession->name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('profession_id'))
                    <small class="text-danger">{{ $errors->first('profession_id') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted font-bold mb-10">Kinh nghiệm làm việc
                    *</label>
                <select class="form-select select-active" name="experience_id">
                    <option value="">-- Chọn kinh nghiệm làm việc --</option>

                    @foreach ($experiences as $experience)
                        <option value="{{ $experience->id }}"
                            {{ old('experience_id', $candidate?->experience_id) == $experience->id ? 'selected' : '' }}>
                            {{ $experience->name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('experience_id'))
                    <small class="text-danger">{{ $errors->first('experience_id') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted font-bold mb-10">Cấp bậc việc làm mong muốn
                    *</label>
                <select class="form-select select-active" name="employment_level_id">
                    <option value="">-- Chọn cấp bậc việc làm mong muốn --</option>

                    @foreach ($employmentLevels as $employmentLevel)
                        <option value="{{ $employmentLevel->id }}"
                            {{ old('employment_level_id', $candidate?->employment_level_id) == $employmentLevel->id ? 'selected' : '' }}>
                            {{ $employmentLevel->name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('employment_level_id'))
                    <small class="text-danger">{{ $errors->first('employment_level_id') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted font-bold mb-10">Mức lương mong muốn
                    *</label>
                <select class="form-select select-active" name="desired_salary_id">
                    <option value="">-- Chọn mức lương mong muốn --</option>

                    @foreach ($desiredSalaries as $desiredSalary)
                        <option value="{{ $desiredSalary->id }}"
                            {{ old('desired_salary_id', $candidate?->desired_salary_id) == $desiredSalary->id ? 'selected' : '' }}>
                            {{ $desiredSalary->name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('desired_salary_id'))
                    <small class="text-danger">{{ $errors->first('desired_salary_id') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group w-100">
                <label class="font-sm color-text-mutted font-bold mb-10">Mô tả về bản thân
                    (Tuỳ chọn)</label>
                <textarea name="bio" class="w-100 editor">{{ old('bio', $candidate?->bio) }}</textarea>
                @if ($errors->has('bio'))
                    <small class="text-danger">{{ $errors->first('bio') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group w-100 d-flex flex-column">
                <label class="font-sm color-text-mutted font-bold mb-10">Mục tiêu nghề nghiệp
                    *</label>
                <input class="form-control col-12 py-3" name="career_goals" type="text"
                    value="{{ old('career_goals', $candidate?->career_goals) ?? 'Công việc ổn định và lâu dài,Nơi làm có cơ hội thăng tiến cao,Môi trường & văn hóa công ty tốt,Có thể học hỏi thêm kinh nghiệm nâng cao trình độ' }}"
                    data-role="tagsinput" placeholder="Nhập thêm mục tiêu của bạn...">
                @if ($errors->has('career_goals'))
                    <small class="text-danger">{{ $errors->first('career_goals') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12 mb-50">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">CV của bạn
                    (Tuỳ chọn, khuyến khích tải lên CV của bạn để nhà tuyển dụng có thể biết nhiều thông tin chi tiết
                    hơn về bạn)</label>
                @if ($candidate?->cv_link)
                    <p class="mb-3 py-2 px-3 bg-success w-50 text-white rounded">Đã tải lên CV của bạn. <a
                            href="{{ asset($candidate?->cv_link) }}" class="text-warning font-bold"
                            target="_blank">Nhấn vào đây để
                            xem CV</a>
                    </p>
                @endif
                <input class="form-control" type="file" value="{{ old('cv_link') }}" name="cv_link">
                @if ($errors->has('cv_link'))
                    <small class="text-danger">{{ $errors->first('cv_link') }}</small>
                @endif
            </div>
        </div>
    </form>
    <div class="box-button mt-15">
        <button type="button" id="submitButton" class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                $('#profileForm').submit();
            });
        });
    </script>
@endpush
