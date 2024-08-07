$(document).ready(function() {


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
  $('.stocks__tabs-item').click(function () {
    $(this).siblings('.stocks__tabs-item').removeClass('active');
    $(this).addClass('active');

    var activeTab = $('.stocks__tabs-item.active');
    var activeImage = activeTab.children('.stocks__miniature').attr('src');
    $('.stocks__container').css('background-image', 'url(' + activeImage + ')');

    var activeDate = activeTab.children('.stocks__tabs-date').text();
    $('.stocks__info_date').text(activeDate);
    var activeOther = activeTab.children('.stocks__tabs-other').text();
    $('.stocks__info_other').text(activeOther);
  })


  //services tabs
  $('.services__tabs-item').click(function () {
    $(this).siblings('.services__tabs-item').removeClass('active');
    $(this).addClass('active');

    var tagNum = $(this).attr('data-num');
    $('.services__item').removeClass('active');
    var activeItem = $('.services__item').filter(function(){return $(this).data("num")   == tagNum});
    activeItem.addClass('active');

    if(activeItem.hasClass('loaded')) {

    } else {
      var activeImages = activeItem.find('img');
      for(var i = 0; i < activeImages.length; i++) {
        var imgSrc = activeImages[i].getAttribute('data-src');
        activeImages[i].setAttribute('src', imgSrc);
        activeImages[i].removeAttribute('data-src');
      }
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
  })


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
      speed: 500,
      slidesPerView: 'auto',
      centeredSlides: true,
      loop: true,
      navigation: {
        nextEl: '.cards__arrow-next',
        prevEl: '.cards__arrow-prev'
      },
      breakpoints: {
        500: {
          centeredSlides: false
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
     on: {
       touchStart: function() {
         modalServicesSlider.update();
         return true;
       }
     }
  })




  //form inputs animate
  $(".form__input").focus( function () {
    var focusEl = $(this);
    focusEl.parent('.form__input-wrap').addClass("active");
    $(document).mouseup(function (e) {
      if (!focusEl.is(e.target)
        && focusEl.has(e.target).length === 0) {
        if(focusEl.val() === '') {
          focusEl.parent('.form__input-wrap').removeClass("active");
        }
      }
    });
  });


  //modal
  $('.button, .media__video-play, .services__slider-item, .gallery__image').click(function(e) {

    if ($(this).hasClass('stocks__button')) {
      setTimeout(function() {
        $('.modal__wrapper').addClass('active modal_stocks');
      }, 200)
      var activeTab = $('.stocks__tabs-item.active');
      var stock_id = activeTab.attr('data_stock_id');
      setPopupData(stock_id,"Stock","Акции");
      var activeImage = activeTab.children('.stocks__miniature').attr('src');
      $('.modal__header').css('background-image', 'url(' + activeImage + ')');
    }

    else if ($(this).hasClass('header__button')) {
      $('body').addClass('no-scroll');
      setTimeout(function() {
        $('.modal__special').addClass('active');
      }, 200)
      //$('.modal__title').text('Получите специальное предложение');
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
        $('.modal__wrapper').addClass('active modal_services');
      }, 200)
      $('.modal__title').text('Запись на тренировку');
      $('.modal__additional').text('Тип занятия:');
      var activeTab = $('.services__tabs-item.active');
      var active_tab_name = activeTab.text();
      $('.modal__additional-field').text(active_tab_name);
      var service_id = activeTab.attr('data-num');
      setPopupData(service_id,"Service","Услуги");
    }

    else if ($(this).hasClass('trainers__button')) {
      setTimeout(function() {
        $('.modal__wrapper').addClass('active modal_trainers');
      }, 200)
      $('.modal__title').text('Запись на тренировку');
      var activeTrainer = $(this).parent('.trainers__slider-wrapper').find('.trainers__name');
      $('.modal__additional-field').text(activeTrainer.text());
      $('.modal__additional').text('Тренер:');
      setPopupData(activeTrainer.attr('data-tr-id'),"Treainer","Тренеры");
    }

    else if ($(this).hasClass('cards__button')) {
      setTimeout(function() {
        $('.modal__wrapper').addClass('active modal_cards');
      }, 200)
      $('.modal__title').text('Заказ клубной карты');
      var activeCard = $(this).closest('.cards__slider-wrapper').find('.cards__cover');
      var cardName = activeCard.find('.cards__name');
      var cardColor = activeCard.attr('style');
      $('.modal__card .cards__name').text(cardName.text());
      $('.modal__card .cards__description').text(cardName.text());
      $('.modal__card').attr('style', cardColor);
      setPopupData(activeCard.attr('data-card-id'),"ClubCart","Клубные карты");
    }

    else if ($(this).hasClass('media__video-play')) {
      setTimeout(function() {
        $('.modal__widget').addClass('active modal_video');
      }, 200)
      $(document).mouseup(function (e) {
        var div = $(".modal__widget");
        if (!div.is(e.target)
          && div.has(e.target).length === 0
          || $('.modal__close').is(e.target)) {
          $('.modal__video').trigger('pause');
        }
      });
    }

    else if ($(this).hasClass('services__slider-item')) {
      setTimeout(function() {
        $('.modal__widget').addClass('active modal_gallery');
      }, 200)
      var targetImage = $(this).find('img').attr('src');
      modalServicesSlider.addSlide(1, [
        '<div class="modal__slider-item swiper-slide"><img src="' + targetImage + '" alt=""></div>'
      ]);
      var images = $(this).siblings('.services__slider-item');
      for(var i = 0; i < images.length; i++) {
        var image = images[i].querySelector('img').getAttribute('src');
        modalServicesSlider.addSlide(2, [
          '<div class="modal__slider-item swiper-slide"><img src="' + image + '" alt=""></div>'
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
      var targetImage = $(this).find('img').attr('src');
      modalServicesSlider.addSlide(1, [
        '<div class="modal__slider-item swiper-slide"><img src="' + targetImage + '" alt=""></div>'
      ]);
      var slides = $(this).closest('.gallery__slider-item').siblings('.gallery__slider-item');
      var images = slides.find('img');
      for(var i = 0; i < images.length; i++) {
        var image = images[i].getAttribute('src');
        modalServicesSlider.addSlide(2, [
          '<div class="modal__slider-item swiper-slide"><img src="' + image + '" alt=""></div>'
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

    $('.modal').fadeIn();
    $('body').addClass('no-scroll');

    $(document).mouseup(function (e) {
      var div = $(".modal__wrapper, .modal__widget, .modal__special");
      if (!div.is(e.target)
        && div.has(e.target).length === 0
        || $('.modal__close').is(e.target)) {
        $('.modal').fadeOut();

        $('body').removeClass('no-scroll');
        $('.modal__wrapper').removeClass('active modal_stocks modal_services modal_trainers modal_cards modal_special');
        $('.modal__widget').removeClass('active modal_widget modal_video modal_gallery');
        $('.modal__special').removeClass('active');
        $('.modal__header').css('background-image', '');
        $(".form__input").val('');
      }
    });

    $(document).keyup(function(e) {
      if (e.key === "Escape") {
        var div = $(".modal__wrapper, .modal__widget, .modal__special");
        if (!div.is(e.target)
            && div.has(e.target).length === 0
            || $('.modal__close').is(e.target)) {
          $('.modal').fadeOut();

          $('body').removeClass('no-scroll');
          $('.modal__wrapper').removeClass('active modal_stocks modal_services modal_trainers modal_cards modal_special');
          $('.modal__widget').removeClass('active modal_widget modal_video modal_gallery');
          $('.modal__special').removeClass('active');
          $('.modal__header').css('background-image', '');
          $(".form__input").val('');
        }
        //cleanErrorsMess()
      }
    });

  })

  $('#specialButton').click(function () {
    var sign_up_data = $(".form_special input").serializeArray();

    if(saveSignUpTraining(sign_up_data)){
      //closePopupMessage('cloaseslimgpop');
    }
  })

  $('#signUpButton').click(function () {
    var sign_up_data = $(".form_light input").serializeArray();

    if(saveSignUpTraining(sign_up_data)){
      //closePopupMessage('cloaseslimgpop');
    }
  })

  $('#contactButton').click(function () {
    var sign_up_data = $(".form_dark input").serializeArray();

    $('.modal').fadeOut();
    if(saveSignUpTraining(sign_up_data)){
      //closePopupMessage('cloaseslimgpop');
    }
  })

  function setPopupData(s_type_id, s_type, s_type_name){
    $('#signUpTypeId').val(s_type_id);
    $('#signUpType').val(s_type);
    $('#signUpName').val(s_type_name);
  }

  //Sign up ajax
  function saveSignUpTraining(ds){

    var type_id = ds[0].value;
    var sign_up_type = ds[1].value;
    var sign_up_type_name = ds[2].value;
    var name = ds[3].value;
    var tel = ds[4].value;
    var error = true;

    if(name.trim() ==''){
      //var hid =$(this).attr('errorhid')
      //$(".namhid").addClass('ui-input--danger')
      //$(".namhid1").css('display','flex')
      error = false;
    }
    if(tel.trim() ==''){
      //$(".telhid").addClass('ui-input--danger')
      //$(".telhid1").css('display','flex')
      error = false;
    }
    if(!error)
      return error;

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type: "POST",
      url:"/subscribeForm",
      dataType: 'JSON',
      data: {type_id:type_id, type:sign_up_type, type_name:sign_up_type_name, full_name:name, phone:tel, _token: CSRF_TOKEN},
      beforeSend: function() {
        // setting a timeout
        //$(placeholder).addClass('loading');
        console.log('loader show');
      },
      success: function(response) {
        console.log('succ '+response);
        error = response;
      },
      complete: function() {
        console.log('loader hide');
      },
    })
    return error;
  }

  //mobile menu
  $('.btn-menu').click(function () {
    $('.header').toggleClass('active');
    $('.btn-menu').toggleClass('active');
    $('body').toggleClass('no-scroll');
    $('.header__menu a, .header__logo').click(function () {
      $('.header').removeClass('active');
      $('.btn-menu').removeClass('active');
      $('body').removeClass('no-scroll');
    })
  })


  //yandex map
  if($('div').is('.contact__map')) {
    ymaps.ready(init);
    function init(){
      // Создание карты.
      var myMap = new ymaps.Map("map", {
        center: [55.616801460347894,37.39023250964599],
        zoom: 17,
        controls: []
      });
    }
  }

})
//# sourceMappingURL=../_maps/script.js.map
