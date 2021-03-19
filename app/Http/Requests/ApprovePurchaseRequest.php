<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApprovePurchaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'state' => 'required|in:failed,confirmed',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
