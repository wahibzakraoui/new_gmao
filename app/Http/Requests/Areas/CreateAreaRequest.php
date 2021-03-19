<?php

namespace App\Http\Requests\Areas;

use Illuminate\Foundation\Http\FormRequest;

class CreateAreaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:4',
            'codes' => 'required|array',
            'codes.*' => 'unique:area_codes,code,code',
            'factory_id' => 'required|numeric',
            'active' => 'nullable|numeric'
        ];
        return $rules;
    }
}
