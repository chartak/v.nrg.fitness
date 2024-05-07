<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMenuRequest;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Menu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MenusController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Menu::with(['branch'])->select(sprintf('%s.*', (new Menu)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'menu_show';
                $editGate      = 'menu_edit';
                $deleteGate    = 'menu_delete';
                $crudRoutePart = 'menus';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : "";
            });
//            $table->editColumn('anchor_key', function ($row) {
//                return $row->anchor_key ? $row->anchor_key : "";
//            });
            $table->editColumn('page_text', function ($row) {
                return $row->page_text ? $row->page_text : "";
            });
            $table->editColumn('orderby', function ($row) {
                return $row->orderby ? $row->orderby : "";
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });

            $table->editColumn('featured_image', function ($row) {
                if ($photo = $row->featured_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        asset($photo->url),
                        asset($photo->getUrl('thumb'))
                    );
                }

                return '';
            });
            $table->addColumn('branch_branch_name', function ($row) {
                return $row->branch ? $row->branch->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'featured_image', 'branch']);

            return $table->make(true);
        }

        return view('admin.menus.index');
    }

    public function create()
    {
        abort_if(Gate::denies('menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.menus.create', compact('branches'));
    }

    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->all());

        if ($request->input('featured_image', false)) {
            $menu->addMedia(storage_path('tmp/uploads/' . $request->input('featured_image')))->toMediaCollection('featured_image');
        }

        return redirect()->route('admin.menus.index');
    }

    public function edit(Menu $menu)
    {
        abort_if(Gate::denies('menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $menu->load('branch');

        return view('admin.menus.edit', compact('branches', 'menu'));
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        if ($request->input('featured_image', false)) {
            if (!$menu->featured_image || $request->input('featured_image') !== $menu->featured_image->file_name) {
                $menu->addMedia(storage_path('tmp/uploads/' . $request->input('featured_image')))->toMediaCollection('featured_image');
            }
        } elseif ($menu->featured_image) {
            $menu->featured_image->delete();
        }

        return redirect()->route('admin.menus.index');
    }

    public function show(Menu $menu)
    {
        abort_if(Gate::denies('menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu->load('branch');

        return view('admin.menus.show', compact('menu'));
    }

    public function destroy(Menu $menu)
    {
        abort_if(Gate::denies('menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $menu->delete();

        return back();
    }

    public function massDestroy(MassDestroyMenuRequest $request)
    {
        Menu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
