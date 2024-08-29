<section class="section-box futured_jobs mt-20">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Tin Tuyển Dụng Nổi Bật</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm kiếm tin tuyển dụng nổi
                bật phù hợp với bạn!</p>
            <div class="list-tabs mt-40">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach ($jobFeaturedCategories as $jobFeaturedCategory)
                        <li><a class="{{ $loop->index == 0 ? 'active' : '' }}"
                                id="nav-tab-job-{{ $jobFeaturedCategory->id }}"
                                href="#tab-job-{{ $jobFeaturedCategory->id }}" data-bs-toggle="tab" role="tab"
                                aria-controls="tab-job-{{ $jobFeaturedCategory->id }}" aria-selected="true"
                                data-id="{{ $jobFeaturedCategory->id }}">{{ $jobFeaturedCategory->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="mt-70">
            <div class="tab-content" id="myTabContent-1">
                <div id="job-list" class="row">
                    <!-- Job listings will be loaded here by AJAX -->
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Function to fetch jobs based on category
            function fetchJobs(categoryId) {
                $.ajax({
                    url: "{{ route('api.jobs', ':categoryId') }}".replace(':categoryId', categoryId),
                    method: 'GET',
                    beforeSend: function() {
                        // Fade out by changing opacity, keeping the height intact
                        $('#job-list').css({
                            visibility: 'hidden',
                            opacity: 0
                        });
                    },
                    success: function(data) {
                        // Update the HTML content
                        setTimeout(function() { // Small delay to sync with fade-out
                            $('#job-list').html(data).css({
                                visibility: 'visible'
                            }).animate({
                                opacity: 1
                            }, 100);
                        }, 100);
                    }
                });
            }

            // Load jobs for the first tab on page load
            let firstCategoryId = $('.nav-tabs .active').data('id');
            fetchJobs(firstCategoryId);

            // Change event when a tab is clicked
            $('.nav-tabs a').on('click', function() {
                let categoryId = $(this).data('id');
                fetchJobs(categoryId);
            });

            // Automatically fetch jobs every 10 seconds
            setInterval(function() {
                let activeCategoryId = $('.nav-tabs .active').data('id');
                fetchJobs(activeCategoryId);
            }, 30000); // 10 seconds interval (10000 ms)
        });
    </script>
@endpush
