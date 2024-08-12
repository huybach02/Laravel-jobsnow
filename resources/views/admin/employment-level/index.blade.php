@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Cấp Bậc Việc Làm</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý thông tin ứng viên</a></li>
            <li class="breadcrumb-item active">Cấp bậc việc làm</li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách cấp bậc việc làm </h2>
                <a href="{{ route('admin.employment-levels.create') }}">
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
                                <th>Tên cấp bậc việc làm</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($levels as $key => $level)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $level->id }}</td>
                                    <td>{{ $level->name }}</td>
                                    <td>{{ $level->slug }}</td>
                                    <td>
                                        @if ($level->status == 1)
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox" checked
                                                        data-id="{{ $level->id }}"
                                                        data-url="{{ route('admin.employment-levels.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox"
                                                        data-id="{{ $level->id }}"
                                                        data-url="{{ route('admin.employment-levels.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.employment-levels.edit', $level->id) }}">
                                            <button type="button" class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                                    class="zmdi zmdi-edit"></i></button>
                                        </a>

                                        <a href="{{ route('admin.employment-levels.destroy', $level->id) }}"
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
