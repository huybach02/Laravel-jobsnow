@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i>Quản
            Lý Tin Tức</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý tin tức</a></li>
            <li class="breadcrumb-item active">Chỉnh sửa tin tức << <span class="text-primary">
                    {{ $blog->title }} </span>>>
            </li>
        </ul>
        <a href="{{ route('admin.blogs.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2 class="text-primary"> Chỉnh sửa cấp bậc việc làm <span class="text-danger">({{ $blog->title }})</span>
                </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-12 p-0">
                        <b>Ảnh đại diện của tin tức</b>
                        <br>
                        <img class="mt-2" src="{{ asset($blog->image) }}" width="350" height="200" alt="">
                        <div class="input-group d-flex flex-column mt-3">
                            <div class="form-line {{ $errors->has('image') ? 'error focused' : '' }}">
                                <input type="file" class="form-control" name="image">
                            </div>
                            @if ($errors->has('image'))
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 p-0">
                        <b>Tiêu đề tin tức</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('title') ? 'error focused' : '' }}">
                                <input type="text" class="form-control"
                                    placeholder="VD: Tin tức tuyển dụng tháng 8 năm 2024,..." name="title"
                                    value="{{ old('title', $blog->title) }}">
                            </div>
                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 p-0">
                        <b>Nội dung tin tức</b>
                        <div class="input-group d-flex flex-column mt-2">
                            <div class="form-line {{ $errors->has('description') ? 'error focused' : '' }}">
                                <textarea name="description" class="w-100 editor">{{ old('description', $blog->description) }}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 p-0">
                        <b>Trạng thái</b>
                        <select class="form-control border mt-2" name="status">
                            <option @selected(old('status', $blog->status) == 1) value="1">Kích hoạt</option>
                            <option @selected(old('status', $blog->status) == 0) value="0">Không kích hoạt</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
