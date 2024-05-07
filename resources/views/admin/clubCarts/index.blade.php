@extends('layouts.admin')
@section('content')
<div class="content">
    @can('club_cart_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.club-carts.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.clubCart.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.clubCart.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ClubCart">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.timefrom') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.timeto') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.year_from') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.year_to') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.duration') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.cart_background') }}
                                </th>
                                <th>
                                    {{ trans('cruds.clubCart.fields.branch') }}
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
@can('club_cart_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.club-carts.massDestroy') }}",
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
    ajax: "{{ route('admin.club-carts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'timefrom', name: 'timefrom' },
{ data: 'timeto', name: 'timeto' },
{ data: 'year_from', name: 'year_from' },
{ data: 'year_to', name: 'year_to' },
{ data: 'duration', name: 'duration' },
{ data: 'status', name: 'status' },
{ data: 'cart_background', name: 'cart_background' },
{ data: 'branch_branch_name', name: 'branch.branch_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-ClubCart').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection