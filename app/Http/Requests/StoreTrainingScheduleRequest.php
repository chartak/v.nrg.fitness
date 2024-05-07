<?php

namespace App\Http\Requests;

use App\TrainingSchedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTrainingScheduleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('training_schedule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'training_name' => [
                'required',
            ],
        ];
    }
}
