<header class="header">
  <div class="header__wrapper wrapper">
    <a class="header__logo" href="#stocks" style="background: url('{{asset($logo)}}') no-repeat center / contain;"></a>
    <div class="dropdown__wrapper">
    <a class="header__button-club none">Выбрать клуб</a>
    <div class="clubs-dropdown" style="display: none;"  x-placement="top-start">
    <a href="https://v.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
    П. Вернандского
   </a>
   <a href="https://s.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Сходненская
   </a>
   <a href="https://b.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Бауманская
   </a>
   <a href="https://k.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Саларьево  
   </a>
</div>
    </div>
    <nav class="header__menu">
      <div class="header__menu-wrapper">
      <div class="dropdown__wrapper">
      <a class="header__button-club min-none">Выбрать клуб</a>
      <div class="clubs-dropdown-mobile" style="display: none;"  x-placement="top-start">
   <a href="https://v.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
   П. Вернандского
   </a>
   <a href="https://s.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Сходненская
   </a>
   <a href="https://b.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Бауманская
   </a>
   <a href="https://k.nrg.fitness/" class="ui-option section-timetable-filter-item section-timetable-filter-item--row">
      Саларьево  
   </a>
</div>
      </div>
        @if(isset($menus))
          <ul>
          @foreach($menus as $menu)
            @if(($menu->anchor_key != 'about') && ($menu->anchor_key != 'covid-19'))
              <li><a href="#{{$menu->anchor_key}}">{{$menu->title}}</a></li>
            @endif
          @endforeach
          </ul>
        @endif
        {{--<ul>--}}
          {{--<li><a href="#stocks">Акции</a></li>--}}
          {{--<li><a href="#services">Услуги</a></li>--}}
          {{--<!--<li><a href="javascript:void(0)">Расписание</a></li>-->--}}
          {{--<li><a href="#trainers">Тренеры</a></li>--}}
          {{--<li><a href="#media">Тренировки</a></li>--}}
          {{--<li><a href="#cards">Карты</a></li>--}}
          {{--<li><a href="#gallery">Галерея</a></li>--}}
          {{--<li><a href="#contact">Контакты</a></li>--}}
        {{--</ul>--}}
        <div class="header__mobile">
          <a class="header__button button" href="javascript:void(0)">Спецпредложение</a>
          <a class="header__adress" href="{{$info->contact_skype}}" target="_blank">{{$info->contact_city}}, {{$info->contact_address}}</a>
          <div class="social">
            @if(isset($info->contact_fb))
              <a href="{{$info->contact_fb}}" rel="nofollow" target="_blank" class="fb lazyload"></a>
            @endif
            @if(isset($info->contact_vk))
              <a href="{{$info->contact_vk}}" rel="nofollow" target="_blank" class="vk lazyload"></a>
            @endif
            @if(isset($info->contact_ins))
              <a href="{{$info->contact_ins}}" rel="nofollow" target="_blank" class="ins lazyload"></a>
            @endif
          </div>
        </div>
      </div>
    </nav>
    <div class="header__contact">
        <?php $returnValue = preg_split('/[\\s,(,),-]+/', $info->contact_phone_1);
        $tel = ''; foreach ($returnValue as $v){ $tel .= $v;}
        ?>
      <a class="header__phone" href="tel:{{$tel}}" onclick="ym(65140885,'reachGoal','phone_click')">{{$info->contact_phone_1}}</a>
      <a class="header__button button" href="javascript:void(0)">Спецпредложение</a>
    </div>
    <a class="btn-menu" href="javascript:void(0)">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
</header>
