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

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ClubCart">
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
                            <tbody>
                                @foreach($clubCarts as $key => $clubCart)
                                    <tr data-entry-id="{{ $clubCart->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $clubCart->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clubCart->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\ClubCart::TIMEFROM_SELECT[$clubCart->timefrom] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\ClubCart::TIMETO_SELECT[$clubCart->timeto] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\ClubCart::YEAR_FROM_SELECT[$clubCart->year_from] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\ClubCart::YEAR_TO_SELECT[$clubCart->year_to] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clubCart->duration ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $clubCart->status ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $clubCart->status ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $clubCart->cart_background ?? '' }}
                                        </td>
                                        <td>
                                            {{ $clubCart->branch->branch_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('club_cart_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.club-carts.show', $clubCart->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('club_cart_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.club-carts.edit', $clubCart->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('club_cart_delete')
                                                <form action="{{ route('admin.club-carts.destroy', $clubCart->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('club_cart_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.club-carts.massDestroy') }}",
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
  $('.datatable-ClubCart:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection