@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Gói Dịch Vụ</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý gói dịch vụ</a></li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ul>
        <a href="{{ route('admin.plans.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header">
                <h2> Thêm gói dịch vụ </h2>
            </div>
            <div class="body">
                <form action="{{ route('admin.plans.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Tên gói dịch vụ</b>
                                <div class="input-group d-flex flex-column">
                                    <div class="form-line {{ $errors->has('label') ? 'error focused' : '' }}">
                                        <input type="text" class="form-control" placeholder="VD: Gói miễn phí"
                                            name="label" value="{{ old('label') }}">
                                    </div>
                                    @if ($errors->has('label'))
                                        <small class="text-danger">{{ $errors->first('label') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Giá tiền (VNĐ)</b>
                                <div class="input-group d-flex flex-column">
                                    <div class="form-line {{ $errors->has('price') ? 'error focused' : '' }}">
                                        <input type="number" class="form-control" placeholder="VD: 100000" name="price"
                                            value="{{ old('price') }}">
                                    </div>
                                    @if ($errors->has('price'))
                                        <small class="text-danger">{{ $errors->first('price') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Số lượng bài tuyển dụng</b>
                                <div class="input-group d-flex flex-column">
                                    <div class="form-line {{ $errors->has('job_count') ? 'error focused' : '' }}">
                                        <input type="number" class="form-control" placeholder="VD: 1,2,3,..."
                                            name="job_count" value="{{ old('job_count') }}">
                                    </div>
                                    @if ($errors->has('job_count'))
                                        <small class="text-danger">{{ $errors->first('job_count') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Số lượng bài tuyển dụng nổi bật hiển thị ở trang chủ</b>
                                <div class="input-group d-flex flex-column">
                                    <div class="form-line {{ $errors->has('featured_job_count') ? 'error focused' : '' }}">
                                        <input type="number" class="form-control" placeholder="VD: 1,2,3,..."
                                            name="featured_job_count" value="{{ old('featured_job_count') }}">
                                    </div>
                                    @if ($errors->has('featured_job_count'))
                                        <small class="text-danger">{{ $errors->first('featured_job_count') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Hiển thị doanh nghiệp trong phần nổi bật ở trang chủ</b>
                                <div class="d-flex flex-column">
                                    <select class="form-control border mt-2" name="company_featured_show" id="">
                                        <option value="">-- Chọn --</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    </select>
                                    @if ($errors->has('company_featured_show'))
                                        <small class="text-danger">{{ $errors->first('company_featured_show') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-12 p-0">
                                <b>Hiển thị logo "Doanh nghiệp đã được xác thực"</b>
                                <div class="d-flex flex-column">
                                    <select class="form-control border mt-2" name="company_verified_show" id="">
                                        <option value="">-- Chọn --</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    </select>
                                    @if ($errors->has('company_verified_show'))
                                        <small class="text-danger">{{ $errors->first('company_verified_show') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="col-12 p-0">
                                <b>Dịch vụ được khuyến nghị mua</b>
                                <div class="d-flex flex-column">
                                    <select class="form-control border mt-2" name="recommended" id="">
                                        <option value="">-- Chọn --</option>
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                    @if ($errors->has('recommended'))
                                        <small class="text-danger">{{ $errors->first('recommended') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="col-12 p-0">
                                <b>Trạng thái kích hoạt</b>
                                <div class="d-flex flex-column">
                                    <select class="form-control border mt-2" name="status" id="">
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Không kích hoạt</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-raised g-bg-blue waves-effect mt-3">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
