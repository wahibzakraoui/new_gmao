<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExecuteWorkOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'real_completion_date' => 'required',
            'feedback' => 'required',
            'done' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
