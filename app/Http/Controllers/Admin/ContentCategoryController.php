<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\ContentCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentCategoryRequest;
use App\Http\Requests\StoreContentCategoryRequest;
use App\Http\Requests\UpdateContentCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContentCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ContentCategory::with(['branch'])->select(sprintf('%s.*', (new ContentCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'content_category_show';
                $editGate      = 'content_category_edit';
                $deleteGate    = 'content_category_delete';
                $crudRoutePart = 'content-categories';

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

        return view('admin.contentCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('content_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contentCategories.create', compact('branches'));
    }

    public function store(StoreContentCategoryRequest $request)
    {
        $contentCategory = ContentCategory::create($request->all());

        return redirect()->route('admin.content-categories.index');
    }

    public function edit(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contentCategory->load('branch');

        return view('admin.contentCategories.edit', compact('branches', 'contentCategory'));
    }

    public function update(UpdateContentCategoryRequest $request, ContentCategory $contentCategory)
    {
        $contentCategory->update($request->all());

        return redirect()->route('admin.content-categories.index');
    }

    public function show(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentCategory->load('branch');

        return view('admin.contentCategories.show', compact('contentCategory'));
    }

    public function destroy(ContentCategory $contentCategory)
    {
        abort_if(Gate::denies('content_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentCategoryRequest $request)
    {
        ContentCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
