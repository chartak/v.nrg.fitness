@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.service.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description') !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" id="status" value="1" {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                                <label for="status" style="font-weight: 400">{{ trans('cruds.service.fields.status') }}</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orderby') ? 'has-error' : '' }}">
                            <label class="required" for="orderby">{{ trans('cruds.service.fields.orderby') }}</label>
                            <input class="form-control" type="number" min="1" oninput="this.value = Math.abs(this.value)" name="orderby" id="orderby" value="{{ old('orderby') }}" step="1" required>
                            @if($errors->has('orderby'))
                                <span class="help-block" role="alert">{{ $errors->first('orderby') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.orderby_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('special_offer') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="special_offer" value="0">
                                <input type="checkbox" name="special_offer" id="status" value="1" {{ old('special_offer', 0) == 1 || old('special_offer') !== null ? 'checked' : '' }}>
                                <label for="special_offer" style="font-weight: 400">{{ trans('cruds.service.fields.special_offer') }}</label>
                            </div>
                            @if($errors->has('special_offer'))
                                <span class="help-block" role="alert">{{ $errors->first('special_offer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.special_offer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('timetable') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="timetable" value="0">
                                <input type="checkbox" name="timetable" id="status" value="1" {{ old('timetable', 0) == 1 || old('timetable') !== null ? 'checked' : '' }}>
                                <label for="timetable" style="font-weight: 400">{{ trans('cruds.service.fields.timetable') }}</label>
                            </div>
                            @if($errors->has('timetable'))
                                <span class="help-block" role="alert">{{ $errors->first('timetable') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.timetable_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label class="required" for="photo">{{ trans('cruds.service.fields.photo') }}</label>
                            <span class="help-block">{{ trans('cruds.service.fields.photo_helper') }}</span>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="required" for="branch_id">{{ trans('cruds.service.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_id'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.branch_helper') }}</span>
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
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.services.storeMedia') }}',
    maxFilesize: parseInt('{{env('MAX_FILESIZE')}}'), // MB
    //acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: parseInt('{{env('MAX_FILESIZE')}}'),
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($service) && $service->photo)
      var files =
        {!! json_encode($service->photo) !!}
        var app_url = '{{env('APP_URL')}}'
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, app_url+'/'+file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
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
