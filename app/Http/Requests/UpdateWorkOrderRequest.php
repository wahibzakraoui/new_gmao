<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'designation' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'required|string',
            'service_id' => 'required|numeric',
            'assigned_user_id' => 'required|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
