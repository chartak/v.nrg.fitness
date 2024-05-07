@extends('layouts.front')

@section('content')
    <?php $pt = '135px';?>
    @foreach($menus as $menu)
        @switch($menu->anchor_key)
            @case('stocks')
                <?php $pt = '3px';?>
                @include('layouts.stocks')
            @break
            @case('covid-19')
            @break
            @case('services')
                @include('layouts.services')
            @break
            @case('timetable')
                @include('layouts.training_schedule')
            @break
            @case('trainers')
                @include('layouts.trainers')
            @break
            @case('media')
                @include('layouts.media')
            @break
            @case('cards')
                @include('layouts.cards')
            @break
            @case('gallery')
                @include('layouts.gallery')
            @break
            @case('about')
                @include('layouts.about')
            @break
        @endswitch
    @endforeach
@endsection
