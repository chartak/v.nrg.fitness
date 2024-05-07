<?php

namespace App\Http\Requests;

use App\Menu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMenuRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'        => [
                'min:2',
                'max:255',
                'required',
            ],
            'anchor_key'   => [
                'required',
            ],
            'orderby'    => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'branch_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
