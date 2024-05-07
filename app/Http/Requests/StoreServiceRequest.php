<?php

namespace App\Http\Requests;

use App\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
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
            'photo.*'     => [
                'required',
            ],
            'branch_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
