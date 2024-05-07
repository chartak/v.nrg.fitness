@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contactContact.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-contacts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->company->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.branch_name') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->branch_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_city') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_address') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_phone_1') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_phone_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_phone_2') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_phone_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_email') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_skype') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_skype }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_fb') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_fb }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_ins') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_ins }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_tw') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_tw }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_vk') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->contact_vk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.logo') }}
                                    </th>
                                    <td>
                                        @if($contactContact->logo)
                                            <a href="{{ asset($contactContact->logo->getUrl()) }}" target="_blank">
                                                <img src="{{ asset($contactContact->logo->getUrl('thumb')) }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.favicon') }}
                                    </th>
                                    <td>
                                        @if($contactContact->favicon)
                                            <a href="{{ asset($contactContact->favicon->getUrl()) }}" target="_blank">
                                                <img src="{{ asset($contactContact->favicon->getUrl('thumb')) }}" width="50px" height="50px">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.open_hour') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->open_hour }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.close_hour') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->close_hour }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.latitude') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->latitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.longitude') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->longitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.head_script') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->head_script }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.body_script_top') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->body_script_top }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.body_script_bottom') }}
                                    </th>
                                    <td>
                                        {{ $contactContact->body_script_bottom }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-contacts.index') }}">
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
