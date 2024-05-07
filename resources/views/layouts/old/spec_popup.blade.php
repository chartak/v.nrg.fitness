<!-- specpredlajenia popup-->

<div class="ui-modalspec ui-modal--full ui-modal--active ui-modal--visible ui-modal--fadeUp">
    <div class="ui-modal-overlay ui-modal-overlay--closer" style="transition-duration:600ms;"></div>
    <div class="ui-modal-placespec" style="animation-duration:600ms;">
        <div class="ui-modal-contentspec">
        <div class="ui-modal-content" style="">
            <div class="ui-modal-content-inner">
                <div data-v-f885a3de="" class="offers">
                    <svg data-v-f885a3de="" version="1.1" viewBox="0 0 116 45" class="offers-logo svg-icon svg-fill">
                        <g fill="#ffd132">
                            <path fill="#000000" stroke="none" pid="0"
                                  d="M60.845 18.826H73.6v6.55H60.845V37.95H53.47V5.87h22.312v6.55H60.845v6.406zM87.796 5.883v32.08h-7.374V5.882h7.374zM107.908 12.539v25.423h-7.356V12.54h-8.116V5.883H116v6.656h-8.092zM0 0v45h44.82V0H0zm11.082 40.302L3.78 18.272l5.767-1.708 3.268 11.312 3.928-13.42 6.882-2.072-8.81 26.793-3.732 1.125zm20.296-6.031l-6.526 1.905-3.56-10.717 2.966-8.966 1.52 5.048 1.85 6.383 5.897-20.136 8.128-2.382-10.275 28.865z"></path>
                        </g>
                    </svg>
                    <div data-v-00edd878="" data-v-f885a3de="" class="closer closerspec">
                        <div data-v-00edd878="" class="closer-icon"></div>
                    </div>
                    <div data-v-f885a3de="" class="offers-content">
                        <div class="content">
                            <div data-v-f885a3de="" class="wrapper">
                                <div data-v-f885a3de="" class="offers-title">Получите специальное<br data-v-f885a3de="">предложение
                                </div>
                                <div data-v-f885a3de="" class="offers-separator">
                                    <div data-v-f885a3de="" class="offers-separator-label">Услуги</div>
                                </div>
                                <form action="" id="specialOfferForm" method="post" name="specialOfferForm">
                                <div data-v-f885a3de="" class="offers-list">
                                    @if(isset($specialOfferServices))
                                        <?php $active = 0; $class = ' offers-item--active'; ?>
                                        @foreach($specialOfferServices as $key => $service)
                                            @if($active > 0)
                                                <?php $class=""; ?>
                                            @endif
                                            <?php $active++ ?>
                                            <div data-v-f885a3de="" class="offers-item offeritemspec{{$class}}" special_offer_type_id="{{$service->id}}">
                                                <div data-v-f885a3de="" class="offers-item-title">{{$service->name}}</div>
                                                <div data-v-f885a3de="" class="offers-item-description">{!! substr($service->description,0,150) !!} </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <input type="hidden" value="" name="special_offer_type_id" id="specialOfferTypeId">
                                <input type="hidden" value="Special Offer" name="specialOfferSignUpType" id="specialOfferSignUpType">
                                <input type="hidden" value="Спецпредложение" name="specialOfferSignUpTypeRu">
                                <div data-v-f885a3de="" class="offers-separator">
                                    <div data-v-f885a3de="" class="offers-separator-label">Контактная информация</div>
                                </div>
                                <div data-v-f885a3de="" class="offers-form-place">
                                    <div data-v-f885a3de="" class="offers-form special-show">
                                        <div data-v-f885a3de="" class="offers-form-item">
                                            <div data-v-a01fbd60="" data-v-f885a3de="" class="ui-input namhid ui-input--danger" data-vv-as="Ваше имя">
                                                <div data-v-a01fbd60="" class="ui-input-control-wrapper">
                                                    <label data-v-a01fbd60="" class="ui-input-label contactname">Ваше имя</label>
                                                    <input data-v-a01fbd60="" name="name" autocomplete="off" class="ui-input-control myinputcontroll" labelclass="contactname" errorhid="namhid">
                                                    <div data-v-a01fbd60="" class="ui-input-error-indicator namhid1" style="display:flex">
                                                        <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                                                    </div>
                                                    <div data-v-a01fbd60="" class="ui-input-error">Поле Ваше имя обязательно для заполнения.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-v-f885a3de="" class="offers-form-item">
                                            <div data-v-a01fbd60="" data-v-f885a3de="" class="ui-input telhid" data-vv-as="Номер телефона">
                                                <div data-v-a01fbd60="" class="ui-input-control-wrapper">
                                                    <label data-v-a01fbd60="" class="ui-input-label contactphone">Номер телефона</label>
                                                    <input data-v-a01fbd60="" name="tel" autocomplete="off" class="ui-input-control maskphon myinputcontroll" labelclass="contactphone" errorhid="telhid">
                                                    <div data-v-a01fbd60="" class="ui-input-error-indicator telhid1">
                                                        <div data-v-a01fbd60="" class="ui-input-error-indicator-icon"></div>
                                                    </div>
                                                    <div data-v-a01fbd60="" class="ui-input-error">Поле Телефон обязательно для заполнения.</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div data-v-f885a3de="" class="offers-form-item">
                                            <button data-v-49615d1c="" data-v-f885a3de="" type="button" id="formButtonSendSpecialOffer"
                                                    class="ui-btn ui-btn--full">Получить
                                            </button>
                                        </div>
                                    </div>


                                    <div data-v-f885a3de="" class="offers-thankyou  special-tank">
                                        <div data-v-f885a3de="" class="offers-thankyou-icon">
                                            <svg data-v-f885a3de="" version="1.1" viewBox="0 0 26 20"
                                                 class="svg-icon svg-fill" style="width: 26px; height: 20px;">
                                                <path pid="0" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M25.34.69a2.219 2.219 0 0 0-3.217 0L9.186 14.228l-5.29-5.595a2.258 2.258 0 0 0-3.251.034c-.863.939-.863 2.433.016 3.389l6.817 7.107.1.121a2.182 2.182 0 0 0 3.234 0L25.34 4.062c.879-.939.879-2.45 0-3.371z"
                                                fill="#fff"></path>
                                            </svg>
                                        </div>
                                        <div data-v-f885a3de="" class="offers-thankyou-label">
                                            <div data-v-f885a3de="" class="offers-thankyou-title">Готово! Ваша
                                            заявка успешно отправлена!
                                            </div>
                                            <div data-v-f885a3de="" class="offers-thankyou-text">Менеджеры проверят
                                                заявку и в ближайшее время свяжутся с Вами.
                                            </div>
                                        </div>
                                     </div>

                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <span class="ui-spinner-overlay ui-spinner-root" style="z-index: 10; position: absolute; background: rgba(0, 0, 0, 0.7);">
                        <span class="ui-spinner-place">
                            <span class="ui-spinner">
                                <div class="ui-spinner-bounce" style="background: white;"></div>
                                <div class="ui-spinner-bounce" style="background: white;"></div>
                                <div class="ui-spinner-bounce" style="background: white;"></div>
                            </span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
<!--end specpredlajenia popup-->
