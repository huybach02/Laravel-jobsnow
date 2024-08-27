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

    <section class="section-box">
        <div class="archive-header pt-40">
            <div class="container">
                <div class="box-white">
                    <!-- <div class="max-width-single"><a class="btn btn-tag" href="#">Job Tips</a> -->
                    <h2 class="mb-30 mt-20">{{ $blog->title }}</h2>
                    <div class="post-meta text-muted d-flex mx-auto">
                        <div class="author d-flex mr-30"><span>JobsNOW</span></div>
                        <div class="date"><span class="font-xs color-text-paragraph-2 mr-20 d-inline-block"><img
                                    class="img-middle mr-5"
                                    src="{{ asset('frontend/assets/imgs/page/blog/calendar.svg') }}">
                                {{ date('d/m/Y', strtotime($blog->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="post-loop-grid mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="single-body">
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
