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
                            <li>Danh sách ứng viên</li>
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
                        <div class="">
                            <h3 class="mt-0 mb-0 color-brand-1 mb-20">Danh sách ứng viên</h3>

                            <a href="{{ route('company.jobs.index') }}" class="btn btn-secondary mb-20">
                                <i class="fas fa-caret-left"></i> Quay lại</a>

                            <h6>Công việc: {{ $job->title }}</h6>
                        </div>

                        <div class="table-responsive mt-20">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <td class="text-center font-bold">STT</td>
                                        <th>ID</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th style="text-align: start">Số điện thoại</th>
                                        <th style="text-align: start">Ngày ứng tuyển</th>
                                        <th style="text-align: start">Trạng thái</th>
                                        <th style="text-align: start">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications as $key => $application)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $job->id }}</td>
                                            <td>{{ $application->candidate->full_name }}</td>
                                            <td>{{ $application->candidate->email }}</td>
                                            <td style="text-align: start">{{ $application->candidate->phone }}</td>
                                            <td>{{ date('d/m/Y', strtotime($application->created_at)) }}</td>
                                            <td>
                                                <select class="form-select form-select-sm change-status-application"
                                                    name="status"
                                                    data-url="{{ route('company.jobs.applications.change-status') }}"
                                                    data-id=" {{ $application->id }}"
                                                    data-candidateid="{{ $application->candidate_id }}">
                                                    <option @selected($application->status == 'pending') value="pending">Đã ứng tuyển
                                                    </option>
                                                    <option @selected($application->status == 'accepted') value="accepted">Chấp nhận</option>
                                                    <option @selected($application->status == 'deny') value="deny">Từ chối</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-modal"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                    data-url="{{ route('company.jobs.applications.show', ['id' => $application->id, 'candidate_id' => $application->candidate_id]) }}">
                                                    Xem
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-modal').on('click', function() {
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        $('.modal-dialog').html(data);
                    }
                })
            });

            $('.change-status-application').on('change', function() {
                var url = $(this).data('url');
                var id = $(this).data('id');
                var candidate_id = $(this).data('candidateid');

                var status = $(this).val();

                $.ajax({
                    url: url,
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        candidate_id: candidate_id,
                        status: status
                    },
                    success: function(data) {
                        if (data.success) {
                            flasher.success(data.message, "Thành công")
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            });
        })
    </script>
@endpush
