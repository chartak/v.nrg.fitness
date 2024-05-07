<!--triner popup-->
<div style="width: 100%;height: 100%;position: fixed;z-index: 11111111111111111;display:none;" id="trinerpopupcloaser">
    <div class="ui-modal-overlaytriner trinermodalactive ui-modal-overlay--closer cltrpop"
         style="transition-duration:600ms;"></div>
    <div class="ui-modal-place" style="transition-duration:600ms;">
        <div class="ui-modal-contenttriner">
        <header data-v-e24b8bd8="" class="rf-header">
            <div data-v-00edd878="" data-v-e24b8bd8="" class="closer">
                <div data-v-00edd878="" class="closer-icon"></div>
            </div>
            <h2 data-v-e24b8bd8="" class="form-header-title">Запись на тренировку</h2>
            <div data-v-e24b8bd8="" class="form-topdata">
                <div data-v-e24b8bd8="" class="form-topdata-item">
                    <div data-v-e24b8bd8="" class="form-topdata-label">Тренер:</div>
                    <div data-v-e24b8bd8="" class="form-topdata-value trname"></div>

                    <div data-v-e24b8bd8="" class="form-topdata-label">Описание:</div>
                    <div data-v-e24b8bd8="" class="form-topdata-value trdesc"></div>
                </div>
            </div>
        </header>


        <div data-v-e24b8bd8="" class="rf-content">
            <form action="" id="trainerForm" method="post" name="trainerForm">
            <div data-v-e24b8bd8="" class="form">
                <div data-v-e24b8bd8="" class="form-item">
                    <input type="hidden" value="" name="trainer_type_id" id="trainerTypeId">
                    <input type="hidden" value="Treainer" name="trainerSignUpType" id="trainerSignUpType">
                    <input type="hidden" value="Тренеры" name="trainerSignUpTypeRu">
                    <div data-v-a01fbd60="" class="ui-input namhid" data-vv-as="Имя" data-v-e24b8bd8="">
                        <div data-v-a01fbd60="" class="ui-input-control-wrapper">

                            <label data-v-a01fbd60="" class="ui-input-label contactname">Имя</label>

                            <input data-v-a01fbd60="" name="name" autocomplete="off" class="ui-input-control myinputcontroll" labelclass="contactname"  errorhid="namhid">

                            <div data-v-a01fbd60="" class="ui-input-error-indicator namhid1">
                                <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                            </div>
                            <div data-v-a01fbd60="" class="ui-input-error">Поле Имя обязательно для заполнения.</div>
                        </div>
                    </div>
                </div>
                <div data-v-e24b8bd8="" class="form-item">
                    <div data-v-a01fbd60="" class="ui-input telhid" data-vv-as="Телефон" data-v-e24b8bd8="">
                        <div data-v-a01fbd60="" class="ui-input-control-wrapper">
                            <label data-v-a01fbd60="" class="ui-input-label contactphone">Телефон</label>
                            <input data-v-a01fbd60="" name="tel" autocomplete="off" class="ui-input-control maskphon myinputcontroll" labelclass="contactphone" errorhid="telhid">
                            <div data-v-a01fbd60="" class="ui-input-error-indicator telhid1">
                                <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                            </div>
                            <div data-v-a01fbd60="" class="ui-input-error">Поле Телефон обязательно для заполнения.</div>
                        </div>
                    </div>
                </div><!---->
                <div data-v-e24b8bd8="" class="form-item">
                    <label class="ui-checkbox ui-checkbox--checked" data-v-e24b8bd8="">

                        <input type="checkbox" checked name="" class="ui-checkbox-input jsradio" value="true">

                        <div class="ui-checkbox-draw">
                            <div class="ui-checkbox-draw-icon"></div>
                        </div>

                        <div class="ui-checkbox-label">Я согласен на обработку персональных данных</div>
                    </label></div>
                <div data-v-e24b8bd8="" class="form-buttons">
                    <button data-v-49615d1c="" type="button" class="ui-btn form-buttons-send" data-v-e24b8bd8="" id="formButtonSendTrainer">
                        Записаться
                    </button>
                </div>
            </div>
            </form>
            <div data-v-8fe9dfde="" class="thank-you" data-v-e24b8bd8="">
                <div data-v-8fe9dfde="" class="thank-you-content">
                    <div data-v-8fe9dfde="" class="thank-you-icon">
                        <svg data-v-8fe9dfde="" version="1.1" viewBox="0 0 26 20" class="svg-icon svg-fill"
                             style="width: 26px; height: 20px;">
                            <path pid="0" fill-rule="evenodd" clip-rule="evenodd"
                                  d="M25.34.69a2.219 2.219 0 0 0-3.217 0L9.186 14.228l-5.29-5.595a2.258 2.258 0 0 0-3.251.034c-.863.939-.863 2.433.016 3.389l6.817 7.107.1.121a2.182 2.182 0 0 0 3.234 0L25.34 4.062c.879-.939.879-2.45 0-3.371z"
                                  fill="#fff"></path>
                        </svg>
                    </div>
                    <div data-v-8fe9dfde="" class="thank-you-header"><p data-v-8fe9dfde="">Спасибо!</p>
                        <p data-v-8fe9dfde="">Ваша заявка успешно отправлена.</p></div>
                    <div data-v-8fe9dfde="" class="thank-you-text">В ближайшее время наши менеджеры свяжутся с Вами.
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
<!--triner popup-->

