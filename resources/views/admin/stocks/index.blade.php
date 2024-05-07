@extends('layouts.admin')
@section('content')
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
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Stock">
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
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('stock_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.stocks.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.stocks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'orderby', name: 'orderby' },
{ data: 'status', name: 'status' },
{ data: 'discounts', name: 'discounts' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'branch_branch_name', name: 'branch.branch_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  $('.datatable-Stock').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection