<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">

    @include('frontend.layouts.head')

</head>

<body>

    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}" alt="joblist"></div>
            </div>
        </div>
    </div> --}}

    @include('frontend.layouts.header')

    <main class="main">

        @yield('content')

    </main>

    <section class="section-box subscription_box">
        <div class="container">
            <div class="box-newsletter">
                <div class="newsletter_textarea">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-form-newsletter">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    @include('frontend.layouts.script')

</body>

</html>
