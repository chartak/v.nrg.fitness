@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.menu.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.menus.update", [$menu->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.menu.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $menu->title) }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('anchor_key') ? 'has-error' : '' }}">
                            <label class="required" for="anchor_key">{{ trans('cruds.menu.fields.anchor_key') }}</label>
                            <input class="form-control" type="text" name="anchor_key" id="anchor_key" value="{{ old('anchor_key', $menu->anchor_key) }}" required>
                            @if($errors->has('anchor_key'))
                                <span class="help-block" role="alert">{{ $errors->first('anchor_key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.anchor_key_helper') }}</span>
                        </div>
                        {{--<div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">--}}
                            {{--<label for="categories">{{ trans('cruds.menu.fields.category') }}</label>--}}
                            {{--<div style="padding-bottom: 4px">--}}
                                {{--<span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>--}}
                                {{--<span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>--}}
                            {{--</div>--}}
                            {{--<select class="form-control select2" name="categories[]" id="categories" multiple>--}}
                                {{--@foreach($categories as $id => $category)--}}
                                    {{--<option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $menu->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@if($errors->has('categories'))--}}
                                {{--<span class="help-block" role="alert">{{ $errors->first('categories') }}</span>--}}
                            {{--@endif--}}
                            {{--<span class="help-block">{{ trans('cruds.menu.fields.category_helper') }}</span>--}}
                        {{--</div>--}}
                        {{--<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">--}}
                            {{--<label for="tags">{{ trans('cruds.menu.fields.tag') }}</label>--}}
                            {{--<div style="padding-bottom: 4px">--}}
                                {{--<span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>--}}
                                {{--<span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>--}}
                            {{--</div>--}}
                            {{--<select class="form-control select2" name="tags[]" id="tags" multiple>--}}
                                {{--@foreach($tags as $id => $tag)--}}
                                    {{--<option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $menu->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@if($errors->has('tags'))--}}
                                {{--<span class="help-block" role="alert">{{ $errors->first('tags') }}</span>--}}
                            {{--@endif--}}
                            {{--<span class="help-block">{{ trans('cruds.menu.fields.tag_helper') }}</span>--}}
                        {{--</div>--}}
                        <div class="form-group {{ $errors->has('page_text') ? 'has-error' : '' }}">
                            <label for="page_text">{{ trans('cruds.menu.fields.page_text') }}</label>
                            <textarea class="form-control ckeditor" name="page_text" id="page_text">{!! old('page_text', $menu->page_text) !!}</textarea>
                            @if($errors->has('page_text'))
                                <span class="help-block" role="alert">{{ $errors->first('page_text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.page_text_helper') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('orderby') ? 'has-error' : '' }}">
                            <label class="required" for="orderby">{{ trans('cruds.menu.fields.orderby') }}</label>
                            <input class="form-control" type="number" min="1" oninput="this.value = Math.abs(this.value)" name="orderby" id="orderby" value="{{ old('orderby', $menu->orderby) }}" step="1" required>
                            @if($errors->has('orderby'))
                                <span class="help-block" role="alert">{{ $errors->first('orderby') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.orderby_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" id="status" value="1" {{ $menu->status || old('status', 0) === 1 ? 'checked' : '' }}>
                                <label for="status" style="font-weight: 400">{{ trans('cruds.menu.fields.status') }}</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('featured_image') ? 'has-error' : '' }}">
                            <label for="featured_image">{{ trans('cruds.menu.fields.featured_image') }}</label>
                            <span class="help-block">{{ trans('cruds.menu.fields.featured_image_helper') }}</span>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <span class="help-block" role="alert">{{ $errors->first('featured_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="required" for="branch_id">{{ trans('cruds.menu.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ ($menu->branch ? $menu->branch->id : old('branch_id')) == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_id'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.branch_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('admin.menus.storeMedia') }}',
    maxFilesize: parseInt('{{env('MAX_FILESIZE')}}'), // MB
    //acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: parseInt('{{env('MAX_FILESIZE')}}'),
      width: 4086,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($menu) && $menu->featured_image)
      var file = {!! json_encode($menu->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ asset($menu->featured_image->getUrl('thumb')) }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
