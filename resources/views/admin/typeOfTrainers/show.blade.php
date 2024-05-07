@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.typeOfTrainer.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.type-of-trainers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typeOfTrainer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $typeOfTrainer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typeOfTrainer.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $typeOfTrainer->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typeOfTrainer.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $typeOfTrainer->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.typeOfTrainer.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\TypeOfTrainer::STATUS_SELECT[$typeOfTrainer->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.type-of-trainers.index') }}">
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
                        @includeIf('admin.typeOfTrainers.relationships.typeTreainers', ['treainers' => $typeOfTrainer->typeTreainers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection