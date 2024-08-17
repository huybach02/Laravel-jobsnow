@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Đơn Hàng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý đơn hàng</a></li>
            <li class="breadcrumb-item active">Đơn hàng << <span class="text-primary">
                    {{ $order->order_id }} </span>>></li>
        </ul>
        <a href="{{ route('admin.orders.index') }}">
            <button type="button" class="btn  btn-raised bg-blue-grey waves-effect text-white"><i
                    class="zmdi zmdi-caret-left"></i> Quay lại</button>
        </a>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Chi tiết đơn hàng</h2>
            </div>
            <div class="body">
                <div class="row">
                    <div class="col-md-6">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <td>{{ $order->order_id }}</td>
                                </tr>
                                <tr>
                                    <th>Tên công ty/doanh nghiệp</th>
                                    <td>{{ $order->company->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán</th>
                                    <td>{{ $order->method }}</td>
                                </tr>
                                <tr>
                                    <th>Mã giao dịch thanh toán</th>
                                    <td>{{ $order->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Trạng thái thanh toán</th>
                                    <td>
                                        @switch($order->status)
                                            @case('paid')
                                                Đã thanh toán
                                            @break

                                            @case('pending')
                                                Đang xử lý
                                            @break

                                            @default
                                                Thanh toán thất bại
                                        @endswitch
                                    </td>
                                </tr>
                                <tr>
                                    <th>Thời gian</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <a href="" class="btn btn-raised bg-blue waves-effect">In hoá đơn</a> --}}

                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Tên gói dịch vụ</th>
                                    <td>{{ $order->plan_name }}</td>
                                </tr>
                                <tr>
                                    <th>Giá tiền</th>
                                    <td>{{ formatMoney($order->price) }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng tin tuyển dụng tăng thêm</th>
                                    <td>+ {{ $order->job_count }}</td>
                                </tr>
                                <tr>
                                    <th>Số lượng tin tuyển dụng nổi bật tăng thêm</th>
                                    <td>+ {{ $order->featured_job_count }}</td>
                                </tr>
                                <tr>
                                    <th>Tặng hiển thị doanh nghiệp nổi bật trên trang chủ</th>
                                    <td>{{ $order->company_featured_show == 1 ? 'Có' : 'Không' }}</td>
                                </tr>
                                <tr>
                                    <th>Tặng hiển thị doanh nghiệp đã được xác thực</th>
                                    <td>{{ $order->company_verified_show == 1 ? 'Có' : 'Không' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
