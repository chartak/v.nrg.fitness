@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.clubCart.title_singular') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.club-carts.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <form method="POST" action="{{ route("admin.club-carts.update", [$clubCart->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="required" for="name">{{ trans('cruds.clubCart.fields.name') }}</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $clubCart->name) }}" required>
                                    @if($errors->has('name'))
                                        <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.name_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="required" for="description">{{ trans('cruds.clubCart.fields.description') }}</label>
                                    <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $clubCart->description) }}" required>
                                    @if($errors->has('description'))
                                        <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.description_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                                    <label class="required" for="branch_id">{{ trans('cruds.clubCart.fields.branch') }}</label>
                                    <select class="form-control select2" name="branch_id" id="branch_id" required>
                                        @foreach($branches as $id => $branch)
                                            <option value="{{ $id }}" {{ ($clubCart->branch ? $clubCart->branch->id : old('branch_id')) == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('branch_id'))
                                        <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.branch_helper') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="border-top:1px solid #d2d6de;padding-top: 15px;">
                            <div class="col-md-2">
                                <label class="title"><i>{{ trans('cruds.clubCart.fields.time_label') }}</i></label>
                                <div class="form-group {{ $errors->has('timefrom') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timefrom') }}</label>
                                    <select class="form-control" name="timefrom" id="timefrom" {{ ($clubCart->timefrom === 'scheduled' || $clubCart->timefrom === 'aroundtheclock') ? 'disabled' : '' }}>
                                        <option value {{ old('timefrom', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMEFROM_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('timefrom', $clubCart->timefrom) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('timefrom'))
                                        <span class="help-block" role="alert">{{ $errors->first('timefrom') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timefrom_helper') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('timeto') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timeto') }}</label>
                                    <select class="form-control" name="timeto" id="timeto" {{ ($clubCart->timefrom === 'scheduled' || $clubCart->timefrom === 'aroundtheclock') ? 'disabled' : '' }}>
                                        <option value {{ old('timeto', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMETO_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('timeto', $clubCart->timeto) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('timeto'))
                                        <span class="help-block" role="alert">{{ $errors->first('timeto') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timeto_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="scheduled_time">{{ trans('cruds.clubCart.scheduled_time') }}</label>
                                    <select class="form-control scheduled_time" name="scheduled_time" id="scheduled_time">
                                        <option value="">{{ trans('global.pleaseSelect') }}</option>
                                        <option value="scheduled" {{ $clubCart->timefrom === 'scheduled' ? 'selected' : '' }}>{{ trans('cruds.clubCart.scheduled') }}</option>
                                        <option value="aroundtheclock" {{ $clubCart->timefrom === 'aroundtheclock' ? 'selected' : '' }}>{{ trans('cruds.clubCart.aroundtheclock') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="border-left:1px solid #adafb3">
                                <label class="title"><i>{{ trans('cruds.clubCart.fields.on_the_weekend_label') }}</i></label>
                                <div class="form-group {{ $errors->has('weekendfrom') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timefrom') }}</label>
                                    <select class="form-control" name="weekendfrom" id="weekendfrom">
                                        <option value {{ old('weekendfrom', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMEFROM_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('weekendfrom', $clubCart->weekendfrom) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('weekendfrom'))
                                        <span class="help-block" role="alert">{{ $errors->first('weekendfrom') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timefrom_helper') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('weekendto') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timeto') }}</label>
                                    <select class="form-control" name="weekendto" id="weekendto">
                                        <option value {{ old('weekendto', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMETO_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('weekendto', $clubCart->weekendto) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('weekendto'))
                                        <span class="help-block" role="alert">{{ $errors->first('weekendto') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timeto_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2" style="border-left:1px solid #adafb3;border-right:1px solid #adafb3">
                                <label class="title"><i>{{ trans('cruds.clubCart.fields.on_weekdays_label') }}</i></label>
                                <div class="form-group {{ $errors->has('weekdaysfrom') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timefrom') }}</label>
                                    <select class="form-control" name="weekdaysfrom" id="weekdaysfrom">
                                        <option value {{ old('weekdaysfrom', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMEFROM_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('weekdaysfrom', $clubCart->weekdaysfrom) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('weekdaysfrom'))
                                        <span class="help-block" role="alert">{{ $errors->first('weekdaysfrom') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timefrom_helper') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('weekdaysto') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.timeto') }}</label>
                                    <select class="form-control" name="weekdaysto" id="weekdaysto">
                                        <option value {{ old('weekdaysto', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::TIMETO_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('weekdaysto', $clubCart->weekdaysto) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('weekdaysto'))
                                        <span class="help-block" role="alert">{{ $errors->first('weekdaysto') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.timeto_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
                                    <label for="duration">{{ trans('cruds.clubCart.fields.freezing_label') }} ({{ trans('cruds.clubCart.fields.duration') }})</label>
                                    <input class="form-control" type="number" min="1" oninput="this.value = Math.abs(this.value)"  name="duration" id="duration" value="{{ old('duration', $clubCart->duration) }}" {{ $clubCart->duration === 'individual' ? 'disabled' : '' }} step="1">
                                    @if($errors->has('duration'))
                                        <span class="help-block" role="alert">{{ $errors->first('duration') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.duration_helper') }}</span>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid #adafb3;">
                                    <input type="checkbox" name="duration_time" id="duration_time"
                                           value="individual" {{ $clubCart->duration === 'individual' ? 'checked' : '' }}>
                                    <label for="duration_time" style="font-weight: 400">{{ trans('cruds.clubCart.duration_time') }}</label>
                                </div>
                                <div class="form-group {{ $errors->has('term') ? 'has-error' : '' }}">
                                    <label for="duration">{{ trans('cruds.clubCart.fields.term_label') }} ({{ trans('cruds.clubCart.fields.term_days') }})</label>
                                    <input class="form-control" type="number" min="0" max="365" oninput="this.value = Math.abs(this.value)"  name="term" id="term" value="{{ old('term', $clubCart->term) }}" step="1">
                                    @if($errors->has('term'))
                                        <span class="help-block" role="alert">{{ $errors->first('term') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.term_days_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-2" style="border-left:1px solid #adafb3">
                                <div class="form-group {{ $errors->has('year_from') ? 'has-error' : '' }}">
                                    <label class="required">{{ trans('cruds.clubCart.fields.year_from') }}</label>
                                    <select class="form-control" name="year_from" id="year_from" {{ $clubCart->year_from === 'norestrictions' ? 'disabled' : '' }}>
                                        <option value disabled {{ old('year_from', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::YEAR_FROM_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('year_from', $clubCart->year_from) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('year_from'))
                                        <span class="help-block" role="alert">{{ $errors->first('year_from') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.year_from_helper') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('year_to') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.clubCart.fields.year_to') }}</label>
                                    <select class="form-control" name="year_to" id="year_to" {{ $clubCart->year_from === 'norestrictions' ? 'disabled' : '' }}>
                                        <option value {{ old('year_to', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\ClubCart::YEAR_TO_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('year_to', $clubCart->year_to) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('year_to'))
                                        <span class="help-block" role="alert">{{ $errors->first('year_to') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.year_to_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <input type="checkbox" name="scheduled_year" id="scheduled_year" value="norestrictions" {{ ($clubCart->year_from === "norestrictions") ? 'checked' : '' }}>
                                        <label for="scheduled_year" style="font-weight: 400">{{ trans('cruds.clubCart.scheduled_year') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="border-top:1px solid #d2d6de;padding-top: 15px;">
                            <div class="col-md-1">
                                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                    <div>
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" id="status" value="1" {{ $clubCart->status || old('status', 0) === 1 ? 'checked' : '' }}>
                                        <label for="status" style="font-weight: 400">{{ trans('cruds.clubCart.fields.status') }}</label>
                                    </div>
                                    @if($errors->has('status'))
                                        <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.status_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('orderby') ? 'has-error' : '' }}">
                                    <label class="required" for="orderby">{{ trans('cruds.clubCart.fields.orderby') }}</label>
                                    <input class="form-control" type="number" min="1" oninput="this.value = Math.abs(this.value)" name="orderby" id="orderby" value="{{ old('orderby', $clubCart->orderby) }}" step="1" required>
                                    @if($errors->has('orderby'))
                                        <span class="help-block" role="alert">{{ $errors->first('orderby') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.orderby_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3" style="border-right:1px solid #adafb3">
                                <div class="form-group {{ $errors->has('cart_background') ? 'has-error' : '' }}">
                                    <label for="cart_background">{{ trans('cruds.clubCart.fields.cart_background') }}</label>
                                    <input class="form-control" type="text" name="cart_background" id="cart_background" value="{{ old('cart_background',$clubCart->cart_background) }}">
                                    @if($errors->has('cart_background'))
                                        <span class="help-block" role="alert">{{ $errors->first('cart_background') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.cart_background_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group {{ $errors->has('open_tab') ? 'has-error' : '' }}">
                                    <div>
                                        <input type="hidden" name="open_tab" value="0">
                                        <input type="checkbox" name="open_tab" id="open_tab" value="1" {{ $clubCart->open_tab || old('open_tab', 0) === 1 ? 'checked' : '' }}>
                                        <label for="open_tab" style="font-weight: 400">{{ trans('cruds.clubCart.fields.open_tab') }}</label>
                                    </div>
                                    @if($errors->has('open_tab'))
                                        <span class="help-block" role="alert">{{ $errors->first('open_tab') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.open_tab_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('cart_url') ? 'has-error' : '' }}">
                                    <label for="cart_url">{{ trans('cruds.clubCart.fields.cart_url') }}</label>
                                    <input class="form-control" type="text" name="cart_url" id="cart_url" value="{{ old('cart_url',$clubCart->cart_url) }}">
                                    @if($errors->has('cart_url'))
                                        <span class="help-block" role="alert">{{ $errors->first('cart_url') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.clubCart.fields.cart_url_helper') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
