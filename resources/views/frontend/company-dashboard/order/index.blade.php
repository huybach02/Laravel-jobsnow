@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Gói Dịch Vụ Đã Mua</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Gói dịch vụ đã mua</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row mb-120">

                @include('frontend.company-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-120">
                    <div class="content-single">
                        <h3 class="mt-0 mb-0 color-brand-1">Gói dịch vụ đã mua</h3>

                        <div class="table-responsive mt-30">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <td class="text-center font-bold">STT</td>
                                        <th>ID</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên gói dịch vụ</th>
                                        <th>Giá tiền</th>
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
                                            <td>{{ $order->plan_name }}</td>
                                            <td>{{ formatMoney($order->price) }}</td>
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
                                                <a href="{{ route('company.orders.show', $order->id) }}"><button
                                                        type="button" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-eye"></i></button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
