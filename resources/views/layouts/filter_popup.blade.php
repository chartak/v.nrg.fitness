<div class="flitempopup"><!-- ui-modal--active ui-modal--visible ui-modal--overlay-closer ui-modal--zoom-->
    <div class="ui-modal-overlay cloaserflpopitem" style="min-height: 100%;min-width: 100%;transition-duration:600ms;"></div> <!-- ui-modal-overlay--closer-->
    <div class="ui-modal-placefl" style="animation-duration:600ms;">
        <div class="ui-modal-content">
            <div class="ui-modal-content-inner">
            <div class="loader__svg-popup lazyload"></div>
                <div  class="rf-wrapper">
                    <header class="rf-header">
                        <div class="closer closerflpopitem lazyload">
                            <div class="closer-icon"></div>
                        </div>
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
                    <div class="rf-content">
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
                                <p>Спасибо!<br>Ваша заявка успешно отправлена.</p>
                                <p>В ближайшее время наши менеджеры свяжутся с Вами.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
