<section class="section-box category_section mt-35">
    <div class="section-box wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Danh Mục Tuyển Dụng Nổi Bật
                </h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Tìm kiếm việc làm theo
                    danh mục phù hợp với bạn.</p>
            </div>
            <div class="box-swiper mt-50">
                <div class="swiper-container swiper-group-5 swiper">
                    <div class="swiper-wrapper pb-70 pt-5">

                        @foreach ($jobCategories->chunk(2) as $pair)
                            <div class="swiper-slide hover-up">

                                @foreach ($pair as $item)
                                    <a href="{{ route('jobs.index', ['category' => $item->id]) }}">
                                        <div class="item-logo">
                                            <div class="image-left">
                                                <i class="fas fa-list-alt"></i>
                                            </div>
                                            <div class="text-info-right">
                                                <h4> {{ str($item->name)->limit(25, '...') }} </h4>
                                                <p class="font-xs">{{ $item->jobs_count }}<span> Tin tuyển dụng</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>
