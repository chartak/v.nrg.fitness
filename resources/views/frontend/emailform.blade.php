<html>
<head></head>
<body>
<table border="0" cellpadding="3" cellspacing="3">
    <tbody style="font-size: 16px;">
    <tr>
        <td><label style="font-weight: 500">ФИО: </label></td><td>{{$user_request["full_name"]}}</td>
    </tr>
    <tr>
        <td><label style="font-weight: 500">Номер: </label></td><td>{{$user_request["phone"]}}</td>
    </tr>
    <tr>
        <td><label style="font-weight: 500">Сообщение: </label></td>
        <td>
            @if(!isset($user_request["schedule_id"]) && !isset($user_request["visit_id"]) && !isset($user_request["freeze_id"]) && !isset($user_request["sub_page_stock"]))
                @if ($user_request["type"] == 'Stock')
                    {{ trans('cruds.mailTemplate.texts.stock_text') }}{{$user_request["name_special"]}}
                @elseif($user_request["type"] == 'Service')
                    {{ trans('cruds.mailTemplate.texts.service_text') }}{{$user_request["name_special"]}}
                @elseif($user_request["type"] == 'Treainer')
                    {{ trans('cruds.mailTemplate.texts.treainer_text') }}{{$user_request["name_special"]}}
                @elseif($user_request["type"] == 'ClubCart')
                    {{ trans('cruds.mailTemplate.texts.club_cart_text') }}{{$user_request["name_special"]}}
                @elseif($user_request["type"] == 'Special Offer')
                    {{ trans('cruds.mailTemplate.texts.special_offer_text') }}{{$user_request["name_special"]}}
                @elseif($user_request["type"] == 'First Training')
                    {{ trans('cruds.mailTemplate.texts.first_training_text') }}
                @endif
            @elseif(isset($user_request["schedule_id"]))
                {{$user_request["message"]}}
            @elseif(isset($user_request["sub_page_stock"]))
                {{ trans('cruds.mailTemplate.texts.sub_page_stock_text') }}
            @endif
        </td>
    </tr>
    @if(isset($user_request["schedule_id"]))
        <tr>
            <td><label style="font-weight: 500">День: </label></td>
            <td>{{$user_request["schedule_special"]["day_month"]}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Время: </label></td>
            <td>{{substr($user_request["schedule_special"]["time"],0,5)}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Тренер: </label></td>
            <td>{{$user_request["schedule_special"]["trainer_name"]}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Тренировка: </label></td>
            <td>{{$user_request["schedule_special"]["training_name"]}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Тип: </label></td>
            <td>{{$user_request["schedule_special"]["pay"]}}</td>
        </tr>
    @elseif(isset($user_request["visit_id"]))
        <tr>
            <td><label style="font-weight: 500">День: </label></td>
            <td>{{$user_request["day_visit"]}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Время: </label></td>
            <td>{{ $user_request["arrival_time"] }} - {{ $user_request["leaving_time"] }}</td>
        </tr>
    @elseif(isset($user_request["freeze_id"]))
        <tr>
            <td><label style="font-weight: 500">Номер карты: </label></td>
            <td>{{$user_request["card_number"]}}</td>
        </tr>
        <tr>
            <td><label style="font-weight: 500">Срок заморозки: </label></td>
            <td>{{ $user_request["start_date"] }} - {{ $user_request["end_date"] }}</td>
        </tr>
    @endif
    </tbody>
</table>
</body>
</html>
