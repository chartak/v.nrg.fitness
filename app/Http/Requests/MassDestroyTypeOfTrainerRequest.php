<?php

namespace App\Http\Requests;

use App\TypeOfTrainer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTypeOfTrainerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('type_of_trainer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:type_of_trainers,id',
        ];
    }
}
