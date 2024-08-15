@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Gói Dịch Vụ</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý gói dịch vụ</a></li>
        </ul>
    </div>

    <div class="card">
        <div class="header d-flex align-items-center justify-content-between">
            <h2 class="text-primary">Danh sách gói dịch vụ </h2>
            <a href="{{ route('admin.plans.create') }}">
                <button type="button" class="btn btn-raised bg-light-blue waves-effect"><i class="zmdi zmdi-plus"></i>
                    Thêm mới</button>
            </a>
        </div>

        <div class="row px-3 mb-5">

            @foreach ($plans as $plan)
                <div class="col-md-4 mb-4">
                    <ul class="price">
                        <li class="{{ $plan->price == 0 ? 'free' : 'has-price' }}">
                            <strong>{{ $plan->label }}</strong>
                            <br>
                            @if ($plan->recommended)
                                <small>(Được khuyến nghị)</small>
                            @endif
                        </li>
                        <li class="grey">{{ formatMoney($plan->price) }} / {{ $plan->job_count }} tin tuyển dụng</li>
                        <li>+ {{ $plan->job_count }} tin tuyến dụng</li>
                        <li>{{ $plan->featured_job_count }} tin tuyến dụng nổi bật</li>
                        <li>{{ $plan->company_featured_show ? 'Hiển thị' : 'Không hiển thị' }} doanh nghiệp nổi bật</li>
                        <li>{{ $plan->company_verified_show ? 'Hiển thị' : 'Không hiển thị' }} logo "Đã xác thực doanh
                            nghiệp"</li>
                        <li class="grey">
                            <a href="{{ route('admin.plans.edit', $plan->id) }}">
                                <button type="button" class="btn btn-raised bg-blue waves-effect"><i
                                        class="zmdi zmdi-edit"></i></button>
                            </a>

                            <a href="{{ route('admin.plans.destroy', $plan->id) }}"
                                class="btn btn-raised bg-red waves-effect delete-btn" data-type="confirm"><i
                                    class="zmdi zmdi-delete"></i></a>
                        </li>
                    </ul>
                </div>
            @endforeach

        </div>
    </div>
@endsection
