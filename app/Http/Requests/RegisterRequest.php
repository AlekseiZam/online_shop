<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'pass' => 'min:6',
            'email' => 'ends_with:mail.ru,rambler.com,google.com,yandex.ru',
            'phone' => 'size:11'
        ];
    }

    public function messages()
    {
        return[
            'pass.min' => 'Минимальная длина пароля - 6 символов',
            'email.ends_with' => 'Почта оканчивается на mail.ru, rambler.com, google.com, yandex.ru',
            'phone.size' => 'Неверный формат телефона'
        ];
    }
}
