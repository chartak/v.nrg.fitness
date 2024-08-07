<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySignUpTrainingRequest;
use App\Http\Requests\StoreSignUpTrainingRequest;
use App\Http\Requests\UpdateSignUpTrainingRequest;
use App\SignUpTraining;
use App\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SignUpTrainingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SignUpTraining::query()->select(sprintf('%s.*', (new SignUpTraining)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            //$table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sign_up_training_show';
                $editGate      = 'sign_up_training_edit';
                $deleteGate    = 'sign_up_training_delete';
                $crudRoutePart = 'sign-up-training';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

//            $table->editColumn('id', function ($row) {
//                return $row->id ? $row->id : "";
//            });
            $table->editColumn('type_id', function ($row) {
                return $row->type_id ? SignUpTraining::getType($row->type, $row->type_id) : "";
            });
            $table->editColumn('type_name', function ($row) {
                return $row->type_name ? $row->type_name : "";
            });
            $table->editColumn('full_name', function ($row) {
                return $row->full_name ? $row->full_name : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('status', function ($row) {
                $status_html = '<select name="sta" class="sign_up_status form-control input-sm" onChange="ChangeStatus($(this))" data-id="'.$row->id.'" style="color:#fff;%s">';
                $selected = "";
                foreach(SignUpTraining::STATUS_SELECT as $k=>$v){
                    if($row->status && $row->status == $k ) {
                        switch($row->status){
                            case 'completed':
                                $selected = 'background:green';
                                break;
                            case 'inprogress':
                                $selected = 'background:#161663';
                                break;
                            case 'canceled':
                                $selected = 'background:#9a1d1d';
                                break;
                            default:
                                $selected = 'background:#4e2b4e';
                        }
                        $status_html .='<option value="'.$k.'" selected>'.$v.'</option>';
                    } else {
                        $status_html .='<option value="'.$k.'">'.$v.'</option>';
                    }
                }
                $status_html .='</select>';
                return sprintf($status_html,$selected);
            });
            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? $row->updated_at : "";
            });

            $table->rawColumns(['status','updated_at', 'actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.signUpTraining.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sign_up_training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.signUpTraining.create');
    }

    public function store(StoreSignUpTrainingRequest $request)
    {
        $signUpTraining = SignUpTraining::create($request->all());

        return redirect()->route('admin.sign-up-training.index');
    }

    public function edit(SignUpTraining $signUpTraining)
    {
        abort_if(Gate::denies('sign_up_training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.signUpTraining.edit', compact('signUpTraining'));
    }

    public function update(UpdateSignUpTrainingRequest $request, SignUpTraining $signUpTraining)
    {
        $signUpTraining->update($request->all());

        return redirect()->route('admin.sign-up-training.index');
    }

    public function show(SignUpTraining $signUpTraining)
    {
        abort_if(Gate::denies('type_of_trainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signUpTraining->load('typeTreainers');

        return view('admin.typeOfTrainers.show', compact('typeOfTrainer'));
    }

    public function destroy(SignUpTraining $signUpTraining)
    {
        abort_if(Gate::denies('sign_up_training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $signUpTraining->delete();

        return back();
    }

    public function massDestroy(MassDestroySignUpTrainingRequest $request)
    {
        SignUpTraining::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function changeStatus(Request $request){
        $res = SignUpTraining::where('id', $request["id"])->update(['status'=>$request["status"]]);

        return response()->json($res);
    }

    public function newSchedules(Request $request){

        if($request->post('checkNewOrder')) {
            $res = SignUpTraining::where('status', 'new')->get();
            $res = $res->count();

            return response()->json($res);
        }
    }
}
