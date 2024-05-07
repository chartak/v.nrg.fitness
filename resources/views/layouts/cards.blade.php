<section class="cards" id="cards">
    <div class="cards__wrapper wrapper">
        <h2 class="cards__title title">Клубные карты</h2>
    </div>
    <div class="cards__slider swiper-container">
    <div class="swiper-wrapper">
            @if(isset($clubcards))
            @foreach($clubcards as $k => $clab_card)
                        <?php $g_count = $k + 1; ?>
                        @if($g_count % 2 == 1)
                            <div class="gallery__slider-item swiper-slide">
                        @endif
                        <div class="cards__slider-wrapper">
                        <div class="cards__info">
                                <p class="cards__paragraph">Возраст
                                    <span>
                                        @if($clab_card->year_from == 'norestrictions')
                                            <?php $yt = trans('cruds.clubCart.scheduled_year'); ?>
                                        @elseif(!$clab_card->year_to)
                                            <?php $yt = 'c ' . $clab_card->year_from; ?>
                                        @else
                                            <?php $yt = $clab_card->year_from . ' - ' . $clab_card->year_to; ?>
                                        @endif
                                        {{$yt}}
                                    </span>
                                </p>
                                @if($clab_card->timefrom)
                                <p class="cards__paragraph">Время
                                    <span>
                                        @if($clab_card->timefrom == 'scheduled' || $clab_card->timefrom == 'aroundtheclock')
                                            <?php $tt = trans('cruds.clubCart.'.$clab_card->timefrom); ?>
                                        @elseif(!$clab_card->timeto)
                                            <?php $tt = $clab_card->timefrom; ?>
                                        @else
                                            <?php $tt = $clab_card->timefrom . ' - ' . $clab_card->timeto; ?>
                                        @endif
                                        {{$tt}}
                                    </span>
                                </p>
                                @endif
                                <!-- В будни -->
                                @if($clab_card->weekdaysfrom)
                                    <p class="cards__paragraph">{{trans('cruds.clubCart.fields.on_weekdays_label')}}
                                        <span>
                                        @if($clab_card->weekdaysfrom == 'scheduled')
                                                <?php $tt = trans('cruds.clubCart.scheduled_time'); ?>
                                            @elseif(!$clab_card->weekdaysto)
                                                <?php $tt = $clab_card->weekdaysfrom; ?>
                                            @else
                                                <?php $tt = $clab_card->weekdaysfrom . ' - ' . $clab_card->weekdaysto; ?>
                                            @endif
                                            {{$tt}}
                                    </span>
                                    </p>
                                @endif
                                <!-- В выходные -->
                                @if($clab_card->weekendfrom)
                                    <p class="cards__paragraph">{{trans('cruds.clubCart.fields.on_the_weekend_label')}}
                                        <span>
                                        @if($clab_card->weekendfrom == 'scheduled')
                                                <?php $tt = trans('cruds.clubCart.scheduled_time'); ?>
                                            @elseif(!$clab_card->weekendto)
                                                <?php $tt = $clab_card->weekendfrom; ?>
                                            @else
                                                <?php $tt = $clab_card->weekendfrom . ' - ' . $clab_card->weekendto; ?>
                                            @endif
                                            {{$tt}}
                                    </span>
                                    </p>
                                @endif
                                <!-- Срок -->
                                @if($clab_card->term)
                                    <p class="cards__paragraph">{{trans('cruds.clubCart.fields.term_label')}}
                                        <span>{{(is_numeric($clab_card->term)) ? $clab_card->term : '' }} </span>
                                    </p>
                                @endif
                                <!-- Заморозка -->
                                @if($clab_card->duration)
                                    <p class="cards__paragraph">{{trans('cruds.clubCart.fields.freezing_label')}}
                                        <span>{{(is_numeric($clab_card->duration)) ? $clab_card->duration.' дней' : trans('cruds.clubCart.duration_time') }} </span>
                                    </p>
                                @endif

                                @if($clab_card->open_tab && $clab_card->cart_url !="")
                                    <a class="cards__tab button" href="{{$clab_card->cart_url}}">Узнать стоимость</a>
                                @else
                                    <a class="cards__button button" href="javascript:void(0)">Оформить</a>
                                @endif
                            </div>
                            <div class="cards__cover lazyload" style="background-color: {{$clab_card->cart_background}};" data-card-id="{{$clab_card->id}}">
                                <span class="cards__name">{{$clab_card->name}}</span>
                                <span class="cards__description">{{$clab_card->description}}</span>
                            </div>
                        </div>
                        @if($g_count % 2 == 0)
                            </div>
                        @endif
                    @endforeach
            @endif
        </div>
    </div>
    <div class="cards__arrow cards__arrow-prev swiper-arrow swiper-arrow-prev lazyload"></div>
    <div class="cards__arrow cards__arrow-next swiper-arrow swiper-arrow-next lazyload"></div>
</section>
