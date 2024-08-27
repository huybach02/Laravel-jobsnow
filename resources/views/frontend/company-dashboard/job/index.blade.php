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
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mt-0 mb-0 color-brand-1">Danh sách tin tuyển dụng</h3>

                            <a href="{{ route('company.jobs.create') }}" class="btn btn-default btn-add-new">+ Tạo
                                mới</a>
                        </div>

                        <div class="table-responsive mt-30">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <td class="text-center font-bold">STT</td>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Danh mục tuyển dụng</th>
                                        <th style="text-align: start">Thời gian hết hạn</th>
                                        <th style="text-align: start">Lượt xem</th>
                                        <th>Nổi bật</th>
                                        <th style="text-align: start">Trạng thái</th>
                                        <th style="text-align: start">Ứng viên</th>
                                        <th style="text-align: start">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $key => $job)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $job->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('jobs.show', $job->slug) }}">{{ strlen($job->title) > 150 ? substr($job->title, 0, 150) . '...' : $job->title }}</a>
                                            </td>
                                            <td>{{ implode(', ', $job->getJobCategoryNames()) }}</td>
                                            <td style="text-align: start">
                                                {{ date('d/m/Y', strtotime($job->deadline)) }}
                                            </td>
                                            <td style="text-align: center">
                                                {{ $job->view_count }}
                                            </td>
                                            <td style="text-align: center">
                                                <label class="switch">
                                                    <input class="change-status" type="checkbox"
                                                        @checked($job->is_featured) data-id="{{ $job->id }}"
                                                        data-url="{{ route('company.jobs.change-featured') }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td style="text-align: start">
                                                <label class="switch">
                                                    <input class="change-status" type="checkbox"
                                                        @checked($job->status) data-id="{{ $job->id }}"
                                                        data-url="{{ route('company.jobs.change-status') }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td style="text-align: center">
                                                <div>
                                                    <i class="fas fa-users" style="font-size: 13px"></i>
                                                    {{ $job->applications_count }}
                                                </div>
                                                <a href="{{ route('company.jobs.applications', $job->id) }}"
                                                    style="color: #15a0df;font-weight: 600; margin-top: 8px">Xem</a>
                                            </td>
                                            <td style="text-align: start">
                                                <a href="{{ route('company.jobs.edit', $job->id) }}"><button type="button"
                                                        class="btn btn-primary btn-sm" style="padding: 6px 8px"><i
                                                            class="fas fa-eye" style="font-size: 12px"></i></button></a>
                                                <a href="{{ route('company.jobs.destroy', $job->id) }}"
                                                    class="delete-btn"><button type="button" class="btn btn-danger btn-sm"
                                                        style="padding: 6px 8px"><i class="fas fa-trash"
                                                            style="font-size: 12px"></i></button></a>
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
@endsection
