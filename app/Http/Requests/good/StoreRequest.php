<?php

namespace App\Http\Requests\good;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => '',
            'manufacturer_id' => '',
            'value' => '',
            'category_id' => '',
            'name' => '',
            'price' => '',
            'count' => '',
            'image' => 'file',


        ];
    }
}
