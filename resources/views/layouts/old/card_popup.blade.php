<!--card popup-->


<div style="    width: 100%;height: 100%;position: fixed;z-index: 11111111111111;display:none;" id="cardpopupcloaser">
    <div class="ui-modal-overlaytriner trinermodalactive ui-modal-overlay--closer clcardpop"
         style="transition-duration:600ms;"></div>
    <div class="ui-modal-place" style="transition-duration:600ms;max-width: 695px;">
        <div class="ui-modal-contentcard">
        <header data-v-e24b8bd8="" class="rf-header">
            <div data-v-00edd878="" data-v-e24b8bd8="" class="closer closercard">
                <div data-v-00edd878="" class="closer-icon"></div>
            </div>
            <h2 data-v-e24b8bd8="" class="form-header-title">Заказ клубной карты</h2>

        </header>


        <div data-v-e24b8bd8="" class="rf-content">


            <div class="carentcard">

                <div class="ui-slider-slide cards-item" style="margin-bottom: 35px;">
                    <div data-v-5746b6ea="" data-v-33e0d202="" class="card-item card-item--ordering hoveroff"
                         style="box-shadow: none;">
                        <div data-v-5746b6ea="" class="card-item-content">
                            <div data-v-5746b6ea="" class="card-item-content-item">
                                <div data-v-5746b6ea="" class="card-item-label">Возраст</div>
                                <div data-v-5746b6ea="" class="card-item-value" id="oldcardnew">нет ограничений</div>
                            </div>
                            <div data-v-5746b6ea="" class="card-item-content-item">
                                <div data-v-5746b6ea="" class="card-item-label">Время</div>
                                <div data-v-5746b6ea="" class="card-item-value" id="timecardnew">по расписанию</div>
                            </div><!----><!----><!---->
                            <div data-v-5746b6ea="" class="card-item-content-item">
                                <div data-v-5746b6ea="" class="card-item-label">Заморозка</div>
                                <div data-v-5746b6ea="" class="card-item-value" id="datecartnew">30 дней</div>
                            </div>
                            <div data-v-5746b6ea="" class="card-item-content-item card-item-content-item--btn">

                            </div>
                        </div>
                        <div data-v-5746b6ea="" class="card-item-card" style="background-color: rgb(96, 0, 250);"
                             id="cardsvgnew">
                            <svg data-v-5746b6ea="" version="1.1" viewBox="0 0 116 45"
                                 class="card-item-card-logo svg-icon svg-fill">
                                <g fill="#ffd132">
                                    <path fill="white" stroke="none" pid="0"
                                          d="M60.845 18.826H73.6v6.55H60.845V37.95H53.47V5.87h22.312v6.55H60.845v6.406zM87.796 5.883v32.08h-7.374V5.882h7.374zM107.908 12.539v25.423h-7.356V12.54h-8.116V5.883H116v6.656h-8.092zM0 0v45h44.82V0H0zm11.082 40.302L3.78 18.272l5.767-1.708 3.268 11.312 3.928-13.42 6.882-2.072-8.81 26.793-3.732 1.125zm20.296-6.031l-6.526 1.905-3.56-10.717 2.966-8.966 1.52 5.048 1.85 6.383 5.897-20.136 8.128-2.382-10.275 28.865z"></path>
                                </g>
                            </svg>
                            <div data-v-5746b6ea="" class="card-item-card-name">Семейная</div>
                            <div data-v-5746b6ea="" class="card-item-card-desc">Семейная</div>
                        </div>
                    </div>
                </div>


            </div>

            <form action="" id="cardForm" method="post" name="cardForm">
            <div data-v-e24b8bd8="" class="form">
                <div data-v-e24b8bd8="" class="form-item">
                    <input type="hidden" value="" name="card_type_id" id="cardTypeId">
                    <input type="hidden" value="ClubCart" name="cardSignUpType" id="cardSignUpType">
                    <input type="hidden" value="Клубные карты" name="cardSignUpTypeRu">
                    <div data-v-a01fbd60="" class="ui-input namhid" data-vv-as="Имя" data-v-e24b8bd8="">
                        <div data-v-a01fbd60="" class="ui-input-control-wrapper">
                            <label data-v-a01fbd60="" class="ui-input-label contactname">Имя</label>
                            <input data-v-a01fbd60="" name="name" autocomplete="off"
                                   class="ui-input-control myinputcontroll" labelclass="contactname" errorhid="namhid">

                            <div data-v-a01fbd60="" class="ui-input-error-indicator namhid1">
                                <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                            </div>
                            <div data-v-a01fbd60="" class="ui-input-error">Поле Имя обязательно для заполнения.</div>
                        </div>
                    </div>
                </div>
                <div data-v-e24b8bd8="" class="form-item">
                    <div data-v-a01fbd60="" class="ui-input telhid" data-vv-as="Телефон" data-v-e24b8bd8="">
                        <div data-v-a01fbd60="" class="ui-input-control-wrapper"><label data-v-a01fbd60=""
                                                                                        class="ui-input-label contactphone">Телефон</label><input
                                data-v-a01fbd60="" name="tel" autocomplete="off"
                                class="ui-input-control maskphon myinputcontroll" labelclass="contactphone" errorhid="telhid">
                            <div data-v-a01fbd60="" class="ui-input-error-indicator telhid1">
                                <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                            </div>
                            <div data-v-a01fbd60="" class="ui-input-error">Поле Телефон обязательно для заполнения.</div>
                        </div>
                    </div>
                </div>
                <div data-v-e24b8bd8="" class="form-item">
                    <label class="ui-checkbox ui-checkbox--checked" data-v-e24b8bd8="">

                        <input type="checkbox" checked name="" class="ui-checkbox-input jsradio" value="true">

                        <div class="ui-checkbox-draw">
                            <div class="ui-checkbox-draw-icon"></div>
                        </div>

                        <div class="ui-checkbox-label">Я согласен на обработку персональных данных</div>
                    </label></div>
                <div data-v-e24b8bd8="" class="form-buttons">
                    <button data-v-49615d1c="" type="button" class="ui-btn form-buttons-send" data-v-e24b8bd8="" id="formButtonSendCard">
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
<!--end card  popup-->
