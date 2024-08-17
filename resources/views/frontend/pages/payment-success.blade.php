@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Thanh toán</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row justify-content-center mb-120">
        <div class="col-md-5">
            <div class="message-box _success">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
                <h2> Thanh toán thành công </h2>
                <p> Cảm ơn bạn đã sử dụng dịch vụ của <strong>JobsNOW</strong>!
                    <br>
                    Nếu có bất cứ thắc mắc gì, hãy gửi liên hệ đến email
                    jobsnow@gmail.com.
                </p>
            </div>
        </div>
    </div>
@endsection
