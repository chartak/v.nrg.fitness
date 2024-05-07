<div class="modal__wrapper wrapper">

    <div class="modal__container">

        <header class="modal__header">
        <img src="" class="stock__photo" alt="">
            <h2 class="modal__title title">Запишись на первую тренировку</h2>
            <span class="modal__additional"></span>
            <span class="modal__additional-field"></span>

            <div class="modal__card cards__cover lazyload">
                <span class="cards__name"></span>
                <span class="cards__description"></span>
            </div>
        </header>

        <form class="modal__form form form_light">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="" name="sign_up_type_id" id="signUpTypeId">
            <input type="hidden" value="" name="sign_up_type" id="signUpType">
            <input type="hidden" value="" name="sign_up_name" id="signUpName">
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
            <p class="text__popup-trainers"></p>
            <label class="form__agreement">
                <input class="form__agreement-checkbox" type="checkbox" checked>
                <p class="form__agreement-text">Я согласен на обработку персональных данных</p>
            </label>
            <button class="form__button button active" type="submit" id="signUpButton">Записаться</button>
            <a target="_blank" class="cards__policy" href="https://nrg.fitness/policy"></a>
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