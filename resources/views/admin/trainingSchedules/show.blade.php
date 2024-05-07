@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.trainingSchedule.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.training-schedules.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $trainingSchedule->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.service') }}
                                    </th>
                                    <td>
                                        {{ $trainingSchedule->service->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.day_of_week') }}
                                    </th>
                                    <td>
                                        {{ App\TrainingSchedule::DAY_WEEK_SELECT[$trainingSchedule->day_of_week] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.time') }}
                                    </th>
                                    <td>
                                        {!! $trainingSchedule->time !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.treainer') }}
                                    </th>
                                    <td>
                                        {{ $trainingSchedule->treainer->fullname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.training_name') }}
                                    </th>
                                    <td>
                                        {!! $trainingSchedule->training_name !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.pay_type_training') }}
                                    </th>
                                    <td>
                                        {{ App\TrainingSchedule::PAY_TYPE_SELECT[$trainingSchedule->pay_type_training] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.stock') }}
                                    </th>
                                    <td>
                                        {{ $trainingSchedule->stock->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.trainingSchedule.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\TrainingSchedule::STATUS_SELECT[$trainingSchedule->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.training-schedules.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#type_treainers" aria-controls="type_treainers" role="tab" data-toggle="tab">
                            {{ trans('cruds.treainer.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="type_treainers">
                        @includeIf('admin.trainingSchedule.relationships.typeTreainers', ['treainers' => $trainingSchedule->typeTreainers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection