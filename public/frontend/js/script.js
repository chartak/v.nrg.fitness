$(document).ready(function() {
  // $.datetimepicker.setLocale('ru');
  jQuery('.datetimepicker').datetimepicker({
    timepicker:true,
    mask:true,
    lang: "ru"
   });
  $("input[name='name']").on('input', function(e){
    this.value = this.value.replace(/[0-9]/g,'');
      });
  $(".form__success-dark .modal__close").click(function(){
    $(this).parents(".form__success-dark").removeClass("active")
  })
  $(".stock__flex-form .modal__close").click(function(){
    $(this).parents(".form__success").removeClass("active")
  })
  $(document).mouseup(function (e) {
    var div = $(".form__success-dark");
    if (!div.is(e.target)
      && div.has(e.target).length === 0
      || $('.modal__close').is(e.target)) {
      div.removeClass("active")
    }
  });
  if (screen.width > 750) {
    $(".media__video").height($(".media__inst").outerHeight() - 10)
}
  $(".dropdown__wrapper .ui-option").each(function(p, param){
    if($(param).attr("href") == window.location.href ){
      $(param).addClass("active")
    }
    })

  //fixed menu
  var menu = $('.header');
  var menuPosition;
  $(window).on('scroll', function() {
    var menuCoords = menu.offset();
    var windowScroll = $(this).scrollTop();
    if (!menuPosition) {
      menuPosition = menuCoords.top;
    }
    if(windowScroll > 0) {
      $('.header').addClass('scrolled');
    } else {
      menuPosition = false;
      $('.header').removeClass('scrolled');
    }
  });


  //stocks tabs
  //   $('.stocks__container').css('background-image', 'url(' + formated_data_bg+'.webp'+')');
    var activeTabwclick = $('.stocks__tabs-item.active');
    var is_Edgewclick = navigator.userAgent.indexOf("Edge") > -1;
    var is_safariwclick = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    var is_explorerwclick= typeof document !== 'undefined' && !!document.documentMode && !is_Edgewclick;
    var activeJpgwclick = activeTabwclick.children('picture').children('img').attr('data-image');
    var activeWebpwclick = activeTabwclick.children('picture').children('source').attr('data-image');
    if (is_safariwclick || is_explorerwclick){
        $('.stocks__container').css('background-image', 'url(' +activeJpgwclick+')');
        // $(".media__video").css('background', 'url(/public/frontend/img/video-prev.jpg) no-repeat center / cover')
    }else {
        $('.stocks__container').css('background-image', 'url(' +activeWebpwclick+')');
        // $(".media__video").css('background', 'url(/public/frontend/img/video-prev.webp) no-repeat center / cover')
    }
  $('.stocks__tabs-item').click(function () {
    $(this).siblings('.stocks__tabs-item').removeClass('active');
    $(this).addClass('active');
    var activeTab = $('.stocks__tabs-item.active');
      // var activeImage = activeTab.children('.stocks__miniature').attr('data-image');
      //browser detect
      var is_Edge = navigator.userAgent.indexOf("Edge") > -1;
      var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
      var is_explorer= typeof document !== 'undefined' && !!document.documentMode && !is_Edge;
      //get images(webp,jpg)
      var activeJpg = activeTab.children('picture').children('img').attr('data-image');
      var activeWebp = activeTab.children('picture').children('source').attr('data-image');
      // var formated_data_bg = activeImage.substr(0, activeImage.lastIndexOf("."));
      // var lastformatdata_bg = formated_data_bg + ".webp";

      //

      if (is_safari || is_explorer){
          $('.stocks__container').css('background-image', 'url(' +activeJpg+')');
      }else {
          $('.stocks__container').css('background-image', 'url(' +activeWebp+')');
      }

      var activeDate = activeTab.children('.stocks__tabs-date').text();
    $('.stocks__info_date').text(activeDate);
    var activeOther = activeTab.children('.stocks__tabs-other').text();
    $('.stocks__info_other').text(activeOther);
  })

  // timer
  $.syotimerLang.ru = {
    second: ['Секунд', 'Секунд'],
    minute: ['Минут', 'Минут'],
    hour: ['Часов', 'Часов'],
    day: ['Дней', 'Дней']
};
	$('#timer').syotimer({
    year: 2020,
    month: 8,
    day: 17,
    // month: 11,
    // day: 28,
    hour: 0,
    minute: 0,
    second: 0,
    headTitle:'<h2>Срок действия акции кончается через</h2>',
    lang:'ru',
    periodic: true,
    periodInterval: 3,
    periodUnit: 'd'
    });
    $(".stocks__tabs-item:first-child").find(".stocks__tabs-date").hide()
    $(".stocks__info_date").hide()
    $(".stocks__info_other").show()
    $(".stocks__tabs-item").not(".stocks__tabs-item:first-child").click(function(){
      $(".countdown").hide();
      $(".stocks__info_date").show()
      $(".stocks__info_other").hide()
    })
    $(".stocks__tabs-item:first-child").click(function(){
      $(".countdown").show();
      $(".stocks__info_date").hide()
      $(".stocks__info_other").show()
    })
    if($(window).width() < 900){
      $(".stocks__tabs-item:first-child").find(".stocks__tabs-other").hide()
      $(".stocks__info_other").hide()
      $(".stocks__tabs-item").not(".stocks__tabs-item:first-child").click(function(){
        $(".stocks__tabs-other").not(".stocks__tabs-item:first-child .stocks__tabs-other").show()
        $(this).find(".stocks__tabs-other").hide()
        $(".stocks__info_other").hide()
        $(".stocks__tabs-item:first-child .stocks__tabs-other").show()
      })
      $(".stocks__tabs-item:first-child").click(function(){
        $(this).find(".stocks__tabs-other").hide()
        $(".stocks__info_date").hide()
        $(".stocks__info_other").hide()
        $(".stocks__tabs-other").not(".stocks__tabs-item:first-child .stocks__tabs-other").show()
      })
    }
  //services tabs old
  // $('.services__tabs-item').click(function () {
  //   $(this).siblings('.services__tabs-item').removeClass('active');
  //   $(this).addClass('active');
  //
  //   var tagNum = $(this).attr('data-num');
  //   $('.services__item').removeClass('active');
  //   var activeItem = $('.services__item').filter(function(){return $(this).data("num")   == tagNum});
  //   activeItem.addClass('active');
  //
  //   if(activeItem.hasClass('loaded')) {
  //
  //   } else {
  //     var activeImages = activeItem.find('img');
  //     for(var i = 0; i < activeImages.length; i++) {
  //       var imgSrc = activeImages[i].getAttribute('data-src');
  //       activeImages[i].setAttribute('src', imgSrc);
  //       activeImages[i].removeAttribute('data-src');
  //     }
  //     activeItem.addClass('loaded');
  //   }
  //
  //   if($(window).width() < 1000) {
  //     var activeSlider = activeItem.find('.services__slider');
  //     var servicesSliderNew = new Swiper (activeSlider, {
  //       direction: 'horizontal',
  //       speed: 500,
  //       slidesPerView: 'auto',
  //       spaceBetween: 30,
  //       loop: true
  //     })
  //   }
  // })
    //services tabs new
    $('.services__tabs-item').click(function () {
        $(this).siblings('.services__tabs-item').removeClass('active');
        $(this).addClass('active');

        var tagNum = $(this).attr('data-num');
        $('.services__item').removeClass('active');
        var activeItem = $('.services__item').filter(function(){return $(this).data("num")   == tagNum});
        activeItem.addClass('active');
    })
    var tagNum = $(this).attr('data-num');
    var activeItem = $('.services__item').filter(function(){return $(".services__tabs-item").data("num")   == tagNum});
    if(!activeItem.hasClass('loaded')) {
        activeItem.addClass('loaded');
    }

    if($(window).width() < 1000) {
        var activeSlider = activeItem.find('.services__slider');
        var servicesSliderNew = new Swiper (activeSlider, {
            direction: 'horizontal',
            speed: 500,
            slidesPerView: 'auto',
            spaceBetween: 30,
            loop: true
        })
    }


  //smooth scrolling
  $(".header__menu ul a, .header__logo, .footer__up").on("click", function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({scrollTop: top - 50}, 600);
  });


  //sliders
  if($('div').is('.trainers__slider')) {
    var trainersSlider = new Swiper ('.trainers__slider', {
      direction: 'horizontal',
      speed: 500,
      slidesPerView: 'auto',
      centeredSlides: true,
      navigation: {
        nextEl: '.trainers__arrow-next',
        prevEl: '.trainers__arrow-prev'
      },
      breakpoints: {
        500: {
          centeredSlides: false
        }
      }
    })
  }
  if($('div').is('.cards__slider')) {
    var cardsSlider = new Swiper ('.cards__slider', {
      direction: 'horizontal',
      loop: true,
      speed: 500,
      slidesPerView: 1,
      slidesPerColumn: 1,
      slidesPerColumnFill: 'row',
      centeredSlides: true,
      spaceBetween: 0,
      navigation: {
        nextEl: '.cards__arrow-next',
        prevEl: '.cards__arrow-prev'
      },
      breakpoints: {
        1300: {
          centeredSlides: false,
          slidesPerView: 3,
          spaceBetween: 0
        },
        750: {
          centeredSlides: false,
          slidesPerView: 2,
          spaceBetween: 0
        }
      }
    })
  }
    if($('div').is('.gallery__slider')) {
        var gallerySlider = new Swiper ('.gallery__slider', {
            direction: 'horizontal',
            speed: 500,
            slidesPerView: 'auto',
            spaceBetween: 15,
            loop: false,
            preloadImages: false,
            lazy: true,
            lazy: {
                loadPrevNext: true,
                loadPrevNextAmount: 4
            },
            navigation: {
                nextEl: '.gallery__arrow-next',
                prevEl: '.gallery__arrow-prev'
            },
            breakpoints: {
                500: {
                    loop: true,
                    centeredSlides: false,
                    spaceBetween: 30
                }
            }
        })
    }
  if(($('div').is('.services__slider')) && ($(window).width() < 1000)) {
    var servicesSlider = new Swiper ('.services__slider', {
      direction: 'horizontal',
      speed: 500,
      slidesPerView: 'auto',
      spaceBetween: 15,
      loop: false,
      breakpoints: {
        500: {
          spaceBetween: 30
        }
      }
    })
  }
  var modalServicesSlider = new Swiper ('.modal__slider_services', {
    direction: 'horizontal',
    speed: 500,
    slidesPerView: 1,
    loop: false,
    navigation: {
      nextEl: '.modal__arrow-next',
      prevEl: '.modal__arrow-prev'
    },
    keyboard: {
      enabled: true,
      onlyInViewport: false,
    },
     on: {
       touchStart: function() {
         modalServicesSlider.update();
         return true;
       }
     }
  })
    var schedule__slider = new Swiper ('.schedule__slider', {
        direction: 'horizontal',
        paginationClickable: true,
        spaceBetween: 10,
        // loop: true,
        navigation: {
            nextEl: '.prev-next-button.next',
            prevEl: '.prev-next-button.previous'
        },
        breakpoints: {
          300: {
            slidesPerView: 1,
            initialSlide: 0,
            spaceBetween: 100,
            centeredSlides: false,
          },
          767: {
            slidesPerView: 2,
            initialSlide: 0,
            spaceBetween: 10,
            centeredSlides: true
          },
          1110: {
                slidesPerView: 4,
              initialSlide: 0,
              centeredSlides: true,
              spaceBetween: 50
          },
           1500: {
              slidesPerView: 5,
              centerInsufficientSlides: true,
              initialSlide: 0,
              centeredSlides: true,
          },
          1700: {
            slidesPerView: 7,
            centerInsufficientSlides: true,
            initialSlide: 0,
            centeredSlides: true,
        }
               }
    })
  //modal
  $('.button:not(.form__button):not(.nakedlabs__button), .media__video-play, .services__slider-item, .gallery__image, .flpop, .span__popup, .stocks__click, .cards__slider-wrapper').click(function(e) {

    if ($(this).hasClass('stocks__button') || $(this).hasClass('stocks__click')) {
      setTimeout(function() {
        $('.modal__wrapper').addClass('active modal_stocks');
        $(".modal_stocks .form__button").attr("onclick", "ym(65140885,'reachGoal','zapis_offers')")
        $(".modal_stocks .form__button").text("Купить карту")
          // $(".modal").css({"visibility": "visible"})
          // $(".modal__close").css({"visibility": "visible"})
          // $(".form__button.active").css({"z-index": "99999"}) //, "visibility": "visible"
      }, 200)
      var activeTabclick = $('.stocks__tabs-item.active');
      var stock_id = activeTabclick.attr('data_stock_id');
      setPopupData(stock_id,"Stock","Акции");
        var is_Edgeclick = navigator.userAgent.indexOf("Edge") > -1;
        var is_safariclick = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        var is_explorerclick= typeof document !== 'undefined' && !!document.documentMode && !is_Edgeclick;
        var activeJpgclick = activeTabclick.children('picture').children('img').attr('data-image');
        var activeWebpclick = activeTabclick.children('picture').children('source').attr('data-image');
        if (is_safariclick || is_explorerclick){
          $('.modal__header .stock__photo').attr("src", activeJpgclick) //css('background-image', 'url(' +activeJpgclick+')');
      }else {
          $('.modal__header .stock__photo').attr("src", activeWebpclick) //css('background-image', 'url(' +activeWebpclick+')');
      }
    }
    else if ($(this).hasClass("flpop")){
      setTimeout(function() {
        $('.modal__schedule').addClass('active wrapper');
        $(".modal__schedule .form__button").attr("onclick", "ym(65140885,'reachGoal','zapis_trenirovka_raspisanie')")
        $(".modal__schedule .form__button").text("Записаться")
      }, 200)
    }
    else if ($(this).hasClass("oferta__popup")){
      setTimeout(function() {
        $('.modal__oferta').addClass('active wrapper');
      }, 200)
      $('.modal__title').text('Договор оферты');
    }
    else if ($(this).hasClass("policy__popup")){
      setTimeout(function() {
        $('.modal__policy').addClass('active wrapper');
      }, 200)
      $('.modal__title').text('Политика конфиденциальности');
    }
    else if ($(this).hasClass("freeze__popup")){
      setTimeout(function() {
        $('.modal__freeze').addClass('active wrapper');
        $(".modal__freeze .form__button").attr("onclick", "ym(65140885,'reachGoal','zamorozka_popup')")
        $(".modal__freeze .form__button").text("Заморозить")
      }, 200)
      $('.modal__title').text('Заморозка карты');
    }
    else if ($(this).hasClass('schedule__button')) {
      setTimeout(function() {
        $('.modal__wrapper').addClass('active modal_schedule');
        $(".modal_schedule .form__button").text("Записаться")
      }, 200)
      var activeTabclick2 = $('.schedule__slider .swiper-slide-active .tt-day-events .action').attr('data-sch__image');
      var stock_id2 = $('.schedule__slider .swiper-slide-active .tt-day-events .action').attr('data_stock_id');
      setPopupData(stock_id2,"Stock","Акции");

      var $image2 = activeTabclick2;
      var formated = $image2.substr(0, $image2.lastIndexOf("."));
      var lastformat = formated + ".webp";
      var $imageS2 = activeTabclick2
      var $webp = $imageS2.substr($imageS2.lastIndexOf('.') + 1).trim();


        var is_Edgeclick = navigator.userAgent.indexOf("Edge") > -1;
        var is_safariclick = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        var is_explorerclick= typeof document !== 'undefined' && !!document.documentMode && !is_Edgeclick;
        var activeJpgclick = activeTabclick2
        var activeWebpclick = activeTabclick2
        if (is_safariclick || is_explorerclick){
          $('.modal__header .stock__photo').attr("src", $imageS2);
        }else {
          $('.modal__header .stock__photo').attr("src", lastformat);
        }
    }
    else if ($(this).hasClass('header__button')) {
      $('body').addClass('no-scroll');
      setTimeout(function() {
        $('.modal__special').addClass('active');
      }, 200)
      $('.modal__title').text('Получите специальное предложение');

      $('#specialOfferTypeId').val($('.modal__special-item.active').attr('data-specoffer-type-id'));
      //tabs
      $('.modal__special-item').click(function () {
        $(this).siblings('.modal__special-item').removeClass('active');
        $(this).addClass('active');
        $('#specialOfferTypeId').val($(this).attr('data-specoffer-type-id'));
      })
    }

    else if ($(this).hasClass('services__button')) {
      setTimeout(function() {
        $('.modal__header .stock__photo').attr("src", "")
        $('.modal__wrapper').addClass('active modal_services');
        $(".modal_services .form__button").attr("onclick", "ym(65140885,'reachGoal','zapis_uslugi')")
        $(".modal_services .form__button").text("Запросить информацию")
          // $(".modal").css({"visibility": "visible"})
          // $(".modal__close").css({"visibility": "visible"})
          // $(".form__button.active").css({"z-index": "99999"}) //, "visibility": "visible"
      }, 200)
      $('.modal__title').text('Узнать больше информации об услугах');
      $('.modal__additional').text('Тип занятия:');
      var activeTab = $('.services__tabs-item.active');
      var active_tab_name = activeTab.text();
      $('.modal__additional-field').text(active_tab_name);
      var service_id = activeTab.attr('data-num');
      setPopupData(service_id,"Service","Услуги");
    }

    else if ($(this).hasClass('trainers__button')) {
      setTimeout(function() {
        $('.modal__header .stock__photo').attr("src", "")
        $('.modal__wrapper').addClass('active modal_trainers');
        $(".modal_trainers .form__button").attr("onclick", "ym(65140885,'reachGoal','zapis_trener')")
        $(".modal_trainers .text__popup-trainers").text("В течение 20 минут с вами свяжется наш менеджер и согласует удобное для вас расписание персональных тренировок")
        $(".modal_trainers .form__button").text("Записаться")
          // $(".modal").css({"visibility": "visible"})
          // $(".modal__close").css({"visibility": "visible"})
          // $(".form__button.active").css({"z-index": "99999"}) //, "visibility": "visible"
      }, 200)
      $('.modal__title').text('Запись на персональную тренировку');
      var activeTrainer = $(this).parent('.trainers__slider-wrapper').find('.trainers__name');
      $('.modal__additional-field').text(activeTrainer.text());
      $('.modal__additional').text('Тренер:');
      setPopupData(activeTrainer.attr('data-tr-id'),"Treainer","Тренеры");
    }

    else if ($(this).hasClass('cards__slider-wrapper')) {
      setTimeout(function() {
        $('.modal__header .stock__photo').attr("src", "")
        $('.modal__wrapper').addClass('active modal_cards');
        $(".modal_cards .form__button").attr("onclick", "ym(65140885,'reachGoal','buy_card')")
        $(".modal_cards .form__button").text("Оформить")
        $(".modal_cards .cards__policy").text("Политика конфиденциальности")
          // $(".modal").css({"visibility": "visible"})
          // $(".modal__close").css({"visibility": "visible"})
          // $(".form__button.active").css({"z-index": "99999"}) //, "visibility": "visible"
      }, 200)
      $('.modal__title').text('Заказ клубной карты');
      var activeCard = $(this).find('.cards__cover');
      var cardName = activeCard.find('.cards__name');
      var cardDesc = activeCard.find('.cards__description');
      var cardColor = activeCard.attr('style');
      $('.modal__card .cards__name').text(cardName.text());
      $('.modal__card .cards__description').text(cardDesc.text());
      $('.modal__card').attr('style', cardColor);
      setPopupData(activeCard.attr('data-card-id'),"ClubCart","Клубные карты");
    }

    // else if ($(this).hasClass('media__video-play')) {
    //   setTimeout(function() {
    //     $('.modal__widget').addClass('active modal_video');
    //   }, 200)
    //   $(document).mouseup(function (e) {
    //     var div = $(".modal__widget");
    //     if (!div.is(e.target)
    //       && div.has(e.target).length === 0
    //       || $('.modal__close').is(e.target)) {
    //       $('.modal__video').trigger('pause');
    //     }
    //   });
    // }
    else if ($(this).hasClass('services__slider-item')) {
      setTimeout(function() {
        $('.modal__widget').addClass('active modal_gallery');
      }, 200)
      // var targetImage = $(this).find('img').attr('data-image');
        var $data_image = $(this).find('img').attr('data-image');
        var formated_data = $data_image.substr(0, $data_image.lastIndexOf("."));
        var lastformatdata = formated_data + ".webp";
        var $data_imageS = $(this).find('img').attr('data-image');
        // var $webp = $data_imageS.substr($data_imageS.lastIndexOf('.') + 1).trim();
      modalServicesSlider.addSlide(1, [
        '<div class="modal__slider-item swiper-slide"><picture><source srcset="' + lastformatdata + '" type="image/webp"/><img src="' + $data_imageS + '" alt="" /></picture></div>'
      ]);
      var images = $(this).siblings('.services__slider-item');
      for(var i = 0; i < images.length; i++) {

          // if($(this).attr("data-image")) {
              var $data_image1 = images[i].querySelector('img').getAttribute('data-image');
              var formated_data1 = $data_image1.substr(0, $data_image1.lastIndexOf("."));
              var lastformatdata1 = formated_data1 + ".webp";
              var $data_imageS1 = images[i].querySelector('img').getAttribute('data-image');
              // var $webp = $data_imageS1.substr($data_imageS1.lastIndexOf('.') + 1).trim();
          // }

        // var image = images[i].querySelector('img').getAttribute('data-image');
        modalServicesSlider.addSlide(2, [
          '<div class="modal__slider-item swiper-slide"><picture><source srcset="' + lastformatdata1 + '" type="image/webp"/><img src="' + $data_imageS1 + '" alt="" /></picture></div>'
        ]);
      }

      $(document).mouseup(function (e) {
        var div = $(".modal__widget");
        if (!div.is(e.target)
          && div.has(e.target).length === 0
          || $('.modal__close').is(e.target)) {
          modalServicesSlider.removeAllSlides();
        }
      });
    }

    else if ($(this).hasClass('gallery__image')) {
      setTimeout(function() {
        $('.modal__widget').addClass('active modal_gallery');
      }, 200)
      // var targetImage = $(this).find('img').attr('data-image');
        var $data_image1g = $(this).find('img').attr('data-image');
        var formated_data1g = $data_image1g.substr(0, $data_image1g.lastIndexOf("."));
        var lastformatdata1g = formated_data1g + ".webp";
        var $data_imageS1g = $(this).find('img').attr('data-image');
      modalServicesSlider.addSlide(1, [
        '<div class="modal__slider-item swiper-slide"><picture><source srcset="' + lastformatdata1g + '" type="image/webp"/><img src="' + $data_imageS1g + '" alt="" /></picture></div>'
      ]);
      var slides = $(this).closest('.gallery__slider-item').siblings('.gallery__slider-item');
      var images = slides.find('img');
      for(var i = 0; i < images.length; i++) {
        // var image = images[i].getAttribute('data-image');
          var $data_imageg = images[i].getAttribute('data-image');
          var formated_datag = $data_imageg.substr(0, $data_imageg.lastIndexOf("."));
          var lastformatdatag = formated_datag + ".webp";
          var $data_imageSg = images[i].getAttribute('data-image');
        modalServicesSlider.addSlide(2, [
          '<div class="modal__slider-item swiper-slide"><picture><source srcset="' + lastformatdatag + '" type="image/webp"/><img src="' + $data_imageSg + '" alt="" /></picture></div>'
        ]);
      }

      $(document).mouseup(function (e) {
        var div = $(".modal__widget");
        if (!div.is(e.target)
          && div.has(e.target).length === 0
          || $('.modal__close').is(e.target)) {
          modalServicesSlider.removeAllSlides();
        }
      });
    }

    else if($(this).hasClass('cards__tab')){

        var url_tab = $(this).attr('href');
        window.open(url_tab);
        return false;
    }

    $('.modal').fadeIn();
    $('body').addClass('no-scroll');

    $(document).mouseup(function (e) {
      var div = $(".modal__wrapper, .modal__freeze, .modal__widget, .modal__special, .modal__oferta, .modal__policy, .modal__schedule, .xdsoft_datetimepicker");
      if (!div.is(e.target) && div.has(e.target).length === 0 || $('.modal__close').is(e.target)) {
        $('.modal').fadeOut();
        $('body').removeClass('no-scroll');
        $('.modal__wrapper').removeClass('active modal_stocks modal_schedule modal_services modal_trainers modal_cards modal_special');
        $('.modal__widget').removeClass('active modal_widget modal_video modal_gallery');
        $('.modal__special').removeClass('active');
        $(".modal__freeze").removeClass("active")
        $(".modal__oferta").removeClass("active")
        $(".modal__policy").removeClass("active")
        $(".modal__schedule").removeClass("active")
        $('.modal__header').css('background-image', '');
          // $(".form__success").css({"visibility": "hidden", "display": "none"})
        $(".form__input").not(".not_remove").val('');
        $(".text__popup-trainers").text("");
        $(".form__success").removeClass('active');
        $(".form__success-dark").removeClass('active');
      }
    });


    $(document).keydown( function (e) {
      if(e.keyCode === 27) {
        $('.modal').fadeOut()
        $('body').removeClass('no-scroll')
        $('.modal__wrapper').removeClass('active modal_stocks modal_schedule modal_services modal_trainers modal_cards modal_special');
        $('.modal__widget').removeClass('active modal_widget modal_video modal_gallery');
        $('.modal__special').removeClass('active');
        $(".modal__freeze").removeClass("active")
        $(".modal__oferta").removeClass("active")
        $(".modal__policy").removeClass("active")
        $(".modal__schedule").removeClass("active")
        $('.modal__header').css('background-image', '');
          // $(".form__success").css({"visibility": "hidden", "display": "none"})
        $(".form__input").val('');
        $("input").val('');
      }
    });

  })

  function setPopupData(s_type_id, s_type, s_type_name){
    $('#signUpTypeId').val(s_type_id);
    $('#signUpType').val(s_type);
    $('#signUpName').val(s_type_name);
  }

  //mobile menu
  $('.btn-menu').click(function () {
    $('.header').toggleClass('active');
    $('.btn-menu').toggleClass('active');
    $('.scroll-hide-show').toggleClass('no-scroll');
    $('.header__menu a, .header__logo').not(".header__button-club").click(function () {
      $('.header').removeClass('active');
      $('.btn-menu').removeClass('active');
      $('.scroll-hide-show').removeClass('no-scroll');
    })
  })

  if($(window).width() < 1200) {
    $(document).mouseup(function (e) {
      var div = $(".header__button-club, .header__menu-wrapper, .btn-menu");
      if (!div.is(e.target) && div.has(e.target).length === 0) {
        $('.header').removeClass('active');
        $('.btn-menu').removeClass('active');
        $('.scroll-hide-show').removeClass('no-scroll');
      }
    });
}

  //yandex map
  // if($('div').is('.contact__map')) {
  //   ymaps.ready(init);
  //   function init(){
  //     // Создание карты.
  //     var myMap = new ymaps.Map("map", {
  //       center: [55.675188,37.491467],//37.491502%2C55.674945 37.491467%2C55.675188
  //       zoom: 17,
  //       controls: []
  //     });
  //   }
  // }

  //form inputs animate
  $(".form__input").focus( function () {
    var focusEl = $(this);
    focusEl.parent('.form__input-wrap').addClass("active");
    $(document).mouseup(function (e) {
      if (!focusEl.is(e.target) && focusEl.has(e.target).length === 0) {
        if(focusEl.val() === '') {
          focusEl.parent('.form__input-wrap').removeClass("active");
        }
      }
    });
  });
  //phone validation
  $(".form__input_phone").inputmask({ //
    mask: "+7 (A99) 999-99-99[9]", 
    showMaskOnHover: false,
    definitions: {
      'A': {
        validator: "[0-6-9]", 
        placeholder: "_"
      }
    }
  })

  //ajax forms
  $('.form__agreement').click( function(){
    if ($(this).find('.form__agreement-checkbox').is(":not(:checked)")){
      $(this).closest('.form').find('.form__button').removeClass('active');
    } else {
      $(this).closest('.form').find('.form__button').addClass('active');
    }
  })

    $('.form').submit(function (event) {
        event.preventDefault();
        var form = $(this)
        var errors = false;
        $(this).find('input').each(function (i, elem) {

            if ($(elem).val() == "") {
                $(elem).css('border-color', '#ffd132');
                $(elem).siblings('.form__error').css('display', 'block');
                $(document).mouseup(function (e) {
                    if (!form.is(e.target)
                        && form.has(e.target).length === 0) {
                        form.find('input').css('border-color', '#cbcbcb');
                        form.find('.form__error').css('display', 'none');
                    }
                })
                errors = true;
            } else {
                $(elem).css('border-color', '#cbcbcb');
                $(elem).siblings('.form__error').css('display', 'none');
            }
        });

        $(this).find('select').each(function (i, elem) {

            if ($(elem).val() == "" || $(elem).val() == null) {
                $(elem).css('border-color', '#ffd132');
                //$(elem).siblings('.form__error').css('display', 'block');
                $(document).mouseup(function (e) {
                    if (!form.is(e.target)
                        && form.has(e.target).length === 0) {
                        form.find('select').css('border-color', '#cbcbcb');
                        //form.find('.form__error').css('display', 'none');
                    }
                })
                errors = true;
            } else {
                $(elem).css('border-color', '#cbcbcb');
                //$(elem).siblings('.form__error').css('display', 'none');
            }
        });

        $(this).find('.form__agreement-checkbox').each(function (i, elem) {
            if ($(elem).is(":not(:checked)")) {
                // form.find('.form__button').removeClass('active');
                errors = true;
            } else {
                // form.find('.form__button').addClass('active');
            }
        })

        // errors = false;
        if (errors == false) {
            var aData = $(this).serializeArray();
            var data_f;
            //console.log(aData);

            if(aData[0].name == 'tr_schedule_id'){
                var schedule_id = aData[0].value;
                var name = aData[1].value;
                var phone = aData[2].value.replace(/ /g, '').replace("(", '').replace(")", '').replace("-", '').replace("-", '');
                var message_text = aData[3].value;
                data_f = {schedule_id: schedule_id, full_name: name, phone: phone, message: message_text}
            } else if(aData[0].name == 'modal_visit_id') {
                var visit_id = aData[0].value;
                var name = aData[1].value;
                var phone = aData[2].value.replace(/ /g, '').replace("(", '').replace(")", '').replace("-", '').replace("-", '');
                var day_visit = aData[3].value;
                var arrival_time = aData[4].value;
                var leaving_time = aData[5].value;
                data_f = {
                    visit_id: visit_id,
                    full_name: name,
                    phone: phone,
                    day_visit: day_visit,
                    arrival_time: arrival_time,
                    leaving_time: leaving_time
                }
            } else if(aData[0].name == 'modal_freeze_id') {
                var freeze_id = aData[0].value;
                var card_number = aData[1].value;
                var name = aData[2].value;
                var start_date = aData[3].value;
                var end_date = aData[4].value;
                var phone = aData[5].value.replace(/ /g, '').replace("(", '').replace(")", '').replace("-", '').replace("-", '');
                data_f = {
                    freeze_id: freeze_id,
                    card_number: card_number,
                    full_name: name,
                    start_date: start_date,
                    end_date: end_date,
                    phone: phone
                }
            } else if(aData[0].name == 'sub_page_stock_name') {
                var sub_page_stock = aData[0].value;
                var name = aData[1].value;
                var phone = aData[2].value.replace(/ /g, '').replace("(", '').replace(")", '').replace("-", '').replace("-", '');
                data_f = {sub_page_stock: sub_page_stock, full_name: name, phone: phone}
            } else {
                var type_id = aData[0].value;
                var sign_up_type = aData[1].value;
                var sign_up_type_name = aData[2].value;
                var name = aData[3].value;
                var phone = aData[4].value.replace(/ /g, '').replace("(", '').replace(")", '').replace("-", '').replace("-", '');
                data_f = {type_id: type_id, type: sign_up_type, type_name: sign_up_type_name, full_name: name, phone: phone}
            }
            var sActionUrl = "/stockform";
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                headers: {'x-csrf-token': CSRF_TOKEN},
                type: "POST",
                url: sActionUrl,
                dataType: 'JSON',
                data: data_f,
                beforeSend: function() {
                    $(".loader__svg-popup").css({"visibility": "visible"})
                },
                success: function (response) {
                    form.find('input').css('border-color', '#cbcbcb');
                    form.find('input').val('');
                    form.find('.form__input-wrap').removeClass("active");
                    form.find('.form__success').addClass('active');
                    // form.find(".form__success").css({"visibility": "visible", "display": "flex"})
                    // $(".modal__close").css({"visibility": "visible"})
                    // $(".modal").css({"visibility": "hidden"})
                    // setTimeout(function () {
                        // form.find(".form__success").removeClass('active');
                        // $('.modal').fadeOut();
                        // $('body').removeClass('no-scroll');
                        // $('.modal__wrapper').removeClass('active modal_stocks modal_schedule modal_services modal_trainers modal_cards modal_special');
                        // $('.modal__widget').removeClass('active modal_widget modal_video modal_gallery');
                        // $('.modal__special').removeClass('active');
                        // $('.modal__header').css('background-image', '');
                        // $(".form__input").val('');
                        // $(".modal__schedule").removeClass("active")
                        // $("input").val("")
                        // location.reload()
                        // $(window).scrollTop(0);
                        // $(".form__success-dark").hide()
                    // }, 3000)
                },
                complete: function() {
                    $(".loader__svg-popup").css({"visibility": "hidden"})
                },
                error: function (response) {
                }
            });
        }
    });

//----////----- START Расписание тренировок-----////------
    var objF = {};
    $('#resetFilters').click(function () {

        $(".section-timetable-group").css({"background-color": "#f8f9fb", "cursor": "pointer"})
        $(".section-timetable-group-icon-place svg, .section-timetable-group-icon-place svg path").attr("fill", "#333")
        $(".section-timetable-group-label").css({"color": "#333"})

        $('.fevent').css('opacity',"0.6")
        $('.fevent').addClass("opasity06");


        $('.fevent').css('pointer-events', "auto")

        $('.is-selected .timedisabl').css('opacity', "1")
        $('.is-selected .timedisabl').css('pointer-events', "auto")

        $('.freeindicator').css('display', 'block')
        $('.freeclear').css('display', 'none')

        $('.weekindicator').css('display', 'block')
        $('.weekclear').css('display', 'none')
        $('.timeindicator').css('display', 'block')
        $('.timecleare').css('display', 'none')
        $('.trinerindicator').css('display', "block")
        $('.trinercleare').css('display', "none")
        $('.getgroupindicator').css('display', "block")
        $('.getgroupcleare').css('display', "none")

        $('#selectvelue').text('Платно?')
        $('#selecttime').text('Время')
        $('#selectedtriner').text('Тренеры')
        $('#selectedgroup').text('Группа')
        $('#selectedweekdey').text('День недели')

        $('.customfilic').removeClass('section-timetable-group--selected')
        $('.heshborderweek').css('border-color', '#d4cece')
        $('.heshborderfree').css('border-color', '#d4cece')
        $('.heshbordertime').css('border-color', '#d4cece')
        $('.heshbordertrinner').css('border-color', '#d4cece')
        $('.heshbordergetgroup').css('border-color', '#d4cece')
        $('.is-selected').css('opacity', "1")
        $('.fevent').removeClass('opasity06')
        $('.fevent').removeClass('opasity03')
        $('.fevent').removeClass('opasity1')
        $('.timedisabl').removeClass('opasity03')
        $('.timedisabl').removeClass('opasity1')
        $('.timedisabl').removeClass('opasity06')
        $('.ffree').removeClass('opasity1')
        $('.fpay').removeClass('opasity03')
        $('.fpay').removeClass('opasity06')

        $('#raspisanie .is-selected').css('opacity', '0.6');
        $('.fevent').removeClass('is-selected');

        if ($('.fevent').hasClass('fmonday')) {
            $('.schedule__slider').css('transform', 'translateX(0)')
            $(".fevent:eq( 0 )").addClass('is-selected')
        } else if ($('.fevent').hasClass('ftuesday')) {
            $('.schedule__slider').css('transform', 'translateX(-18.83%)')
            $(".fevent:eq( 2 )").addClass('is-selected')
        } else if ($('.fevent').hasClass('fwednesday')) {
            $('.schedule__slider').css('transform', 'translateX(-37.67%)')
            $(".fevent:eq( 3 )").addClass('is-selected')
        } else if ($('.fevent').hasClass('fthursday')) {
            $('.schedule__slider').css('transform', 'translateX(-56.5%)')
            $(".fevent:eq( 4)").addClass('is-selected')
        } else if ($('.fevent').hasClass('friday')) {
            $('.schedule__slider').css('transform', 'translateX(-75.34%)')
            $(".fevent:eq( 5 )").addClass('is-selected')
        } else if ($('.fevent').hasClass('fsaturday')) {
            $('.schedule__slider').css('transform', 'translateX( -94.17%)')
            $(".fevent:eq( 6 )").addClass('is-selected')
        }
        objF = {};
        filterTrailer(objF)
    })

//Service tabs filter
    $('.customfilic').click(function(){
        $('.section-timetable-group--selected').attr('triner',0)
        $('.customfilic').removeClass('section-timetable-group--selected')
        $(this).addClass('section-timetable-group--selected')

        var itmactiv=$(this).attr('triner')
        //console.log(itmactiv);
        if(itmactiv==0){
            $('.timedisabl').addClass('opasity03')
            $('.timedisabl').css('pointer-events', 'none');
            //$('#stockTypeId').val(sliid);
            //console.log('='+0);
        }else{
            $('.timedisabl').removeClass('opasity03')
            $('.timedisabl').css('pointer-events', 'auto');
            //console.log('='+1);
        }
        $(this).attr('triner',1)
        objF.serviceid = $(this).attr('data-service');
        $('#fservice_id').val($(this).attr('data-service'));
        filterTrailer(objF);
    })
//Service(mobile version) dropdown filter
    $('.getgroup').click(function () {

        $('.heshbordergetgroup').css('border-color', '')
        $('.getgroupindicator').css('display', "none")
        $('.getgroupcleare').css('display', "block")


        $('#selectedgroup').html($(this).html())


        var selectgroup = $(this).attr('selectgroup');

        $('.fevent').css('pointer-events', 'none');
// $('.fevent').css('opacity','0.3');
        $('.fevent').addClass("opasity03");

        if ($('.' + selectgroup).hasClass('is-selected')) {

            $('.' + selectgroup).css('pointer-events', "auto")
            // $('.'+selecttriner).css('opacity',"1")
            $('.' + selectgroup).addClass("opasity06")
        } else {
            $('.' + selectgroup).css('pointer-events', "none")
            // $('.'+selecttriner).css('opacity',"0.6")
            $('.' + selectgroup).addClass("opasity06")
        }

        objF.serviceid = selectgroup;
        filterTrailer(objF);
    })

    $('.getgroupcleare').click(function(){
        $(this).css('display','none')
        $('.getgroupindicator').css('display','block')
        $('#selectedgroup').html('Группа')
        objF.serviceid = '0';
        filterTrailer(objF);
    })
//----End Service(mobile version) dropdown filter
//day dropdown filter
    $('.week').click(function () {


        $('.heshborderweek').css('border-color', '')
        $('.weekindicator').css('display', 'none')
        $('.weekclear').css('display', 'block')
        $('#selectedweekdey').html($(this).html())
        var fweek = $(this).attr('fweek')
        $('.fevent').removeClass('is-selected');
        $('.' + fweek).addClass('is-selected')
        if (fweek == 'fmonday') {
            $('.flickity-slider').css('transform', 'translateX(0)')
        } else if (fweek == 'ftuesday') {
            $('.flickity-slider').css('transform', 'translateX(-18.83%)')
        } else if (fweek == 'fwednesday') {
            $('.flickity-slider').css('transform', 'translateX(-37.67%)')
        } else if (fweek == 'fthursday') {
            $('.flickity-slider').css('transform', 'translateX(-56.5%)')
        } else if (fweek == 'friday') {
            $('.flickity-slider').css('transform', 'translateX(-75.34%)')
        } else if (fweek == 'fsaturday') {
            $('.flickity-slider').css('transform', 'translateX( -94.17%)')
        }
        objF.day = fweek;
        filterTrailer(objF);
    })
//treainer dropdown filter
    $('.gettriner').click(function () {

        $('.heshbordertrinner').css('border-color', '')
        $('.trinerindicator').css('display', "none")
        $('.trinercleare').css('display', "block")


        $('#selectedtriner').html($(this).html())


        var selecttriner = $(this).attr('selecttriner');

        $('.fevent').css('pointer-events', 'none');
// $('.fevent').css('opacity','0.3');
        $('.fevent').addClass("opasity03");

        if ($('.' + selecttriner).hasClass('is-selected')) {

            $('.' + selecttriner).css('pointer-events', "auto")
            // $('.'+selecttriner).css('opacity',"1")
            $('.' + selecttriner).addClass("opasity06")
        } else {
            $('.' + selecttriner).css('pointer-events', "none")
            // $('.'+selecttriner).css('opacity',"0.6")
            $('.' + selecttriner).addClass("opasity06")
        }

        objF.trainer = selecttriner;
        filterTrailer(objF);
    })
//time dropdown filter
    $('.timefiltr').click(function () {
        $('.heshbordertime').css('border-color', '')

        $('.timeindicator').css('display', 'none')
        $('.timecleare').css('display', 'block')

        $('#selecttime').html($(this).html())

        var taimselected = $(this).attr('taimselected')

        $('.timedisabl').css('pointer-events', 'none');

        // $('.timedisabl').css('opacity','0.3');
        $('.timedisabl').addClass("opasity03");

        var trinername = $('.t' + taimselected).attr('trinernametime');
        console.log(trinername);
        if ($('.' + trinername).hasClass('is-selected')) {
            $('.t' + taimselected).css('pointer-events', "auto")
            // $('.t'+taimselected).css('opacity',"1")
            $('.t' + taimselected).addClass("opasity1")
        } else {
            $('.t' + taimselected).css('pointer-events', "none")
            // $('.t'+taimselected).css('opacity',"0.6")
            $('.t' + taimselected).addClass("opasity06")
        }

        objF.time = taimselected;
        filterTrailer(objF)
    })
//free dropdown filter
    $('.freefiltr').click(function () {
        $('.heshborderfree').css('border-color', '')//#ffd132


        $('.freeindicator').css('display', 'none')
        $('.freeclear').css('display', 'block')
        $('#selectvelue').html($(this).html())
        var ffree = $(this).attr('free');
        $('.timedisabl').css('pointer-events', 'none');
        // $('.timedisabl').css('opacity','0.3');
        $('.timedisabl').addClass("opasity03");

        var confirselect = $('.timedisabl').attr('trinernametime')
        if ($('.' + confirselect).hasClass('is-selected')) {
            $('.' + ffree).css('pointer-events', "auto")
            // $('.'+ffree).css('opacity',"1")
            $('.' + ffree).addClass("opasity1")
            $('.' + ffree).css('pointer-events', "none")
            // $('.'+ffree).css('opacity',"0.6")
            $('.' + ffree).addClass("opasity06")
        }
        objF.pay = ffree;
        filterTrailer(objF)
    })
    //клик на стрелку
$('.ui-select-indicator').click(function(){ //группа
  $(".dropdown-menu").removeClass("show")
  $(this).parent("div").parent().children().children(".dropdown-menu").toggleClass("show")
})
  //клик на стрелку end
    $('.weekclear').click(function(){
        $(this).css('display','none')
        $('.weekindicator').css('display','block')
        $('#selectedweekdey').html('День недели')
        objF.day = 'f0';
        filterTrailer(objF);
    })

    $('.trinercleare').click(function(){
        $(this).css('display','none')
        $('.trinerindicator').css('display','block')
        $('#selectedtriner').html('Тренеры')
        objF.trainer = '0';
        filterTrailer(objF);
    })

    $('.timecleare').click(function(){
        $(this).css('display','none')
        $('.timeindicator').css('display','block')
        $('#selecttime').html('Время')
        objF.time = '0';
        filterTrailer(objF)
    })

    $('.freeclear').click(function(){
        $(this).css('display','none')
        $('.freeindicator').css('display','block')
        $('#selectvelue').html('Платно?')
        objF.pay = '0';
        filterTrailer(objF)
    })

    function filterTrailer(params){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        params._token = CSRF_TOKEN;
        $.ajax({
            type: "POST",
            url:"/filterform",
            dataType: 'JSON',
            //async: false,
            data: params,
            beforeSend: function() {
                // setting a timeout
                //$(placeholder).addClass('loading');
                // console.log('loader show');
                $(".loader__svg").css({"visibility": "visible"})
            },
            success: function(data) {
                $('#containerTS').html(data.ht);
            },
            complete: function() {
                $(".loader__svg").css({"visibility": "hidden"})
                var schedule__slider = new Swiper ('.schedule__slider', {
                  direction: 'horizontal',
                  paginationClickable: true,
                  spaceBetween: 10,
                  // loop: true,
                  navigation: {
                      nextEl: '.prev-next-button.next',
                      prevEl: '.prev-next-button.previous'
                  },
                  breakpoints: {
                    300: {
                      slidesPerView: 2,
                      initialSlide: 0,
                      spaceBetween: 100,
                      centeredSlides: false,
                    },
                    767: {
                      slidesPerView: 4,
                      initialSlide: 0,
                      spaceBetween: 10,
                      centeredSlides: false
                    },
                    1110: {
                          slidesPerView: 6,
                        initialSlide: 0,
                        centeredSlides: true,
                        spaceBetween: 50
                    },
                     1500: {
                        slidesPerView: 7,
                        centerInsufficientSlides: true,
                        initialSlide: 0,
                        centeredSlides: true,
                    }
                         }
              })
                $('.flpop').click(function(){

                    var cls=$(this).attr('clname');
                    var week=$('.'+cls).attr('getweek');
                    var date1=$('.'+cls).attr('getdate');
                    var time1=$('.'+cls).attr('gettime');
                    var trname=$('.'+cls).attr('gettrname');
                    var trainingname=$('.'+cls).attr('gettrainingname');

                    // $('.flitempopup').css('display','block');
                    var height = $(window).height();
                    $('.ui-modal-placefl ').css('max-height',height)
                    $('.ui-modal-placefl ').css('overflow-y','auto')

                    $('.weekdate').html(week+', <br />'+date1);
                    $('.getingtime').html(time1);
                    $('.getingtrname').html(trname);
                    $('.getingtrainingname').html(trainingname);
                    $('#trScheduleId').val(cls.substr(2, cls.length));
                })

                $('.schedule__button').click(function() {
                    setTimeout(function() {
                        $('.modal__wrapper').addClass('active modal_schedule');
                    }, 200)
                    var activeTabclick2 = $('.schedule__slider .swiper-slide-active .tt-day-events .action').attr('data-sch__image');
                    var stock_id2 = $('.schedule__slider .swiper-slide-active .tt-day-events .action').attr('data_stock_id');
                    setPopupData(stock_id2,"Stock","Акции");

                    var $image2 = activeTabclick2;
                    var formated = $image2.substr(0, $image2.lastIndexOf("."));
                    var lastformat = formated + ".webp";
                    var $imageS2 = activeTabclick2
                    var $webp = $imageS2.substr($imageS2.lastIndexOf('.') + 1).trim();

                    var is_Edgeclick = navigator.userAgent.indexOf("Edge") > -1;
                    var is_safariclick = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                    var is_explorerclick= typeof document !== 'undefined' && !!document.documentMode && !is_Edgeclick;
                    var activeJpgclick = activeTabclick2
                    var activeWebpclick = activeTabclick2
                    if (is_safariclick || is_explorerclick){
                        $('.modal__header').css('background-image', 'url(' +$imageS+')');
                    }else {
                        $('.modal__header').css('background-image', 'url(' +lastformat+')');
                    }

                    $('.modal').fadeIn();
                    $('body').addClass('no-scroll');
                })
            },
        })
        //return error;
    }

//----////----- END Расписание тренировок-----////------

// Feedback widget
    $(".call-me-item--senders, .call-me-holder").click(function(){
        $(".call-me").toggleClass("call-me--active")
    })
// Feedback widget

    $(".dropdown-menu").addClass("hide")
    $(".ui-select-label-value").click(function () { //div[data-toggle='dropdown']
    $(".dropdown-menu").removeClass("show")
        $(this).parent("div").parent().children().children(".dropdown-menu").toggleClass("show")
    })
    $(".header__button-club").not(".min-none").click(function (){
      // $(".clubs-dropdown").addClass("show")
      // $(".clubs-dropdown").removeClass("hide")
      $(".clubs-dropdown").toggleClass("show")
  })
  $(".header__button-club.min-none").click(function (){
    // $(".clubs-dropdown").addClass("show")
    // $(".clubs-dropdown").removeClass("hide")
    $(".clubs-dropdown-mobile").fadeToggle();
})

    // })
    $(".ui-select-label-value, .ui-select-indicator").click(function () { //div[data-toggle='dropdown']
    if($(this).parent("div").parent().children().children(".dropdown-menu").hasClass("hide")){
      $(this).parent("div").parent().children().children(".dropdown-menu").removeClass("hide")
      $(this).parent("div").parent().children().children(".dropdown-menu").addClass("show")
    } else if($(this).parent("div").parent().children().children(".dropdown-menu").hasClass("show")){
      $(this).parent("div").parent().children().children(".dropdown-menu").removeClass("show")
      $(this).parent("div").parent().children().children(".dropdown-menu").addClass("hide")
    }
    })
    $(".ui-option").click(function () {
        $(this).parent().addClass("hide")
        $(this).parent().removeClass("show")
        $(this).parent("div").parent().parent().children().children(".ui-select-label-value").text($(this).text())
        // $(this).parent("div").parent().parent().children().children(".ui-select-indicator").addClass("change_x");
        $(this).parent("div").parent().parent().children().children(".click-hide").hide()
        $(this).parent("div").parent().parent().children().children(".click-show").show()
    })
    $(".section-timetable-group").click(function () {
        $(".section-timetable-group").css({"background-color": "#f8f9fb", "cursor": "pointer"})
        $(".section-timetable-group-icon-place svg, .section-timetable-group-icon-place svg path").attr("fill", "#333")
        $(".section-timetable-group-label").css({"color": "#333"})
        $(this).css({"background-color": "", "cursor": "default"})
        $(this).children().find("svg, path").attr("fill", "#333")
        $(this).children().css({"color": "#333"})
    })

    $('.flpop').click(function(){
// console.log("b")
        var cls=$(this).attr('clname');

        var week=$('.'+cls).attr('getweek');
        // var week = $("#selectedweekdey div").text()
        var date1=$('.'+cls).attr('getdate');
        var time1=$('.'+cls).attr('gettime');
        var trname=$('.'+cls).attr('gettrname');
        var trainingname=$('.'+cls).attr('gettrainingname');

        // $('.flitempopup').css('display','block');
        var height = $(window).height();
        $('.ui-modal-placefl ').css('max-height',height)
        $('.ui-modal-placefl ').css('overflow-y','auto')

        $('.weekdate').html(week+', <br />'+date1);
        $('.getingtime').html(time1);
        $('.getingtrname').html(trname);
        $('.getingtrainingname').html(trainingname);
        $('#trScheduleId').val(cls.substr(2, cls.length));
    })

    // $(".flpop").click(function(){
    //   $('.flitempopup').css('display','block');
    // })

    $('.closerflpopitem').click(function () {
        $('.flitempopup').css('display','none')
    })
    // $(document).mouseup(function (b) {
    //   var divs = $(".ui-modal-placefl");
    //   if (!divs.is(b.target) && divs.has(b.target).length === 0 || $('.closerflpopitem').is(b.target)) {
    //     $('.flitempopup').css('display','none')
    //     $('body').removeClass('no-scroll');
    //     $(".rf-content .form__input").val('');
    //   }
    // });
    // $(".click-hide").click(function () {
    //     console.log("b")
    //     // $(this).parent("div").children(".ui-select-label-value").text($(this).parent("div").attr("data-name"))
    // })
    $(".click-show").click(function () {
        $(this).parent("div").children(".click-hide").show()
        $(this).hide()
        $(this).parent("div").children(".ui-select-label-value").text($(this).parent("div").attr("data-name"))
    })
      $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".dropdown-menu, .section-timetable-filters-item"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
          $(".dropdown-menu").removeClass("show") // скрываем его
          $(".dropdown-menu").addClass("hide")
        }
      });
      $('.t849__icon').hover(function(e) {
        $(this).css({"background-color": "#ffd132"})
        $(this).find(".svg_g").css({"stroke": "#fff"})
           }, function() {
            $(this).css({"background-color": "white"})
            $(this).find(".svg_g").css({"stroke": "#222222"})
      });
      $(".visit__body").hide()
      $(".t849__icon").click(function(){
        $(this).parents(".form__agreement").find(".visit__body").slideToggle();
      })
      $(document).mouseup(function (e){ // событие клика по веб-документу
        var div = $(".clubs-dropdown, .header__button-club, clubs-dropdown-mobile"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
          $(".clubs-dropdown").removeClass("show") // скрываем его
          $(".clubs-dropdown-mobile").fadeOut()
        }
      });
      $(".map__overlay").click(function(){
        $(this).css({"display": "none"})
      })
      if($(window).width() < 767){
        function showYaMaps(){
        var script   = document.createElement("script");
        script.type  = "text/javascript";
        script.charset = "utf-8";
        script.async = true;
        script.src   = "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ae401dab9bf7fa4653fcb9aec97943ceed120106ea16379e49b1fb7ddb58ff98e&amp;width=auto&amp;height=500&amp;lang=ru_RU&amp;scroll=true";
        document.getElementById("map").appendChild(script);
       }
          var yaMaps = false;
          $(window).scroll(function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
          $(window).on("touchmove", function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
        }
        if($(window).width() > 767 && $(window).width() < 1023){
        function showYaMaps(){
        var script   = document.createElement("script");
        script.type  = "text/javascript";
        script.charset = "utf-8";
        script.async = true;
        script.src   = "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afd8ee6e8c646f05e3e5358009ae69cf97b5c2bd32d1f4b70485d91c4ea09a43f&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true";
        document.getElementById("map").appendChild(script);
       }
          var yaMaps = false;
          $(window).scroll(function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
          $(window).on("touchmove", function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
        }
        if($(window).width() > 1023){
        function showYaMaps(){
        var script   = document.createElement("script");
        script.type  = "text/javascript";
        script.charset = "utf-8";
        script.async = true;
        script.src   = "https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8b8faf255f9608c1b7786a128f8bcdecb1ce665578000719290b325e2516f800&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true";
        document.getElementById("map").appendChild(script);
       }
          var yaMaps = false;
          $(window).scroll(function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
          $(window).on("touchmove", function() {
              if(!yaMaps) {
                  if ($(window).height() + $(window).scrollTop() > $(".contact__map").offset().top) {
                      yaMaps = true;
                      showYaMaps();
                  }
              }
          });
        }
})
//# sourceMappingURL=../_maps/script.js.map
var checkbox = document.getElementsByClassName('checkbox_th');
for (var c = 0; c < checkbox.length; c++) {
    checkbox[c].removeAttribute("checked");
}
var form = document.getElementsByTagName('form');
for (var f = 0; f < form.length; f++) {
    form[f].addEventListener("submit", function (evt) {
    var checkbox2 = document.getElementsByClassName('checkbox_th');
    for (var c2 = 0; c2 < checkbox2.length; c2++) {
        if (checkbox2[c2].checked) {
            evt.preventDefault()
        }
    }
});
}