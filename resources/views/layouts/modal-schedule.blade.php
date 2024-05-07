<div class="modal__schedule">
    <div class="modal__container">
        <header class="modal__header">
            <h2  class="form-header-title">Запись на тренировку</h2>
            <div  class="form-topdata">
            <div  class="form-topdata-item">
                <div  class="form-topdata-label">День:</div>
                <div  class="form-topdata-value weekdate"></div>
            </div>
            <div  class="form-topdata-item">
                <div  class="form-topdata-label">Время:</div>
                <div  class="form-topdata-value getingtime"></div>
            </div>
            <div  class="form-topdata-item">
                <div  class="form-topdata-label">Тренер:</div>
                <div  class="form-topdata-value getingtrname"></div>
            </div>
            <div  class="form-topdata-item">
                <div  class="form-topdata-label">Тренировка:</div>
                <div  class="form-topdata-value getingtrainingname"></div>
            </div>
        </div>
        </header>
        <form class="modal__form form form_light">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="" name="tr_schedule_id" id="trScheduleId">
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
            <label class="form__input-wrap">
                <span class="form__input-text">Комментарий</span>
                <input class="form__input not_remove form__input_message" type="text" name="message">
                <span class="form__error">Поле Комментарий обязательно для заполнения</span>
            </label>
            <label class="form__agreement">
                <input class="form__agreement-checkbox" type="checkbox" checked>
                <p class="form__agreement-text">Я согласен на обработку персональных данных</p>
            </label>
            <button class="form__button button active" type="submit" id="signUpButton">Записаться</button>
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
