<?php

namespace App\Http\Requests;

use App\ClubCart;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreClubCartRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('club_cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(Request $request)
    {
        $arrClubCartValid = [
            'name'      => [
                'required',
            ],
            'description'      => [
                'required',
            ],
//            'timefrom'  => [
//                'required',
//            ],
            'year_from'  => [
                'required',
            ],
            'orderby'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
//            'duration'  => [
//                'required',
//                'integer',
//                'min:-2147483648',
//                'max:2147483647',
//            ],
            'branch_id' => [
                'required',
                'integer',
            ],
        ];

        if($request->input('scheduled_time')){
            unset($arrClubCartValid['timefrom']);
        }
        if($request->input('scheduled_year')){
            unset($arrClubCartValid['year_from']);
        }
        if($request->input('duration_time')){
            unset($arrClubCartValid['duration']);
        }
        return $arrClubCartValid;
    }
}
