<div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'setting' ? 'show active' : '') : '' }}"
    id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="row mb-50">
        <form action="{{ route('candidate.profile.update-email') }}" method="POST">
            @csrf

            <div class="form-check mb-3">
                <input class="form-check-input" name="allow_show" type="checkbox" id="flexCheckDefault"
                    style="padding: 10px; margin-right: 10px"
                    {{ old('allow_show', $candidate?->allow_show) ? 'checked' : '' }}>
                <label class="form-check-label mt-1 font-bold" for="flexCheckDefault">
                    Cho phép nhà tuyển dụng nhìn thấy hồ sơ của bạn
                </label>
                @if ($errors->has('allow_show'))
                    <small class="text-danger">{{ $errors->first('allow_show') }}</small>
                @endif
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Email đăng nhập
                        *</label>
                    <input class="form-control" type="email" value="{{ old('email', auth()->user()->email) }}"
                        name="email">
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
            </div>


            <div class="box-button mt-15">
                <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="row mt-40">
        <form action="{{ route('candidate.profile.update-password') }}" method="POST">
            @csrf

            <div class="col-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Mật khẩu hiện tại
                        *</label>
                    <input class="form-control" type="password" value="{{ old('current_password') }}"
                        name="current_password">
                    @if ($errors->has('current_password'))
                        <small class="text-danger">{{ $errors->first('current_password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Mật khẩu mới
                        *</label>
                    <input class="form-control" type="password" value="{{ old('password') }}" name="password">
                    @if ($errors->has('password'))
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-sm color-text-mutted font-bold mb-10">Xác nhận mật khẩu mới
                        *</label>
                    <input class="form-control" type="password" value="{{ old('password_confirmation') }}"
                        name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
            </div>

            <div class="box-button mt-15">
                <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>
