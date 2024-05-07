<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClubCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubCartRequest;
use App\Http\Requests\UpdateClubCartRequest;
use App\Http\Resources\Admin\ClubCartResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClubCartsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('club_cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClubCartResource(ClubCart::with(['branch'])->get());
    }

    public function store(StoreClubCartRequest $request)
    {
        $clubCart = ClubCart::create($request->all());

        return (new ClubCartResource($clubCart))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClubCart $clubCart)
    {
        abort_if(Gate::denies('club_cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClubCartResource($clubCart->load(['branch']));
    }

    public function update(UpdateClubCartRequest $request, ClubCart $clubCart)
    {
        $clubCart->update($request->all());

        return (new ClubCartResource($clubCart))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClubCart $clubCart)
    {
        abort_if(Gate::denies('club_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clubCart->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
