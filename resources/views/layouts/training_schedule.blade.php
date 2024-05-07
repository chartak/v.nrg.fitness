<div id="Расписание" class="main">
    <div id="timetable" class="ui-section ui-section--visible">
        <section class="section-timetable">
            <div class="content">
                <div class="wrapper">
                    <div class="section-timetable-title ui-section-title">
                        <h2 class="ui-section-title-text">Расписание тренировок</h2>
                    </div>
                    <div class="section-timetable-filters">
                        <!----##---Start Services filter---##-->
                        <div class="section-timetable-groups">
                            @foreach($services as $key => $service)
                            @if($service->timetable)
                            <div class="section-timetable-group customfilic " data-service="{{$service->id}}" triner="0">
                                <div class="section-timetable-group-icon-place">
                                    @switch($service->name)
                                    @case('Бассейн')
                                    <svg version="1.1" viewBox="0 0 64 64" class="section-timetable-group-icon svg-icon svg-fill">
                                        <path fill="#333" stroke="none" pid="0" d="M45.85 27.608a5.916 5.916 0 1 0-.946-11.794 5.916 5.916 0 0 0 .946 11.794zm-35.465-3.075l10.811-4.014 6.417 2.924-13.527 6.107a8.556 8.556 0 0 1 1.622.915c3.126-2.29 7.732-2.289 10.854.001 3.101-2.298 7.7-2.313 10.855-.007a5.277 5.277 0 0 0 1.612-2.21 5.315 5.315 0 0 0-.128-4.068c-.393-.87-1.46-1.979-3.156-2.743-1.948-.879-13.342-6.212-13.342-6.212a2.644 2.644 0 0 0-2.027-.074l-11.84 4.395a2.659 2.659 0 1 0 1.849 4.986zm52.994 9.089a2.13 2.13 0 0 0-3.01-.002 1.718 1.718 0 0 1-2.424.002c-2.241-2.244-6.197-2.248-8.444.002-.644.644-1.77.644-2.417-.002-2.25-2.257-6.182-2.26-8.44 0-.648.646-1.775.646-2.423 0l-.124-.12c-2.256-2.132-6.107-2.09-8.324.124-.636.638-1.77.64-2.418-.003-2.218-2.224-6.221-2.227-8.444 0-.635.64-1.771.645-2.416-.003-2.257-2.255-6.185-2.25-8.435-.001a1.722 1.722 0 0 1-2.428 0 2.128 2.128 0 0 0-3.008 3.01 5.983 5.983 0 0 0 8.442 0c.648-.646 1.778-.643 2.417-.004 2.252 2.26 6.189 2.26 8.44.004.636-.64 1.777-.647 2.429.006a5.933 5.933 0 0 0 4.215 1.744c1.595 0 3.092-.62 4.223-1.753.643-.642 1.778-.641 2.417 0l.127.12c2.262 2.146 6.1 2.097 8.317-.117.653-.65 1.774-.65 2.422-.002 2.256 2.26 6.186 2.257 8.442-.002.64-.64 1.774-.645 2.423.006 2.326 2.323 6.112 2.318 8.44-.001.83-.83.83-2.177.001-3.008zM49.731 44.059l-.23.2c-.64.641-1.776.638-2.416 0-2.25-2.259-6.18-2.26-8.442-.004-.648.65-1.774.648-2.422.002l-.124-.12c-2.256-2.132-6.107-2.09-8.324.124-.636.638-1.77.641-2.418-.003-2.233-2.24-6.198-2.241-8.442 0-.637.64-1.774.64-2.416 0a2.126 2.126 0 1 0-3.012 3.004c2.235 2.242 6.203 2.242 8.438.002.644-.645 1.772-.651 2.429.006a5.933 5.933 0 0 0 4.214 1.745c1.596 0 3.093-.621 4.223-1.753.644-.643 1.778-.642 2.418-.001l.127.12c2.266 2.147 6.105 2.098 8.32-.118.647-.646 1.773-.65 2.421.003 2.225 2.221 6.147 2.239 8.388.045a2.125 2.125 0 0 0 .248-2.829 2.125 2.125 0 0 0-2.98-.423z"></path>
                                    </svg>
                                    @break
                                    @case('Кроссфит')
                                    <svg version="1.1" viewBox="0 0 64 64" class="section-timetable-group-icon svg-icon svg-fill">
                                        <path fill="#333" stroke="none" pid="0" d="M45.85 27.608a5.916 5.916 0 1 0-.946-11.794 5.916 5.916 0 0 0 .946 11.794zm-35.465-3.075l10.811-4.014 6.417 2.924-13.527 6.107a8.556 8.556 0 0 1 1.622.915c3.126-2.29 7.732-2.289 10.854.001 3.101-2.298 7.7-2.313 10.855-.007a5.277 5.277 0 0 0 1.612-2.21 5.315 5.315 0 0 0-.128-4.068c-.393-.87-1.46-1.979-3.156-2.743-1.948-.879-13.342-6.212-13.342-6.212a2.644 2.644 0 0 0-2.027-.074l-11.84 4.395a2.659 2.659 0 1 0 1.849 4.986zm52.994 9.089a2.13 2.13 0 0 0-3.01-.002 1.718 1.718 0 0 1-2.424.002c-2.241-2.244-6.197-2.248-8.444.002-.644.644-1.77.644-2.417-.002-2.25-2.257-6.182-2.26-8.44 0-.648.646-1.775.646-2.423 0l-.124-.12c-2.256-2.132-6.107-2.09-8.324.124-.636.638-1.77.64-2.418-.003-2.218-2.224-6.221-2.227-8.444 0-.635.64-1.771.645-2.416-.003-2.257-2.255-6.185-2.25-8.435-.001a1.722 1.722 0 0 1-2.428 0 2.128 2.128 0 0 0-3.008 3.01 5.983 5.983 0 0 0 8.442 0c.648-.646 1.778-.643 2.417-.004 2.252 2.26 6.189 2.26 8.44.004.636-.64 1.777-.647 2.429.006a5.933 5.933 0 0 0 4.215 1.744c1.595 0 3.092-.62 4.223-1.753.643-.642 1.778-.641 2.417 0l.127.12c2.262 2.146 6.1 2.097 8.317-.117.653-.65 1.774-.65 2.422-.002 2.256 2.26 6.186 2.257 8.442-.002.64-.64 1.774-.645 2.423.006 2.326 2.323 6.112 2.318 8.44-.001.83-.83.83-2.177.001-3.008zM49.731 44.059l-.23.2c-.64.641-1.776.638-2.416 0-2.25-2.259-6.18-2.26-8.442-.004-.648.65-1.774.648-2.422.002l-.124-.12c-2.256-2.132-6.107-2.09-8.324.124-.636.638-1.77.641-2.418-.003-2.233-2.24-6.198-2.241-8.442 0-.637.64-1.774.64-2.416 0a2.126 2.126 0 1 0-3.012 3.004c2.235 2.242 6.203 2.242 8.438.002.644-.645 1.772-.651 2.429.006a5.933 5.933 0 0 0 4.214 1.745c1.596 0 3.093-.621 4.223-1.753.644-.643 1.778-.642 2.418-.001l.127.12c2.266 2.147 6.105 2.098 8.32-.118.647-.646 1.773-.65 2.421.003 2.225 2.221 6.147 2.239 8.388.045a2.125 2.125 0 0 0 .248-2.829 2.125 2.125 0 0 0-2.98-.423z"></path>
                                    </svg>
                                    @break
                                    @case('Детский клуб')
                                    <svg version="1.1" viewBox="0 0 60 60" class="section-timetable-group-icon svg-icon svg-fill">
                                        <path fill="#333" stroke="none" pid="0" d="M18.576 14.359a4.288 4.288 0 1 0 0-8.575 4.288 4.288 0 0 0 0 8.575zm27.117 11.01c-.302-2.172-1.282-4.178-1.84-6.276.015-.128.038-.251.036-.39-.028-3.213-.421-6.389-.869-9.564-.222-1.552-2.172-2.378-3.531-2.003A2.665 2.665 0 0 0 38.116 8c-1.082-.357-2.225-.524-3.409-.538-2.224-.026-2.222 3.417 0 3.443 1.07.014 1.999.191 2.888.592.02.166.044.331.062.498-.429.173-.822.473-1.137.942-1.858 2.768-5.736 1.827-8.624 1.568a4.021 4.021 0 0 0-5.527 5.788c3.354 3.913 3.267 10.123 3.183 16.13-.013.92-.025 1.824-.025 2.704 0 1.119.458 2.129 1.196 2.858-.344 5.15-1.66 10.298-3.567 15.046-1.192 2.963 3.598 4.238 4.772 1.315 1.992-4.96 3.345-10.392 3.726-15.798a4.015 4.015 0 0 0 1.917-3.421c0-.84.014-1.708.023-2.59.075-5.243.148-11.47-2.26-16.898 2.435.042 4.71-.226 6.671-1.446-.48 1.744-1.364 3.283-2.304 4.852-1.145 1.909 1.833 3.64 2.972 1.738.657-1.094 1.289-2.2 1.814-3.354.184.032.375.047.563.047.52 1.575 1.085 3.14 1.318 4.81.307 2.19 3.629 1.253 3.325-.918zM40.46 6.641a3.32 3.32 0 1 0 0-6.641 3.32 3.32 0 0 0 0 6.641z"></path>
                                    </svg>
                                    @break
                                    @case('Единоборства')
                                    <svg version="1.1" viewBox="0 0 52 52" class="section-timetable-group-icon svg-icon svg-fill">
                                        <g fill="#333">
                                            <path fill="#333" stroke="none" pid="0" d="M4.444 10.366a4.444 4.444 0 1 0 0-8.888 4.444 4.444 0 0 0 0 8.888zm40.063 4.445a4.444 4.444 0 1 0 0-8.888 4.444 4.444 0 0 0 0 8.888z"></path>
                                            <path fill="#333" stroke="none" pid="1" d="M51.16 20.83a2.457 2.457 0 0 0-1.428-1.948l-5.648-2.564-4.813-2.437a2.475 2.475 0 0 0-.567-.354l-3.932-1.688a2.494 2.494 0 0 0-.468-.148l-7.269-1.518a2.46 2.46 0 0 0-1.006 4.816l7.028 1.469 1.932.829-2.578 3.421-13.76-5.038a2.813 2.813 0 0 0-3.605 1.675 2.8 2.8 0 0 0 .949 3.196l-2.406.882-1.644-6.142.906-.195a2.462 2.462 0 0 0 1.798-1.573l2.717-7.564a2.46 2.46 0 1 0-4.63-1.663L10.537 10.4l-1.006.367-.365.079c-.314.068-.6.196-.85.365L4.703 12.53a2.225 2.225 0 0 0-1.349 2.734l4.928 15.691.06-.036.515 5.45-4.95 10.104a2.808 2.808 0 0 0 2.522 4.049c1.04 0 2.039-.578 2.528-1.574l5.3-10.82a2.797 2.797 0 0 0 .275-1.5l-.84-8.879c0-.014-.006-.025-.008-.039l1.369-.822-.004-.012 4.207-1.543 4.193 3.67a2.799 2.799 0 0 0 1.85.697 2.812 2.812 0 0 0 1.854-4.927l-.003-.004 4.286 1.57c.176.064.355.105.534.132l.033.046a2.79 2.79 0 0 0-.01.752l1.302 9.515-.652 9.598a2.81 2.81 0 0 0 2.615 2.994 2.68 2.68 0 0 0 .193.007 2.812 2.812 0 0 0 2.803-2.62l.671-9.884a2.88 2.88 0 0 0-.02-.572l-1.06-7.732 2.544-3.313 2.909-3.899 3.14 1.425.66 5.546a2.46 2.46 0 0 0 4.885-.58l-.824-6.923z"></path>
                                        </g>
                                    </svg>
                                    @break
                                    @case('Групповые занятия')
                                    <svg version="1.1" viewBox="0 0 60 60" class="section-timetable-group-icon svg-icon svg-fill">
                                        <g fill="#333">
                                            <path fill="#333" stroke="none" pid="0" d="M52.492 13.796a1.455 1.455 0 0 0-2.2-.291c-2.647 2.397-2.844 2.56-3.535 3.252l-3.769-.519-.382 1.035c.477.997.547 2.148.184 3.198l.751.103a29.415 29.415 0 0 0-2.564 4.385 24.894 24.894 0 0 0 .654 7.079 26.527 26.527 0 0 1 5.203-11.01l1.504.207a2.11 2.11 0 0 0 1.743-3.616l2.133-1.931c.533-.483.671-1.29.278-1.892zm-11.234-1.765a1.453 1.453 0 0 0-1.868.86l-.736 1.989a4.205 4.205 0 0 1 2.765.908l.698-1.89a1.454 1.454 0 0 0-.86-1.867z"></path>
                                            <path fill="#333" stroke="none" pid="1" d="M43.335 55.163a5.482 5.482 0 0 0 4.113-5.308 5.452 5.452 0 0 0-.687-2.656 5.505 5.505 0 0 0-2.006-2.061l-3.612-9.234a26.54 26.54 0 0 1-1.66-12.643c-.15.024.025.002-2.956.337a29.448 29.448 0 0 0 1.908 13.366l2.865 7.323-1.844-.245-1.717-4.387-.444 4.1-5.383-.716a4.479 4.479 0 0 1-1.643 1.574l.9.043c.872.042 1.604.725 1.647 1.598a1.687 1.687 0 0 1-1.766 1.773l-5.942-.287a1.687 1.687 0 0 1-1.603-1.766c.039-.81.664-1.656 1.921-1.595a4.581 4.581 0 0 1-1.758-2.436l-2.955-.392 1.458-4.58a2.443 2.443 0 0 0 .103-.982l-.498-5.016c-4.67-.871-4.533-.825-5.007-.995l.595 5.992-1.507 4.73c-4.787.31-8.574 4.29-8.574 9.155 0 2.685 1.153 5.1 2.99 6.777L8.917 57.99c-.412.412-.488 1.072-.139 1.539a1.164 1.164 0 0 0 1.758.131l1.673-1.672a9.133 9.133 0 0 0 4.25 1.044c1.367 0 23.979-3.495 23.979-3.495l4.055 4.117a1.163 1.163 0 0 0 1.657-1.632l-2.815-2.858zm-21.4-5.022c-.141 2.786-2.405 5.05-5.191 5.19a5.484 5.484 0 0 1-5.762-5.761c.141-2.786 2.405-5.05 5.191-5.192a5.485 5.485 0 0 1 5.762 5.762zM32.385.53a4.658 4.658 0 0 0-6.53 2.525 4.675 4.675 0 0 0 2.216 5.731 4.658 4.658 0 0 0 6.53-2.525A4.675 4.675 0 0 0 32.384.531z"></path>
                                            <path fill="#333" stroke="none" pid="2" d="M38.564 17l-7.253.813-4.4-5.24 4.422 3.114 5.314-.596s-7.815-3.428-12.53-5.514c-1.436-.635-3.19.268-3.832 1.958L15.61 23.84c-.637 1.677-.004 3.503 1.486 4.068.497.274.013.134 9.565 1.916L25.52 40.369a2.533 2.533 0 0 0 5.035.545l1.393-12.877a2.532 2.532 0 0 0-2.053-2.762l-4.018-.75 1.005-2.427-3.204-6.812 5.126 6.107a2.11 2.11 0 0 0 1.852.74l8.323-.933c1.076-.121 1.932-1.016 1.93-2.099A2.11 2.11 0 0 0 38.564 17z"></path>
                                        </g>
                                    </svg>
                                    @break
                                    @case('Тренажерный зал')
                                    <svg version="1.1" viewBox="0 0 58 58" class="section-timetable-group-icon svg-icon svg-fill">
                                        <path fill="#333" stroke="none" pid="0" d="M3.223 13.256c.06-2.644 2.346-4.713 5.107-4.656 2.762.058 4.96 2.242 4.9 4.886-.059 2.643-2.375 4.713-5.107 4.655-2.762-.057-4.96-2.241-4.9-4.885zM54.15 40.93H25.584L6.697 25.785v-4.397c0-1.551-1.307-2.787-2.88-2.787-1.604 0-2.88 1.264-2.88 2.787v33.824C.936 56.764 2.242 58 3.816 58c1.603 0 2.88-1.265 2.88-2.788V33.027l16.006 12.845a2.988 2.988 0 0 0 1.841.662h26.697v8.678c0 1.552 1.307 2.788 2.88 2.788 1.604 0 2.881-1.265 2.881-2.788V43.717c.03-1.523-1.277-2.787-2.85-2.787zm-37.03-29.37a6.746 6.746 0 0 1-.565-2.672c0-3.851 3.207-6.955 7.187-6.955s7.186 3.104 7.186 6.955c0 3.85-3.207 6.954-7.186 6.954a7.048 7.048 0 0 1-2.465-.431l-4.781 5.259 14.195 10.863c.089.057.148.115.207.172l11.404-6.61a2.71 2.71 0 0 1 3.207.345l10.215 9.397c1.07.978 1.1 2.616.09 3.65-1.01 1.035-2.703 1.063-3.772.086l-8.73-8.046s-9.563 5.719-12.83 7.472c-2.226 1.178-4.364.258-4.899-.173L9.726 24.377c-1.396-1.207-1.188-2.759-.713-3.65.12-.316.297-.603.535-.862l7.573-8.305zm4.365-2.672c0 1.207 1.01 2.184 2.257 2.184S26 10.095 26 8.888c0-1.207-1.01-2.184-2.257-2.184-1.218 0-2.257.977-2.257 2.184z"></path>
                                    </svg>
                                    @break
                                    @endswitch
                                </div>
                                <div class="section-timetable-group-label">{{$service->name}}</div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <!----##---End Services filter---##-->
                        <div class="section-timetable-filters-row section-timetable-filters-row--category">
                            <div class="section-timetable-filters-item">
                                <div class="ui-select">
                                    <div class="ui-dropdown" style="width: 100%;">
                                        <div class="ui-dropdown-label ">
                                            <div class="heshbordergetgroup ui-select-label">
                                                <div class="ui-select-tools show">
                                                    <div class="" role="button" id="groups" data-name="Группа" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="display:flex;">
                                                        <div class="ui-select-label-value" id="selectedgroup">
                                                            <div class="ui-select-label-value-text" >
                                                                Группа
                                                            </div>
                                                        </div>
                                                        <div class="ui-select-clear getgroupcleare click-show" style="display:none"></div>
                                                        <div class="ui-select-indicator getgroupindicator click-hide"></div>
                                                    </div>
                                                    <div style="position: relative;top: 240px; right: 30px;">
                                                        <div class="dropdown-menu" aria-labelledby="groups" x-placement="top-start">
                                                            @foreach($services as $key => $service)
                                                                @if($service->timetable)
                                                                    <div selectgroup="{{$service->id}}" class="ui-option section-timetable-filter-item section-timetable-filter-item--row getgroup">
                                                                        {{$service->name}}
                                                                    </div>
                                                                @endif
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
                        <div class="section-timetable-filters-row">
                            <!----##---Start Week Days filter---##-->
                            <div class="section-timetable-filters-item">
                                <div class="ui-select">
                                    <div class="ui-dropdown ui-dropdown--blocked" style="width: 100%;">
                                        <div class="ui-dropdown-label">
                                            <div class="heshborderweek ui-select-label ">
                                                <div class="ui-select-tools">
                                                    <div class="wekcl" role="button" data-name="День недели" id="dateweek" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex;">
                                                        <div class="ui-select-label-value"  id="selectedweekdey">
                                                            <div class="ui-select-label-value-text">
                                                                День недели
                                                            </div>
                                                        </div>
                                                        <div class="ui-select-clear weekclear click-show" style="display:none"></div>
                                                        <div class="ui-select-indicator weekindicator click-hide"></div>
                                                    </div>
                                                    <div style="position: relative;top: 240px; right: 30px;">
                                                        <div class="dropdown-menu " aria-labelledby="dateweek">
                                                            @foreach(App\TrainingSchedule::DAY_WEEK_SELECT as $key => $label)
                                                            <div fweek="f{{$key}}" class="ui-option section-timetable-filter-item section-timetable-filter-item--row week">
                                                                {{$label}}
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
                            <!----##---End Week Days filter---##-->
                            <!----##---Start Trainers filter---##-->
                            <div class="section-timetable-filters-item">
                                <div class="ui-select">
                                    <div class="ui-dropdown" style="width: 100%;">
                                        <div class="ui-dropdown-label ">
                                            <div class=" heshbordertrinner ui-select-label">
                                                <div class="ui-select-tools show">
                                                    <div class="" role="button" id="triners" data-name="Тренеры" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="display:flex;">
                                                        <div class="ui-select-label-value" id="selectedtriner">
                                                            <div class="ui-select-label-value-text" >
                                                                Тренеры
                                                            </div>
                                                        </div>
                                                        <div class="ui-select-clear trinercleare click-show" style="display:none"></div>
                                                        <div class="ui-select-indicator trinerindicator click-hide"></div>
                                                    </div>
                                                    <div style="position: relative;top: 240px; right: 30px;">
                                                        <div class="dropdown-menu" aria-labelledby="triners" x-placement="top-start">
                                                            @if($trainers)
                                                                @foreach($trainers as $k=>$treainer)
                                                                    @if($treainer->schedule_trainer)
                                                                        <div selecttriner="{{$treainer->id}}" class="ui-option section-timetable-filter-item section-timetable-filter-item--row gettriner">
                                                                            {{$treainer->fullname}}
                                                                        </div>
                                                                    @endif
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
                            <!----##---End Trainers filter---##-->
                            <!----##---Start Time filter---##-->
                            <div class="section-timetable-filters-item">
                                <div class="ui-select">
                                    <div class="ui-dropdown" style="width: 100%;">
                                        <div class="ui-dropdown-label">
                                            <div class=" ">
                                                <div class="heshbordertime ui-select-label">
                                                    <div class="ui-select-tools">
                                                        <div class="" role="button" id="time" data-name="Время" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:flex; ">
                                                            <div class="ui-select-label-value" id="selecttime">
                                                                <div class="ui-select-label-value-text" >Время</div>
                                                            </div>
                                                            <div class="ui-select-clear timecleare click-show" style="display:none"></div>
                                                            <div class="ui-select-indicator timeindicator click-hide"></div>
                                                        </div>
                                                        <div style="position: relative;top: 240px; right: 30px;">
                                                            <div class="dropdown-menu" aria-labelledby="time" >
                                                                <div taimselected="0001" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    00:00 - 01:00
                                                                </div>
                                                                <div taimselected="0102" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    01:00 - 02:00
                                                                </div>
                                                                <div taimselected="0203" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    02:00 - 03:00
                                                                </div>
                                                                <div taimselected="2021" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    20:00 - 21:00
                                                                </div>
                                                                <div taimselected="2122" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    21:00 - 22:00
                                                                </div>
                                                                <div taimselected="2324" class="ui-option section-timetable-filter-item section-timetable-filter-item--row timefiltr">
                                                                    23:00 - 24:00
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----##---End Time filter---##-->
                            <!----##---Start Pay filter---##-->
                            <div class="section-timetable-filters-item">
                                <div class="ui-select">
                                    <div class="ui-dropdown" style="width: 100%;">
                                        <div class="ui-dropdown-label">
                                            <div class=" ">
                                                <div class="heshborderfree ui-select-label">
                                                    <div class="ui-select-tools">
                                                        <div class="" role="button" id="free" data-name="Платно?" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex;">
                                                            <div class="ui-select-label-value" id="selectvelue">
                                                                <div class="ui-select-label-value-text" >
                                                                    Платно?
                                                                </div>
                                                            </div>
                                                            <div class="ui-select-clear freeclear click-showgit" style="display:none"></div>
                                                            <div class="ui-select-indicator freeindicator click-hide"></div>
                                                        </div>
                                                        <div style="position: relative;top: 240px; right: 30px;">
                                                            <div class="dropdown-menu " aria-labelledby="free">
                                                                <div free="fpay" class="ui-option section-timetable-filter-item section-timetable-filter-item--row freefiltr">
                                                                    Платно
                                                                </div>
                                                                <div free="ffree" class="ui-option section-timetable-filter-item section-timetable-filter-item--row freefiltr">
                                                                    Бесплатно
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----##---End Pay filter---##-->
                            <div class="section-timetable-filters-clear" id="resetFilters">Сбросить фильтры</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start week schedule-->
            <div class="section-timetable-data-wrapper" id="containerTS">
                <div class="section-timetable-data" style="position: relative;">
                    <div class="section-timetable-slider ui-slider ui-slider--follow-finger ui-slider--touched ui-slider--slide">
                        {{--                        <div class="wrapper">--}}
                        <div class="loader__svg lazyload"></div>
                            <div class="carousel schedule__slider swiper-container" style="height: 600px"  tabindex="0">
                                <div class="swiper-wrapper"> <!-- style="height: 558px; touch-action: pan-y;"-->
                                    @if(isset($arrWeekTrainingSchedule))
                                        <?php $a = array(0,1,2);?>
                                    @foreach($arrWeekTrainingSchedule as $key => $values)
                                    <?php $day_m = explode('-',$key)?>
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
                                                        <div class="gt{{$val["training_sch_id"]}}" getweek="{{$day_m[1]}}" getdate="{{$day_m[0]}}" gettime="{{substr($val["time"],0,5)}}" gettrname="{{$val["trainer_name"]}}" gettrainingname="{{$val["training_name"]}}"></div>
                                                        <div class="tt-event-content">
                                                            <div class="tt-event-name">{{$val["training_name"]}}</div>
                                                            <div class="tt-event-trainer ">{{$val["trainer_name"]}}</div>
                                                        </div>
                                                        <footer class="tt-event-footer">
                                                        <div class="tt-event-indicators">
                                                            <svg version="1.1" viewBox="0 0 16 16" class="tt-event-indicator svg-icon svg-fill">
                                                                <path fill="#1A303E" stroke="none" pid="0" d="M14.767 9.99a.398.398 0 0 0-.398.399v3.538c0 .66-.536 1.195-1.196 1.195H1.993c-.66 0-1.195-.535-1.196-1.195V3.543c0-.66.535-1.195 1.195-1.196h3.539a.398.398 0 1 0 0-.797H1.992A1.995 1.995 0 0 0 0 3.543v10.384a1.995 1.995 0 0 0 1.992 1.992h11.181a1.995 1.995 0 0 0 1.993-1.992v-3.538a.398.398 0 0 0-.399-.399z"></path>
                                                                <path fill="#1A303E" stroke="none" pid="1" d="M15.008.525c-.7-.7-1.836-.7-2.536 0l-7.11 7.11a.398.398 0 0 0-.102.175l-.934 3.375a.398.398 0 0 0 .49.49l3.375-.935a.398.398 0 0 0 .175-.102l7.11-7.11c.699-.7.699-1.834 0-2.535l-.468-.468zM6.23 7.893l5.818-5.818 1.877 1.876L8.107 9.77 6.231 7.893zm-.375.753l1.5 1.499-2.074.574.574-2.073zm9.056-5.68l-.423.422-1.876-1.877.423-.422a.996.996 0 0 1 1.408 0l.468.467a.998.998 0 0 1 0 1.41z"></path>
                                                            </svg>
                                                            @if($val['pay'] == 'Платно')
                                                            <svg version="1.1" viewBox="0 0 16 16" class="tt-event-indicator svg-icon svg-fill">
                                                                <path fill="#1A303E" stroke="none" pid="0" d="M13.657 2.343A7.948 7.948 0 0 0 8 0a7.948 7.948 0 0 0-5.657 2.343A7.948 7.948 0 0 0 0 8c0 2.137.832 4.146 2.343 5.657A7.948 7.948 0 0 0 8 16a7.948 7.948 0 0 0 5.657-2.343A7.948 7.948 0 0 0 16 8a7.948 7.948 0 0 0-2.343-5.657zM8 15.063A7.07 7.07 0 0 1 .937 8 7.07 7.07 0 0 1 8 .937 7.07 7.07 0 0 1 15.063 8 7.07 7.07 0 0 1 8 15.063z"></path>
                                                                <path fill="#1A303E" stroke="none" pid="1" d="M8.502 7.531H7.498a1.039 1.039 0 0 1 0-2.075h2.008a.469.469 0 0 0 0-.937H8.47V3.481a.469.469 0 0 0-.938 0V4.52h-.033a1.977 1.977 0 0 0-1.975 1.975c0 1.089.886 1.975 1.975 1.975h1.004a1.039 1.039 0 0 1 0 2.075H6.494a.469.469 0 0 0 0 .937H7.53v1.038a.469.469 0 1 0 .938 0V11.48h.033a1.977 1.977 0 0 0 1.975-1.975 1.977 1.977 0 0 0-1.975-1.975z"></path>
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
                    <!-- Start next, prev button-->
                    <div class="wrapper" style="position: relative;">
                        <button class="arrow-button prev-next-button previous" type="button" aria-label="Previous">
                            <svg class="arrow-button-icon" viewBox="0 0 100 100" fill="white">
                                <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                            </svg>
                        </button>
                        <button class="arrow-button prev-next-button next" type="button" aria-label="Next">
                            <svg class="arrow-button-icon" viewBox="0 0 100 100" fill="white">
                                <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path>
                            </svg>
                        </button>
                    </div>
                    <!-- End next, prev button-->
                </div>
            </div>
    </div>
    <!-- End week schedule-->
    {{--    </div>--}}
</section>
</div>
</div>
