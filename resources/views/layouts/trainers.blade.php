<section class="trainers" id="trainers">
    <div class="trainers__wrapper wrapper">
        <h2 class="trainers__title title">Тренеры</h2>
    </div>
    <div class="trainers__slider swiper-container">
        <div class="swiper-wrapper">
            @if(isset($trainers))
                @foreach($trainers as $k=>$treainer)
                    @if(!$treainer->schedule_trainer)
                        <div class="trainers__slider-item swiper-slide">
                            <div class="trainers__slider-wrapper">
                                <div class="trainers__info">
                                    <span class="trainers__name" data-tr-id="{{$treainer->id}}">{{$treainer->fullname}}</span>
                                    <span class="trainers__job">
                                        @foreach($treainer->types as $key => $type)
                                            {{ $type->name }}
                                        @endforeach
                                    </span>
                                </div>
                                <picture>
                                    <source data-srcset="{{($treainer->photo->getUrl('l'))}}" type="image/webp">
                                    <img class="trainers__image" data-src="{{($treainer->photo->getUrl('l'))}}">
                                </picture>
                                <!-- <img class="trainers__image" data-src="{{($treainer->photo->getUrl('l'))}}" alt=""> -->
                                <a class="trainers__button button" href="javascript:void(0)">Записаться</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            <!--<div class="trainers__slider-item swiper-slide"></div>-->
        </div>
    </div>
    <div class="trainers__arrow trainers__arrow-prev swiper-arrow swiper-arrow-prev lazyload"></div>
    <div class="trainers__arrow trainers__arrow-next swiper-arrow swiper-arrow-next lazyload"></div>
</section>
