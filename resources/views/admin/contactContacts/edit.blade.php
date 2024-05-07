@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contactContact.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contact-contacts.update", [$contactContact->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label class="required" for="company_id">{{ trans('cruds.contactContact.fields.company') }}</label>
                            <select class="form-control select2" name="company_id" id="company_id" required>
                                @foreach($companies as $id => $company)
                                    <option value="{{ $id }}" {{ ($contactContact->company ? $contactContact->company->id : old('company_id')) == $id ? 'selected' : '' }}>{{ $company }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('company_id'))
                                <span class="help-block" role="alert">{{ $errors->first('company_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch_name') ? 'has-error' : '' }}">
                            <label class="required" for="branch_name">{{ trans('cruds.contactContact.fields.branch_name') }}</label>
                            <input class="form-control" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', $contactContact->branch_name) }}" required>
                            @if($errors->has('branch_name'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.branch_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_city') ? 'has-error' : '' }}">
                            <label for="contact_city">{{ trans('cruds.contactContact.fields.contact_city') }}</label>
                            <input class="form-control" type="text" name="contact_city" id="contact_city" value="{{ old('contact_city', $contactContact->contact_city) }}">
                            @if($errors->has('contact_city'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_address') ? 'has-error' : '' }}">
                            <label for="contact_address">{{ trans('cruds.contactContact.fields.contact_address') }}</label>
                            <input class="form-control" type="text" name="contact_address" id="contact_address" value="{{ old('contact_address', $contactContact->contact_address) }}">
                            @if($errors->has('contact_address'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_phone_1') ? 'has-error' : '' }}">
                            <label for="contact_phone_1">{{ trans('cruds.contactContact.fields.contact_phone_1') }}</label>
                            <input class="form-control" type="text" name="contact_phone_1" id="contact_phone_1" value="{{ old('contact_phone_1', $contactContact->contact_phone_1) }}">
                            @if($errors->has('contact_phone_1'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_phone_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_phone_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_phone_2') ? 'has-error' : '' }}">
                            <label for="contact_phone_2">{{ trans('cruds.contactContact.fields.contact_phone_2') }}</label>
                            <input class="form-control" type="text" name="contact_phone_2" id="contact_phone_2" value="{{ old('contact_phone_2', $contactContact->contact_phone_2) }}">
                            @if($errors->has('contact_phone_2'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_phone_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_phone_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
                            <label for="contact_email">{{ trans('cruds.contactContact.fields.contact_email') }}</label>
                            <input class="form-control" type="text" name="contact_email" id="contact_email" value="{{ old('contact_email', $contactContact->contact_email) }}">
                            @if($errors->has('contact_email'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_email_helper') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('contact_skype') ? 'has-error' : '' }}">
                                    <label for="contact_skype">{{ trans('cruds.contactContact.fields.contact_skype') }}</label>
                                    <input class="form-control" type="text" name="contact_skype" id="contact_skype" value="{{ old('contact_skype', $contactContact->contact_skype) }}">
                                    @if($errors->has('contact_skype'))
                                        <span class="help-block" role="alert">{{ $errors->first('contact_skype') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.contactContact.fields.contact_skype_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                                    <label for="latitude">{{ trans('cruds.contactContact.fields.latitude') }}</label>
                                    <input class="form-control" type="text" name="latitude" id="latitude" value="{{ old('latitude', $contactContact->latitude) }}">
                                    @if($errors->has('latitude'))
                                        <span class="help-block" role="alert">{{ $errors->first('latitude') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.contactContact.fields.latitude_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                                    <label for="longitude">{{ trans('cruds.contactContact.fields.longitude') }}</label>
                                    <input class="form-control" type="text" name="longitude" id="longitude" value="{{ old('longitude', $contactContact->longitude) }}">
                                    @if($errors->has('longitude'))
                                        <span class="help-block" role="alert">{{ $errors->first('longitude') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.contactContact.fields.longitude_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('contact_fb') ? 'has-error' : '' }}">
                            <label for="contact_fb">{{ trans('cruds.contactContact.fields.contact_fb') }}</label>
                            <input class="form-control" type="text" name="contact_fb" id="contact_fb" value="{{ old('contact_fb', $contactContact->contact_fb) }}">
                            @if($errors->has('contact_fb'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_fb') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_fb_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_ins') ? 'has-error' : '' }}">
                            <label for="contact_ins">{{ trans('cruds.contactContact.fields.contact_ins') }}</label>
                            <input class="form-control" type="text" name="contact_ins" id="contact_ins" value="{{ old('contact_ins', $contactContact->contact_ins) }}">
                            @if($errors->has('contact_ins'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_ins') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_ins_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_tw') ? 'has-error' : '' }}">
                            <label for="contact_tw">{{ trans('cruds.contactContact.fields.contact_tw') }}</label>
                            <input class="form-control" type="text" name="contact_tw" id="contact_tw" value="{{ old('contact_tw', $contactContact->contact_tw) }}">
                            @if($errors->has('contact_tw'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_tw') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_tw_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_vk') ? 'has-error' : '' }}">
                            <label for="contact_vk">{{ trans('cruds.contactContact.fields.contact_vk') }}</label>
                            <input class="form-control" type="text" name="contact_vk" id="contact_vk" value="{{ old('contact_vk', $contactContact->contact_vk) }}">
                            @if($errors->has('contact_vk'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_vk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.contact_vk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label for="logo">{{ trans('cruds.contactContact.fields.logo') }}</label>
                            <div class="needsclick dropzone" id="logo-dropzone">
                            </div>
                            @if($errors->has('logo'))
                                <span class="help-block" role="alert">{{ $errors->first('logo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.logo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
                            <label for="favicon">{{ trans('cruds.contactContact.fields.favicon') }}</label>
                            <div class="needsclick dropzone" id="favicon-dropzone">
                            </div>
                            @if($errors->has('favicon'))
                                <span class="help-block" role="alert">{{ $errors->first('favicon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.favicon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('open_hour') ? 'has-error' : '' }}">
                            <label for="open_hour">{{ trans('cruds.contactContact.fields.open_hour') }}</label>
                            <input class="form-control timepicker" type="text" name="open_hour" id="open_hour" value="{{ old('open_hour', $contactContact->open_hour) }}">
                            @if($errors->has('open_hour'))
                                <span class="help-block" role="alert">{{ $errors->first('open_hour') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.open_hour_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('close_hour') ? 'has-error' : '' }}">
                            <label for="close_hour">{{ trans('cruds.contactContact.fields.close_hour') }}</label>
                            <input class="form-control timepicker" type="text" name="close_hour" id="close_hour" value="{{ old('close_hour', $contactContact->close_hour) }}">
                            @if($errors->has('close_hour'))
                                <span class="help-block" role="alert">{{ $errors->first('close_hour') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.close_hour_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.contactContact.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $contactContact->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('head_script') ? 'has-error' : '' }}">
                            <label for="head_script">{{ trans('cruds.contactContact.fields.head_script') }}</label>
                            <input class="form-control" type="text" name="head_script" id="head_script" value="{{ old('head_script', $contactContact->head_script) }}">
                            @if($errors->has('head_script'))
                                <span class="help-block" role="alert">{{ $errors->first('head_script') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.head_script_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('body_script_top') ? 'has-error' : '' }}">
                            <label for="body_script_top">{{ trans('cruds.contactContact.fields.body_script_top') }}</label>
                            <input class="form-control" type="text" name="body_script_top" id="body_script_top" value="{{ old('body_script_top', $contactContact->body_script_top) }}">
                            @if($errors->has('body_script_top'))
                                <span class="help-block" role="alert">{{ $errors->first('body_script_top') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.body_script_top_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('body_script_bottom') ? 'has-error' : '' }}">
                            <label for="body_script_bottom">{{ trans('cruds.contactContact.fields.body_script_bottom') }}</label>
                            <input class="form-control" type="text" name="body_script_bottom" id="body_script_bottom" value="{{ old('body_script_bottom', $contactContact->body_script_bottom) }}">
                            @if($errors->has('body_script_bottom'))
                                <span class="help-block" role="alert">{{ $errors->first('body_script_bottom') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactContact.fields.body_script_bottom_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.contact-contacts.storeMedia') }}',
    maxFilesize: 5, // MB
    //acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1096,
      height: 1096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contactContact) && $contactContact->logo)
      var file = {!! json_encode($contactContact->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ asset($contactContact->logo->getUrl('thumb')) }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.contact-contacts.storeMedia') }}',
    maxFilesize: 5, // MB
    //acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 496,
      height: 496
    },
    success: function (file, response) {
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($contactContact) && $contactContact->favicon)
      var file = {!! json_encode($contactContact->favicon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ asset($contactContact->favicon->getUrl('thumb')) }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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
