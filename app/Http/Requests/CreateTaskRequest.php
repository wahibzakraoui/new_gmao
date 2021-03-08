<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'label' => 'required|string',
            'description' => 'required|string',
            'quality' => 'nullable|string',
            'quantity' => 'nullable|string',
            'gamut_id' => 'required|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
