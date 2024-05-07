<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>{{$info->branch_name}}</title>
    <meta name="description" content="{{$info->description}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link data-n-head="true" rel="icon" type="image/x-icon" href="{{asset($favicon)}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/critical.css')}}?ver=<?=filemtime('public/frontend/css/critical.css')?>">
    {{--    @laravelPWA--}}
    @laravelPWA
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-53D0N4S6YY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-53D0N4S6YY');
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '737962386864111');
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" style="display:none" 
src="https://www.facebook.com/tr?id=737962386864111&ev=PageView&noscript=1"
/>
</noscript>
<!-- End Facebook Pixel Code -->
<!-- TikTok Pixel Code -->
<script>
 !function (w, d, t) {
   w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
   ttq.load('C3BE858EDD9CLCVGENR0');
   ttq.page();
 }(window, document, 'ttq');
</script>
<!-- End TikTok Pixel Code -->
</head>
    {{--<link rel="stylesheet" href="{{asset('frontend/js/style.css')}}">--}}
  <body class="scroll-hide-show">

      @include('layouts.header')

      <main class="main">
          @yield('content')

          <section class="contact" id="contact">
              <div class="contact__map">
                  <div id="map">
                  <div class="map__overlay" title="Нажмите для масштабирования"></div>
                  </div>
              </div>
              <div class="contact__wrapper wrapper">
                  @include('layouts.form')
              </div>
          </section>
      </main>

      @include('layouts.footer')

      <section class="modal">
          @include('layouts.modal')
          @include('layouts.modal-media')
          @include('layouts.modal-special')
          @include('layouts.modal-freeze')
          @include('layouts.modal-oferta')
          @include('layouts.modal-policy')
          @include('layouts.modal-schedule')
      </section>
      {{--@include('layouts.sliders')--}}

      <!-- Feedback widget -->
    <div class="call-me">
        <div class="call-me-mobile">
            <div class="call-me-mobile-overlay"></div>
            <div class="call-me-mobile-place">
                <div class="call-me-mobile-holder-wrapper">
                    <div class="call-me-mobile-holder" style="top:0px;">
                        <div class="call-me-mobile-holder-handler"></div>
                        <div class="call-me-mobile-holder-inner">
                            <div class="call-me-holder-form">
                                <div class="call-me-form-items before">
                                    <a href="https://vk.com/nrgfitness_official" target="_blank" class="call-me-form-items-item call-me-form-items-item--vk"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHBhdGggZD0iTTIwLjIwMyA4Ljg5Yy43NjguNzM1IDEuNTc4IDEuNDI4IDIuMjY2IDIuMjM4LjMwNC4zNi41OTIuNzMxLjgxMyAxLjE0OS4zMTIuNTk0LjAzIDEuMjQ3LS41MTMgMS4yODJsLTMuMzcyLS4wMDFjLS44Ny4wNy0xLjU2My0uMjczLTIuMTQ2LS44NTctLjQ2Ny0uNDY2LS45LS45NjMtMS4zNDgtMS40NDZhMy4xNzEgMy4xNzEgMCAwIDAtLjYwNy0uNTNjLS40Ni0uMjkyLS44Ni0uMjAzLTEuMTIzLjI2OS0uMjY4LjQ3OS0uMzI4IDEuMDEtLjM1NSAxLjU0NC0uMDM2Ljc4LS4yNzYuOTg0LTEuMDczIDEuMDItMS43MDQuMDc5LTMuMzIyLS4xNzQtNC44MjUtMS4wMTgtMS4zMjQtLjc0NC0yLjM1Mi0xLjc5NS0zLjI0Ni0yLjk4NEMyLjkzNCA3LjI0IDEuNiA0LjY5Ni40MDIgMi4wOGMtLjI3LS41OS0uMDcyLS45MDYuNTktLjkxNyAxLjEtLjAyIDIuMi0uMDIgMy4zLS4wMDEuNDQ4LjAwNi43NDQuMjU4LjkxNi42NzIuNTk1IDEuNDM3IDEuMzI0IDIuODAzIDIuMjM3IDQuMDcuMjQ0LjMzNy40OTIuNjc1Ljg0NS45MTIuMzkxLjI2My42OS4xNzYuODczLS4yNTJhMi43OCAyLjc4IDAgMCAwIC4xOTQtLjg1M2MuMDg3LTEgLjA5OS0xLjk5Ny0uMDU0LTIuOTkyLS4wOTQtLjYyMS0uNDUtMS4wMjQtMS4wODItMS4xNDEtLjMyMi0uMDYtLjI3NC0uMTc4LS4xMTgtLjM1OC4yNzEtLjMxMi41MjYtLjUwNiAxLjAzNC0uNTA2aDMuODFjLjYuMTE3LjczMy4zODEuODE2Ljk3NGwuMDAzIDQuMTU1Yy0uMDA3LjIzLjExNy45MS41MzcgMS4wNjIuMzM3LjEwOC41Ni0uMTU3Ljc2MS0uMzY2LjkxMy0uOTUxIDEuNTY0LTIuMDc0IDIuMTQ1LTMuMjM4LjI1OS0uNTExLjQ4LTEuMDQyLjY5Ni0xLjU3My4xNTktLjM5NC40MS0uNTg4Ljg2MS0uNThsMy42NjcuMDA0Yy4xMDkgMCAuMjE5LjAwMi4zMjQuMDIuNjE4LjEwMy43ODguMzY0LjU5Ny45NTYtLjMwMS45My0uODg2IDEuNzA0LTEuNDU4IDIuNDgyLS42MTIuODMxLTEuMjY2IDEuNjMzLTEuODcyIDIuNDY5LS41NTguNzYzLS41MTMgMS4xNDguMTc5IDEuODF6IiBmaWxsPSIjZmZmIi8+Cjwvc3ZnPgo=" alt="" class="call-me-item-icon"></a>
                                    <a href="mailto:info@nrg.fitness" target="_blank" class="call-me-form-items-item call-me-form-items-item--email"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zLjMzMy4yMDNoMTIuMzExYTIuODk1IDIuODk1IDAgMCAxIDEuOTI4LjY3NmwtLjcwMi40ODctNy40MDUgNS4wOTMtMS45MjctMS4zNGEuMzgyLjM4MiAwIDAgMC0uMTM5LS4wOUwyLjEwMyAxLjM2MSAxLjQwNS44OEEyLjcxMiAyLjcxMiAwIDAgMSAzLjMzMy4yMDN6TS45MiAxLjUxNGwuNjUyLjQ1MyA1LjA5MiAzLjU0LTUuMDQ2IDUuNjA1LS41NDcuNjA2YTMuNDIyIDMuNDIyIDAgMCAxLS41Ny0xLjk1TC41MDMgMy4yMkEzLjU1IDMuNTUgMCAwIDEgLjkyIDEuNTE0em0xNS45MDUgMTAuMTU0bC01LjE0Ni01LjcwMy0xLjk2NiAxLjM2LS4wNjYuMDMzaC0uMDNhLjM2LjM2IDAgMCAxLS4wOTcgMCAuMzU5LjM1OSAwIDAgMS0uMDk2IDBoLS4wM0w5LjMgNy4zMjUgNy4zNSA1Ljk3M2wtNS4xNzQgNS43MTItLjU1NS42MTRjLjUxLjM1IDEuMTA3LjUyNCAxLjcxMi40OThoMTIuMzM0YTIuOTYyIDIuOTYyIDAgMCAwIDEuNy0uNTI3bC0uNTQzLS42MDJ6bTEuNjcyLTguNDM2djYuNTM2YTMuMjM3IDMuMjM3IDAgMCAxLS41NTUgMS45NDVsLS41NTItLjYxMy01LjA0MS01LjYxIDUuMDg4LTMuNTIzLjY1NS0uNDQ5YTMuNCAzLjQgMCAwIDEgLjQwNSAxLjcxNHoiIGZpbGw9IiNmZmYiLz48L3N2Zz4K" alt="" class="call-me-item-icon"></a>
                                    <a href="https://www.instagram.com/nrgfitness.ru/" target="_blank" class="call-me-form-items-item call-me-form-items-item--instagram"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNS40NDYgMEg2LjU1NEE2LjU2MSA2LjU2MSAwIDAgMCAwIDYuNTU0djguODkyQTYuNTYxIDYuNTYxIDAgMCAwIDYuNTU0IDIyaDguODkyQTYuNTYxIDYuNTYxIDAgMCAwIDIyIDE1LjQ0NlY2LjU1NEE2LjU2MSA2LjU2MSAwIDAgMCAxNS40NDYgMHptNC4zNCAxNS40NDZhNC4zNCA0LjM0IDAgMCAxLTQuMzQgNC4zNEg2LjU1NGE0LjM0IDQuMzQgMCAwIDEtNC4zNC00LjM0VjYuNTU0YTQuMzQgNC4zNCAwIDAgMSA0LjM0LTQuMzRoOC44OTJhNC4zNCA0LjM0IDAgMCAxIDQuMzQgNC4zNHY4Ljg5MnpNNS4zMSAxMUE1LjY5NiA1LjY5NiAwIDAgMSAxMSA1LjMxIDUuNjk2IDUuNjk2IDAgMCAxIDE2LjY5IDExIDUuNjk2IDUuNjk2IDAgMCAxIDExIDE2LjY5IDUuNjk2IDUuNjk2IDAgMCAxIDUuMzEgMTF6TTExIDE0LjQ3N2EzLjQ3NyAzLjQ3NyAwIDEgMSAwLTYuOTU0IDMuNDc3IDMuNDc3IDAgMCAxIDAgNi45NTR6bTcuMDY0LTkuMTI0YTEuMzYzIDEuMzYzIDAgMSAxLTIuNzI2IDAgMS4zNjMgMS4zNjMgMCAwIDEgMi43MjYgMHoiIGZpbGw9IiNmZmYiPjwvcGF0aD48L3N2Zz4=" alt="" class="call-me-item-icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="call-me-holder">
            <div class="call-me-holder-status">online</div>Задайте вопрос
        </div>
        <a class="call-me-item call-me-item--callme" href="#contact">
          <img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMjUiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE1LjEgMjQuMjhjMS4yNy40OCAyLjQyNi43MiAzLjM4My43Mi45NTMgMCAxLjcwOC0uMjM4IDIuMTgzLS43MTIuMTM2LS4xMzcuMjgzLS4yNzUuNDMzLS40MTguOTE0LS44NjggMS45NS0xLjg1MiAxLjg5Ny0zLjE1My0uMDM3LS44OTgtLjU5My0xLjc2Ny0xLjctMi42NTYtMy4yNjctMi42MjYtNC40MzItMS40NDYtNS43ODEtLjA3N2wtLjI0NC4yNDZjLS40MDQuNDA1LTEuMzkxLS4xMzctMS45NDQtLjQ5NS0uODc3LS41Ny0xLjk3My0xLjUxMy0zLjI2Mi0yLjhDNi4xMiAxMC45OSA2LjU0NSA5Ljk1MiA2Ljc3IDkuNzI4bC4yNDMtLjI0LjAwMS0uMDAxYzEuMzctMS4zNSAyLjU1My0yLjUxNi0uMDczLTUuNzgyLS44OTEtMS4xMDctMS43Ni0xLjY2My0yLjY1Ny0xLjctMS4yNzctLjA1Ny0yLjI4Mi45OC0zLjE1IDEuODkzbC0uMDEyLjAxMmMtLjE0LjE0Ny0uMjc2LjI5LS40MS40MjMtLjk1Mi45NTItLjk1IDMuMDMxLjAwNyA1LjU2NCAxLjA1MiAyLjc4OCAzLjEyOCA1LjgyIDUuODQ2IDguNTM3IDIuNzE4IDIuNzE4IDUuNzQ4IDQuNzk0IDguNTM1IDUuODQ2ek0xMyA1bC0uMzU0LS4zNTRhLjUuNSAwIDAgMCAwIC43MDhMMTMgNXptOC45ODcgM2wtLjQ5Ny0uMDUzYS40OTUuNDk1IDAgMCAwLS4wMDMuMDUzaC41em0tLjUgM2EuNS41IDAgMCAwIDEgMGgtMXptLTUuMTMzLTguNjQ2YS41LjUgMCAwIDAtLjcwOC0uNzA4bC43MDguNzA4em0tLjcwOCA2YS41LjUgMCAwIDAgLjcwOC0uNzA4bC0uNzA4LjcwOHptMy4xNC0zLjg1NEgxM3YxaDUuNzg2di0xem0wIDFjMS4yNzcgMCAxLjk0Mi40NDUgMi4yOTQuOTIyLjM3MS41MDIuNDUzIDEuMTIuNDEgMS41MjVsLjk5NC4xMDZjLjA2My0uNTk0LS4wNDctMS40NzctLjYtMi4yMjUtLjU3LS43NzMtMS41NTgtMS4zMjgtMy4wOTgtMS4zMjh2MXptMi43IDIuNXYzaDFWOGgtMXptLTguMTMyLTIuNjQ2bDMtMy0uNzA4LS43MDgtMyAzIC43MDguNzA4em0tLjcwOCAwbDMgMyAuNzA4LS43MDgtMy0zLS43MDguNzA4eiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPgo=" class="call-me-item-icon"></a>
        <div class="call-me-items">
            <div class="call-me-items-holder">
                <div class="call-me-item call-me-item--senders"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMiAwYzMuMjA2IDAgNi4yMTYgMS4yNTEgOC40ODMgMy41MThhMTEuOTMyIDExLjkzMiAwIDAgMSAzLjUxMiA4LjQ4NyAxMS45MiAxMS45MiAwIDAgMS0zLjUxMiA4LjQ4MkExMS45MTIgMTEuOTEyIDAgMCAxIDEyIDI0YTEyLjAxIDEyLjAxIDAgMCAxLTUuNjgzLTEuNDI3Yy0xLjI5Mi44OS0yLjg0IDEuMzk3LTQuMzEyIDEuMzk3LS4yOTYgMC0uNTgzLS4wMjUtLjg1LS4wNjZhMS4xMTQgMS4xMTQgMCAwIDEtLjkzNC0uOTRjLS4wNy0uNDgyLjE3Ni0uOTU0LjYxMy0xLjE3LjcxOS0uMzUyIDEuMzUyLTEuMDg1IDEuODktMi4xODYtMy44OTUtNC43MzQtMy41NzgtMTEuNzE5Ljc5NC0xNi4wOUExMS45MTcgMTEuOTE3IDAgMCAxIDEyIDB6TTYuOTc0IDguMDRoMTAuMDVhLjY3OS42NzkgMCAwIDEgMCAxLjM1N0g2Ljk3NGEuNjc2LjY3NiAwIDAgMS0uNjc4LS42NzhjMC0uMzc3LjMwMS0uNjc5LjY3OC0uNjc5em0xMC4wNSAzLjI4Mkg2Ljk3NGEuNjc2LjY3NiAwIDAgMC0uNjc4LjY3OGMwIC4zNzcuMzAxLjY3OC42NzguNjc4aDEwLjA1YS42NzkuNjc5IDAgMCAwIDAtMS4zNTd6bS0xMC4wNSAzLjI4MWgxMC4wNWEuNjc5LjY3OSAwIDAgMSAwIDEuMzU3SDYuOTc0YS42NzYuNjc2IDAgMCAxLS42NzgtLjY3OWMwLS4zNzcuMzAxLS42NzguNjc4LS42Nzh6IiBmaWxsPSIjZmZmIi8+PC9zdmc+Cg==" class="call-me-item-icon"></div>
            </div>
            <a href="https://vk.com/nrgfitness_official" target="_blank" class="call-me-item call-me-item--vk"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHBhdGggZD0iTTIwLjIwMyA4Ljg5Yy43NjguNzM1IDEuNTc4IDEuNDI4IDIuMjY2IDIuMjM4LjMwNC4zNi41OTIuNzMxLjgxMyAxLjE0OS4zMTIuNTk0LjAzIDEuMjQ3LS41MTMgMS4yODJsLTMuMzcyLS4wMDFjLS44Ny4wNy0xLjU2My0uMjczLTIuMTQ2LS44NTctLjQ2Ny0uNDY2LS45LS45NjMtMS4zNDgtMS40NDZhMy4xNzEgMy4xNzEgMCAwIDAtLjYwNy0uNTNjLS40Ni0uMjkyLS44Ni0uMjAzLTEuMTIzLjI2OS0uMjY4LjQ3OS0uMzI4IDEuMDEtLjM1NSAxLjU0NC0uMDM2Ljc4LS4yNzYuOTg0LTEuMDczIDEuMDItMS43MDQuMDc5LTMuMzIyLS4xNzQtNC44MjUtMS4wMTgtMS4zMjQtLjc0NC0yLjM1Mi0xLjc5NS0zLjI0Ni0yLjk4NEMyLjkzNCA3LjI0IDEuNiA0LjY5Ni40MDIgMi4wOGMtLjI3LS41OS0uMDcyLS45MDYuNTktLjkxNyAxLjEtLjAyIDIuMi0uMDIgMy4zLS4wMDEuNDQ4LjAwNi43NDQuMjU4LjkxNi42NzIuNTk1IDEuNDM3IDEuMzI0IDIuODAzIDIuMjM3IDQuMDcuMjQ0LjMzNy40OTIuNjc1Ljg0NS45MTIuMzkxLjI2My42OS4xNzYuODczLS4yNTJhMi43OCAyLjc4IDAgMCAwIC4xOTQtLjg1M2MuMDg3LTEgLjA5OS0xLjk5Ny0uMDU0LTIuOTkyLS4wOTQtLjYyMS0uNDUtMS4wMjQtMS4wODItMS4xNDEtLjMyMi0uMDYtLjI3NC0uMTc4LS4xMTgtLjM1OC4yNzEtLjMxMi41MjYtLjUwNiAxLjAzNC0uNTA2aDMuODFjLjYuMTE3LjczMy4zODEuODE2Ljk3NGwuMDAzIDQuMTU1Yy0uMDA3LjIzLjExNy45MS41MzcgMS4wNjIuMzM3LjEwOC41Ni0uMTU3Ljc2MS0uMzY2LjkxMy0uOTUxIDEuNTY0LTIuMDc0IDIuMTQ1LTMuMjM4LjI1OS0uNTExLjQ4LTEuMDQyLjY5Ni0xLjU3My4xNTktLjM5NC40MS0uNTg4Ljg2MS0uNThsMy42NjcuMDA0Yy4xMDkgMCAuMjE5LjAwMi4zMjQuMDIuNjE4LjEwMy43ODguMzY0LjU5Ny45NTYtLjMwMS45My0uODg2IDEuNzA0LTEuNDU4IDIuNDgyLS42MTIuODMxLTEuMjY2IDEuNjMzLTEuODcyIDIuNDY5LS41NTguNzYzLS41MTMgMS4xNDguMTc5IDEuODF6IiBmaWxsPSIjZmZmIi8+Cjwvc3ZnPgo=" alt="" class="call-me-item-icon"></a>
            <a href="mailto:info@nrg.fitness" target="_blank" class="call-me-item call-me-item--email"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zLjMzMy4yMDNoMTIuMzExYTIuODk1IDIuODk1IDAgMCAxIDEuOTI4LjY3NmwtLjcwMi40ODctNy40MDUgNS4wOTMtMS45MjctMS4zNGEuMzgyLjM4MiAwIDAgMC0uMTM5LS4wOUwyLjEwMyAxLjM2MSAxLjQwNS44OEEyLjcxMiAyLjcxMiAwIDAgMSAzLjMzMy4yMDN6TS45MiAxLjUxNGwuNjUyLjQ1MyA1LjA5MiAzLjU0LTUuMDQ2IDUuNjA1LS41NDcuNjA2YTMuNDIyIDMuNDIyIDAgMCAxLS41Ny0xLjk1TC41MDMgMy4yMkEzLjU1IDMuNTUgMCAwIDEgLjkyIDEuNTE0em0xNS45MDUgMTAuMTU0bC01LjE0Ni01LjcwMy0xLjk2NiAxLjM2LS4wNjYuMDMzaC0uMDNhLjM2LjM2IDAgMCAxLS4wOTcgMCAuMzU5LjM1OSAwIDAgMS0uMDk2IDBoLS4wM0w5LjMgNy4zMjUgNy4zNSA1Ljk3M2wtNS4xNzQgNS43MTItLjU1NS42MTRjLjUxLjM1IDEuMTA3LjUyNCAxLjcxMi40OThoMTIuMzM0YTIuOTYyIDIuOTYyIDAgMCAwIDEuNy0uNTI3bC0uNTQzLS42MDJ6bTEuNjcyLTguNDM2djYuNTM2YTMuMjM3IDMuMjM3IDAgMCAxLS41NTUgMS45NDVsLS41NTItLjYxMy01LjA0MS01LjYxIDUuMDg4LTMuNTIzLjY1NS0uNDQ5YTMuNCAzLjQgMCAwIDEgLjQwNSAxLjcxNHoiIGZpbGw9IiNmZmYiLz48L3N2Zz4K" alt="" class="call-me-item-icon"></a>
            <a href="https://www.instagram.com/nrgfitness.ru/" target="_blank" class="call-me-item call-me-item--instagram"><img data-src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNS40NDYgMEg2LjU1NEE2LjU2MSA2LjU2MSAwIDAgMCAwIDYuNTU0djguODkyQTYuNTYxIDYuNTYxIDAgMCAwIDYuNTU0IDIyaDguODkyQTYuNTYxIDYuNTYxIDAgMCAwIDIyIDE1LjQ0NlY2LjU1NEE2LjU2MSA2LjU2MSAwIDAgMCAxNS40NDYgMHptNC4zNCAxNS40NDZhNC4zNCA0LjM0IDAgMCAxLTQuMzQgNC4zNEg2LjU1NGE0LjM0IDQuMzQgMCAwIDEtNC4zNC00LjM0VjYuNTU0YTQuMzQgNC4zNCAwIDAgMSA0LjM0LTQuMzRoOC44OTJhNC4zNCA0LjM0IDAgMCAxIDQuMzQgNC4zNHY4Ljg5MnpNNS4zMSAxMUE1LjY5NiA1LjY5NiAwIDAgMSAxMSA1LjMxIDUuNjk2IDUuNjk2IDAgMCAxIDE2LjY5IDExIDUuNjk2IDUuNjk2IDAgMCAxIDExIDE2LjY5IDUuNjk2IDUuNjk2IDAgMCAxIDUuMzEgMTF6TTExIDE0LjQ3N2EzLjQ3NyAzLjQ3NyAwIDEgMSAwLTYuOTU0IDMuNDc3IDMuNDc3IDAgMCAxIDAgNi45NTR6bTcuMDY0LTkuMTI0YTEuMzYzIDEuMzYzIDAgMSAxLTIuNzI2IDAgMS4zNjMgMS4zNjMgMCAwIDEgMi43MjYgMHoiIGZpbGw9IiNmZmYiPjwvcGF0aD48L3N2Zz4=" alt="" class="call-me-item-icon"></a>

        </div>
    </div>
<!-- Feedback widget -->

      <link rel="stylesheet" href="{{asset('public/frontend/css/swiper.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/frontend/css/jquery.datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/style.css')}}?ver=<?=filemtime('public/frontend/css/style.css')?>">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/media-queries.css')}}?ver=<?=filemtime('public/frontend/css/media-queries.css')?>">
      {{--@yield('js')--}}
      <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/lazysizes.min.js')}}"></script>
      <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=ba12e1c1-9612-4f6b-81cd-629019fc3cfb&lang=ru_RU" type="text/javascript"></script> -->
      <script src="{{asset('public/frontend/js/swiper.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/jquery.syotimer.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/jquery.inputmask.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/jquery.datetimepicker.full.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/frontend/js/script.js')}}?ver=<?=filemtime('public/frontend/js/script.js')?>"></script>
      <script type="text/javascript">
          $(document).ready(function () {

              $("img").each(function() { //.not(".gallery__image img")
                  $(this).addClass("lazyload")
                  // $(this).attr("data-src",$(this).attr("src"));
                  // $(this).removeAttr("src");
              });
              $("source").each(function() { //.not(".gallery__image img")
                  $(this).addClass("lazyload")
                  // $(this).attr("data-srcset",$(this).attr("srcset"));
                  // $(this).removeAttr("srcset");
              });
              // $("img.lazyload").lazy();
          })
      </script>
      <script type="text/javascript">
          // $(document).ready(function(){
              //.not(".media__inst-item img, .call-me img, .stock__photo, .success__logo")
              $('picture img').not(".media__inst-item img, .call-me img, .stock__photo, .success__logo").each(function(i) {
              var $image = $(this).attr("data-src");
              var formated = $image.substr(0, $image.lastIndexOf("."));
              var lastformat = formated + ".webp";
              var $imageS = $(this).attr("data-src");
              var $webp = $imageS.substr($imageS.lastIndexOf('.') + 1).trim();
              if($(this).attr("data-image")) {
                  var $data_image = $(this).attr("data-image");
                  var formated_data = $data_image.substr(0, $data_image.lastIndexOf("."));
                  var lastformatdata = formated_data + ".webp";
                  var $data_imageS = $(this).attr("data-image");
                  var $webp = $data_imageS.substr($data_imageS.lastIndexOf('.') + 1).trim();
              }
              if ($(this).attr("class")){
                  var classname = $(this).attr("class")
              }
            //   var self = $(this);
            //   var src = self.attr('src');
            //   if ($(this).find('img[src*=".jpg"]')) {
            //       self.addClass('webp');
            //   }
            $(this).siblings("source").attr("data-srcset", lastformat)
            $(this).siblings("source").attr("data-image", lastformatdata)
            $(this).siblings("source").attr("class", classname)
            $(this).attr("data-src", $imageS)
            $(this).attr("data-image", $data_imageS)
            $(this).attr("class", classname)
            //   $(".webp").replaceWith("<picture><source data-srcset='" + lastformat + "' type='image/webp'  data-image='" + lastformatdata + "'/><img class='" + classname + "'  data-src='" + $imageS + "' alt='' data-image='" + $data_imageS +"' /></picture>")
            //   $("picture source, picture img").removeClass("undefined");
            //   var attr = $(this).attr("data-image")
            //   $("picture source[data-image='undefined'], picture img[data-image='undefined']").addClass("dataundef")
            //   $(".dataundef").removeAttr("data-image")
            //   $("picture source, picture img").removeClass("dataundef");
          });
          // })
      </script>
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(65140885, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/65140885" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->      <!-- <script>
    (function(w, d, u, i, o, s, p) {
        if (d.getElementById(i)) { return; } w['MangoObject'] = o;
        w[o] = w[o] || function() { (w[o].q = w[o].q || []).push(arguments) }; w[o].u = u; w[o].t = 1 * new Date();
        s = d.createElement('script'); s.async = 1; s.id = i; s.src = u;
        p = d.getElementsByTagName('script')[0]; p.parentNode.insertBefore(s, p);
    }(window, document, '//widgets.mango-office.ru/widgets/mango.js', 'mango-js', 'mgo'));
    mgo({calltracking: {id: 22498, elements: [{"numberText":"74992888568"}]}});
</script> -->
<!--mango end-->

<script type="application/ld+json">
  {
            "@context": "http://schema.org",
            "@type": ["Organization", "LocalBusiness"],
            "name": "NRG Фитнес",
            "telephone": "+7 (499) 520-60-12",
            "address": "Москва, Вернадского пр., ул. Лобачевского, 74",
            "email": ["info@nrg.fitness"],
            "image": ["https://v.nrg.fitness/public/storage/586/conversions/5ec65a7875287_trenazhernyj-zal-vernadka-%281%29-l.webp", "https://v.nrg.fitness/public/storage/587/conversions/5ec65a7a27688_trenazhernyj-zal-vernadka-%282%29-l.webp", "https://v.nrg.fitness/public/storage/588/conversions/5ec65a7a495e6_trenazhernyj-zal-vernadka-%283%29-l.webp", "https://v.nrg.fitness/public/storage/589/conversions/5ec65a7b584d7_trenazhernyj-zal-vernadka-%285%29-l.webp", "https://v.nrg.fitness/public/storage/590/conversions/5ec65a7c58119_trenazhernyj-zal-vernadka-%286%29-l.webp", "https://v.nrg.fitness/public/storage/591/conversions/5ec65a7c71e1b_trenazhernyj-zal-vernadka-%284%29-l.webp", "https://v.nrg.fitness/public/storage/592/conversions/5ec65a7d63ba6_trenazhernyj-zal-vernadka-%287%29-l.webp", "https://v.nrg.fitness/public/storage/593/conversions/5ec65a7e64d77_trenazhernyj-zal-vernadka-%289%29-l.webp", "https://v.nrg.fitness/public/storage/594/conversions/5ec65a7f4cec1_trenazhernyj-zal-vernadka-%2810%29-l.webp", "https://v.nrg.fitness/public/storage/595/conversions/5ec65a8087ab8_trenazhernyj-zal-vernadka-%288%29-l.webp", "https://v.nrg.fitness/public/storage/750/conversions/5ef35d43ba39c_galerija-vernadka%2817%29-l.webp", "https://v.nrg.fitness/public/storage/748/conversions/5ef35d4209860_galerija-vernadka%2815%29-l.webp", "https://v.nrg.fitness/public/storage/790/conversions/5f0c28586afd2_5ef3aaf1026c3_galerija-vernadka-8-l-l.webp", "https://v.nrg.fitness/public/storage/788/conversions/5f046f1ef20d8_vernadka-4-l.webp", "https://v.nrg.fitness/public/storage/775/conversions/5ef3aaf376b53_galerija-vernadka-28-l.webp", "https://v.nrg.fitness/public/storage/774/conversions/5ef3aaf3040fa_galerija-vernadka-26-l.webp", "https://v.nrg.fitness/public/storage/773/conversions/5ef3aaf303efa_galerija-vernadka-25-l.webp", "https://v.nrg.fitness/public/storage/771/conversions/5ef3aaf2840b2_galerija-vernadka-21-l.webp", "https://v.nrg.fitness/public/storage/769/conversions/5ef3aaf24330e_galerija-vernadka-20-l.webp", "https://v.nrg.fitness/public/storage/585/conversions/5ec65a55f411c_o_nas-l.webp"],
      "openingHours": "Mo-Su",
            "currenciesAccepted": "RUB",
      "paymentAccepted": ["Cash", "credit card"],
            "map": "https://yandex.ru/maps/-/CCQ~aVUlGD",
            "priceRange": "8000-30000RUB",
            "publicAccess": true
}
</script>
<!-- Roistat start --> <script>(function(w, d, s, h, id) { w.roistatProjectId = id; w.roistatHost = h; var p = d.location.protocol == "https:" ? "https://" : "http://"; var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href); var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);})(window, document, 'script', 'cloud.roistat.com', 'b6426ccc5437f946147931e90ae2a6f5');</script> <!-- Roistat start -->
    <!-- Pixel -->
<script type="text/javascript">
    (function (d, w) {
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&cookie=" + encodeURIComponent(document.cookie);
 
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
    })(document, window);
</script>
<!-- /Pixel -->
</body>
</html>
