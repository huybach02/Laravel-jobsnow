@foreach ($candidates as $candidate)
    <div class="col-lg-4 col-md-6">
        <div class="card-grid-2 hover-up">
            <div class="card-grid-2-image-left">
                <div class="card-grid-2-image-rd"><a href="{{ route('candidate-info.show', $candidate->slug) }}">
                        <figure><img alt="joblist" src="{{ asset($candidate->image) }}">
                        </figure>
                    </a></div>
                <div class="card-profile pt-10">
                    <a href="{{ route('candidate-info.show', $candidate->slug) }}">
                        <h5>{{ $candidate->full_name }}</h5>
                    </a>
                    <span class="font-xs"><strong>{{ $candidate->profession->name }}</strong></span>
                    <div class="rate-reviews-small py-1">
                        <span class="color-text-mutted font-xs"><strong>Giới tính:</strong>
                            {{ $candidate->gender == 'male' ? 'Nam' : 'Nữ' }}</span>
                    </div>
                </div>
            </div>
            <div class="card-block-info">
                <p class="font-xs">
                    <small><strong>Học vấn:</strong>
                        {{ $candidate->academicLevel->name }}</small>
                    <br>
                    <small><strong>Kinh nghiệm:</strong>
                        {{ $candidate->experience->name }}</small>
                </p>
                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                    <div class="d-flex gap-2">

                        @foreach (explode(',', $candidate->advanced_skills) as $skill)
                            <p class="py-1 px-1 border rounded font-xs">{{ $skill }}
                            </p>
                        @endforeach

                    </div>
                </div>
                <div class="employers-info align-items-center justify-content-center mt-15">
                    <div class="row">
                        <div class="col-12"><span class="d-flex align-items-center"><i
                                    class="fi-rr-marker mr-5 ml-0"></i><span
                                    class="font-xs color-text-mutted">{{ $candidate->candidateWard->name }},
                                    {{ $candidate->candidateDistrict->name }},
                                    {{ $candidate->candidateProvince->name }}</span></span>
                        </div>
                        <div class="col-12"><span class="d-flex align-items-center mt-2"><i
                                    class="fi-rr-money mr-5 ml-0"></i><span
                                    class="font-xs color-brand-1">{{ $candidate->desiredSalary->name }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="d-flex justify-content-center mt-40">
    @if ($candidates->hasPages())
        {{ $candidates->appends(request()->except('page'))->links() }}
    @endif
</div>
