@extends('admin.auth.layouts.auth-master')

@section('content')
    <div class="authentication d-flex align-items-center justify-content-center px-3 px-lg-0 py-5 py-lg-0">
        <div class="bg-white w-md-25 rounded">
            <div class="card w-100 px-5">
                <h3 class="l-login p-0">Quên mật khẩu</h3>
                <p>Vui lòng nhập email đã đăng ký tài khoản trước đó.
                    <br>Hệ thống sẽ gửi một đường dẫn khôi phục mật khẩu đến
                    email này.
                </p>
                <form id="sign_in" method="POST" action="{{ route('admin.password.email') }}" class="row mt-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="col-12 p-0">
                        <b>Email</b>
                        <div class="input-group d-flex flex-column">
                            <div class="form-line {{ $errors->has('email') ? 'error focused' : '' }}">
                                <input type="text" class="form-control" placeholder="Nhập email của bạn" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex">
                        <a href="{{ route('admin.login') }}" class="btn btn-raised bg-grey waves-effect mr-3">Quay
                            lại
                            đăng nhập</a>
                        <button type="submit" class="btn btn-raised g-bg-blue waves-effect">Xác nhận</button>
                    </div>

                </form>
            </div>
        </div>
        <div id="instance1"></div>
    </div>
@endsection
