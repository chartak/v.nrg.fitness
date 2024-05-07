<div class="modal__freeze">

    <div class="modal__container">

        <header class="modal__header">
            <h2 class="modal__title title">Заморозка карты</h2>
            <span class="modal__additional"></span>
            <span class="modal__additional-field"></span>

            <div class="modal__card cards__cover lazyload">
                <span class="cards__name"></span>
                <span class="cards__description"></span>
            </div>
        </header>

        <form class="modal__form form form_light">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="freeze" name="modal_freeze_id" id="modelFreeze">
            <label class="form__input-wrap">
                <span class="form__input-text">Номер карты</span>
                <input class="form__input" type="text" name="card_number">
                <span class="form__error">Поле Номер карты обязательно для заполнения</span>
            </label>
            <label class="form__input-wrap">
                <span class="form__input-text">ФИО</span>
                <input class="form__input" type="text" name="name">
                <span class="form__error">Поле Имя обязательно для заполнения</span>
            </label>
            <!-- <div class="flex__input"> -->
            <label class="form__input-wrap active__date">
                <span class="form__input-text">Срок от:</span>
                <input class="form__input datetimepicker" placeholder="____/__/__ __:__" name="start_date" type="text">
                <span class="form__error">Поле обязательно для заполнения</span>
            </label>
            <label class="form__input-wrap active__date">
                <span class="form__input-text">Срок до:</span>
                <input class="form__input datetimepicker" placeholder="____/__/__ __:__" name="end_date" type="text">
                <span class="form__error">Поле обязательно для заполнения</span>
            </label>
            <!-- </div> -->
            <label class="form__input-wrap">
                <span class="form__input-text">Телефон</span>
                <input class="form__input form__input_phone ym-record-keys" type="text" name="phone">
                <span class="form__error">Поле Телефон обязательно для заполнения</span>
            </label>
            <label class="form__agreement">
               <ul class="visit__agreement">
                    <li>НЕОЖИДАННАЯ ПОЕЗДКА ИЛИ <br> ЗАПЛАНИРОВАННЫЙ ОТДЫХ?</li>
                    <div class="t849__icon"> <div class="t849__lines"> <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="2px" fill="#fff" fill-rule="evenodd" stroke-linecap="square"> <g transform="translate(1.000000, 1.000000)" stroke="#222222" class="svg_g"> <path d="M0,11 L22,11"></path> <path d="M11,0 L11,22"></path> </g> </g> </svg> </div> <div class="t849__circle" style="background-color: transparent;"></div> </div>
                </ul>
                <div class="visit__body">
                    <br>
                    <p>Не переживайте, мы все понимаем. Теперь Вы можете “заморозить” свою клубную карту на время отсутствия и лимит тренировок останется при Вас.</p>
                    <br>
<p>Для того чтобы заморозить карту Вам необходимо заполнить номер карты, срок заморозки (должен быть не менее 5 дней), Ваши ФИО и контактный телефон. За подробной информацией обращайтесь в отдел продаж клуба с 10 до 22 часов. <br> Тел.: <a href="tel:+74992888528">+7 (499) 288-85-28</a></p>
                </div>
            </label>
            <button class="form__button button active" type="submit" id="signUpButton">Заморозить</button>
            <div class="form__success lazyload">
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
