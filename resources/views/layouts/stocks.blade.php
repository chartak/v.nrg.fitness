<section class="stocks" id="stocks">
    <div class="stocks__wrapper wrapper">
        @if(isset($stocks))
            <?php $act = 0; ?>
            @foreach($stocks as $stock)
                @if($act == 0)
                    <?php $act = 2; ?>
                    <div class="stocks__container stocks__click" style="background-image: url('{{$stock->photo->getUrl('l')}}')">
                        <span class="stocks__info stocks__info_date">До {{date('d.m.Y',strtotime($stock->end_date))}}</span>
                        <span class="stocks__info stocks__info_other">{{$stock->name}}</span>
                        <a class="stocks__button button" href="javascript:void(0)">КУПИТЬ КАРТУ</a>
                    </div>

                    <div class="stocks__tabs">
                        <div class="stocks__tabs-item active" data_stock_id="{{$stock->id}}">
                        <picture>
                            <source data-srcset="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}" type="image/webp">
                            <img class="stocks__miniature" data-src="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}">
                        </picture>
                            <!-- <img class="stocks__miniature" data-src="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}" alt=""> -->
                            <span class="stocks__tabs-date">До {{date('d.m.Y',strtotime($stock->end_date))}}</span>
                            <span class="stocks__tabs-other">{{$stock->name}}</span>
                        </div>
                        @else
                            <div class="stocks__tabs-item" data_stock_id="{{$stock->id}}">
                        <picture>
                            <source data-srcset="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}" type="image/webp">
                            <img class="stocks__miniature" data-src="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}">
                        </picture>
                                <!-- <img class="stocks__miniature" data-src="{{$stock->photo_stock->getUrl('m')}}" data-image="{{$stock->photo->getUrl('l')}}" alt=""> -->
                                <span class="stocks__tabs-date">До {{date('d.m.Y',strtotime($stock->end_date))}}</span>
                                <span class="stocks__tabs-other">{{$stock->name}}</span>
                            </div>
                        @endif
                        @endforeach
                    </div>
                @endif
    </div>
    <div class="stocks__wrapper wrapper stock__flex-form">
   <form class="form form_dark special-form">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="subPageStocksId" name="sub_page_stock_name" id="subPageStocksId">
            <label class="form__input-wrap">
                <span class="form__input-text">Имя</span>
                <input class="form__input not_remove" type="text" name="name">
                <span class="form__error">Поле Имя обязательно для заполнения</span>
            </label>
            <label class="form__input-wrap">
                <span class="form__input-text">Телефон</span>
                <input class="form__input form__input_phone not_remove" type="text" name="phone" inputmode="text">
                <span class="form__error">Поле Телефон обязательно для заполнения</span>
            </label>
            <label class="form__agreement">
                <input class="form__agreement-checkbox" type="checkbox" checked="">
                <p class="form__agreement-text">Я согласен на обработку персональных данных</p>
            </label>
            <button class="form__button button active" type="submit">Получить</button>
            <div class="form__success lazyload">
                <a class="modal__close lazyload" href="javascript:void(0)"></a>
                <p>Спасибо за заявку!</p>
                <p>Мы свяжемся с вами в течение 30 минут!</p>
                <p class="light_grey">А пока предлагаем вам <br> посмотреть наш</p>
                <div class="success__flex-column lazyload">
                <a href="https://www.instagram.com/nrgfitness.ru/" target="_blank">
                    <img data-src="{{asset('public/frontend/img/insta__success.png')}}" alt="logo" class="success__logo">
                </a>
                    <span class="success__icon">Наш адрес: ул. Лобачевского, 74</span>
                    <a href="https://www.yandex.ru/profile/102513177366" target="_blank">Посмотреть на карте</a>
                </div>
    </div>
        </form>
   </div>
    <div id="timer" class="countdown wrapper"></div>
</section>
