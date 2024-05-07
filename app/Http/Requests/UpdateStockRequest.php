<?php

namespace App\Http\Requests;

use App\Stock;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateStockRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'min:2',
                'max:255',
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'orderby'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discounts'  => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'branch_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
