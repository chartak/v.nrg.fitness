<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\ContentTag;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentTagRequest;
use App\Http\Requests\StoreContentTagRequest;
use App\Http\Requests\UpdateContentTagRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContentTagController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ContentTag::with(['branch'])->select(sprintf('%s.*', (new ContentTag)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'content_tag_show';
                $editGate      = 'content_tag_edit';
                $deleteGate    = 'content_tag_delete';
                $crudRoutePart = 'content-tags';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : "";
            });
            $table->addColumn('branch_branch_name', function ($row) {
                return $row->branch ? $row->branch->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'branch']);

            return $table->make(true);
        }

        return view('admin.contentTags.index');
    }

    public function create()
    {
        abort_if(Gate::denies('content_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contentTags.create', compact('branches'));
    }

    public function store(StoreContentTagRequest $request)
    {
        $contentTag = ContentTag::create($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function edit(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contentTag->load('branch');

        return view('admin.contentTags.edit', compact('branches', 'contentTag'));
    }

    public function update(UpdateContentTagRequest $request, ContentTag $contentTag)
    {
        $contentTag->update($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function show(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentTag->load('branch');

        return view('admin.contentTags.show', compact('contentTag'));
    }

    public function destroy(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentTagRequest $request)
    {
        ContentTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
