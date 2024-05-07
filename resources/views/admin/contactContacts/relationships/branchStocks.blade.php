<div class="content">
    @can('stock_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.stocks.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.stock.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Stock">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.end_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.orderby') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.discounts') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stock.fields.branch') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $key => $stock)
                                    <tr data-entry-id="{{ $stock->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $stock->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stock->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stock->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stock->end_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stock->orderby ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $stock->status ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $stock->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $stock->discounts ?? '' }}
                                        </td>
                                        <td>
                                            @if($stock->photo)
                                                <a href="{{ $stock->photo->getUrl() }}" target="_blank">
                                                    <img src="{{ $stock->photo->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $stock->branch->branch_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('stock_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.stocks.show', $stock->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('stock_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.stocks.edit', $stock->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('stock_delete')
                                                <form action="{{ route('admin.stocks.destroy', $stock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('stock_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stocks.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Stock:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection