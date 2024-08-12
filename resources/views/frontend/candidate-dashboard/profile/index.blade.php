@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thông Tin Người Ứng Tuyển</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Home</a></li>
                            <li>Thông tin người ứng tuyển</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <h3 class="mt-0 mb-15 color-brand-1">Thông tin người ứng tuyển</h3>
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
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'other' ? 'active' : '') : '' }}"
                                data-id="other" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button"
                                role="tab" aria-controls="other" aria-selected="false">Trình độ học vấn, kỹ năng bản
                                thân</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'education-work' ? 'active' : '') : '' }}"
                                data-id="education-work" id="education-work-tab" data-bs-toggle="tab"
                                data-bs-target="#education-work" type="button" role="tab"
                                aria-controls="education-work" aria-selected="false">Học vấn/bằng cấp
                                và quá trình làm việc</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link tab-btn {{ session()->has('type_tab') ? (session()->get('type_tab') == 'setting' ? 'active' : '') : '' }}"
                                data-id="setting" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Cài đặt tài
                                khoản</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-30 mb-120" id="myTabContent">

                        @include('frontend.candidate-dashboard.profile.sections.info')

                        @include('frontend.candidate-dashboard.profile.sections.contact')

                        @include('frontend.candidate-dashboard.profile.sections.other')

                        @include('frontend.candidate-dashboard.profile.sections.education-work')

                        @include('frontend.candidate-dashboard.profile.sections.setting')
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
                    url: "{{ route('candidate.change-type-tab') }}",
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

    <script>
        $(document).ready(function() {
            $(".province").on("change", function() {
                let province_code = $(this).val();

                $(".district").html('<option value="">-- Chọn quận/huyện --</option>');
                $(".ward").html('<option value="">-- Chọn xã/phường --</option>');

                let html = ""

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-districts', ':province_code') }}".replace(':province_code',
                        province_code),
                    success: function(data) {

                        data.forEach(element => {
                            html +=
                                `<option value="${element.code}">${element.name}</option>`
                        });

                        $(".district").append(html);
                    }
                })
            })

            $(".district").on("change", function() {
                let district_code = $(this).val();

                $(".ward").html('<option value="">-- Chọn xã/phường --</option>');

                let html = ""

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-wards', ':district_code') }}".replace(':district_code',
                        district_code),
                    success: function(data) {

                        data.forEach(element => {
                            html +=
                                `<option value="${element.code}">${element.name}</option>`
                        });

                        $(".ward").append(html);
                    }
                })
            })

        })
    </script>
@endpush
