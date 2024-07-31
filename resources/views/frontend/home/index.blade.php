@extends('frontend.layouts.master')

@section('content')
    <div class="bg-homepage1"></div>

    @include('frontend.home.sections.hero')

    <div class="mt-100"></div>

    @include('frontend.home.sections.category')

    @include('frontend.home.sections.featured-job')

    @include('frontend.home.sections.why-choose')

    @include('frontend.home.sections.visit')

    @include('frontend.home.sections.visit-count')

    @include('frontend.home.sections.recruiter')

    @include('frontend.home.sections.pricing-plan')

    @include('frontend.home.sections.location')

    @include('frontend.home.sections.client-say')

    @include('frontend.home.sections.blog')
@endsection
