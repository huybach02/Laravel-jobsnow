@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Quận/Huyện</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý địa điểm</a></li>
            <li class="breadcrumb-item active">Quận/Huyện</li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách quận/huyện </h2>
                {{-- <a href="{{ route('admin.organization-types.create') }}">
                    <button type="button" class="btn btn-raised bg-light-blue waves-effect"><i class="zmdi zmdi-plus"></i>
                        Thêm mới</button>
                </a> --}}
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <td class="text-center font-bold">Mã số</td>
                                <th>ID</th>
                                <th>Tên quận/huyện</th>
                                <th>Thuộc tỉnh/thành phố</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                {{-- <th>Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $key => $district)
                                <tr>
                                    <td class="text-center">{{ $district->code }}</td>
                                    <td>{{ $district->code }}</td>
                                    <td>{{ $district->name }}</td>
                                    <td>
                                        {{ $district->province->name }}
                                    </td>
                                    <td>{{ $district->code_name }}</td>
                                    <td>
                                        @if ($district->status == 1)
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox" checked
                                                        data-id="{{ $district->code }}"
                                                        data-url="{{ route('admin.districts.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox"
                                                        data-id="{{ $district->code }}"
                                                        data-url="{{ route('admin.districts.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('admin.districts.edit', $district->code) }}">
                                            <button type="button" class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                                    class="zmdi zmdi-edit"></i></button>
                                        </a>

                                        <a href="{{ route('admin.districts.destroy', $district->code) }}"
                                            class="btn btn-raised bg-red waves-effect btn-xs delete-btn"
                                            data-type="confirm"><i class="zmdi zmdi-delete"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
