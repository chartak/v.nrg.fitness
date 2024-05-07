<div class="section-timetable-data" style="position: relative;">
    <div class="section-timetable-slider ui-slider ui-slider--follow-finger ui-slider--touched ui-slider--slide">
    <div class="loader__svg lazyload"></div>
        <div class="carousel schedule__slider swiper-container" style="height: 600px" tabindex="0">
                    <div class="swiper-wrapper">
                @if(isset($arrWeekTrainingSchedule))
                    <?php $a = array(0,1,2);?>
                    @foreach($arrWeekTrainingSchedule as $key => $values)
                        <?php $day_m = explode('-', $key)?>
                        <div class="swiper-slide tt-day section-timetable-day section-timetable-day-slide f{{$day_m[1]}} fevent {{$day_m[1]}} " aria-hidden="true">
                            <div class="tt-day-label">
                                <div class="tt-day-label-day">{{$day_m[1]}}</div>
                                <div class="tt-day-label-date">{{$day_m[0]}}</div>
                            </div>
                            <div class="tt-day-events" style="width: fit-content;-webkit-width: fit-content;-moz-width: fit-content;">
                                @foreach($values as $k => $val)
                                    <div trinernametime="grudina" clname="gt{{$val["training_sch_id"]}}" class="tt-day-cell flpop timedisabl fpay">
                                        <div class="tt-event tt-day-event">
                                            <header class="tt-event-header">
                                                <time class="tt-event-time ">{{substr($val["time"],0,5)}}</time>
                                            </header>
                                            <div class="gt{{$val["training_sch_id"]}}" getweek="{{$day_m[1]}}" getdate="{{$day_m[0]}}" gettime="{{substr($val["time"],0,5)}}"
                                                 gettrname="{{$val["trainer_name"]}}" gettrainingname="{{$val["training_name"]}}"></div>
                                            <div class="tt-event-content">
                                                <div class="tt-event-name">{{$val["training_name"]}}</div>
                                                <div class="tt-event-trainer ">{{$val["trainer_name"]}}</div>
                                            </div>
                                            <footer class="tt-event-footer">
                                                <div class="tt-event-indicators">
                                                    <svg version="1.1" viewBox="0 0 16 16"
                                                         class="tt-event-indicator svg-icon svg-fill">
                                                        <path fill="#1A303E" stroke="none" pid="0"
                                                              d="M14.767 9.99a.398.398 0 0 0-.398.399v3.538c0 .66-.536 1.195-1.196 1.195H1.993c-.66 0-1.195-.535-1.196-1.195V3.543c0-.66.535-1.195 1.195-1.196h3.539a.398.398 0 1 0 0-.797H1.992A1.995 1.995 0 0 0 0 3.543v10.384a1.995 1.995 0 0 0 1.992 1.992h11.181a1.995 1.995 0 0 0 1.993-1.992v-3.538a.398.398 0 0 0-.399-.399z"></path>
                                                        <path fill="#1A303E" stroke="none" pid="1"
                                                              d="M15.008.525c-.7-.7-1.836-.7-2.536 0l-7.11 7.11a.398.398 0 0 0-.102.175l-.934 3.375a.398.398 0 0 0 .49.49l3.375-.935a.398.398 0 0 0 .175-.102l7.11-7.11c.699-.7.699-1.834 0-2.535l-.468-.468zM6.23 7.893l5.818-5.818 1.877 1.876L8.107 9.77 6.231 7.893zm-.375.753l1.5 1.499-2.074.574.574-2.073zm9.056-5.68l-.423.422-1.876-1.877.423-.422a.996.996 0 0 1 1.408 0l.468.467a.998.998 0 0 1 0 1.41z"></path>
                                                    </svg>
                                                    @if($val['pay'] == 'Платно')
                                                        <svg version="1.1" viewBox="0 0 16 16"
                                                             class="tt-event-indicator svg-icon svg-fill">
                                                            <path fill="#1A303E" stroke="none" pid="0"
                                                                  d="M13.657 2.343A7.948 7.948 0 0 0 8 0a7.948 7.948 0 0 0-5.657 2.343A7.948 7.948 0 0 0 0 8c0 2.137.832 4.146 2.343 5.657A7.948 7.948 0 0 0 8 16a7.948 7.948 0 0 0 5.657-2.343A7.948 7.948 0 0 0 16 8a7.948 7.948 0 0 0-2.343-5.657zM8 15.063A7.07 7.07 0 0 1 .937 8 7.07 7.07 0 0 1 8 .937 7.07 7.07 0 0 1 15.063 8 7.07 7.07 0 0 1 8 15.063z"></path>
                                                            <path fill="#1A303E" stroke="none" pid="1"
                                                                  d="M8.502 7.531H7.498a1.039 1.039 0 0 1 0-2.075h2.008a.469.469 0 0 0 0-.937H8.47V3.481a.469.469 0 0 0-.938 0V4.52h-.033a1.977 1.977 0 0 0-1.975 1.975c0 1.089.886 1.975 1.975 1.975h1.004a1.039 1.039 0 0 1 0 2.075H6.494a.469.469 0 0 0 0 .937H7.53v1.038a.469.469 0 1 0 .938 0V11.48h.033a1.977 1.977 0 0 0 1.975-1.975 1.977 1.977 0 0 0-1.975-1.975z"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </footer>
                                        </div>
                                    </div>
                                @endforeach
                                @if(count($values) <= 2 && count($values) > 0)
                                    <?php
                                        if(!empty($a)){
                                            $key_ =array_rand($a,1);
                                            unset($a[$key_]);
                                        } else {
                                            $a = array(0,1,2);
                                            $key_ =array_rand($a,1);
                                            unset($a[$key_]);
                                        }
                                    ?>
                                    <div trinernametime="grudina" data_stock_id="{{$stocks[$key_]->id}}" data-sch__image="{{$stocks[$key_]->photo->getUrl('l')}}" class="tt-day-cell   timedisabl    fpay     action">
                                        <div class="tt-event tt-day-event" style="background: url('{{$stocks[$key_]->photo->getUrl('l')}}')">
                                            <a class="schedule__button button" href="javascript:void(0)">Записаться</a> <!--попап, ведущий на нужную акцию-->
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="wrapper" style="position: relative;">
            <button class="arrow-button prev-next-button previous" type="button" aria-label="Previous">
                <svg class="arrow-button-icon" viewBox="0 0 100 100" fill="white">
                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                </svg>
            </button>
            <button class="arrow-button prev-next-button next" type="button" aria-label="Next">
                <svg class="arrow-button-icon" viewBox="0 0 100 100" fill="white">
                    <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                          transform="translate(100, 100) rotate(180) "></path>
                </svg>
            </button>
        </div>
    </div>
</div>
