@extends('layouts.admin')
<style type="text/css">
    option[value=new] { background-color: #4e2b4e; }
    option[value=inprogress] { background: #161663; }
    option[value=completed] { background-color: green; }
    option[value=canceled] { background-color: #9a1d1d; }
</style>
@section('content')
<div class="content">
    @can('sign_up_training_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.sign-up-training.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.signUpTraining.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.signUpTraining.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SignUpTraining">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.type_id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.type_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.full_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.phone') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.created_at') }}
                                </th>
                                <th>
                                    {{ trans('cruds.signUpTraining.fields.status') }}
                                </th>
                                {{--<th>--}}
                                    {{--&nbsp;--}}
                                {{--</th>--}}
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
@can('type_of_trainer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sign-up-training.massDestroy') }}",
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
    ajax: "{{ route('admin.sign-up-training.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
//{ data: 'id', name: 'id' },
{ data: 'type_id', name: 'type_id' },
{ data: 'type_name', name: 'type_name' },
{ data: 'full_name', name: 'full_name' },
{ data: 'phone', name: 'phone' },
{ data: 'updated_at', name: 'updated_at' },
{ data: 'status', name: 'status' },
{{--{ data: 'actions', name: '{{ trans('global.actions') }}' }--}}
    ],
    order: [[ 6, 'desc' ],[ 5, 'asc' ]],
    pageLength: 50,
  };
  $('.datatable-SignUpTraining').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

});

    function ChangeStatus(current) {
        var orderId = current.attr("data-id");
        var orderStatus = current.val();
        console.log(orderId + '=' + orderStatus);

        if(confirm("{{trans('global.change_status_confirm')}}")){

            $.ajax({
                headers: {'x-csrf-token': _token},
                type: "POST",
                url: "{{ route('admin.sign-up-training.changeStatus') }}",
                dataType: 'JSON',
                data: {id:orderId, status:orderStatus},
                beforeSend: function() {
                    // setting a timeout
                    //$(placeholder).addClass('loading');
                    console.log('loader show');
                },
                success: function(response) {
                    console.log('succ '+response);
                    if(response)
                        location.reload();
                },
                complete: function() {
                    console.log('loader hide');
                },
            })
        }

    }
</script>
@endsection