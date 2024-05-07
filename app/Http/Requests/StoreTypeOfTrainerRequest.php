<?php

namespace App\Http\Requests;

use App\TypeOfTrainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTypeOfTrainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_of_trainer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
