@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.company-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    {{-- <div class="content-single">
                        <h3 class="mt-0 mb-15 color-brand-1">My Account</h3><a class="font-md color-text-paragraph-2"
                            href="#">Update your profile</a>
                        <div class="mt-35 mb-40 box-info-profie">
                            <div class="image-profile"><img src="assets/imgs/page/candidates/candidate-profile.png"
                                    alt="joblist">
                            </div><a class="btn btn-apply">Upload Avatar</a><a class="btn btn-link">Delete</a>
                        </div>
                        <div class="row form-contact">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                                    <input class="form-control" type="text" value="Steven Job">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Email *</label>
                                    <input class="form-control" type="text" value="stevenjob@gmail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Contact number</label>
                                    <input class="form-control" type="text" value="01 - 234 567 89">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Personal website</label>
                                    <input class="form-control" type="url" value="https://alithemes.com">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Bio</label>
                                    <textarea class="form-control" rows="4">We are AliThemes , a creative and dedicated group of individuals who love web development almost as much as we love our customers. We are passionate team with the mission for achieving the perfection in web design.</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Country</label>
                                        <input class="form-control" type="text" value="United States">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">State</label>
                                        <input class="form-control" type="text" value="New York">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">City</label>
                                        <input class="form-control" type="text" value="Mcallen">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Zip code</label>
                                        <input class="form-control" type="text" value="82356">
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-10 pb-10 mb-30"></div>
                            <h6 class="color-orange mb-20">Change your password</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Password</label>
                                        <input class="form-control" type="password" value="123456789">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Re-Password *</label>
                                        <input class="form-control" type="password" value="123456789">
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom pt-10 pb-10"></div>
                            <div class="box-agree mt-30">
                                <label class="lbl-agree font-xs color-text-paragraph-2">
                                    <input class="lbl-checkbox" type="checkbox" value="1">Available for freelancers
                                </label>
                            </div>
                            <div class="box-button mt-15">
                                <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                            </div>
                        </div>
                    </div> --}}
                    <h3 class="mt-0 mb-15 color-brand-1">Thông tin doanh nghiệp</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'info' ? 'active' : '') : 'active' }}"
                                data-id="info" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                role="tab" aria-controls="home" aria-selected="true">Thông tin
                                chung</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'contact' ? 'active' : '') : '' }}"
                                data-id="contact" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Thông tin liên
                                hệ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'setting' ? 'active' : '') : '' }}"
                                data-id="setting" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Cài đặt tài
                                khoản</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-30" id="myTabContent">
                        <div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'info' ? 'show active' : '') : 'show active' }}"
                            id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{ route('company.profile.update-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <div class=" box-info-profie mt-15">

                                            <div class="form-group mt-10">
                                                <label class="font-sm color-text-mutted font-bold mb-10">Ảnh đại diện của
                                                    doanh nghiệp
                                                    *</label>
                                                <br>
                                                <div class="image-profile mb-20"><img
                                                        src="{{ $company ? asset($company?->logo) : 'https://cdn.viettablet.com/images/news/30/image-1536378713-nokia-9-penta-lens-render-by-benjamin-geskin_1200x800-800-resize.jpg' }}"
                                                        alt="joblist">
                                                </div>
                                                <input class="form-control" type="file" name="logo">
                                                @if ($errors->has('logo'))
                                                    <small class="text-danger">{{ $errors->first('logo') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-35 box-info-profie">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted font-bold mb-10">Banner *</label>
                                                <br>
                                                <div class="mb-20"><img
                                                        src="{{ $company ? asset($company?->banner) : 'https://www.fivebranches.edu/wp-content/uploads/2021/08/default-image.jpg' }}"
                                                        alt="joblist" width="350px" height="150px"
                                                        style="object-fit: cover">
                                                </div>
                                                <input class="form-control" type="file" name="banner">
                                                @if ($errors->has('banner'))
                                                    <small class="text-danger">{{ $errors->first('banner') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Tên doanh nghiệp *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('name', auth()->user()->name) }}" name="name">
                                        @if ($errors->has('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Lĩnh vực hoạt động
                                            *</label>
                                        <select class="form-select select-active" name="industry_type_id">
                                            <option value="">-- Chọn lĩnh vực --</option>
                                            <option value="1"
                                                {{ old('industry_type_id', $company?->industry_type_id) == '1' ? 'selected' : '' }}>
                                                Công nghệ thông tin</option>
                                            <option value="2">Tài chính</option>
                                        </select>
                                        @if ($errors->has('industry_type_id'))
                                            <small class="text-danger">{{ $errors->first('industry_type_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Loại hình tổ chức của
                                            doanh
                                            nghiệp
                                            *</label>
                                        <select class="form-select select-active" name="organization_type_id">
                                            <option value="">-- Chọn loại hình tổ chức --</option>
                                            <option
                                                {{ old('organization_type_id', $company?->organization_type_id) == '1' ? 'selected' : '' }}
                                                value="1">Công ty TNHH</option>
                                            <option
                                                {{ old('organization_type_id', $company?->organization_type_id) == '2' ? 'selected' : '' }}
                                                value="2">Công ty TNHH Một thành viên</option>
                                            <option
                                                {{ old('organization_type_id', $company?->organization_type_id) == '3' ? 'selected' : '' }}
                                                value="3">Công ty cổ phần</option>
                                            <option
                                                {{ old('organization_type_id', $company?->organization_type_id) == '4' ? 'selected' : '' }}
                                                value="4">Công ty hợp danh</option>
                                            <option
                                                {{ old('organization_type_id', $company?->organization_type_id) == '5' ? 'selected' : '' }}
                                                value="5">Doanh nghiệp tư nhân</option>
                                        </select>
                                        @if ($errors->has('organization_type_id'))
                                            <small
                                                class="text-danger">{{ $errors->first('organization_type_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group select-style">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Quy mô của doanh
                                            nghiệp
                                            *</label>
                                        <select class="form-select select-active" name="team_size_id">
                                            <option value="">-- Chọn quy mô doanh nghiệp --</option>
                                            <option
                                                {{ old('team_size_id', $company?->team_size_id) == '1' ? 'selected' : '' }}
                                                value="1">Doanh nghiệp quy mô siêu nhỏ (Không quá 10 nhân sự)
                                            </option>
                                            <option
                                                {{ old('team_size_id', $company?->team_size_id) == '2' ? 'selected' : '' }}
                                                value="2">Doanh nghiệp quy mô nhỏ (Không quá 50 nhân sự)</option>
                                            <option
                                                {{ old('team_size_id', $company?->team_size_id) == '3' ? 'selected' : '' }}
                                                value="3">Doanh nghiệp quy mô vừa (Không quá 100 nhân sự)</option>
                                            <option
                                                {{ old('team_size_id', $company?->team_size_id) == '4' ? 'selected' : '' }}
                                                value="4">Doanh nghiệp quy mô lớn (Trên 100 nhân sự)</option>
                                        </select>
                                        @if ($errors->has('team_size_id'))
                                            <small class="text-danger">{{ $errors->first('team_size_id') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Mã số thuế *</label>
                                            <input class="form-control" type="text"
                                                value="{{ old('tax_code', $company?->tax_code) }}" name="tax_code">
                                            @if ($errors->has('tax_code'))
                                                <small class="text-danger">{{ $errors->first('tax_code') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Ngày thành lập
                                                *</label>
                                            <input class="form-control" type="date"
                                                value="{{ old('established_date', $company?->established_date) }}"
                                                name="established_date">
                                            @if ($errors->has('established_date'))
                                                <small
                                                    class="text-danger">{{ $errors->first('established_date') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Mô tả về doanh nghiệp
                                            *</label>
                                        <textarea name="bio" class="w-100 editor">{{ old('bio', $company?->bio) }}</textarea>
                                        @if ($errors->has('bio'))
                                            <small class="text-danger">{{ $errors->first('bio') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group w-100">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Tầm nhìn của doanh nghiệp
                                            (Tuỳ chọn)</label>
                                        <textarea name="vision" class="w-100 editor">{{ old('vision', $company?->vision) }}</textarea>
                                        @if ($errors->has('vision'))
                                            <small class="text-danger">{{ $errors->first('vision') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'contact' ? 'show active' : '') : '' }}"
                            id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="{{ route('company.profile.update-contact') }}" method="POST">
                                @csrf

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Email liên hệ tuyển dụng
                                            *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('email', $company?->email ?? auth()->user()->email) }}"
                                            name="email">
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Số điện thoại liên
                                            hệ*</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('phone', $company?->phone) }}" name="phone">
                                        @if ($errors->has('phone'))
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Website (Nếu có)</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('website_link', $company?->website_link) }}"
                                            name="website_link">
                                        @if ($errors->has('website_link'))
                                            <small class="text-danger">{{ $errors->first('website_link') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Đường dẫn Facebook (Nếu
                                            có)</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('fb_link', $company?->fb_link) }}" name="fb_link">
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
                                            <select class="form-select select-active" name="province_city">
                                                <option value="">-- Chọn tỉnh/thành phố --</option>
                                                <option
                                                    {{ old('province_city', $company?->province_city) == 'Test Province' ? 'selected' : '' }}
                                                    value="Test Province">Test Province</option>
                                            </select>
                                            @if ($errors->has('province_city'))
                                                <small class="text-danger">{{ $errors->first('province_city') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Quận/Huyện
                                                *</label>
                                            <select class="form-select select-active" name="district">
                                                <option value="">-- Chọn quận/huyện --</option>
                                                <option
                                                    {{ old('district', $company?->district) == 'Test District' ? 'selected' : '' }}
                                                    value="Test District">Test District</option>
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
                                            <select class="form-select select-active" name="commune_ward">
                                                <option value="">-- Chọn xã/phường --</option>
                                                <option
                                                    {{ old('commune_ward', $company?->commune_ward) == 'Test Commune' ? 'selected' : '' }}
                                                    value="Test Commune">Test Commune</option>
                                            </select>
                                            @if ($errors->has('commune_ward'))
                                                <small class="text-danger">{{ $errors->first('commune_ward') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Địa chỉ cụ thể *</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('address', $company?->address) }}" name="address">
                                        @if ($errors->has('address'))
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted font-bold mb-10">Đường dẫn GoogleMap (Nếu
                                            có)</label>
                                        <textarea name="map_link" id="" cols="1" rows="1">{{ old('map_link', $company?->map_link) }}</textarea>
                                        @if ($errors->has('map_link'))
                                            <small class="text-danger">{{ $errors->first('map_link') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'setting' ? 'show active' : '') : '' }}"
                            id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mb-50">
                                <form action="{{ route('company.profile.update-email') }}" method="POST">
                                    @csrf

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Email đăng nhập
                                                *</label>
                                            <input class="form-control" type="email"
                                                value="{{ old('email', auth()->user()->email) }}" name="email">
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
                                <form action="{{ route('company.profile.update-password') }}" method="POST">
                                    @csrf

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Mật khẩu hiện tại
                                                *</label>
                                            <input class="form-control" type="password"
                                                value="{{ old('current_password') }}" name="current_password">
                                            @if ($errors->has('current_password'))
                                                <small
                                                    class="text-danger">{{ $errors->first('current_password') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Mật khẩu mới
                                                *</label>
                                            <input class="form-control" type="password" value="{{ old('password') }}"
                                                name="password">
                                            @if ($errors->has('password'))
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted font-bold mb-10">Xác nhận mật khẩu mới
                                                *</label>
                                            <input class="form-control" type="password"
                                                value="{{ old('password_confirmation') }}" name="password_confirmation">
                                            @if ($errors->has('password_confirmation'))
                                                <small
                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="box-button mt-15">
                                        <button class="btn btn-apply-big font-md font-bold">Lưu thay đổi</button>
                                    </div>
                                </form>
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
        $(document).ready(function() {
            $(".tab-btn").on("click", function() {
                let type = $(this).data("id")

                $.ajax({
                    method: "GET",
                    url: "{{ route('company.change-type-tab') }}",
                    data: {
                        type: type
                    },
                    success: function(data) {

                    }
                })
            })

            $('#sortSelect').on('change', function() {
                window.location.href = this.value;
            });
        })
    </script>
@endpush
