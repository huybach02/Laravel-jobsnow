@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i>Quản
            Lý Người Dùng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý người dùng</a></li>
            <li class="breadcrumb-item">Vai trò</li>
            <li class="breadcrumb-item active">Chỉnh sửa vai trò << <span class="text-primary">
                    {{ $role->name }} </span>>>
            </li>
        </ul>
        <a href="{{ route('admin.roles.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2 class="text-primary"> Chỉnh sửa vai trò <span class="text-danger">({{ $role->name }})</span>
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 p-0">
                        <b>Tên vai trò</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('name') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: Người viết bài,..."
                                    name="name" value="{{ old('name', $role->name) }}">
                            </div>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>

                    <h6 class="mb-3">Danh sách các quyền cho vai trò này</h6>

                    @foreach ($permissions as $groupName => $permission)
                        <div class="col-12 p-0 mb-3">
                            <b class="text-primary">
                                {{ $groupName }}</b>

                            <div class="row">
                                @foreach ($permission as $item)
                                    <div class="col-md-3 switch mt-2">
                                        <label>
                                            <input {{ in_array($item->name, $rolePermissions) ? 'checked' : '' }}
                                                class="" type="checkbox" name="permissions[]"
                                                value="{{ $item->name }}">
                                            <span class="lever switch-col-teal"></span>
                                            <span>{{ $item->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <hr>
                    @endforeach


                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
