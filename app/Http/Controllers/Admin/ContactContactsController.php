<?php

namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContactContactRequest;
use App\Http\Requests\StoreContactContactRequest;
use App\Http\Requests\UpdateContactContactRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactContactsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ContactContact::with(['company'])->select(sprintf('%s.*', (new ContactContact)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'contact_contact_show';
                $editGate      = 'contact_contact_edit';
                $deleteGate    = 'contact_contact_delete';
                $crudRoutePart = 'contact-contacts';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('company_company_name', function ($row) {
                return $row->company ? $row->company->company_name : '';
            });

            $table->editColumn('branch_name', function ($row) {
                return $row->branch_name ? $row->branch_name : "";
            });
            $table->editColumn('contact_city', function ($row) {
                return $row->contact_city ? $row->contact_city : "";
            });
            $table->editColumn('contact_address', function ($row) {
                return $row->contact_address ? $row->contact_address : "";
            });
            $table->editColumn('contact_phone_1', function ($row) {
                return $row->contact_phone_1 ? $row->contact_phone_1 : "";
            });
            $table->editColumn('contact_phone_2', function ($row) {
                return $row->contact_phone_2 ? $row->contact_phone_2 : "";
            });
            $table->editColumn('contact_email', function ($row) {
                return $row->contact_email ? $row->contact_email : "";
            });
            $table->editColumn('contact_skype', function ($row) {
                return $row->contact_skype ? $row->contact_skype : "";
            });
            $table->editColumn('contact_fb', function ($row) {
                return $row->contact_fb ? $row->contact_fb : "";
            });
            $table->editColumn('contact_ins', function ($row) {
                return $row->contact_ins ? $row->contact_ins : "";
            });
            $table->editColumn('contact_tw', function ($row) {
                return $row->contact_tw ? $row->contact_tw : "";
            });
            $table->editColumn('contact_vk', function ($row) {
                return $row->contact_vk ? $row->contact_vk : "";
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        asset($photo->url),
                        asset($photo->getUrl('thumb'))
                    );
                }

                return '';
            });
            $table->editColumn('favicon', function ($row) {
                if ($photo = $row->favicon) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        asset($photo->url),
                        asset($photo->getUrl('thumb'))
                    );
                }

                return '';
            });
            $table->editColumn('open_hour', function ($row) {
                return $row->open_hour ? $row->open_hour : "";
            });
            $table->editColumn('close_hour', function ($row) {
                return $row->close_hour ? $row->close_hour : "";
            });
            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : "";
            });
            $table->editColumn('longitude', function ($row) {
                return $row->longitude ? $row->longitude : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('head_script', function ($row) {
                return $row->head_script ? $row->head_script : "";
            });
            $table->editColumn('body_script_top', function ($row) {
                return $row->body_script_top ? $row->body_script_top : "";
            });
            $table->editColumn('body_script_bottom', function ($row) {
                return $row->body_script_bottom ? $row->body_script_bottom : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'company', 'logo', 'favicon']);

            return $table->make(true);
        }

        return view('admin.contactContacts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contact_contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contactContacts.create', compact('companies'));
    }

    public function store(StoreContactContactRequest $request)
    {
        $contactContact = ContactContact::create($request->all());

        if ($request->input('logo', false)) {
            $contactContact->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('favicon', false)) {
            $contactContact->addMedia(storage_path('tmp/uploads/' . $request->input('favicon')))->toMediaCollection('favicon');
        }

        return redirect()->route('admin.contact-contacts.index');
    }

    public function edit(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = ContactCompany::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contactContact->load('company');

        return view('admin.contactContacts.edit', compact('companies', 'contactContact'));
    }

    public function update(UpdateContactContactRequest $request, ContactContact $contactContact)
    {
        $contactContact->update($request->all());

        if ($request->input('logo', false)) {
            if (!$contactContact->logo || $request->input('logo') !== $contactContact->logo->file_name) {
                $contactContact->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($contactContact->logo) {
            $contactContact->logo->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$contactContact->favicon || $request->input('favicon') !== $contactContact->favicon->file_name) {
                $contactContact->addMedia(storage_path('tmp/uploads/' . $request->input('favicon')))->toMediaCollection('favicon');
            }
        } elseif ($contactContact->favicon) {
            $contactContact->favicon->delete();
        }

        return redirect()->route('admin.contact-contacts.index');
    }

    public function show(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactContact->load('company');

        return view('admin.contactContacts.show', compact('contactContact'));
    }

    public function destroy(ContactContact $contactContact)
    {
        abort_if(Gate::denies('contact_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactContact->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactContactRequest $request)
    {
        ContactContact::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
