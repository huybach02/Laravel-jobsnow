<div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'other' ? 'show active' : '') : '' }}"
    id="other" role="tabpanel" aria-labelledby="profile-tab">
    <form id="otherForm" action="{{ route('candidate.profile.update-other') }}" method="POST">
        @csrf

        <div class="col-12">
            <div class="form-group select-style">
                <label class="font-sm color-text-mutted font-bold mb-10">Trình độ học vấn
                    *</label>
                <select class="form-select select-active" name="academic_level_id">
                    <option value="">-- Chọn trình độ học vấn --</option>

                    @foreach ($academicLevels as $academicLevel)
                        <option value="{{ $academicLevel->id }}"
                            {{ old('academic_level_id', $candidate?->academic_level_id) == $academicLevel->id ? 'selected' : '' }}>
                            {{ $academicLevel->name }}
                        </option>
                    @endforeach

                </select>
                @if ($errors->has('academic_level_id'))
                    <small class="text-danger">{{ $errors->first('academic_level_id') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Kỹ năng mềm *</label>
                <select class="form-control select-multiple-2" id="multiple" multiple name="soft_skills[]">
                    @foreach ($softSkills as $softSkill)
                        <option
                            {{ in_array($softSkill?->name, old('soft_skills', explode(',', $candidate?->soft_skills)) ?? []) ? 'selected' : '' }}
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
                <label class="font-sm color-text-mutted font-bold mb-10">Ngoại ngữ thành thạo *</label>
                <select class="form-control select-multiple-3" id="multiple" multiple name="foreign_languages[]">
                    @foreach ($languages as $language)
                        <option
                            {{ in_array($language?->name, old('foreign_languages', explode(',', $candidate?->foreign_languages)) ?? []) ? 'selected' : '' }}
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
                <label class="font-sm color-text-mutted font-bold mb-10">Kỹ năng chuyên môn
                    *</label>
                <input class="form-control col-12 py-3" name="advanced_skills" type="text"
                    value="{{ old('advanced_skills', $candidate?->advanced_skills) ?? '' }}" data-role="tagsinput"
                    placeholder="Nhập thêm kỹ năng của bạn...">
                @if ($errors->has('advanced_skills'))
                    <small class="text-danger">{{ $errors->first('advanced_skills') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group w-100 d-flex flex-column">
                <label class="font-sm color-text-mutted font-bold mb-10">Kỹ năng về tin học
                    *</label>
                <input class="form-control col-12 py-3" name="computer_skills" type="text"
                    value="{{ old('computer_skills', $candidate?->computer_skills) ?? 'Microsoft Office,Microsoft Word,Microsoft Excel,Microsoft Powerpoint' }}"
                    data-role="tagsinput" placeholder="Nhập thêm kỹ năng của bạn...">
                @if ($errors->has('computer_skills'))
                    <small class="text-danger">{{ $errors->first('computer_skills') }}</small>
                @endif
            </div>
        </div>
    </form>
    <div class="box-button mt-30 mb-50">
        <button id="otherButton" class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
    </div>

</div>

@push('scripts')
    <script>
        new SlimSelect({
            select: '.select-multiple-2',
            settings: {
                placeholderText: '-- Chọn những kỹ năng mềm của bản thân --',
            }
        })
        new SlimSelect({
            select: '.select-multiple-3',
            settings: {
                placeholderText: '-- Chọn những ngoại ngữ thành thạo của bản thân --',
            }
        })

        $(document).ready(function() {
            $('#otherButton').click(function() {
                $('#otherForm').submit();
            });
        });
    </script>
@endpush
