@extends('layouts.admin')
@section('content')
<div class="content">
    @can('contact_contact_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.contact-contacts.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.contactContact.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.contactContact.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ContactContact">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.company') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.branch_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_city') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_address') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_phone_1') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_phone_2') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_skype') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_fb') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_ins') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_tw') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.contact_vk') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.logo') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.favicon') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.open_hour') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.close_hour') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.latitude') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.longitude') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.head_script') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.body_script_top') }}
                                </th>
                                <th>
                                    {{ trans('cruds.contactContact.fields.body_script_bottom') }}
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
@can('contact_contact_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contact-contacts.massDestroy') }}",
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
    ajax: "{{ route('admin.contact-contacts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'company_company_name', name: 'company.company_name' },
{ data: 'branch_name', name: 'branch_name' },
{ data: 'contact_city', name: 'contact_city' },
{ data: 'contact_address', name: 'contact_address' },
{ data: 'contact_phone_1', name: 'contact_phone_1' },
{ data: 'contact_phone_2', name: 'contact_phone_2' },
{ data: 'contact_email', name: 'contact_email' },
{ data: 'contact_skype', name: 'contact_skype' },
{ data: 'contact_fb', name: 'contact_fb' },
{ data: 'contact_ins', name: 'contact_ins' },
{ data: 'contact_tw', name: 'contact_tw' },
{ data: 'contact_vk', name: 'contact_vk' },
{ data: 'logo', name: 'logo', sortable: false, searchable: false },
{ data: 'favicon', name: 'favicon', sortable: false, searchable: false },
{ data: 'open_hour', name: 'open_hour' },
{ data: 'close_hour', name: 'close_hour' },
{ data: 'latitude', name: 'latitude' },
{ data: 'longitude', name: 'longitude' },
{ data: 'description', name: 'description' },
{ data: 'head_script', name: 'head_script' },
{ data: 'body_script_top', name: 'body_script_top' },
{ data: 'body_script_bottom', name: 'body_script_bottom' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-ContactContact').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection