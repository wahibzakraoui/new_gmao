<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'designation' => 'required',
            'description' => 'required',
            'equipment_id' => 'required_without:parent_id|numeric',
            'part_id' => 'required_without:parent_id|numeric',
            'parent_id' => 'nullable|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
