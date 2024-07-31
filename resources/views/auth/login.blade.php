@extends('frontend.layouts.master')

@section('content')
    {{-- <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto mb-120">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Đăng nhập</h2>
                            <p class="font-sm text-muted mb-30">Đăng nhập để có thể đăng tải việc làm hoặc ứng tuyển việc
                                làm.</p>
                        </div>
                        <form class="login-register text-start mt-20" action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email</label>
                                        <input class="form-control" id="input-3" type="text" name="email"
                                            placeholder="example@gmail.com" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Mật khẩu *</label>
                                        <input class="form-control" id="input-4" type="password" name="password"
                                            placeholder="************">
                                        @if ($errors->has('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('password.request') }}" class="font-bold">Quên mật khẩu</a>
                            </div>
                            <div class="">
                                <label for="remember_me" class="d-flex align-items-center">
                                    <input id="remember_me" type="checkbox" class="mt-1" name="remember" checked>
                                    <span class="ms-2 text-sm text-gray-600">Ghi nhớ tôi</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Đăng
                                    nhập</button>
                            </div>
                            <div class="text-muted text-center">Chưa có tài khoản ?
                                <a href="{{ route('register') }}" class="font-bold">Đăng ký tài khoản</a>
                            </div>
                        </form>
                        <div class="text-center mt-20">
                            {{-- <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="btn social-login hover-up mt-20"><img
                                    src="assets/imgs/template/icons/icon-google.svg" alt="joblist"><strong>Sign up with
                                    Google</strong></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
