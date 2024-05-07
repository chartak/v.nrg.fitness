<section style="padding-top: {{$pt}};background-color: white;padding-bottom: 2rem;">
    <div class="button__wrapper">
        <button class="freeze__popup button">Заморозка карты</button>
    </div>
</section>
@if(isset($arrAbout))
<section class="about" id="about">
    <div class="about__wrapper wrapper">
        <h2 class="about__title title">О клубе</h2>

        <div class="about__text">
            {!! $arrAbout[0]->page_text !!}
        </div>
    </div>
    <picture>
        <source data-srcset="{{asset($arrAbout[0]->featured_image->getUrl('l'))}}" type="image/webp">
        <img class="about__image" data-src="{{asset($arrAbout[0]->featured_image->getUrl('l'))}}">
    </picture>
    <!-- <img class="about__image" data-src="{{asset($arrAbout[0]->featured_image->getUrl('l'))}}" alt=""> -->
</section>
@endif
