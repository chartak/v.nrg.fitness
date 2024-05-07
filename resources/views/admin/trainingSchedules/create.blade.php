@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.trainingSchedule.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.training-schedules.store") }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
                            <label class="required" for="service_id">{{ trans('cruds.trainingSchedule.fields.service') }}</label>
                            <select class="form-control select2" name="service_id" id="service_id" required>
                                @foreach($services as $id => $service)
                                    <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $service }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('service_id'))
                                <span class="help-block" role="alert">{{ $errors->first('service_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.service_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('day_of_week') ? 'has-error' : '' }}">
                            <label for="day_of_week" class="required">{{ trans('cruds.trainingSchedule.fields.day_of_week') }}</label>
                            <select class="form-control" name="day_of_week" id="day_of_week" required>
                                <option value disabled {{ old('day_of_week', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\TrainingSchedule::DAY_WEEK_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('day_of_week', 'enabled') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('day_of_week'))
                                <span class="help-block" role="alert">{{ $errors->first('day_of_week') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.day_of_week_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                            <label class="required" for="time">{{ trans('cruds.trainingSchedule.fields.time') }}</label>
                            <input class="form-control" type="time" name="time" id="time" value="{{ old('time', '') }}" required>
                            @if($errors->has('time'))
                                <span class="help-block" role="alert">{{ $errors->first('time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.time_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('treainer') ? 'has-error' : '' }}">
                            <label class="required" for="treainer_id">{{ trans('cruds.trainingSchedule.fields.treainer') }}</label>
                            <select class="form-control select2" name="treainer_id" id="treainer_id" required>
                                @foreach($treainers as $id => $treainer)
                                    <option value="{{ $id }}" {{ old('treainer_id') == $id ? 'selected' : '' }}>{{ $treainer }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('treainer_id'))
                                <span class="help-block" role="alert">{{ $errors->first('treainer_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.treainer_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('training_name') ? 'has-error' : '' }}">
                            <label class="required" for="training_name">{{ trans('cruds.trainingSchedule.fields.training_name') }}</label>
                            <input class="form-control" type="text" name="training_name" id="training_name" value="{{ old('training_name', '') }}" required>
                            @if($errors->has('training_name'))
                                <span class="help-block" role="alert">{{ $errors->first('training_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.training_name_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('pay_type_training') ? 'has-error' : '' }}">
                            <label for="pay_type_training" class="required">{{ trans('cruds.trainingSchedule.fields.pay_type_training') }}</label>
                            <select class="form-control" name="pay_type_training" id="pay_type_training" required>
                                <option value disabled {{ old('pay_type_training', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\TrainingSchedule::PAY_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('pay_type_training', 'enabled') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pay_type_training'))
                                <span class="help-block" role="alert">{{ $errors->first('pay_type_training') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.pay_type_training_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
                            <label for="stock_id">{{ trans('cruds.trainingSchedule.fields.stock') }}</label>
                            <select class="form-control select2" name="stock_id" id="stock_id">
                                @foreach($stocks as $id => $stock)
                                    <option value="{{ $id }}" {{ old('stock_id') == $id ? 'selected' : '' }}>{{ $stock }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stock_id'))
                                <span class="help-block" role="alert">{{ $errors->first('stock_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.stock_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.trainingSchedule.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\TrainingSchedule::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', 'enabled') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.status_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="required" for="branch_id">{{ trans('cruds.trainingSchedule.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_id'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.trainingSchedule.fields.branch_helper') }}</span>
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