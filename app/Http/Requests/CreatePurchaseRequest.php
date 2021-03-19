<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePurchaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'reference' => 'required',
            'area_id' => 'required',
            'should_be_available_by' => 'required|date',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
