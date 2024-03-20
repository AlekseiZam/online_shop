<?php

namespace App\Http\Requests\good;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|string',
            'price' => 'required|integer',
            'count' => 'required|integer',
            'old_category_id' => 'required',
            'id' => 'required',
            'image' => 'file',
        ];
    }
}
