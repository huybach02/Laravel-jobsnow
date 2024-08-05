@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Phường/Xã</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý địa điểm</a></li>
            <li class="breadcrumb-item active">Phường/Xã</li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách phường/xã </h2>
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
                                <th>Tên phường xã</th>
                                <th>Thuộc quận/huyện</th>
                                <th>Thuộc tỉnh/thành phố</th>
                                <th>district_code</th>
                                <th>Slug</th>
                                <th>Trạng thái</th>
                                {{-- <th>Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($communeWards as $key => $communeWard)
                                <tr>
                                    <td class="text-center">{{ $communeWard->code }}</td>
                                    <td>{{ $communeWard->code }}</td>
                                    <td>{{ $communeWard->name }}</td>
                                    <td>
                                        {{ $communeWard->district->name }}
                                    </td>
                                    <td>
                                        {{ $communeWard->district->province->name }}
                                    </td>
                                    <td>{{ $communeWard->district_code }}</td>
                                    <td>{{ $communeWard->code_name }}</td>
                                    <td>
                                        @if ($communeWard->status == 1)
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox" checked
                                                        data-id="{{ $communeWard->code }}"
                                                        data-url="{{ route('admin.commune-wards.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @else
                                            <div class="switch">
                                                <label>
                                                    <input class="change-status" type="checkbox"
                                                        data-id="{{ $communeWard->code }}"
                                                        data-url="{{ route('admin.commune-wards.change-status') }}">
                                                    <span class="lever switch-col-teal"></span></label>
                                            </div>
                                        @endif
                                    </td>
                                    {{-- <td>
                                  <a href="{{ route('admin.commune-wards.edit', $communeWard->code) }}">
                                      <button type="button" class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                              class="zmdi zmdi-edit"></i></button>
                                  </a>
                      
                                  <a href="{{ route('admin.commune-wards.destroy', $communeWard->code) }}"
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
