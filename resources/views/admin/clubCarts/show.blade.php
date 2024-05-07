@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.clubCart.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.club-carts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.timefrom') }}
                                    </th>
                                    <td>
                                        {{ App\ClubCart::TIMEFROM_SELECT[$clubCart->timefrom] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.timeto') }}
                                    </th>
                                    <td>
                                        {{ App\ClubCart::TIMETO_SELECT[$clubCart->timeto] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.year_from') }}
                                    </th>
                                    <td>
                                        {{ App\ClubCart::YEAR_FROM_SELECT[$clubCart->year_from] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.year_to') }}
                                    </th>
                                    <td>
                                        {{ App\ClubCart::YEAR_TO_SELECT[$clubCart->year_to] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.duration') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.status') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $clubCart->status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.cart_background') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->cart_background }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.clubCart.fields.branch') }}
                                    </th>
                                    <td>
                                        {{ $clubCart->branch->branch_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.club-carts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
