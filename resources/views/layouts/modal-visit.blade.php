<div class="modal__visit">

    <div class="modal__container">

        <header class="modal__header">
            <h2 class="modal__title title">Записаться на посещение клуба</h2>
            <span class="modal__additional"></span>
            <span class="modal__additional-field"></span>

            <div class="modal__card cards__cover lazyload">
                <span class="cards__name"></span>
                <span class="cards__description"></span>
            </div>
        </header>

        <form class="modal__form form form_light">
        <input type="checkbox" name="checkbox_th" class="checkbox_th">
            <input type="hidden" value="visit" name="modal_visit_id" id="modelVisit">
            <label class="form__input-wrap">
                <span class="form__input-text">ФИО</span>
                <input class="form__input" type="text" name="name">
                <span class="form__error">Поле Имя обязательно для заполнения</span>
            </label>
            <label class="form__input-wrap">
                <span class="form__input-text">Телефон</span>
                <input class="form__input form__input_phone ym-record-keys" type="text" name="phone">
                <span class="form__error">Поле Телефон обязательно для заполнения</span>
            </label>
            <select class="form__select" name="day_visit">
                <option value="" disabled selected style="display: none;">Дата посещения</option>
                <option value="сегодня">сегодня</option>
                <option value="завтра">завтра</option>
            </select>
            <div class="flex__input">
            <select class="form__select" name="arrival_time">
                <option value="" disabled selected style="display: none;">Время прихода</option>
                <option value="00:00">00:00</option>
                <option value="01:00">01:00</option>
                <option value="02:00">02:00</option>
                <option value="03:00">03:00</option>
                <option value="04:00">04:00</option>
                <option value="05:00">05:00</option>
                <option value="06:00">06:00</option>
                <option value="07:00">07:00</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
            </select>
            <select class="form__select" name="leaving_time">
                <option value="" disabled selected style="display: none;">Время ухода</option>
                <option value="00:00">00:00</option>
                <option value="01:00">01:00</option>
                <option value="02:00">02:00</option>
                <option value="03:00">03:00</option>
                <option value="04:00">04:00</option>
                <option value="05:00">05:00</option>
                <option value="06:00">06:00</option>
                <option value="07:00">07:00</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
            </select>
            </div>
            <label class="form__agreement">
               <ul class="visit__agreement">
                    <li>Пожалуйста, откажитесь <br> от посещения клуба, если</li>
                    <div class="t849__icon"> <div class="t849__lines"> <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="2px" fill="#fff" fill-rule="evenodd" stroke-linecap="square"> <g transform="translate(1.000000, 1.000000)" stroke="#222222" class="svg_g"> <path d="M0,11 L22,11"></path> <path d="M11,0 L11,22"></path> </g> </g> </svg> </div> <div class="t849__circle" style="background-color: transparent;"></div> </div>
                </ul>
                <div class="visit__body">
<p>— вы чувствуете признаки ОРВИ или гриппа (температура 37℃ и выше, головная боль, слабость, насморк, кашель, затруднённое дыхание)</p>
<br>
<p>— ваш тест на COVID-19 был положительным менее, чем 14 дней назад</p>
<br>
<p>— вы контактировали с заражённым менее, чем 14 дней назад</p>
<br>
<p>Мы провели огромную работу и надеемся, что вы оцените это и будете соблюдать те требования по гигиене и дистанцированию, которые позволят нам работать, а вам заниматься фитнесом безопасно.</p>
                </div>
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
