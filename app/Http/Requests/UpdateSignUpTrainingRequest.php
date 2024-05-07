<?php

namespace App\Http\Requests;

use App\SignUpTraining;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSignUpTrainingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sign_up_training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'full_name' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
        ];
    }
}
