@extends('layouts.admin')
@section('content')
<div class="content">
    @can('menu_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.menus.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.menu.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.menu.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Menus">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.menu.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.menu.fields.title') }}
                                </th>
                                {{--<th>--}}
                                    {{--{{ trans('cruds.menu.fields.anchor_key') }}--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--{{ trans('cruds.menu.fields.page_text') }}--}}
                                {{--</th>--}}
                                <th>
                                    {{ trans('cruds.menu.fields.orderby') }}
                                </th>
                                <th>
                                    {{ trans('cruds.menu.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.menu.fields.featured_image') }}
                                </th>
                                <th>
                                    {{ trans('cruds.menu.fields.branch') }}
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
@can('menu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.menus.massDestroy') }}",
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
    ajax: "{{ route('admin.menus.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'title', name: 'title' },
//{ data: 'anchor_key', name: 'anchor_key' },
//{ data: 'page_text', name: 'page_text' },
{ data: 'orderby', name: 'orderby' },
{ data: 'status', name: 'status' },
//{ data: 'excerpt', name: 'excerpt' },
{ data: 'featured_image', name: 'featured_image', sortable: false, searchable: false },
{ data: 'branch_branch_name', name: 'branch.branch_name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };

  $('.datatable-Menus').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection