<?php

namespace App\Http\Requests;

use App\Treainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTreainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('treainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:treainers,id',
        ];
    }
}
