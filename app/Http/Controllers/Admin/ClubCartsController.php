<?php

namespace App\Http\Controllers\Admin;

use App\ClubCart;
use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClubCartRequest;
use App\Http\Requests\StoreClubCartRequest;
use App\Http\Requests\UpdateClubCartRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClubCartsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ClubCart::with(['branch'])->select(sprintf('%s.*', (new ClubCart)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'club_cart_show';
                $editGate      = 'club_cart_edit';
                $deleteGate    = 'club_cart_delete';
                $crudRoutePart = 'club-carts';

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
            $table->editColumn('timefrom', function ($row) {
                //return $row->timefrom ? ClubCart::TIMEFROM_SELECT[$row->timefrom] : '';
                return $row->timefrom ? (array_key_exists($row->timefrom, ClubCart::TIMEFROM_SELECT)) ? ClubCart::TIMEFROM_SELECT[$row->timefrom] : trans('cruds.clubCart.'.$row->timefrom)  : '';
            });
            $table->editColumn('timeto', function ($row) {
                return $row->timeto ? ClubCart::TIMETO_SELECT[$row->timeto] : '';
            });
            $table->editColumn('year_from', function ($row) {
                return $row->year_from ? (array_key_exists($row->year_from, ClubCart::YEAR_FROM_SELECT)) ? ClubCart::YEAR_FROM_SELECT[$row->year_from] : trans('cruds.clubCart.scheduled_year') : '';
            });
            $table->editColumn('year_to', function ($row) {
                return $row->year_to ? ClubCart::YEAR_TO_SELECT[$row->year_to] : '';
            });
            $table->editColumn('duration', function ($row) {
                return $row->duration ? (is_numeric($row->duration)) ? $row->duration : trans('cruds.clubCart.duration_time'): "";
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });
            $table->editColumn('orderby', function ($row) {
                return $row->orderby ? $row->orderby : "";
            });
            $table->editColumn('cart_background', function ($row) {
                return $row->cart_background ? $row->cart_background : "";
            });
            $table->addColumn('branch_branch_name', function ($row) {
                return $row->branch ? $row->branch->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'branch']);

            return $table->make(true);
        }

        return view('admin.clubCarts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('club_cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clubCarts.create', compact('branches'));
    }

    public function store(StoreClubCartRequest $request)
    {
        $request = $this->checkTimeYear($request);
        $clubCart = ClubCart::create($request->all());

        return redirect()->route('admin.club-carts.index');
    }

    public function edit(ClubCart $clubCart)
    {
        abort_if(Gate::denies('club_cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clubCart->load('branch');

        return view('admin.clubCarts.edit', compact('branches', 'clubCart'));
    }

    public function update(UpdateClubCartRequest $request, ClubCart $clubCart)
    {
        $request = $this->checkTimeYear($request);
        $clubCart->update($request->all());

        return redirect()->route('admin.club-carts.index');
    }

    private function checkTimeYear($req){

        if ($req->input("scheduled_time")) {
            $time_from = $req->input("scheduled_time");
            unset($req["scheduled_time"]);
            $req["timefrom"] = $time_from;
            $req["timeto"] = '';
        }

        if ($req->input("scheduled_year")) {
            $year_from = $req->input("scheduled_year");
            unset($req["scheduled_year"]);
            $req["year_from"] = $year_from;
            $req["year_to"] = '';
        }

        if ($req->input("duration_time")) {
            $duration = $req->input("duration_time");
            unset($req["duration_time"]);
            $req["duration"] = $duration;
        }

        return $req;
    }

    public function show(ClubCart $clubCart)
    {
        abort_if(Gate::denies('club_cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clubCart->load('branch');

        return view('admin.clubCarts.show', compact('clubCart'));
    }

    public function destroy(ClubCart $clubCart)
    {
        abort_if(Gate::denies('club_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clubCart->delete();

        return back();
    }

    public function massDestroy(MassDestroyClubCartRequest $request)
    {

        ClubCart::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
