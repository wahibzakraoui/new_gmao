<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSPareRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string',
            'complementary_code' => 'string',
            'stock' => 'required|numeric',
            'active' => 'numeric|nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
