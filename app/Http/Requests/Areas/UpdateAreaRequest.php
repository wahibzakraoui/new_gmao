<?php

namespace App\Http\Requests\Areas;

use App\Models\Area;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAreaRequest extends FormRequest
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
            'factory_id' => 'required|numeric',
            'active' => 'nullable|numeric'
        ];

        // here loop through the current codes array to add the ignore
        $area_codes = Area::find($this->segment(3))->first()->codes->pluck('code');
        foreach($area_codes as $key => $code) {
            //$rules = array_merge($rules, ['codes.'.$key => 'required|unique:area_codes,code,code,'.$code]);
            $rules = array_merge($rules,[
                'codes.'.$key => "unique:area_codes,code," . $code . ",code",
            ]);
        }
        //dd($rules);
        return $rules;
    }
}
