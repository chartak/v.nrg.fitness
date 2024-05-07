<?php

namespace App\Http\Requests;

use App\ClubCart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClubCartRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('club_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:club_carts,id',
        ];
    }
}
