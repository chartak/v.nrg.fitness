@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.stock.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.stocks.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.stock.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                            <label class="required" for="start_date">{{ trans('cruds.stock.fields.start_date') }}</label>
                            <input class="form-control date" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                            @if($errors->has('start_date'))
                                <span class="help-block" role="alert">{{ $errors->first('start_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.start_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                            <label class="required" for="end_date">{{ trans('cruds.stock.fields.end_date') }}</label>
                            <input class="form-control date" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                            @if($errors->has('end_date'))
                                <span class="help-block" role="alert">{{ $errors->first('end_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.end_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orderby') ? 'has-error' : '' }}">
                            <label class="required" for="orderby">{{ trans('cruds.stock.fields.orderby') }}</label>
                            <input class="form-control" type="number" name="orderby" min="1" oninput="this.value = Math.abs(this.value)" id="orderby" value="{{ old('orderby') }}" step="1" required>
                            @if($errors->has('orderby'))
                                <span class="help-block" role="alert">{{ $errors->first('orderby') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.orderby_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" name="status" id="status" value="1" {{ old('status', 0) == 1 || old('status') === null ? 'checked' : '' }}>
                                <label for="status" style="font-weight: 400">{{ trans('cruds.stock.fields.status') }}</label>
                            </div>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('discounts') ? 'has-error' : '' }}">
                            <label for="discounts">{{ trans('cruds.stock.fields.discounts') }}</label>
                            <input class="form-control" type="number" name="discounts" id="discounts" value="{{ old('discounts') }}" step="1">
                            @if($errors->has('discounts'))
                                <span class="help-block" role="alert">{{ $errors->first('discounts') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.discounts_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label class="required" for="photo">{{ trans('cruds.stock.fields.photo') }}</label>
                            <span class="help-block">{{ trans('cruds.stock.fields.photo_helper') }}</span>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('photo_stock') ? 'has-error' : '' }}">
                            <label class="required" for="photo_stock">{{ trans('cruds.stock.fields.photo_stock') }}</label>
                            <span class="help-block">{{ trans('cruds.stock.fields.photo_stock_helper') }}</span>
                            <div class="needsclick dropzone" id="photo_stock-dropzone">
                            </div>
                            @if($errors->has('photo_stock'))
                                <span class="help-block" role="alert">{{ $errors->first('photo_stock') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label class="required" for="branch_id">{{ trans('cruds.stock.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id" required>
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch_id'))
                                <span class="help-block" role="alert">{{ $errors->first('branch_id') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.branch_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.stocks.storeMedia') }}',
    maxFilesize: parseInt('{{env('MAX_FILESIZE')}}'), // MB
    //acceptedFiles: '.jpeg,.jpg,.png,.gif,webp',
    maxFiles: 1,
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($stock) && $stock->photo)
      var file = {!! json_encode($stock->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ asset($stock->photo->getUrl('thumb')) }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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

    Dropzone.options.photoStockDropzone = {
        url: '{{ route('admin.stocks.storeMedia') }}',
        maxFilesize: parseInt('{{env('MAX_FILESIZE')}}'), // MB
        //acceptedFiles: '.jpeg,.jpg,.png,.gif,webp',
        maxFiles: 1,
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
            $('form').find('input[name="photo_stock"]').remove()
            $('form').append('<input type="hidden" name="photo_stock" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="photo_stock"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
                @if(isset($stock) && $stock->photo_stock)
            var file = {!! json_encode($stock->photo_stock) !!}
                    this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, '{{ asset($stock->photo_stock->getUrl('thumb')) }}')
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="photo_stock" value="' + file.file_name + '">')
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
