@extends('frontend.layouts.master')

@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Tin tức</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ route('home') }}">Trang chủ</a></li>
                            <li>Tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="post-loop-grid">
            <div class="container">
                <div class="row mt-30">
                    <div class="col-12">
                        <div class="row">

                            @foreach ($blogs as $blog)
                                <div class="col-md-4 mb-30">
                                    <div class="card-grid-3 hover-up wow">
                                        <div class="text-center card-grid-3-image"><a
                                                href="{{ route('blogs.show', $blog->slug) }}">
                                                <figure><img alt="joblist" src="{{ asset($blog->image) }}">
                                                </figure>
                                            </a></div>
                                        <div class="card-block-info">
                                            <h5><a
                                                    href="{{ route('blogs.show', $blog->slug) }}">{{ str($blog->title)->limit(35, '...') }}</a>
                                            </h5>
                                            <p class="mt-10 color-text-paragraph font-sm"></p>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-lg-6 col-6">
                                                        <span class="font-sm font-bold color-brand-1 op-70">JobsNOW</span>
                                                    </div>
                                                    <div class="col-lg-6 text-end col-6 pt-15">
                                                        <span
                                                            class="font-xs color-text-paragraph-2">{{ date('d/m/Y', strtotime($blog->created_at)) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
