@foreach ($companies as $company)
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
            <div class="image-box"><a href="{{ route('company-info.show', $company->slug) }}"><img
                        src="{{ asset($company->logo) }}" alt="joblist"></a></div>
            <div class="info-text mt-10">
                <h5 class="font-bold"><a href="{{ route('company-info.show', $company->slug) }}">{{ $company->name }}</a>
                </h5>
                <div class="mt-5 mb-2">
                    <span class="font-xs color-text-mutted ml-10">
                        <span>{{ $company->industry->name }}</span>
                    </span>
                </div><span class="card-location">{{ $company->companyProvince->name }}</span>
                <div class="mt-30 font-bold"><span>12</span><span> Jobs
                        Open</span></div>
            </div>
        </div>
    </div>
@endforeach

<div class="d-flex justify-content-center mt-40">
    @if ($jobs->hasPages())
        {{ $jobs->appends(request()->except('page'))->links() }}
    @endif
</div>
