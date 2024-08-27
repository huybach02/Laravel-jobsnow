@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Tin Tức</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý tin tức</a></li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách tin tức </h2>
                <a href="{{ route('admin.blogs.create') }}">
                    <button type="button" class="btn btn-raised bg-light-blue waves-effect"><i class="zmdi zmdi-plus"></i>
                        Thêm mới</button>
                </a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <td class="text-center font-bold">STT</td>
                                <th>ID</th>
                                <th style="text-align: start">Ảnh đại diện</th>
                                <th>Tên tin tức</th>
                                <th>Slug</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $blog->id }}</td>
                                    <td style="text-align: start"><img src=" {{ asset($blog->image) }}" width="100px"></td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td>{{ date('d/m/Y', strtotime($blog->created_at)) }}</td>
                                    <td>
                                        @if ($blog->status == 1)
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox" checked
                                                        data-id="{{ $blog->id }}"
                                                        data-url="{{ route('admin.blogs.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox"
                                                        data-id="{{ $blog->id }}"
                                                        data-url="{{ route('admin.blogs.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}">
                                            <button type="button" class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                                    class="zmdi zmdi-edit"></i></button>
                                        </a>

                                        <a href="{{ route('admin.blogs.destroy', $blog->id) }}"
                                            class="btn btn-raised bg-red waves-effect btn-xs delete-btn"
                                            data-type="confirm"><i class="zmdi zmdi-delete"></i></a>
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
