<?php

namespace App\Http\Requests;

use App\Treainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateTreainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('treainer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(Request $request)
    {
        $arrTrainersValid = [
            'fullname'    => [
                'min:2',
                'max:200',
                'required',
            ],
            'description' => [
                'required',
            ],
            'orderby'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'photo'       => [
                'required',
            ],
            'types.*'     => [
                'integer',
            ],
            'types'       => [
                'required',
                'array',
            ],
            'branches.*'  => [
                'integer',
            ],
            'branches'    => [
                'required',
                'array',
            ],
        ];

        if($request->input('schedule_trainer')){
            unset($arrTrainersValid['photo']);
        }

        return $arrTrainersValid;
    }
}
