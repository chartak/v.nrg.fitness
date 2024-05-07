<section class="gallery" id="gallery">
    <div class="gallery__wrapper wrapper">
        <h2 class="gallery__title title">Фото клуба</h2>
    </div>
    <div class="gallery__slider swiper-container">
        <div class="swiper-wrapper">
            @if(isset($phGallery))
                @foreach($phGallery as $pg)
                    @foreach($pg->photo as $k=>$g)
                        <?php $g_count = $k + 1; ?>
                        @if($g_count % 2 == 1)
                            <div class="gallery__slider-item swiper-slide">
                        @endif
                                <span class="gallery__image lazyload">
                                    <picture>
                                        <source data-srcset="{{asset($g->getUrl('m'))}}" data-image="{{asset($g->getUrl('l'))}}" type="image/webp">
                                        <img data-src="{{asset($g->getUrl('m'))}}" data-image="{{asset($g->getUrl('l'))}}">
                                    </picture>
                                    <!-- <img data-src="{{asset($g->getUrl('m'))}}" alt="" data-image="{{asset($g->getUrl('l'))}}"> -->
                                </span>
                                {{--<span class="gallery__image">--}}
                                    {{--<img src="img/gallery2.jpg" alt="">--}}
                                {{--</span>--}}
                        @if($g_count % 2 == 0 || count($pg->photo) == $g_count)
                            </div>
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
    <div class="gallery__arrow gallery__arrow-prev swiper-arrow swiper-arrow-prev lazyload"></div>
    <div class="gallery__arrow gallery__arrow-next swiper-arrow swiper-arrow-next lazyload"></div>
</section>
