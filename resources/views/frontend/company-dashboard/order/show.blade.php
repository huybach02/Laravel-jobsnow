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
                        <h3 class="mt-0 mb-0 color-brand-1">Chi tiết đơn hàng <span
                                class="text-primary">{{ $order->order_id }}</span></h3>

                        <a href="{{ route('company.orders.index') }}" class="btn btn-secondary mt-20">
                            <i class="fas fa-caret-left"></i> Quay lại</a>

                        <div class="row mt-30">

                            <div class="col-md-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Mã đơn hàng</strong>
                                            </td>
                                            <td class="">{{ $order->order_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Tên công ty/doanh nghiệp</strong>
                                            </td>
                                            <td class="">{{ $order->company->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Phương thức thanh toán</strong>
                                            </td>
                                            <td class="">{{ $order->method }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Mã giao dịch thanh toán</strong>
                                            </td>
                                            <td class="">{{ $order->transaction_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Trạng thái thanh toán</strong>
                                            </td>
                                            <td class="">
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
                                            <td>
                                                <strong>Thời gian</strong>
                                            </td>
                                            <td class="">{{ $order->created_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Tên gói dịch vụ</strong>
                                            </td>
                                            <td class="">{{ $order->plan_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Giá tiền</strong>
                                            </td>
                                            <td class="">{{ formatMoney($order->price) }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Số lượng tin tuyển dụng tăng thêm</strong>
                                            </td>
                                            <td class="">+ {{ $order->job_count }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Số lượng tin tuyển dụng nổi bật tăng thêm</strong>
                                            </td>
                                            <td class="">+ {{ $order->featured_job_count }}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Tặng hiển thị doanh nghiệp nổi bật trên trang chủ</strong>
                                            </td>
                                            <td class="">{{ $order->company_featured_show == 1 ? 'Có' : 'Không' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Tặng hiển thị doanh nghiệp đã được xác thực</strong>
                                            </td>
                                            <td class="">{{ $order->company_verified_show == 1 ? 'Có' : 'Không' }}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
