<!--slider for instagram photos-->

<div class="instaphotopop ui-modal--active ui-modal--visible ui-modal--overlay-closer ui-modal--fade">
    <div class="ui-modal-overlay ui-modal-overlay--closer"
         style=" min-width: 100%; min-height: 100%;transition-duration:600ms;"></div>
    <div class="ui-modal-place" style="animation-duration:600ms;">
        <div class="ui-modal-content">
            <div class="ui-modal-content-inner">
                <div data-v-489040ae="" class="carousel carousel--inModal carousel--insta">
                    <div data-v-489040ae="" class="carousel-closer">
                        <div data-v-489040ae="" class="carousel-closer-icon"></div>
                    </div>
                    <div data-v-489040ae="" class="carousel-view-place">
                        <div data-v-489040ae=""
                             class="carousel-view ui-slider ui-slider--follow-finger ui-slider--touched ui-slider--slide">
                            <div class="ui-slider-wrapper carousel-view-wrapper"
                                 style="transform: translateX(-2059px); transition: transform 300ms ease 0ms;">

                                <div class="ui-slider-slide carousel-view-item">
                                    <img data-v-1dfc72cc="" data-v-489040ae=""
                                         src=""
                                         draggable="false" class="carousel-view-item-img">
                                </div>


                            </div>
                        </div>
                        <div data-v-489040ae="" class="carousel-view-controll carousel-view-controll--prev">
                            <div data-v-68d58660="" data-v-489040ae="" class="control control--left"
                                 style="width: 54px; height: 54px; border-radius: calc(27px);">
                                <div data-v-68d58660="" class="control-arrow"></div>
                            </div>
                        </div>
                        <div data-v-489040ae="" class="carousel-view-controll carousel-view-controll--next">
                            <div data-v-68d58660="" data-v-489040ae="" class="control control--right"
                                 style="width: 54px; height: 54px; border-radius: calc(27px);">
                                <div data-v-68d58660="" class="control-arrow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end slider for instagram photos-->


<!--custom slider popup-->
@if(isset($services))
    @foreach($services as $key => $service)
        <div
            class="ui-modalcustomsl  ui-modalcustom--active ui-modal--visiblecustom ui-modal--overlay-closer ui-modalcustom--fade cloasersl"
            id="{{'uslugphotossl'.$key}}">
            <div class="ui-modalcustom-overlay ui-modal-overlaycustom--closer" style="transition-duration:600ms;"></div>
            <div class="ui-modal-placecustom" style="animation-duration:600ms;">
                <div class="ui-modal-contentcustom">
                    <div class="ui-modal-contentcustom-inner">
                        <div data-v-489040ae=""
                             class="carouselcustom carouselcustom--inModal carouselcustom--default cusformob">
                            <div data-v-489040ae="" class="carouselcustom-closer">
                                <div data-v-489040ae="" class="carouselcustom-closer-icon"></div>
                            </div>
                            <div data-v-489040ae="" class="carouselcustom-view-place">
                                <div data-v-489040ae=""
                                     class="carouselcustom-view ui-slidercustom ui-slidercustom--follow-finger ui-slidercustom--touched ui-slidercustom--slide">
                                    <div class="ui-slidercustom-wrapper carouselcustom-view-wrapper"
                                         style="transform: translateX(0px); transition: transform 300ms ease 0ms;">
                                        <div class="mnl" style="height:600px;width: 100%;margin:auto"
                                             data-flickity='{ "wrapAround": true }'>
                                            @foreach($service->photo as $k => $p)
                                                <div
                                                    class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item ">
                                                    <img data-v-1dfc72cc="" data-v-489040ae=""
                                                         src="{{asset($p->getUrl())}}" draggable="false"
                                                         class="carouselcustom-view-item-img marg">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

<!--end custom slider-->

<!--gallery slider-->

<div
    class="ui-modalcustomsl  ui-modalcustom--active ui-modal--visiblecustom ui-modal--overlay-closer ui-modalcustom--fade cloasersl"
    id="gallery0">
    <div class="ui-modalcustom-overlay ui-modal-overlaycustom--closer" style="transition-duration:600ms;"></div>
    <div class="ui-modal-placecustom" style="animation-duration:600ms;">
        <div class="ui-modal-contentcustom">
            <div class="ui-modal-contentcustom-inner">
                <div data-v-489040ae=""
                     class="carouselcustom carouselcustom--inModal carouselcustom--default cusformob">
                    <div data-v-489040ae="" class="carouselcustom-closer">
                        <div data-v-489040ae="" class="carouselcustom-closer-icon"></div>
                    </div>
                    <div data-v-489040ae="" class="carouselcustom-view-place">
                        <div data-v-489040ae=""
                             class="carouselcustom-view ui-slidercustom ui-slidercustom--follow-finger ui-slidercustom--touched ui-slidercustom--slide">
                            <div class="ui-slidercustom-wrapper carouselcustom-view-wrapper"
                                 style="transform: translateX(0px); transition: transform 300ms ease 0ms;">
                                <div class="gsl" style="height:600px;width: 100%;margin:auto"
                                     data-flickity='{ "wrapAround": true }'>
                                    @if(isset($phGallery))
                                        @foreach($phGallery as $pg)
                                            @foreach($pg->photo as $k=>$g)

                                                <div
                                                    class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item ">
                                                    <img data-v-1dfc72cc="" data-v-489040ae=""
                                                         src="{{asset($g->getUrl())}}" draggable="false"
                                                         class="carouselcustom-view-item-img marg">
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end gallery slider-->

<!--instagram slider-->


<div class="ui-modalcustomsl  ui-modalcustom--active ui-modal--visiblecustom ui-modal--overlay-closer ui-modalcustom--fade cloasersl" id="instagram0">
    <div class="ui-modalcustom-overlay ui-modal-overlaycustom--closer" style="transition-duration:600ms;">

        <div data-v-489040ae="" class="carousel-closerinst"><div data-v-489040ae="" class="carousel-closer-icon-insta"></div></div>
    </div>


    <div class="ui-modal-placeinsta" style="animation-duration:600ms;">
        <div data-v-489040ae="" class="carousel-viewinst ui-slider ui-slider--follow-finger ui-slider--touched ui-slider--slide">
            <div class="ui-slider-wrapper carousel-view-wrapper" style="transform: translateX(0px); transition: transform 300ms ease 0ms;">
                <div class="inst" style="width: 100%;margin:auto" data-flickity='{ "wrapAround": true }' >
           <div class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item carinsta">
                 <img data-v-1dfc72cc="" data-v-489040ae="" src="{{asset('frontend/images/banner2.jpg')}}" draggable="false" style="height:500px;" class="carouselcustom-view-item-img">
                  </div>
               <div class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item carinsta">
             <img data-v-1dfc72cc="" data-v-489040ae="" src="{{asset('frontend/images/slid11.jpg')}}" draggable="false" style="height:500px;" class="carouselcustom-view-item-img">
                </div>
             <div class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item carinsta">
              <img data-v-1dfc72cc="" data-v-489040ae="" src="{{asset('frontend/images/banner3.jpeg')}}" draggable="false" style="height:500px;" class="carouselcustom-view-item-img">
                </div>
                <div class="ui-slidercustom-slide ui-slidercustom-slide--active carouselcustom-view-item carinsta">
                 <img data-v-1dfc72cc="" data-v-489040ae="" src="{{asset('frontend/images/banner1.jpg')}}" draggable="false" style="height:500px;" class="carouselcustom-view-item-img">
                 </div>
               </div>
            </div>
        </div>
    </div>


</div>


<!--end instagram slider-->
