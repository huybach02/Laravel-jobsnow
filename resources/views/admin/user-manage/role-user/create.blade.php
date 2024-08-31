@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i>Quản
            Lý Người Dùng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý người dùng</a></li>
            <li class="breadcrumb-item">Người dùng</li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ul>
        <a href="{{ route('admin.role-user.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2> Thêm người dùng </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.role-user.store') }}" method="POST">
                    @csrf

                    <div class="col-12 p-0">
                        <b>Tên người dùng</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('name') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: Nhân viên,..." name="name"
                                    value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Email</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('email') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: nhanvien@gmail.com,..."
                                    name="email" value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Mật khẩu</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('password') ? 'error focused' : '' }}">
                                <input type="password" class="form-control" placeholder="********" name="password"
                                    value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Xác nhận mật khẩu</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('password_confirmation') ? 'error focused' : '' }}">
                                <input type="password" class="form-control" placeholder="********"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Vai trò người dùng</b>
                        <select class="form-control border mt-2" name="role">
                            <option value="">-- Chọn vai trò --</option>
                            @foreach ($roles as $role)
                                @if ($role->name != 'Quản trị viên hệ thống')
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <small class="text-danger">{{ $errors->first('role') }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
