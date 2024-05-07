<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTreainerRequest;
use App\Http\Requests\StoreTreainerRequest;
use App\Http\Requests\UpdateTreainerRequest;
use App\Treainer;
use App\TypeOfTrainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TreainerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Treainer::with(['types', 'branches'])->select(sprintf('%s.*', (new Treainer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'treainer_show';
                $editGate      = 'treainer_edit';
                $deleteGate    = 'treainer_delete';
                $crudRoutePart = 'treainers';

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
            $table->editColumn('fullname', function ($row) {
                return $row->fullname ? $row->fullname : "";
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        asset($photo->url),
                        asset($photo->getUrl('thumb'))
                    );
                }

                return '';
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });
            $table->editColumn('schedule_trainer', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->schedule_trainer ? 'checked' : null) . '>';
            });
            $table->editColumn('orderby', function ($row) {
                return $row->orderby ? $row->orderby : "";
            });
            $table->editColumn('type', function ($row) {
                $labels = [];

                foreach ($row->types as $type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $type->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('branch', function ($row) {
                $labels = [];

                foreach ($row->branches as $branch) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $branch->branch_name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'status', 'type', 'branch']);

            return $table->make(true);
        }

        return view('admin.treainers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('treainer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = TypeOfTrainer::all()->pluck('name', 'id');

        $branches = ContactContact::all()->pluck('branch_name', 'id');

        return view('admin.treainers.create', compact('types', 'branches'));
    }

    public function store(StoreTreainerRequest $request)
    {
        $treainer = Treainer::create($request->all());
        $treainer->types()->sync($request->input('types', []));
        $treainer->branches()->sync($request->input('branches', []));

        if ($request->input('photo', false)) {
            $treainer->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.treainers.index');
    }

    public function edit(Treainer $treainer)
    {
        abort_if(Gate::denies('treainer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = TypeOfTrainer::all()->pluck('name', 'id');

        $branches = ContactContact::all()->pluck('branch_name', 'id');

        $treainer->load('types', 'branches');

        return view('admin.treainers.edit', compact('types', 'branches', 'treainer'));
    }

    public function update(UpdateTreainerRequest $request, Treainer $treainer)
    {
        $treainer->update($request->all());
        $treainer->types()->sync($request->input('types', []));
        $treainer->branches()->sync($request->input('branches', []));

        if ($request->input('photo', false)) {
            if (!$treainer->photo || $request->input('photo') !== $treainer->photo->file_name) {
                $treainer->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($treainer->photo) {
            $treainer->photo->delete();
        }

        return redirect()->route('admin.treainers.index');
    }

    public function show(Treainer $treainer)
    {
        abort_if(Gate::denies('treainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $treainer->load('types', 'branches');

        return view('admin.treainers.show', compact('treainer'));
    }

    public function destroy(Treainer $treainer)
    {
        abort_if(Gate::denies('treainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $treainer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTreainerRequest $request)
    {
        Treainer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
