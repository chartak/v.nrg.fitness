@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.menu.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.menus.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $menu->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $menu->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.anchor_key') }}
                                    </th>
                                    <td>
                                        {{ $menu->anchor_key }}
                                    </td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<th>--}}
                                        {{--{{ trans('cruds.menu.fields.category') }}--}}
                                    {{--</th>--}}
                                    {{--<td>--}}
                                        {{--@foreach($menu->categories as $key => $category)--}}
                                            {{--<span class="label label-info">{{ $category->name }}</span>--}}
                                        {{--@endforeach--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<th>--}}
                                        {{--{{ trans('cruds.menu.fields.tag') }}--}}
                                    {{--</th>--}}
                                    {{--<td>--}}
                                        {{--@foreach($menu->tags as $key => $tag)--}}
                                            {{--<span class="label label-info">{{ $tag->name }}</span>--}}
                                        {{--@endforeach--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.page_text') }}
                                    </th>
                                    <td>
                                        {!! $menu->page_text !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.orderby') }}
                                    </th>
                                    <td>
                                        {{ $menu->orderby }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.status') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $menu->status ? 'checked' : '' }}>
                                    </td>
                                </tr>

                                {{--<tr>--}}
                                    {{--<th>--}}
                                        {{--{{ trans('cruds.menu.fields.excerpt') }}--}}
                                    {{--</th>--}}
                                    {{--<td>--}}
                                        {{--{{ $menu->excerpt }}--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.featured_image') }}
                                    </th>
                                    <td>
                                        @if($menu->featured_image)
                                            <a href="{{ asset($menu->featured_image->getUrl()) }}" target="_blank">
                                                <img src="{{ asset($menu->featured_image->getUrl('thumb')) }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.branch') }}
                                    </th>
                                    <td>
                                        {{ $menu->branch->branch_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.menus.index') }}">
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
