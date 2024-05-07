<section class="services" id="services">
    <div class="services__wrapper wrapper">
        <h2 class="services__title title">Услуги</h2>
        <div class="services__tabs">
            @if(isset($services))
                <?php $active = 0;?>
                @foreach($services as $key => $service)
                    @if($active == 0)
                        <?php $active++ ?>
                        <span class="services__tabs-item active" data-num="{{$service->id}}">{{$service->name}}</span>
                    @else
                        <span class="services__tabs-item" data-num="{{$service->id}}">{{$service->name}}</span>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="services__container">
            @if(isset($services))
                <?php $active = 0; $class = ' active loaded'; $img_attr = 'data-src';?>
                @foreach($services as $key => $service)
                    <?php $data_num='data-num="'.$service->id.'"';?>
                    @if($active > 0)
                        <?php $class = ""; $data_num = "";$img_attr = 'data-src';?>
                    @endif
                    <?php $active++ ?>
                    <div class="services__item{{$class}}" data-num="{{$service->id}}">
                        <div class="services__text">
                            <span class="services__name">{{$service->name}}</span>
                            {!! $service->description !!}
                            <a class="services__button button" href="javascript:void(0)">Узнать подробнее</a>
                        </div>

                        <div class="services__slider swiper-container">
                            <div class="swiper-wrapper">
                                @if(isset($service->photo) && !empty($service->photo))
                                    @foreach($service->photo as $k => $p)
                                        <div class="services__slider-item swiper-slide lazyload">
                                            <picture>
                                                <source data-srcset="{{asset($p->getUrl('m'))}}" data-image="{{asset($p->getUrl('l'))}}" type="image/webp">
                                                <img {{$img_attr}}="{{asset($p->getUrl('m'))}}" data-image="{{asset($p->getUrl('l'))}}">
                                            </picture>
                                            <!-- <img {{$img_attr}}="{{asset($p->getUrl('m'))}}" alt="" data-image="{{asset($p->getUrl('l'))}}"> -->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
