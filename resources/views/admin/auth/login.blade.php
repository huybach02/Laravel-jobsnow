@extends('admin.auth.layouts.auth-master')

@section('content')
    <div class="authentication d-flex align-items-center justify-content-center px-3 px-lg-0 py-5 py-lg-0">
        <div class="bg-white w-md-25 rounded">
            <div class="card w-100 px-5">
                <img src="{{ asset('logo-transparent.png') }}" alt="" class="d-block mx-auto" width="250px">
                <h6 class="text-center">Trang Quản Trị</h6>
                <h3 class="l-login text-center text-primary">Đăng nhập</h3>
                <form id="sign_in" method="POST" action="{{ route('admin.login') }}" class="row mt-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-12 p-0">
                            <b>Email</b>
                            <div class="input-group d-flex flex-column">
                                <div class="form-line {{ $errors->has('email') ? 'error focused' : '' }}">
                                    <input type="text" class="form-control" placeholder="Nhập email của bạn"
                                        name="email" value="{{ old('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-12 p-0">
                            <b>Mật khẩu</b>
                            <div class="input-group d-flex flex-column">
                                <div class="form-line {{ $errors->has('email') ? 'error focused' : '' }}">
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu của bạn"
                                        name="password">
                                </div>
                                @if ($errors->has('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-column p-0">
                        <!-- Remember Me -->
                        <div class="row">
                            <div class="col-6">
                                <input type="checkbox" id="md_checkbox_27" class="filled-in chk-col-light-blue" checked
                                    name="remember">
                                <label for="md_checkbox_27">Ghi nhớ tôi</label>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.password.request') }}">Quên mật khẩu ?</a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <button type="submit" class="btn btn-raised g-bg-blue waves-effect">Đăng nhập</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div id="instance1"></div>
    </div>
@endsection
