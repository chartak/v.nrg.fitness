<form class="contact__form form form_dark">
<input type="checkbox" name="checkbox_th" class="checkbox_th">
    <input type="hidden" value="1" name="first_type_id" id="firstTypeId">
    <input type="hidden" value="First Training" name="firstSignUpType" id="firstSignUpType">
    <input type="hidden" value="Первую тренировку" name="firstSignUpTypeRu">
    <h2 class="form__title title">Запишись на первую тренировку прямо сейчас</h2>
    <label class="form__input-wrap">
        <span class="form__input-text">Имя</span>
        <input class="form__input not_remove" type="text" name="name">
        <span class="form__error">Поле Имя обязательно для заполнения</span>
    </label>
    <label class="form__input-wrap">
        <span class="form__input-text">Телефон</span>
        <input class="form__input not_remove form__input_phone ym-record-keys" type="text" name="phone">
        <span class="form__error">Поле Телефон обязательно для заполнения</span>
    </label>
    <label class="form__agreement">
        <input class="form__agreement-checkbox" type="checkbox" checked>
        <p class="form__agreement-text">Я согласен на обработку персональных данных</p>
    </label>
    <button class="form__button button active" type="submit" id="contactButton" onclick="ym(65140885,'reachGoal','footer_form')">Записаться</button>
    <div class="form__success form__success-dark lazyload">
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
                <a class="modal__close lazyload" href="javascript:void(0)"></a>
    </div>
</form>