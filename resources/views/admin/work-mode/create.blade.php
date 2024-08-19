@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Thông Tin Tuyển Dụng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý thông tin tuyển dụng</a></li>
            <li class="breadcrumb-item">Hình thức làm việc</li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ul>
        <a href="{{ route('admin.work-modes.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2> Thêm hình thức làm việc </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.work-modes.store') }}" method="POST">
                    @csrf

                    <div class="col-12 p-0">
                        <b>Tên hình thức làm việc</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('name') ? 'error focused' : '' }}">
                                <input type="text" class="form-control"
                                    placeholder="VD: Làm việc toàn thời gian, bán thời gian,..." name="name"
                                    value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 p-0">
                        <b>Trạng thái</b>
                        <select class="form-control border mt-2" name="status">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
