<div class="modal__special lazyload">

    <div class="modal__container">

        <header class="modal__header">
            <h2 class="modal__title title">Получите специальное предложение</h2>

            <div class="modal__special-row">
                @if(isset($specialOfferServices))
                    <?php $active = 0; $class = ' active'; ?>
                    @foreach($specialOfferServices as $key => $service)
                        @if($active > 0)
                            <?php $class=""; ?>
                        @endif
                            <?php $active++ ?>
                        <p class="modal__special-item{{$class}}" data-specoffer-type-id="{{$service->id}}"><span>{{$service->name}}</span>
                            {{--{{$service->name}}--}}
                            {!! strip_tags(($service->description)) !!}
                        </p>
                    @endforeach
                @endif
            </div>
        </header>

        <form class="modal__form form form_light special-form">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="" name="special_offer_type_id" id="specialOfferTypeId">
            <input type="hidden" value="Special Offer" name="specialOfferSignUpType" id="specialOfferSignUpType">
            <input type="hidden" value="Спецпредложение" name="specialOfferSignUpTypeRu">
            <label class="form__input-wrap">
                <span class="form__input-text">Имя</span>
                <input class="form__input" type="text" name="name">
                <span class="form__error">Поле Имя обязательно для заполнения</span>
            </label>
            <label class="form__input-wrap">
                <span class="form__input-text">Телефон</span>
                <input class="form__input form__input_phone ym-record-keys" type="text" name="phone">
                <span class="form__error">Поле Телефон обязательно для заполнения</span>
            </label>
            <label class="form__agreement">
                <input class="form__agreement-checkbox" type="checkbox" checked>
                <p class="form__agreement-text">Я согласен на обработку персональных данных</p>
            </label>
            <button class="form__button button active" type="submit" id="specialButton" onclick="ym(65140885,'reachGoal','specoff_top')">Получить</button>
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

    <a class="modal__close lazyload" href="javascript:void(0)"></a>
</div>
