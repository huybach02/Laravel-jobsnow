@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i>Quản
            Lý Trang Chủ</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý trang chủ</a></li>
            <li class="breadcrumb-item">Phần mở đầu</li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2> Nội dung phần mở đầu </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.home-section.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12 p-0">
                        <b>Ảnh đại diện</b>
                        <br>
                        @if ($hero)
                            <img class="mt-2" src="{{ asset($hero?->image) }}" width="250" height="350"
                                alt="">
                        @endif
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
                        <b>Tiêu đề chính</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('title') ? 'error focused' : '' }}">
                                <input type="text" class="form-control"
                                    placeholder="VD: Tìm Việc Làm Theo Mong Muốn Của Bạn Ngay Hôm Nay,..." name="title"
                                    value="{{ old('title', $hero?->title) }}">
                            </div>
                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Tiêu đề phụ</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('subtitle') ? 'error focused' : '' }}">
                                <input type="text" class="form-control"
                                    placeholder="VD: Tìm kiếm công việc theo ngành nghề, khu vực và mức lương để phù hợp với nhu cầu và kỹ năng của bạn,..."
                                    name="subtitle" value="{{ old('subtitle', $hero?->subtitle) }}">
                            </div>
                            @if ($errors->has('subtitle'))
                                <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Tên nút bấm</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('button_name') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: Tìm việc ngay,..."
                                    name="button_name" value="{{ old('button_name', $hero?->button_name) }}">
                            </div>
                            @if ($errors->has('button_name'))
                                <small class="text-danger">{{ $errors->first('button_name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 p-0">
                        <b>Đường dẫn khi nhấn nút</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('button_link') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="VD: http://jobsnow.test,..."
                                    name="button_link" value="{{ old('button_link', $hero?->button_link) }}">
                            </div>
                            @if ($errors->has('button_link'))
                                <small class="text-danger">{{ $errors->first('button_link') }}</small>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
