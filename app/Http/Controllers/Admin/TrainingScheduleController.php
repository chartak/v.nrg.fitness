<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrainingScheduleRequest;
use App\Http\Requests\StoreTrainingScheduleRequest;
use App\Http\Requests\UpdateTrainingScheduleRequest;
use App\Service;
use App\Stock;
use App\TrainingSchedule;
use App\Treainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainingScheduleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = TrainingSchedule::with(['branch'])->select(sprintf('%s.*', (new TrainingSchedule)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'training_schedule_show';
                $editGate      = 'training_schedule_edit';
                $deleteGate    = 'training_schedule_delete';
                $crudRoutePart = 'training-schedules';

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
            $table->editColumn('training_name', function ($row) {
                return $row->training_name ? $row->training_name : "";
            });
            $table->editColumn('day_of_week', function ($row) {
                return $row->day_of_week ? TrainingSchedule::DAY_WEEK_SELECT[$row->day_of_week] : '';
            });
//            $table->editColumn('pay_type_training', function ($row) {
//                return $row->pay_type_training ? TrainingSchedule::PAY_TYPE_SELECT[$row->pay_type_training] : '';
//            });

            $table->editColumn('status', function ($row) {
                return $row->status ? TrainingSchedule::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions','placeholder','training_name','status']);

            return $table->make(true);
        }

        return view('admin.trainingSchedules.index');
    }

    public function create()
    {
        abort_if(Gate::denies('training_schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $treainers = Treainer::where('schedule_trainer',1)->where('status',1)->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $stocks = Stock::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trainingSchedules.create', compact('services','treainers','stocks','branches'));
    }

    public function store(StoreTrainingScheduleRequest $request)
    {
        $trainingSchedule = TrainingSchedule::create($request->all());

        return redirect()->route('admin.training-schedules.index');
    }

    public function edit(TrainingSchedule $trainingSchedule)
    {
        abort_if(Gate::denies('training_schedule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $trainingSchedule->load('service');
        $treainers = Treainer::where('schedule_trainer',1)->where('status',1)->pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $stocks = Stock::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trainingSchedules.edit', compact('trainingSchedule','services','treainers','stocks','branches'));
    }

    public function update(UpdateTrainingScheduleRequest $request, TrainingSchedule $trainingSchedule)
    {
        $trainingSchedule->update($request->all());

        return redirect()->route('admin.training-schedules.index');
    }

    public function show(TrainingSchedule $trainingSchedule)
    {
        abort_if(Gate::denies('training_schedule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingSchedule->load('service');

        return view('admin.trainingSchedules.show', compact('trainingSchedule'));
    }

    public function destroy(TrainingSchedule $trainingSchedule)
    {
        abort_if(Gate::denies('training_schedule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trainingSchedule->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingScheduleRequest $request)
    {
        TrainingSchedule::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
