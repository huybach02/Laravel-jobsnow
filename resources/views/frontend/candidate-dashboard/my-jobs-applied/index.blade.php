@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Công việc đã ứng tuyển</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Trang chủ</a></li>
                            <li>Công việc đã ứng tuyển</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row mb-120">

                @include('frontend.candidate-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-120">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Công việc đã ứng tuyển</h3>

                        <div class="table-responsive mt-30">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <td class="text-center font-bold">STT</td>
                                        <th>ID</th>
                                        <th>Tên công việc</th>
                                        <th>Công ty/doanh nghiệp</th>
                                        <th style="text-align: start">Ngày ứng tuyển</th>
                                        <th style="text-align: start">Trạng thái</th>
                                        <th style="text-align: start">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($myJobs as $key => $myJob)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $myJob->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('jobs.show', $myJob->job->slug) }}">{{ strlen($myJob->job->title) > 100 ? substr($myJob->job->title, 0, 100) . '...' : $myJob->job->title }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ asset($myJob->job->company->logo) }}" alt=""
                                                        width="40px">
                                                    <a href="{{ route('company-info.show', $myJob->job->company->slug) }}">
                                                        {{ $myJob->job->company->name }}</a>
                                                </div>
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($myJob->created_at)) }}</td>
                                            <td>
                                                @switch($myJob->status)
                                                    @case('pending')
                                                        Đã ứng tuyển
                                                    @break

                                                    @case('accepted')
                                                        Chấp nhận ứng tuyển
                                                    @break

                                                    @default
                                                        Từ chối
                                                @endswitch
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-modal"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                    data-url="{{ route('candidate.my-jobs.show', $myJob->id) }}">
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
        })
    </script>
@endpush
