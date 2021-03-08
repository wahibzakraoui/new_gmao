<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string',
            'complementary_code' => 'string',
            'area_id' => 'required|numeric',
            'area_code' => 'required|string',
            'equipment_id' => 'required|numeric',
            'criticity_id' => 'required|numeric',
            'active' => 'numeric|nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
