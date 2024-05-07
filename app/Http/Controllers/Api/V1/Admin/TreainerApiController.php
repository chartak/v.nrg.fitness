<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTreainerRequest;
use App\Http\Requests\UpdateTreainerRequest;
use App\Http\Resources\Admin\TreainerResource;
use App\Treainer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TreainerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('treainer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TreainerResource(Treainer::with(['types', 'branches'])->get());
    }

    public function store(StoreTreainerRequest $request)
    {
        $treainer = Treainer::create($request->all());
        $treainer->types()->sync($request->input('types', []));
        $treainer->branches()->sync($request->input('branches', []));

        if ($request->input('photo', false)) {
            $treainer->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new TreainerResource($treainer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Treainer $treainer)
    {
        abort_if(Gate::denies('treainer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TreainerResource($treainer->load(['types', 'branches']));
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

        return (new TreainerResource($treainer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Treainer $treainer)
    {
        abort_if(Gate::denies('treainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $treainer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
