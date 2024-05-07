<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTypeOfTrainerRequest;
use App\Http\Requests\StoreTypeOfTrainerRequest;
use App\Http\Requests\UpdateTypeOfTrainerRequest;
use App\TypeOfTrainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TypeOfTrainerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = TypeOfTrainer::query()->select(sprintf('%s.*', (new TypeOfTrainer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'type_of_trainer_show';
                $editGate      = 'type_of_trainer_edit';
                $deleteGate    = 'type_of_trainer_delete';
                $crudRoutePart = 'type-of-trainers';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? TypeOfTrainer::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.typeOfTrainers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('type_of_trainer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeOfTrainers.create');
    }

    public function store(StoreTypeOfTrainerRequest $request)
    {
        $typeOfTrainer = TypeOfTrainer::create($request->all());

        return redirect()->route('admin.type-of-trainers.index');
    }

    public function edit(TypeOfTrainer $typeOfTrainer)
    {
        abort_if(Gate::denies('type_of_trainer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.typeOfTrainers.edit', compact('typeOfTrainer'));
    }

    public function update(UpdateTypeOfTrainerRequest $request, TypeOfTrainer $typeOfTrainer)
    {
        $typeOfTrainer->update($request->all());

        return redirect()->route('admin.type-of-trainers.index');
    }

    public function show(TypeOfTrainer $typeOfTrainer)
    {
        abort_if(Gate::denies('type_of_trainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeOfTrainer->load('typeTreainers');

        return view('admin.typeOfTrainers.show', compact('typeOfTrainer'));
    }

    public function destroy(TypeOfTrainer $typeOfTrainer)
    {
        abort_if(Gate::denies('type_of_trainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeOfTrainer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTypeOfTrainerRequest $request)
    {
        TypeOfTrainer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
