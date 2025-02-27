@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i>Quản
            Lý Kỹ Năng Mềm</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý thông tin ứng viên</a></li>
            <li class="breadcrumb-item">Kỹ năng mềm</li>
            <li class="breadcrumb-item active">Chỉnh sửa kỹ năng mềm << <span class="text-primary">
                    {{ $softSkill->name }} </span>>>
            </li>
        </ul>
        <a href="{{ route('admin.soft-skills.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2 class="text-primary"> Chỉnh sửa kỹ năng mềm <span class="text-danger">({{ $softSkill->name }})</span>
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.soft-skills.update', $softSkill->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12 p-0">
                        <b>Tên lĩnh vực nghề nghiệp</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('name') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: Tiếng Việt, Tiếng Anh,..."
                                    name="name" value="{{ old('name', $softSkill->name) }}">
                            </div>
                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 p-0">
                        <b>Trạng thái</b>
                        <select class="form-control border mt-2" name="status">
                            <option {{ old('status', $softSkill->status) == '1' ? 'selected' : '' }} value="1">Kích
                                hoạt</option>
                            <option {{ old('status', $softSkill->status) == '0' ? 'selected' : '' }} value="0">Không
                                kích hoạt</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
