<?php

namespace App\Http\Requests;

use App\PhotoGallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePhotoGalleryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('photo_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
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
