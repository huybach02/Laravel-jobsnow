@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Công việc đã lưu</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Trang chủ</a></li>
                            <li>Công việc đã lưu</li>
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
                        <h3 class="mt-0 mb-0 color-brand-1">Công việc đã lưu</h3>

                        <div class="table-responsive mt-30">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <td class="text-center font-bold">STT</td>
                                        <th>ID</th>
                                        <th>Tên công việc</th>
                                        <th>Công ty/doanh nghiệp</th>
                                        <th>Thời gian hết hạn</th>
                                        <th style="text-align: start">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookmarks as $key => $bookmark)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $bookmark->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('jobs.show', $bookmark->job->slug) }}">{{ strlen($bookmark->job->title) > 100 ? substr($bookmark->job->title, 0, 100) . '...' : $bookmark->job->title }}</a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ asset($bookmark->job->company->logo) }}" alt=""
                                                        width="40px">
                                                    <a
                                                        href="{{ route('company-info.show', $bookmark->job->company->slug) }}">
                                                        {{ $bookmark->job->company->name }}</a>
                                                </div>
                                            </td>
                                            <td>{{ date('d/m/Y', strtotime($bookmark->job->deadline)) }}</td>
                                            <td>
                                                <a href="{{ route('jobs.show', $bookmark->job->slug) }}">
                                                    <button type="button" class="btn btn-primary btn-modal">
                                                        Xem
                                                    </button>
                                                </a>
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
