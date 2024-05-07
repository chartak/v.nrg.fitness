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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ContactContact">
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
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactContacts as $key => $contactContact)
                                    <tr data-entry-id="{{ $contactContact->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $contactContact->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->company->company_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->branch_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_phone_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_phone_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_skype ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_fb ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_ins ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_tw ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->contact_vk ?? '' }}
                                        </td>
                                        <td>
                                            @if($contactContact->logo)
                                                <a href="{{ $contactContact->logo->getUrl() }}" target="_blank">
                                                    <img src="{{ $contactContact->logo->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($contactContact->favicon)
                                                <a href="{{ $contactContact->favicon->getUrl() }}" target="_blank">
                                                    <img src="{{ $contactContact->favicon->getUrl('thumb') }}" width="50px" height="50px">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $contactContact->open_hour ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->close_hour ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->latitude ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->longitude ?? '' }}
                                        </td>
                                        <td>
                                            {{ $contactContact->description ?? '' }}
                                        </td>
                                        <td>
                                            @can('contact_contact_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.contact-contacts.show', $contactContact->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('contact_contact_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.contact-contacts.edit', $contactContact->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('contact_contact_delete')
                                                <form action="{{ route('admin.contact-contacts.destroy', $contactContact->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contact_contact_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contact-contacts.massDestroy') }}",
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
  $('.datatable-ContactContact:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection