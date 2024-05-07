@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.treainer.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.treainers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $treainer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.fullname') }}
                                    </th>
                                    <td>
                                        {{ $treainer->fullname }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $treainer->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($treainer->photo)
                                            <a href="{{ asset($treainer->photo->getUrl()) }}" target="_blank">
                                                <img src="{{ asset($treainer->photo->getUrl('thumb')) }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.status') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $treainer->status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.type') }}
                                    </th>
                                    <td>
                                        @foreach($treainer->types as $key => $type)
                                            <span class="label label-info">{{ $type->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.treainer.fields.branch') }}
                                    </th>
                                    <td>
                                        @foreach($treainer->branches as $key => $branch)
                                            <span class="label label-info">{{ $branch->branch_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.treainers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
