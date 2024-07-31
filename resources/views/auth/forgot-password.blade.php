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
                            <h2 class="mt-10 mb-5 text-brand-1">Quên mật khẩu</h2>
                            <p class="font-sm text-muted mb-30">Khôi phục mật khẩu cho tài khoản của bạn.</p>
                        </div>
                        <form class="login-register text-start mt-20" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="form-label" for="input-4">Email *</label>
                                <input class="form-control" id="input-4" type="text" name="email"
                                    placeholder="Nhập email của tài khoản cần khôi phục mật khẩu"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="continue">Xác
                                    nhận</button>
                            </div>
                            <div class="text-muted text-center"><a href="{{ route('login') }}">Quay lại đăng nhập</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
