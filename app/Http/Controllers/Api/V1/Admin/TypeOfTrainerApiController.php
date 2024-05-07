<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeOfTrainerRequest;
use App\Http\Requests\UpdateTypeOfTrainerRequest;
use App\Http\Resources\Admin\TypeOfTrainerResource;
use App\TypeOfTrainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeOfTrainerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_of_trainer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeOfTrainerResource(TypeOfTrainer::all());
    }

    public function store(StoreTypeOfTrainerRequest $request)
    {
        $typeOfTrainer = TypeOfTrainer::create($request->all());

        return (new TypeOfTrainerResource($typeOfTrainer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TypeOfTrainer $typeOfTrainer)
    {
        abort_if(Gate::denies('type_of_trainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TypeOfTrainerResource($typeOfTrainer);
    }

    public function update(UpdateTypeOfTrainerRequest $request, TypeOfTrainer $typeOfTrainer)
    {
        $typeOfTrainer->update($request->all());

        return (new TypeOfTrainerResource($typeOfTrainer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TypeOfTrainer $typeOfTrainer)
    {
        abort_if(Gate::denies('type_of_trainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $typeOfTrainer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
