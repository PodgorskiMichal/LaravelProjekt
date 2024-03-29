<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:500',
            'description' => 'required|max:1500',
            'power' => 'nullable|integer|min:0',
            'battery_voltage' => 'nullable|numeric|between:0,999999.99',
            'maximum_rotational_speed' => 'nullable|integer|min:0',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|between:0,999999.99',
            'image' => 'nullable|image|mimes:jpg,png',
            'category_id' => 'required|integer|min:0',
            'brand_id' => 'required|integer|min:0',
            'powered_id' => 'required|integer|min:0',
        ];
    }
}
