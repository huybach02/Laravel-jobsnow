@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Tin Tuyển Dụng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý tin tuyển dụng</a></li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách tin tuyển dụng </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <td class="text-center font-bold">STT</td>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục tuyển dụng</th>
                                <th style="text-align: start">Thời gian hết hạn</th>
                                <th style="text-align: start">Lượt xem</th>
                                <th style="text-align: start">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $key => $job)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $job->id }}</td>
                                    <td>
                                        <a href="{{ route('jobs.show', $job->slug) }}"
                                            target="_blank">{{ strlen($job->title) > 150 ? substr($job->title, 0, 150) . '...' : $job->title }}</a>
                                    </td>
                                    <td>{{ implode(', ', $job->getJobCategoryNames()) }}</td>
                                    <td style="text-align: start">
                                        {{ date('d/m/Y', strtotime($job->deadline)) }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $job->view_count }}
                                    </td>
                                    <td>
                                        <select class="form-control change-blocked" name="is_blocked" id=""
                                            data-id="{{ $job->id }}"
                                            data-url="{{ route('admin.posts.change-status') }}">
                                            <option value="0" @if ($job->is_blocked == 0) selected @endif>Hiển
                                                thị</option>
                                            <option value="1" @if ($job->is_blocked == 1) selected @endif>Bị chặn
                                            </option>

                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
