@extends('admin.auth.layouts.auth-master')

@section('content')
    <div class="authentication d-flex align-items-center justify-content-center px-3 px-lg-0 py-5 py-lg-0">
        <div class="bg-white w-md-25 rounded">
            <div class="card w-100 px-5">
                <h3 class="l-login p-0">Đặt lại mật khẩu</h3>
                <form id="sign_in" method="POST" action="{{ route('admin.password.store') }}" class="row mt-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="row col-12 p-0">
                        <div class="col-12 p-0">
                            <b>Email</b>
                            <div class="input-group d-flex flex-column">
                                <div class="form-line {{ $errors->has('email') ? 'error focused' : '' }}">
                                    <input type="text" class="form-control" placeholder="Nhập email của bạn"
                                        name="email" value="{{ old('email', $request->email) }}" disabled>
                                </div>
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <b>Mật khẩu mới</b>
                            <div class="input-group d-flex flex-column">
                                <div class="form-line {{ $errors->has('password') ? 'error focused' : '' }}">
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu mới"
                                        name="password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <b>Xác nhận mật khẩu mới</b>
                            <div class="input-group d-flex flex-column">
                                <div class="form-line {{ $errors->has('password_confirmation') ? 'error focused' : '' }}">
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới"
                                        name="password_confirmation">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="row d-flex">
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
