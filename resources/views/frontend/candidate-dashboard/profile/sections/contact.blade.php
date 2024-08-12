<div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'contact' ? 'show active' : '') : '' }}"
    id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <form action="{{ route('candidate.profile.update-contact') }}" method="POST">
        @csrf

        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Email liên hệ tuyển dụng
                    *</label>
                <input class="form-control" type="text"
                    value="{{ old('email', $candidate?->email ?? auth()->user()->email) }}" name="email">
                @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Số điện thoại liên
                    hệ*</label>
                <input class="form-control" type="text" value="{{ old('phone', $candidate?->phone) }}"
                    name="phone">
                @if ($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Đường dẫn Facebook (Nếu
                    có)</label>
                <input class="form-control" type="text" value="{{ old('fb_link', $candidate?->fb_link) }}"
                    name="fb_link">
                @if ($errors->has('fb_link'))
                    <small class="text-danger">{{ $errors->first('fb_link') }}</small>
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
                            <option {{ old('province', $candidate?->province) == $province?->code ? 'selected' : '' }}
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
                            <option {{ old('district', $candidate?->district) == $district?->code ? 'selected' : '' }}
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
                            <option {{ old('ward', $candidate?->ward) == $ward?->code ? 'selected' : '' }}
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
                <label class="font-sm color-text-mutted font-bold mb-10">Địa chỉ cụ thể *</label>
                <input class="form-control" type="text" value="{{ old('address', $candidate?->address) }}"
                    name="address">
                @if ($errors->has('address'))
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label class="font-sm color-text-mutted font-bold mb-10">Nơi làm việc mong muốn</label>
                <select class="form-control select-multiple-1" id="multiple" multiple name="workplace_desired[]">
                    @foreach ($provinces as $province)
                        <option
                            {{ strstr(old('workplace_desired', $candidate?->workplace_desired), $province?->name) ? 'selected' : '' }}
                            value="{{ $province?->name }}">
                            {{ $province?->name }}
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('workplace_desired'))
                    <small class="text-danger">{{ $errors->first('workplace_desired') }}</small>
                @endif
            </div>
        </div>

        <div class="box-button mt-30 mb-50">
            <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
        </div>
    </form>
    {{-- <input id="tags-multiple" name='input-custom-dropdown' class='tagify--custom-dropdown'
        placeholder='Type an English letter' value='css, html, javascript'> --}}
</div>

@push('scripts')
    <script>
        new SlimSelect({
            select: '.select-multiple-1',
            settings: {
                placeholderText: '-- Chọn những nơi làm việc bạn mong muốn --',
            }
        })
    </script>
@endpush
