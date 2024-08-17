@extends('admin.layouts.master')

@section('content')
    <div class="block-header border border-bottom">
        <h2 class="d-flex align-items-center"><i class="zmdi zmdi-settings zmdi-hc-spin mr-2" style="font-size: 24px"></i> Quản
            Lý Đơn Hàng</h2>
        <ul class="breadcrumb ml-4">
            <li class="breadcrumb-item"><a href="index.html">Quản lý đơn hàng</a></li>
        </ul>
    </div>
    <div>
        <div class="card">
            <div class="header d-flex align-items-center justify-content-between">
                <h2 class="text-primary">Danh sách đơn hàng</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <td class="text-center font-bold">STT</td>
                                <th>ID</th>
                                <th>Mã đơn hàng</th>
                                <th>Công ty/doanh nghiệp</th>
                                <th>Tên gói dịch vụ</th>
                                <th>Giá tiền</th>
                                <th>Phương thức thanh toán</th>
                                <th style="text-align: start">Mã giao dịch</th>
                                <th>Trạng thái</th>
                                <th style="text-align: start">Thời gian</th>
                                <th style="text-align: start">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->company->name }}</td>
                                    <td>{{ $order->plan_name }}</td>
                                    <td>{{ formatMoney($order->price) }}</td>
                                    <td>{{ $order->method }}</td>
                                    <td style="text-align: start">{{ $order->transaction_id }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case('paid')
                                                Thành công
                                            @break

                                            @case('pending')
                                                Đang xử lý
                                            @break

                                            @default
                                                Thất bại
                                        @endswitch
                                    </td>
                                    <td style="text-align: start">
                                        {{ $order->created_at }}
                                    </td>
                                    <td style="text-align: start">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"><button type="button"
                                                class="btn btn-raised bg-blue waves-effect btn-xs"><i
                                                    class="zmdi zmdi-eye"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
