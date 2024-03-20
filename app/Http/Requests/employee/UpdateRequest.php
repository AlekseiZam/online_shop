<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'passport_series' => 'required|string',
            'passport_number' => 'required|string',
            'date_of_birthday' => 'required|date',
            'date_of_employment' => 'required|date',
            'phone' => 'required|string',
            'access_id' => 'required',
            'email' => 'required|string'

        ];
    }
}
