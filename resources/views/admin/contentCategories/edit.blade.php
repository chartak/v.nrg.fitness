@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contentCategory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.content-categories.update", [$contentCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.contentCategory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $contentCategory->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentCategory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                            <label for="slug">{{ trans('cruds.contentCategory.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $contentCategory->slug) }}">
                            @if($errors->has('slug'))
                                <span class="help-block" role="alert">{{ $errors->first('slug') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentCategory.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="required" for="branch_id">{{ trans('cruds.contentCategory.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ ($contentCategory->branch ? $contentCategory->branch->id : old('branch_id')) == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_id'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentCategory.fields.branch_helper') }}</span>
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