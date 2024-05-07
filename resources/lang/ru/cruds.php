<?php

return [
    'userManagement'    => [
        'title'          => 'Управление пользователями',
        'title_singular' => 'Управление пользователями',
    ],
    'permission'        => [
        'title'          => 'Доступы',
        'title_singular' => 'Доступ',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'              => [
        'title'          => 'Роли',
        'title_singular' => 'Роль',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'              => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователь',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'contactManagement' => [
        'title'          => 'Управление фитнес клубом',
        'title_singular' => 'Управление фитнес клубом',
    ],
    'contactCompany'    => [
        'title'          => 'Информация о фитнес клубах',
        'title_singular' => 'Информация о фитнес клубах',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'company_name'           => 'название фитнес клуба',
            'company_name_helper'    => '',
            'company_address'        => 'Адрес',
            'company_address_helper' => '',
            'company_website'        => 'Веб-сайт',
            'company_website_helper' => '',
            'company_email'          => 'Эл. адрес',
            'company_email_helper'   => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated At',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted At',
            'deleted_at_helper'      => '',
        ],
    ],
    'contactContact'    => [
        'title'          => 'Контакты филиала',
        'title_singular' => 'Контакты филиала',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'company'                   => 'Company',
            'company_helper'            => '',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => '',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => '',
            'contact_email'             => 'Email',
            'contact_email_helper'      => '',
            'contact_skype'             => 'Яндекс карта',
            'contact_skype_helper'      => '',
            'contact_address'           => 'Address',
            'contact_address_helper'    => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated At',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted At',
            'deleted_at_helper'         => '',
            'branch_name'               => 'Название филиала',
            'branch_name_helper'        => '',
            'contact_city'              => 'City',
            'contact_city_helper'       => '',
            'contact_fb'                => 'Страница на FB',
            'contact_fb_helper'         => '',
            'contact_ins'               => 'Страница в Instagram',
            'contact_ins_helper'        => '',
            'contact_tw'                => 'Страница Twitter',
            'contact_tw_helper'         => '',
            'contact_vk'                => 'Страница в Vk',
            'contact_vk_helper'         => '',
            'logo'                      => 'логотип',
            'logo_helper'               => '',
            'favicon'                   => 'Favicon',
            'favicon_helper'            => '',
            'open_hour'                 => 'Open Hour',
            'open_hour_helper'          => '',
            'close_hour'                => 'Close Hour',
            'close_hour_helper'         => '',
            'latitude'                  => 'Latitude',
            'latitude_helper'           => '',
            'longitude'                 => 'Longitude',
            'longitude_helper'          => '',
            'description'               => 'Description',
            'description_helper'        => '',
            'head_script'               => 'Head Script',
            'head_script_helper'        => '',
            'body_script_top'           => 'Body Script Top',
            'body_script_top_helper'    => '',
            'body_script_bottom'        => 'Body Script Bottom',
            'body_script_bottom_helper' => '',
        ],
    ],
    'stock'             => [
        'title'          => 'Акции',
        'title_singular' => 'Акции',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Название',
            'name_helper'       => '',
            'start_date'        => 'Дата на.',
            'start_date_helper' => '',
            'end_date'          => 'Дата ок.',
            'end_date_helper'   => '',
            'orderby'           => 'Сортировать по',
            'orderby_helper'    => '',
            'status'            => 'Доступный',
            'status_helper'     => '',
            'discounts'         => 'Скидки',
            'discounts_helper'  => '',
            'photo'             => 'Фото 1500x1071',
            'photo_helper'      => '(Загружаемый размер изображений должен быть равен 1500x1071 пикселей)',
            'photo_stock'             => 'Фото правая панель',
            'photo_stock_helper'      => '(Загружаемый размер изображений должен быть равен 352x171 пикселей)',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'branch'            => 'Филиал',
            'branch_helper'     => '',
        ],
    ],
    'typeOfTrainer'     => [
        'title'          => 'Тип тренера',
        'title_singular' => 'Тип тренера',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Название',
            'name_helper'        => '',
            'description'        => 'Описание',
            'description_helper' => '',
            'status'             => 'Доступный',
            'status_helper'      => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'trainingSchedule'     => [
        'title'          => 'Расписание тренировок',
        'title_singular' => 'Расписание тренировок',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'service'            => 'Название Услуги',
            'service_helper'     => '',
            'day_of_week'        => 'День недели',
            'day_of_week_helper' => '',
            'time'               => 'Время',
            'time_helper'        => '',
            'treainer'           => 'Тренера',
            'treainer_helper'    => '',
            'training_name'      => 'Название',
            'training_name_helper'      => '',
            'pay_type_training'  => 'Тип оплаты',
            'pay_type_training_helper'  => '',
            'stock'              => 'Акции',
            'stock_helper'       => '',
            'description'        => 'Описание',
            'description_helper' => '',
            'status'             => 'Доступный',
            'status_helper'      => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'branch'            => 'Филиал',
            'branch_helper'     => '',
        ],
    ],
    'signUpTraining'     => [
        'title'          => 'Онлайн-записи на Фитнес',
        'title_singular' => 'Тип тренера',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'type_id'               => 'Название',
            'type_id_helper'        => '',
            'type_name'               => 'Тип Записи',
            'type_name_helper'        => '',
            'full_name'               => 'Полное Имя',
            'full_name_helper'        => '',
            'phone'               => 'Телефон',
            'phone_helper'        => '',
            'status'             => 'Состояние',
            'status_helper'      => '',
            'created_at'         => 'Дата отправки',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'treainer'          => [
        'title'          => 'Тренера',
        'title_singular' => 'Тренера',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'fullname'           => 'Полное имя',
            'fullname_helper'    => '',
            'description'        => 'Описание',
            'description_helper' => '',
            'photo'              => 'Фото',
            'photo_helper'       => '(Загружаемый размер изображений должен быть равен 710x791 пикселей)',
            'orderby'            => 'Сортировать по',
            'orderby_helper'     => '',
            'status'            => 'Доступный',
            'status_helper'     => '',
            'schedule_trainer'  => 'Тренер для расписания',
            'schedule_trainer_helper'     => '(Для вывода тренера в блок расписания фотографию можно не загружать)',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'type'               => 'Тип тренера',
            'type_helper'        => '',
            'branch'             => 'Филиал',
            'branch_helper'      => '',
        ],
    ],
    'clubCart'          => [
        'title'          => 'Клубные карты',
        'title_singular' => 'Клубные карты',
        'scheduled_time' => 'Альтернативный вариант',
        'scheduled' => 'По расписанию',
        'aroundtheclock' => 'Круглосуточно',
        'scheduled_year' => 'нет ограничений',
        'duration_time'  => 'индивидуально',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Названиеe',
            'name_helper'       => '',
            'description'              => 'Описание',
            'description_helper'       => '',
            'time_label'        =>'Время',
            'on_the_weekend_label' =>'В выходные',
            'on_weekdays_label' => 'В будни',
            'term_label'        => 'Срок',
            'term_days'         => 'Дней',
            'term_days_helper'  => '',
            'freezing_label'    =>'Заморозка',
            'timeto'            => 'Время до',
            'timeto_helper'     => '',
            'timefrom'          => 'Время от',
            'timefrom_helper'   => '',
            'duration'          => 'Прод. -ность',
            'duration_helper'   => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'year_from'         => 'Возраст с',
            'year_from_helper'  => '',
            'year_to'           => 'Возраст до',
            'year_to_helper'    => '',
            'orderby'            => 'Сортировать по',
            'orderby_helper'     => '',
            'status'            => 'Доступный',
            'status_helper'     => '',
            'cart_background'   =>  'Фон карты',
            'cart_background_helper'   =>  'пример` rgb(251, 243, 256)',
            'branch'            => 'Филиал',
            'branch_helper'     => '',
            'open_tab'   =>  'По ссылке',
            'open_tab_helper'   =>  '',
            'cart_url'   =>  'ссылка',
            'cart_url_helper'   =>  'пример` https://klkjlll',
        ],
    ],
    'service'           => [
        'title'          => 'Услуги',
        'title_singular' => 'Услуги',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Название',
            'name_helper'        => '',
            'description'        => 'Описание',
            'description_helper' => '',
            'status'             => 'Доступный',
            'status_helper'      => '',
            'orderby'            => 'Сортировать по',
            'orderby_helper'     => '',
            'special_offer'      => 'Спец. пред.',
            'special_offer_helper'     => '',
            'timetable'          => 'Расписание тренировок',
            'timetable_helper'   => '',
            'photo'              => 'Фото',
            'photo_helper'       => '(Загружаемый размер изображений должен быть равен 960x640 пикселей)',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'branch'             => 'Филиал',
            'branch_helper'      => '',
        ],
    ],
    'photoGallery'           => [
        'title'          => 'Фотогалерея',
        'title_singular' => 'Фотогалерея',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Название',
            'name_helper'        => '',
            'status'             => 'Доступный',
            'status_helper'      => '',
            'photo'              => 'Фото',
            'photo_helper'       => '(Загружаемый размер изображений должен быть равен 960x640 пикселей)',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'branch'             => 'Филиал',
            'branch_helper'      => '',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory'   => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'branch'            => 'Филиал',
            'branch_helper'     => '',
        ],
    ],
    'contentTag'        => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'slug'              => 'Slug',
            'slug_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => '',
            'branch'            => 'Филиал',
            'branch_helper'     => '',
        ],
    ],
    'contentPage'       => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Title',
            'title_helper'          => '',
            'category'              => 'Categories',
            'category_helper'       => '',
            'tag'                   => 'Tags',
            'tag_helper'            => '',
            'page_text'             => 'Full Text',
            'page_text_helper'      => '',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => '',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => '(Загружаемый размер изображений должен быть равен 1920x500 пикселей)',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => '',
            'branch'                => 'Филиал',
            'branch_helper'         => '',
        ],
    ],
    'menu'       => [
        'title'          => 'Меню',
        'title_singular' => 'Меню',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Название',
            'title_helper'          => '',
            'anchor_key'            => 'Title key',
            'anchor_key_helper'     => '',
            'category'              => 'Categories',
            'category_helper'       => '',
            'tag'                   => 'Tags',
            'tag_helper'            => '',
            'page_text'             => 'Текст содержания',
            'page_text_helper'      => '',
            'orderby'           => 'Сорт. по',
            'orderby_helper'    => '',
            'status'            => 'Доступный',
            'status_helper'     => '',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => '',
            'featured_image'        => 'Фото',
            'featured_image_helper' => '(Загружаемый размер изображений должен быть равен 1920x500 пикселей)',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => '',
            'branch'                => 'Филиал',
            'branch_helper'         => '',
        ],
    ],
    'mailTemplate' => [
        'texts' => [
            'stock_text' => 'Запись по акции ',
            'service_text' => 'Клиент желает записаться на занятие ',
            'treainer_text' => 'Клиент желает записаться на тренировку к тренеру ',
            'club_cart_text' => 'Клиент желает приобрести карту ',
            'special_offer_text' => 'Клиент желает записаться на спецпредложение ',
            'first_training_text' => 'Клиент желает записаться на первую тренировку ',
            'sub_page_stock_text' => 'Клиент желает получить акцию '
        ]
    ]
];
