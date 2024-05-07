<?php

namespace App\Http\Controllers\Admin;

use App\ContactContact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStockRequest;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StocksController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Stock::with(['branch'])->select(sprintf('%s.*', (new Stock)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'stock_show';
                $editGate      = 'stock_edit';
                $deleteGate    = 'stock_delete';
                $crudRoutePart = 'stocks';

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

            $table->editColumn('orderby', function ($row) {
                return $row->orderby ? $row->orderby : "";
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });
            $table->editColumn('discounts', function ($row) {
                return $row->discounts ? $row->discounts : "";
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
            $table->addColumn('branch_branch_name', function ($row) {
                return $row->branch ? $row->branch->branch_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'photo', 'branch']);

            return $table->make(true);
        }

        return view('admin.stocks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.stocks.create', compact('branches'));
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());

        if ($request->input('photo', false)) {
            $stock->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('photo_stock', false)) {
            $stock->addMedia(storage_path('tmp/uploads/' . $request->input('photo_stock')))->toMediaCollection('photo_stock');
        }

        return redirect()->route('admin.stocks.index');
    }

    public function edit(Stock $stock)
    {
        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = ContactContact::all()->pluck('branch_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stock->load('branch');

        return view('admin.stocks.edit', compact('branches', 'stock'));
    }

    public function update(UpdateStockRequest $request, Stock $stock)
    {
        $stock->update($request->all());

        if ($request->input('photo', false)) {
            if (!$stock->photo || $request->input('photo') !== $stock->photo->file_name) {
                $stock->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($stock->photo) {
            $stock->photo->delete();
        }

        if ($request->input('photo_stock', false)) {
            if (!$stock->photo_stock || $request->input('photo_stock') !== $stock->photo_stock->file_name) {
                $stock->addMedia(storage_path('tmp/uploads/' . $request->input('photo_stock')))->toMediaCollection('photo_stock');
            }
        } elseif ($stock->photo_stock) {
            $stock->photo->delete();
        }

        return redirect()->route('admin.stocks.index');
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->load('branch');

        return view('admin.stocks.show', compact('stock'));
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return back();
    }

    public function massDestroy(MassDestroyStockRequest $request)
    {
        Stock::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
