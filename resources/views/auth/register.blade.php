{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master')

@section('content')
    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mx-auto mb-120">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Đăng ký</h2>
                            <p class="font-sm text-muted mb-30">Tạo tài khoản để có thể đăng bài tuyển dụng hoặc ứng tuyển
                                công việc.</p>
                        </div>
                        <form class="login-register text-start mt-20" action="{{ route('register.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-1">Tên người ứng tuyển / Tên doanh nghiệp
                                            *</label>
                                        <input class="form-control" id="input-1" type="text" name="name"
                                            placeholder="Nguyễn Văn A" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-2">Email *</label>
                                        <input class="form-control" id="input-2" type="email" name="email"
                                            placeholder="example@gmail.com" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Mật khẩu *</label>
                                        <input class="form-control" id="input-4" type="password" name="password"
                                            placeholder="************">
                                        @if ($errors->has('password'))
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-5">Xác nhận mật khẩu *</label>
                                        <input class="form-control" id="input-5" type="password"
                                            name="password_confirmation" placeholder="************">
                                        @if ($errors->has('password_confirmation'))
                                            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <hr>
                                    <h6 for="" class="mb-2">Tạo tài khoản với vai trò</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="typeCandidate"
                                            value="candidate" checked>
                                        <label class="form-check-label" for="typeCandidate">Người ứng tuyển</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="typeCompany"
                                            value="company">
                                        <label class="form-check-label" for="typeCompany">Doanh nghiệp</label>
                                    </div>
                                    @if ($errors->has('type'))
                                        <small class="text-danger">{{ $errors->first('type') }}</small>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Đăng
                                        ký</button>
                                </div>
                                <div class="text-muted text-center">Đã có tài khoản ?
                                    <a href="{{ route('login') }}">Đăng nhập</a>
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
