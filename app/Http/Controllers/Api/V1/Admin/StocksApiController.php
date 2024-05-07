<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Resources\Admin\StockResource;
use App\Stock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StocksApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockResource(Stock::with(['branch'])->get());
    }

    public function store(StoreStockRequest $request)
    {
        $stock = Stock::create($request->all());

        if ($request->input('photo', false)) {
            $stock->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new StockResource($stock))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Stock $stock)
    {
        abort_if(Gate::denies('stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StockResource($stock->load(['branch']));
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

        return (new StockResource($stock))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Stock $stock)
    {
        abort_if(Gate::denies('stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stock->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
