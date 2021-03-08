<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGamutRequest extends FormRequest
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
        return [
            'designation' => 'required|string',
            'code' => 'required|string',
            'state' => 'required|string|in:Running,Offline',
            'type' => 'required|string|in:visit,lubrification',
            'factory_id' => 'required|numeric',
            'equipment_id' => 'required|numeric',
            'part_id' => 'numeric',
            'area_id' => 'required|string',
            'periodicity_id' => 'required|numeric',
            'work_instructions' => 'string',
            'estimated_hours' => 'numeric',
            'service_id' => 'required|numeric',
            'assigned_user_id' => 'numeric',
            'active' => 'nullable|numeric',
        ];
    }
}
