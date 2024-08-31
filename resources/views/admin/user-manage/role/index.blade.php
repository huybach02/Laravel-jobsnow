@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Người Dùng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý người dùng</a></li>
            <li class="breadcrumb-item active">Vai trò</li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách vai trò của người dùng </h2>
                <a href="{{ route('admin.roles.create') }}">
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
                                <th>Tên vai trò</th>
                                <th class="text-center" style="width: 60%">Quyền của vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center" style="width: 60%">

                                        @foreach ($role->permissions as $permission)
                                            <span class="badge badge-primary mb-2 mr-2">{{ $permission->name }}</span>
                                        @endforeach

                                    </td>
                                    <td>
                                        @if ($role->name != 'Quản trị viên hệ thống')
                                            <a href="{{ route('admin.roles.edit', $role->id) }}">
                                                <button type="button" class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                                        class="zmdi zmdi-edit"></i></button>
                                            </a>

                                            <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                                class="btn btn-raised bg-red waves-effect btn-xs delete-btn"
                                                data-type="confirm"><i class="zmdi zmdi-delete"></i></a>
                                        @endif
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
